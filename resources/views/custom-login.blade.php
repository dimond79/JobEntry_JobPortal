@foreach ($items as $login_item)
    @if ($login_item->children->isEmpty())
        <a href=""
            class="nav-item nav-link {{ url()->current() == $login_item->link() ? 'active' : '' }}">{{ $login_item->title }}</a>
    @else
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                {{ $login_item->title }}
            </a>

            <div class="dropdown-menu rounded-0 m-0 pt-3">
                @foreach ($login_item->children as $child)
                    <a href="{{ $child->link() }}" class="dropdown-item">{{ $child->title }}</a>
                @endforeach
            </div>
        </div>
    @endif
@endforeach
