@foreach ($items as $menu_item)
    @if ($menu_item->children->isEmpty())
        <a href="{{ $menu_item->link() }}"
            class="nav-item nav-link {{ url()->current() == $menu_item->link() ? 'active' : '' }}">
            {{ $menu_item->title }}
        </a>
    @else
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                {{ $menu_item->title }}
            </a>
            <div class="dropdown-menu rounded-0 m-0">
                @foreach ($menu_item->children as $child)
                    <a href="{{ $child->link() }}" class="dropdown-item">
                        {{ $child->title }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
@endforeach
