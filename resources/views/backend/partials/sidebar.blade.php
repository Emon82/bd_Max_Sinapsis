@php

    $system =\App\Models\SystemSetting::first();

 @endphp


<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                 <a href="{{ route('home') }}">
                     @if (!empty($system->logo))
                         <img class="mb-3" width="200" height="24px" src="{{ asset($system->logo ?? "") }}" alt="logo"/>
                     @else
                         <img class="mb-3" width="200" height="24px" src="{{ asset('backend/img/logo/logo_F.png') }}" alt="logo"/>
                     @endif
                 </a>
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : ' ' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>


        <li class="menu-item {{ Request::routeIs('clinical.*') ? 'active' : '' }}">
    <a class="menu-link" href="{{ route('services.index') }}">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div data-i18n="Layouts">Services</div>
    </a>
</li>


<li class="menu-item {{ Request::routeIs('cms.about-page.*')? 'active' : '' }}">
    <a class="menu-link" href="{{ route('projects.index') }}">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div data-i18n="Layouts">Projects</div>
    </a>
</li>
<li class="menu-item {{ Request::routeIs('cms.student-form') ? 'active' : '' }}">
    <a class="menu-link" href="{{ route('portfolios.index') }}">
        <i class="menu-icon tf-icons bx bx-male-female"></i>
        <div data-i18n="Layouts">Portfolio</div>
    </a>
</li>

<li class="menu-item {{ Request::routeIs('cms.ideal-preceptor.preceptor') ? 'active' : '' }}">
    <a class="menu-link" href="{{ route('creativity.index') }}">
        <i class="menu-icon tf-icons bx bxs-shield-plus"></i>
        <div data-i18n="Layouts">Creativity</div>
    </a>
</li>


<li class="menu-item {{ Request::routeIs('cms.contact') ? 'active' : '' }}">
    <a class="menu-link" href="{{ route('cms.contact') }}">
        <i class="menu-icon tf-icons bx bxs-contact"></i>
        <div data-i18n="Layouts">Abouts</div>
    </a>
</li>


        <!-- Layouts -->

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">FAQ</span>
        </li>

        <li class="menu-item {{ Request::routeIs('faq.index') ||Request::routeIs('faq.create') ||Request::routeIs('faq.edit') ? 'active open' : ' ' }}">
            <a href="{{ route('faq.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bi-patch-question"></i>
                <div data-i18n="Layouts">FAQ's</div>
            </a>
        </li>




        <!-- User -->
        <!-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Contact Us</span></li>

        <li class="menu-item {{ Request::routeIs('contact.index') ? 'active' : ' ' }}">
            <a href="{{ route('contact.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-message-dots"></i>
                <div data-i18n="Layouts">Messages</div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('newsletter.index') ? 'active' : ' ' }}">
            <a href="{{ route('newsletter.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-news"></i>
                <div data-i18n="Layouts">Newsletters</div>
            </a>
        </li> -->


        <!-- Layouts -->

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <!-- Apps -->

        <!-- Pages -->
        <li
            class="menu-item {{ Request::routeIs('system.index') || Request::routeIs('profile.setting') || Request::routeIs('mail.setting') || Request::routeIs('dynamic_page.index') || Request::routeIs('dynamic_page.create') || Request::routeIs('dynamic_page.edit') || Request::routeIs('stripe.index') || Request::routeIs('custom-script.index') || Request::routeIs('custom-script.create') || Request::routeIs('custom-script.edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Account Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('profile.setting') ? 'active' : '' }}">
                    <a href="{{route('profile.setting')}}" class="menu-link">
                        <div data-i18n="Account">Profile Setting</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('system.index') ? 'active' : ' ' }}">
                    <a href="{{ route('system.index') }}" class="menu-link">
                        <div data-i18n="Notifications">Team Member</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('mail.setting') ? 'active' : ' ' }}">
                    <a href="{{route('mail.setting')}}" class="menu-link">
                        <div data-i18n="Connections">Contact</div>
                    </a>
                </li>
               
            </ul>
        </li>
        <!-- Components -->
    </ul>
</aside>
