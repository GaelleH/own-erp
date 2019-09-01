<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ 'GH' }}</a>
            <a href="#" class="simple-text logo-normal">{{ 'Gaëlle Hardy Pro' }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ 'Dashboard' }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ 'Laravel Examples' }}</span>
                    <b class="caret mt-1"></b>
                </a>

                {{-- <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ 'User Profile' }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ 'User Management' }}</p>
                            </a>
                        </li>
                    </ul>
                </div> --}}
            </li>
            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('users.index')}}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ 'Users' }}</p>
                </a>
            </li>
            {{-- <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ 'Maps' }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ _('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ _('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="#">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }}">
                <a href="#">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ _('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
