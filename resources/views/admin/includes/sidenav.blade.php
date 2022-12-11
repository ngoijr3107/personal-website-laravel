<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    @php
        $profile = \App\Models\Profile::select('full_name', 'profile_image')->first();
    @endphp
    <div class="app-sidebar__user"><img width="50" class="app-sidebar__user-avatar"
                                        src="{{ asset('storage/profile_image') . '/' . $profile->profile_image }}"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ $profile->full_name }}</p>
            <p class="app-sidebar__user-designation">{{ 'Web Developer' }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ (request()->is('dashboard*')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="far fa-chart-bar app-menu__icon"></i><span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('profile*')) ? 'active' : '' }}" href="{{ route('profile') }}">
                <i class="far fa-user-cog app-menu__icon"></i><span class="app-menu__label">Profile</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('categories*')) ? 'active' : '' }}" href="{{ route('categories.index') }}">
                <i class="far fa-layer-group app-menu__icon"></i><span class="app-menu__label">Categories</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('services*')) ? 'active' : '' }}" href="{{ route('services.index') }}">
                <i class="far fa-bezier-curve app-menu__icon"></i><span class="app-menu__label">Services</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('projects*')) ? 'active' : '' }}" href="{{ route('projects.index') }}">
                <i class="far fa-file-code app-menu__icon"></i><span class="app-menu__label">Projects</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('messages*')) ? 'active' : '' }}" href="{{ route('messages.index') }}">
                <i class="far fa-mail-bulk app-menu__icon"></i><span class="app-menu__label">Messages <span class="badge badge-primary">{{ \App\Models\Message::where('read', 0)->count() }}</span></span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('skills*')) ? 'active' : '' }}" href="{{ route('skills.index') }}">
                <i class="far fa-code app-menu__icon"></i><span class="app-menu__label">Skills</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('experiences*')) ? 'active' : '' }}" href="{{ route('experiences.index') }}">
                <i class="far fa-briefcase app-menu__icon"></i><span class="app-menu__label">Experiences</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('educations*')) ? 'active' : '' }}" href="{{ route('educations.index') }}">
                <i class="far fa-book app-menu__icon"></i><span class="app-menu__label">Educations</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('stats*')) ? 'active' : '' }}" href="{{ route('stats.index') }}">
                <i class="far fa-star app-menu__icon"></i><span class="app-menu__label">Stats</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('settings*')) ? 'active' : '' }}" href="">
                <i class="far fa-cog app-menu__icon"></i><span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
