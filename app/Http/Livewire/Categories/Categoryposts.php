<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Categoryposts extends Component
{
    use WithPagination;

    use WithFileUploads;

    public $title, $content, $category, $post_id;
    public $tagids = array();
    public $isOpen = 0;

    public $photos = [];

    public $cid;

    public function mount($id)
    {
        $this->cid = $id;
    }

    public function render()
    {
        return view('livewire.posts.posts', [
            'posts' => Post::where('category_id', $this->cid)->orderBy('id', 'desc')->paginate(),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'photos.*' => 'image|max:1024',
        ]);

        $post = Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => intVal($this->category),
            'author_id' => Auth::user()->id,
        ]);

        // Image upload and store name in db
        if (count($this->photos) > 0) {
            Image::where('post_id', $post->id)->delete();
            $counter = 0;
            foreach ($this->photos as $photo) {

                $storedImage = $photo->store('public/photos');

                $featured = false;
                if ($counter == 0) {
                    $featured = true;
                }
                Image::create([
                    'url' => url('storage' . Str::substr($storedImage, 6)),
                    'title' => '-',
                    'post_id' => $post->id,
                    'featured' => $featured,
                ]);
                $counter++;
            }
        }

        if (count($this->tagids) > 0) {

            DB::table('post_tag')->where('post_id', $post->id)->delete();

            foreach ($this->tagids as $tagid) {
                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id' => intVal($tagid),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        session()->flash(
            'message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }

    public function edit($id)
    {
        $post = Post::with('tags')->findOrFail($id);

        $this->post_id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->category = $post->category_id;
        $this->tagids = $post->tags->pluck('id');

        $this->openModal();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->category = null;
        $this->tagids = null;
        $this->post_id = '';
    }
}
