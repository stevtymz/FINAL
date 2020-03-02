<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
   
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
            @if(Auth::user()->profile)
                   <img src="{{url('uploads/avators/'.Auth::user()->profile->avator) }}" style=" width:100px; height:100px; border-radius:50%; margin-left:45px; margin-top:4px;">
                   <p style=" margin-left:35px;" class="text-white">{{ Auth::user()->profile->first_name}} <t>{{ Auth::user()->profile->last_name}}</p>
            @else
                <img src="/uploads/avators/default.jpg" style=" width:100px; height:100px; border-radius:50%; margin-left:45px;  margin-top:4px;">
                <p style=" margin-left:35px;" class="text-white">{{ Auth::user()->name}}</p>
            @endif
       
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                @if(!Auth::user()->isHR())
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fab fa-accusoft"></i>
                            <span>System Guide</span>
                        </p>
                    </a>
                @endif
                    @can('appraisal_time_create')
                    <li class="nav-item">
                    <a href="{{ route("admin.time-entry.index") }}" class="nav-link">
                        <p>
                            <i class="fab fa-accusoft"></i>
                            <span>Set Appraisal Date</span>
                        </p>
                    </a>
                    </li>
                    @endcan
                    @if(Auth::user()->isHR())
                    @can('Insights_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.insights.index") }}" class="nav-link {{ request()->is('admin/insights') || request()->is('admin/insights/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-clone">

                                        </i>
                                        <p>
                                            <span>Appraisal Insights</span>
                                        </p>
                                    </a>
                                </li>
                     @endcan
                     @endif
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departments.index") }}" class="nav-link {{ request()->is('admin/departments') || request()->is('admin/departments/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>MUST-Departments</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('profile_access')
                    <li class="nav-item">
                    @if(Auth::user()->isHOD() || Auth::user()->isHOD2() || Auth::user()->isHR())
                        <a href="{{ route("admin.profiles.index") }}" class="nav-link {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">
                    @elseif(Auth::user()->profile)
                    <a href="{{ route('admin.profiles.show', Auth::user()->profile->id) }}" class="nav-link {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">   
                    @else
                    <a href="{{ route("admin.profiles.create") }}" class="nav-link {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">
                    @endif
                            <i class="fa-fw fas fa-address-card">

                            </i>
                         
                            <p>
                                <span>{{ trans('cruds.profile.title') }}</span>
                            </p>
                        </a>
                    </li>
                   
                @endcan
                @can('salary_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.salaries.index") }}" class="nav-link {{ request()->is('admin/salaries') || request()->is('admin/salaries/*') ? 'active' : '' }}">
                            <i class="fa-fw fab fa-algolia">

                            </i>
                            <p>
                                <span>{{ trans('cruds.salary.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('performance_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.performances.index") }}" class="nav-link {{ request()->is('admin/performances') || request()->is('admin/performances/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-clone">

                            </i>
                            <p>
                                <span>{{ trans('cruds.performance.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('support_staff_appraisal_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.support-staff-appraisals.index") }}" class="nav-link {{ request()->is('admin/support-staff-appraisals') || request()->is('admin/support-staff-appraisals/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-clone">

                            </i>
                            <p>
                                <span>{{ trans('cruds.supportStaffAppraisal.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('time_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/time-work-types*') ? 'menu-open' : '' }} {{ request()->is('admin/time-projects*') ? 'menu-open' : '' }} {{ request()->is('admin/time-entries*') ? 'menu-open' : '' }} {{ request()->is('admin/time-reports*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-clock">

                            </i>
                            <p>
                                <span>{{ trans('cruds.timeManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('time_work_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-work-types.index") }}" class="nav-link {{ request()->is('admin/time-work-types') || request()->is('admin/time-work-types/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-th">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.timeWorkType.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('time_project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-projects.index") }}" class="nav-link {{ request()->is('admin/time-projects') || request()->is('admin/time-projects/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.timeProject.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('time_entry_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-entries.index") }}" class="nav-link {{ request()->is('admin/time-entries') || request()->is('admin/time-entries/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.timeEntry.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('time_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.time-reports.index") }}" class="nav-link {{ request()->is('admin/time-reports') || request()->is('admin/time-reports/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-chart-line">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.timeReport.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('training_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/trainees*') ? 'menu-open' : '' }} {{ request()->is('admin/reporting-about-trainings*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-check-square">

                            </i>
                            <p>
                                <span>{{ trans('cruds.training.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('trainee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.trainees.index") }}" class="nav-link {{ request()->is('admin/trainees') || request()->is('admin/trainees/*') ? 'active' : '' }}">
                                        <i class="fa-fw fab fa-accessible-icon">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.trainee.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('reporting_about_training_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reporting-about-trainings.index") }}" class="nav-link {{ request()->is('admin/reporting-about-trainings') || request()->is('admin/reporting-about-trainings/*') ? 'active' : '' }}">
                                        <i class="fa-fw fab fa-accessible-icon">

                                        </i>
                                        <p>
                                            <span>ReportingAboutTraining</span>
                                         </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('reward_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.rewards.index") }}" class="nav-link {{ request()->is('admin/rewards') || request()->is('admin/rewards/*') ? 'active' : '' }}">
                            <i class="fa-fw fab fa-angellist">

                            </i>
                            <p>
                                <span>Reward</span>
                            </p>
                        </a>
                    </li>
                @endcan
                
                @php($unread = \App\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }} nav-link">
                            <i class="fa-fw fa fa-envelope">

                            </i>
                            <span>{{ trans('global.messages') }}</span>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt">

                                </i>
                                <span>{{ trans('global.logout') }}</span>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>