<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('website_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.websites.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/websites') || request()->is('admin/websites/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-object-ungroup c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.website.title') }}
                </a>
            </li>
        @endcan
        @can('service_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.services.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.service.title') }}
                </a>
            </li>
        @endcan
        @can('team_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.teams.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.team.title') }}
                </a>
            </li>
        @endcan
        @can('testimonial_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.testimonials.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/testimonials') || request()->is('admin/testimonials/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-user-check c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.testimonial.title') }}
                </a>
            </li>
        @endcan
        {{-- @can('gallery_collection_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.gallery-collections.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gallery-collections") || request()->is("admin/gallery-collections/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-camera c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.galleryCollection.title') }}
                </a>
            </li>
        @endcan --}}
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.settings.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        @can('certificate_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.certificates.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/certificates') || request()->is('admin/certificates/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-certificate c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.certificate.title') }}
                </a>
            </li>
        @endcan
        @can('employee_form_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.employee-forms.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/employee-forms') || request()->is('admin/employee-forms/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-female c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.employeeForm.title') }}
                </a>
            </li>
        @endcan
        @can('company_form_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.company-forms.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/company-forms') || request()->is('admin/company-forms/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.companyForm.title') }}
                </a>
            </li>
        @endcan
        @can('training_form_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.training-forms.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/training-forms') || request()->is('admin/training-forms/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-train c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.trainingForm.title') }}
                </a>
            </li>
        @endcan
        @can('reports_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.reports.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/reports') || request()->is('admin/reports/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-train c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.employee_reports.title') }}
                </a>
            </li>
        @endcan

        @can('marketing_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.marketings.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/marketings') || request()->is('admin/marketings/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-highlighter c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.marketing.title') }}
                </a>
            </li>
        @endcan

        @can('training_attendance_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.training-attendances.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/training-attendances') || request()->is('admin/training-attendances/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-female c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.trainingAttendance.title') }}
                </a>
            </li>
        @endcan
        @can('employee_attendance_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.employee-attendances.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/employee-attendances') || request()->is('admin/employee-attendances/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-user-astronaut c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.employeeAttendance.title') }}
                </a>
            </li>
        @endcan

        @can('satisfaction_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.satisfactions.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/satisfactions') || request()->is('admin/satisfactions/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-smile c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.satisfaction.title') }}
                </a>
            </li>
        @endcan

        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
