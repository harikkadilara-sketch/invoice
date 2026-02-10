<ul class="sidebar-menu">

    <li class="menu-header">Menu</li>

    @foreach ($menus as $menu)
        @php
            $hasChildren = $menu->children && $menu->children->count() > 0;

            // Active logic
            $isActiveParent = $menu->route_prefix
                ? request()->routeIs($menu->route_prefix . '.*')
                : ($menu->route
                    ? request()->routeIs($menu->route . '*')
                    : false);

            $isActiveChild = $hasChildren
                ? $menu->children->contains(function ($child) {
                    if ($child->route_prefix) {
                        return request()->routeIs($child->route_prefix . '.*');
                    }

                    return $child->route ? request()->routeIs($child->route . '*') : false;
                })
                : false;

            $isOpen = $isActiveParent || $isActiveChild;
        @endphp

        {{-- ================= PARENT ================= --}}
        <li class="{{ $hasChildren ? 'dropdown' : '' }} {{ $isOpen ? 'active' : '' }}">

            {{-- ===== PARENT LINK ===== --}}
            <a href="{{ $hasChildren ? '#' : ($menu->route ? route($menu->route) : '#') }}"
                class="nav-link {{ $hasChildren ? 'has-dropdown' : '' }} {{ $isOpen ? 'toggled' : '' }}">
                <i class="{{ $menu->icon }}"></i>
                <span>{{ $menu->name }}</span>
            </a>

            {{-- ================= CHILD ================= --}}
            @if ($hasChildren)
                <ul class="dropdown-menu" style="{{ $isOpen ? 'display:block;' : '' }}">
                    @foreach ($menu->children as $child)
                        @php
                            $isChildActive = $child->route_prefix
                                ? request()->routeIs($child->route_prefix . '.*')
                                : ($child->route
                                    ? request()->routeIs($child->route . '*')
                                    : false);
                        @endphp

                        <li class="{{ $isChildActive ? 'active' : '' }}">
                            <a class="nav-link" href="{{ $child->route ? route($child->route) : '#' }}">
                                {{ $child->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </li>
    @endforeach

</ul>
