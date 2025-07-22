@foreach ($items as $footer_item)
    <a class="btn btn-link text-white-50" href="{{ $footer_item->link() }}">{{ $footer_item->title }}</a>
@endforeach
