<x-collections.layout-item
    drop="empty"
    dropTitle=""
    collectionDrop="notdrop"
    :datecreation="$item['creation_date']"
    :description="$item['description']"
    :extention="$item['extention']"
    :thumbnails="$item['thumbnail']"
    :title="$item['title']"
    :webp="$item['webp']"
    :show="$item['show']"
    itemId="{{ $item['id'] }}"
    imagefile="{{ $item['hash_file'] }}"
    :fileCover="$fileCover"
    pathfile="{{ $item['item'] }}"
    filename="{{ $filename }}"
    price="{{ $item['price'] }}"
    hasHfile="{{ $item['hash_file'] }}"
    imagetitle="{{ $imagetitle }}"
    :team="$team"
    :cardType="$cardType"
    :itemType="$itemType"
    :items="$items"
    :item="$item"
    saved="{{ $saved }}" />
