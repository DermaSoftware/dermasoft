<?php
$test_text = false;
if (Auth::user()->company != 0 && Auth::user()->company_class->plan && Auth::user()->company_class->plan->id == 4) {
    $test_text = "Membresia de Prueba";
    $days = round((time() - strtotime(Auth::user()->company_class->created_at)) / (60 * 60 * 24));
    if ($days > 30) {
        echo "<script>window.location.href = '/sale_planes';</script>";
    }
    if (30-$days <= 15)
        $test_text .= ' | le quedan ' . 30-$days . ' dias para culminar la membresia de prueba';
}
?>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="fullstackcolombia.com">
    <meta name="description" content="{{ config('app.name', '') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?= $title ?> | {{ config('app.name', '') }}</title>
    <link rel="icon" type="image/png" href="<?= asset('assets/img/favicon.png') ?>"/>
    <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/mycss.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
          integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        .is-fullwidth {
            width: 100%;
        }

        .pricing-wrapper .pricing-plan .price.money_to_fsc::after {
            display: none;
        }

        li.select2-results__option {
            color: #333;
        }

        .select2-container .select2-selection--single {
            height: 38px;
        }

        .select2-container .select2-selection--single {
            height: 38px;
        }

        .select2-container--classic .select2-selection--single .select2-selection__arrow {
            height: 36px;
        }

        .select2-container--classic .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }

        .hidden_fsc {
            display: none;
        }

        .fsc-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        /* Then style the iframe to fit in the container div with full height and width */
        .fsc-responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        .datetimepicker-dummy.is-primary:before, .datetimepicker-dummy.is-primary::before {
            background-color: transparent;
        }

        span.select2.select2-container.select2-container--disabled span.select2-selection__rendered {
            border-color: #f5f5f5;
            background-color: #f5f5f5;
            color: #7a7a7a;
            box-shadow: none;
        }

        .profile-wrapper .profile-body .settings-section .settings-box .icon-wrap img {
            display: block;
            max-width: 50px;
        }

    </style>
</head>
<body class="opened">
<?php $logo_image = !empty($o_settings->logo) ? $o_settings->logo : asset('assets/img/favicon.png'); ?>
<?php $logo_light = !empty($o_settings->logo) ? $o_settings->logo : asset('assets/img/favicon.png'); ?>
<div id="huro-app" class="app-wrapper">
    <div class="app-overlay"></div>
    <!--Pageloader-->
    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <!--Mobile navbar-->
    <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <!-- Mobile menu toggler icon -->
                <div class="brand-start">
                    <div class="navbar-burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a class="navbar-item is-brand" href="{{ url('/') }}">
                    <img class="light-image" src="<?= $logo_image ?>" alt="">
                    <img class="dark-image" src="<?= $logo_light ?>" alt="">
                </a>

                <div class="brand-end">
                    <div class="navbar-item has-dropdown is-notification is-hidden-tablet is-hidden-desktop">
                        <a class="navbar-link is-arrowless" href="javascript:void(0);">
                            <i data-feather="bell"></i>
                            <span class="new-indicator pulsate"></span>
                        </a>
                        <div class="navbar-dropdown is-boxed is-right">
                            <div class="heading">
                                <div class="heading-left">
                                    <h6 class="heading-title">Notifications</h6>
                                </div>
                                <div class="heading-right">
                                    <a class="notification-link" href="#">See all</a>
                                </div>
                            </div>
                            <div class="inner has-slimscroll">

                                <ul class="notification-list">
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                     data-demo-src="assets/img/avatars/photos/7.jpg"/>
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Alice C.</span> left a comment.
                                                </p>
                                                <p class="time">1 hour ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                     data-demo-src="assets/img/avatars/photos/12.jpg"/>
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Joshua S.</span> uploaded a
                                                    file.</p>
                                                <p class="time">2 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                     data-demo-src="assets/img/avatars/photos/13.jpg"/>
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Tara S.</span> sent you a
                                                    message.</p>
                                                <p class="time">2 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150"
                                                     data-demo-src="assets/img/avatars/photos/25.jpg"/>
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Melany W.</span> left a comment.
                                                </p>
                                                <p class="time">3 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                        <div class="is-trigger" aria-haspopup="true">
                            <div class="profile-avatar">
                                <img class="avatar"
                                     src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                                     data-demo-src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                                     alt="">
                            </div>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-head">
                                    <div class="h-avatar is-large">
                                        <img class="avatar"
                                             src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                                             data-demo-src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                                             alt="">
                                    </div>
                                    <div class="meta">
                                        <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <a href="<?= url('profile') ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-user-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Perfil</span>
                                        <span>Gestionar mi perfil</span>
                                    </div>
                                </a>
                                <a class="dropdown-item is-media layout-switcher">
                                    <div class="icon">
                                        <i class="lnil lnil-layout"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Layout</span>
                                        <span>Switch to admin/webapp</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-briefcase"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Projects</span>
                                        <span>All my projects</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-users-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Team</span>
                                        <span>Manage your team</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-cog"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Settings</span>
                                        <span>Account settings</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item is-button">
                                    <button
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        class="button h-button is-primary is-raised is-fullwidth logout-button">
                                        <span class="icon is-small"><i data-feather="log-out"></i></span>
                                        <span>Salir</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!--Mobile sidebar-->
    <div class="mobile-main-sidebar">
        <div class="inner">
            <ul class="icon-side-menu">
                <li>
                    <a href="{{ url('/') }}" id="home-sidebar-menu-mobile">
                        <i data-feather="activity"></i>
                    </a>
                </li>
                <?php if(in_array(Auth::user()->role, [2, 3])){ ?>
                <li>
                    <a href="{{ url('clinichistory') }}" id="layouts-sidebar-menu-mobile">
                        <i data-feather="grid"></i>
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="{{ url('/') }}" id="elements-sidebar-menu-mobile">
                        <i data-feather="box"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url('profile') }}" id="components-sidebar-menu-mobile">
                        <i data-feather="cpu"></i>
                    </a>
                </li>
            </ul>

            <ul class="bottom-icon-side-menu">
                <!--<li>
                    <a href="javascript:" class="right-panel-trigger" data-panel="search-panel">
                        <i data-feather="search"></i>
                    </a>
                </li>-->
                <li>
                    <a href="{{ Auth::user()->role == 1?url('admin/settings'):url('settings') }}">
                        <i data-feather="settings"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--Circular menu-->
    <div id="circular-menu" class="circular-menu">

        <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
            <i aria-hidden="true" class="fas fa-bars"></i>
            <i aria-hidden="true" class="fas fa-times"></i>
        </a>

        <div class="items-wrapper">
            <div class="menu-item is-flex">
                <label class="dark-mode">
                    <input type="checkbox" checked>
                    <span></span>
                </label>
            </div>
            <a href="{{ url('/') }}" class="menu-item is-flex">
                <i data-feather="bell"></i>
            </a>
            <a class="menu-item is-flex right-panel-trigger is-hidden" data-panel="activity-panel">
                <i data-feather="grid"></i>
            </a>
        </div>

    </div>
    <!--Sidebar-->
    <div class="main-sidebar is-bordered">
        <div class="sidebar-brand is-bordered">
            <a href="{{ url('/') }}">
                <img class="light-image" src="<?= $logo_image ?>" alt="">
                <img class="dark-image" src="<?= $logo_light ?>" alt="">
            </a>
        </div>
        <div class="sidebar-inner">

            <div class="naver"></div>

            <ul class="icon-menu">
                <!-- Activity -->
                <li>
                    <a href="{{ url('/') }}" id="home-sidebar-menu" data-content="Dashboards">
                        <i class="fa fa-solid fa-list" style="color: #4028f0;"></i>
                    </a>
                </li> <!-- Layouts -->
                <?php if(in_array(Auth::user()->role, [2, 3])){ ?>
                <li>
                    <a href="{{ url('clinichistory') }}" id="layouts-sidebar-menu" data-content="Layouts">
                        <i class="fa fa-light fa-book-medical" style="color: #1363ec;"></i>
                    </a>
                </li> <!-- Bounties -->
                <?php } ?>
                <li>
                    <a href="{{ url('profile') }}" id="components-sidebar-menu" data-content="Components">
                        <i class="fas fa-solid fa-user-circle" style="color: #1d39c9;"></i>
                    </a>
                </li>
            </ul>

            <!-- User account -->
            <ul class="bottom-menu">
                <!-- Notifications -->
                <!--<li class="right-panel-trigger" data-panel="search-panel">
                    <a href="javascript:void(0);" id="open-search" data-content="Search"><i class="sidebar-svg" data-feather="search"></i></a>
                    <a href="javascript:void(0);" id="close-search" class="is-hidden is-inactive"><i class="sidebar-svg" data-feather="x"></i></a>
                </li>--> <!-- Wallet -->
                <li>
                    <a href="{{ Auth::user()->role == 1?url('admin/settings'):url('admon/settings') }}"
                       id="open-settings" data-content="Settings">
                        <i class="fa fa-solid fa-cog" style="color: #1866ec;"></i>
                    </a>
                </li> <!-- Profile -->
                <li id="user-menu">
                    <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                        <img
                            src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                            data-demo-src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                            alt="">
                        <span class="status-indicator"></span>

                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-head">
                                    <div class="h-avatar is-large">
                                        <img class="avatar"
                                             src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                                             data-demo-src="{{ !empty(Auth::user()->photo)?Auth::user()->photo:'https://via.placeholder.com/150x150' }}"
                                             alt="">
                                    </div>
                                    <div class="meta">
                                        <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <a href="<?= url('profile') ?>" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-user-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Perfil</span>
                                        <span>Gestionar mi perfil</span>
                                    </div>
                                </a>
                                <!--<a class="dropdown-item is-media layout-switcher">
                                    <div class="icon">
                                        <i class="lnil lnil-layout"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Layout</span>
                                        <span>Switch to admin/webapp</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-briefcase"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Projects</span>
                                        <span>All my projects</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-users-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Team</span>
                                        <span>Manage your team</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-cog"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Settings</span>
                                        <span>Account settings</span>
                                    </div>
                                </a>-->
                                <hr class="dropdown-divider">
                                <div class="dropdown-item is-button">
                                    <form id="logout-form" action="{{ url('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                    <button
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        class="button h-button is-primary is-raised is-fullwidth logout-button">
                                        <span class="icon is-small"><i data-feather="log-out"></i></span>
                                        <span>Salir</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--Activity panel-->
    <div id="activity-panel" class="right-panel-wrapper is-activity is-hidden">
        <div class="panel-overlay"></div>

        <div class="right-panel">
            <div class="right-panel-head">
                <h3>Activity</h3>
                <a class="close-panel">
                    <i data-feather="chevron-right"></i>
                </a>
            </div>
            <div class="tabs-wrapper is-triple-slider is-squared">
                <div class="tabs-inner">
                    <div class="tabs">
                        <ul>
                            <li data-tab="team-side-tab" class="is-active"><a><span>Team</span></a></li>
                            <li data-tab="projects-side-tab"><a><span>Projects</span></a></li>
                            <li data-tab="schedule-side-tab"><a><span>Schedule</span></a></li>
                            <li class="tab-naver"></li>
                        </ul>
                    </div>
                </div>

                <div class="right-panel-body">
                    <div id="team-side-tab" class="tab-content is-active">
                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/photos/12.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Joshua S.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      Las Vegas, NV
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>

                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/photos/25.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Melany W.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      San Jose, CA
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>

                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/photos/18.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Esteban C.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      Miami, FL
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>

                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/photos/13.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Tara S.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      New York, NY
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div id="projects-side-tab" class="tab-content">
                        <!--Project-->
                        <div class="project-card">
                            <div class="project-inner">
                                <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/icons/logos/slicer.svg" alt="">
                                <div class="meta">
                                    <span>The slicer project</span>
                                    <span>getslicer.io</span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                            <div class="project-foot">
                                <progress class="progress is-primary is-tiny" value="31" max="100">31%</progress>
                                <div class="foot-stats">
                                    <span>5 / 24</span>

                                    <div class="avatar-stack">
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/5.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Project-->
                        <div class="project-card">
                            <div class="project-inner">
                                <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/icons/logos/metamovies.svg" alt="">
                                <div class="meta">
                                    <span>Metamovies reworked</span>
                                    <span>metamovies.co</span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                            <div class="project-foot">
                                <progress class="progress is-primary is-tiny" value="84" max="100">84%</progress>
                                <div class="foot-stats">
                                    <span>28 / 31</span>

                                    <div class="avatar-stack">
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/13.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/18.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Project-->
                        <div class="project-card">
                            <div class="project-inner">
                                <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/icons/logos/fastpizza.svg" alt="">
                                <div class="meta">
                                    <span>Fast Pizza redesign</span>
                                    <span>fastpizza.com</span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                            <div class="project-foot">
                                <progress class="progress is-primary is-tiny" value="60" max="100">60%</progress>
                                <div class="foot-stats">
                                    <span>25 / 39</span>

                                    <div class="avatar-stack">
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/photos/25.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="schedule-side-tab" class="tab-content">
                        <!--Timeline-->
                        <div class="icon-timeline">
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="phone-call"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Call Danny at Colby's</p>
                                    <span>Today - 11:30am</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                         data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                </div>
                                <div class="timeline-content">
                                    <p>Meeting with Alice</p>
                                    <span>Today - 01:00pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="message-circle"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Answer Annie's message</p>
                                    <span>Today - 01:45pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="mail"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Send new campaign</p>
                                    <span>Today - 02:30pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="smile"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Project review</p>
                                    <span>Today - 03:30pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="phone-call"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Call Trisha Jackson</p>
                                    <span>Today - 05:00pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="feather"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Write proposal for Don</p>
                                    <span>Today - 06:00pm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>
    <!--Search panel-->
    <div id="search-panel" class="right-panel-wrapper is-search is-left">
        <div class="panel-overlay"></div>

        <div class="right-panel">
            <div class="right-panel-head">
                <img class="light-image" src="<?= $logo_image ?>" alt=""/>
                <img class="dark-image" src="<?= $logo_light ?>" alt=""/>
                <a class="close-panel">
                    <i data-feather="chevron-left"></i>
                </a>
            </div>
            <div class="right-panel-body has-slimscroll">
                <div class="field">
                    <div class="control has-icon">
                        <input type="text" class="input is-rounded search-input" placeholder="Search...">
                        <div class="form-icon">
                            <i data-feather="search"></i>
                        </div>
                        <div class="search-results has-slimscroll"></div>
                    </div>
                </div>

                <div class="recent">
                    <h4>Recently viewed</h4>
                    <div class="recent-block">
                        <a class="media-flex-center">
                            <div class="h-icon is-info is-rounded is-small">
                                <i data-feather="chrome"></i>
                            </div>
                            <div class="flex-meta">
                                <span>Browser Support</span>
                                <span>Blog post</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-icon is-orange is-rounded is-small">
                                <i data-feather="tv"></i>
                            </div>
                            <div class="flex-meta">
                                <span>Twitch API</span>
                                <span>Blog post</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-icon is-green is-rounded is-small">
                                <i data-feather="twitter"></i>
                            </div>
                            <div class="flex-meta">
                                <span>Twitter Auth</span>
                                <span>Blog post</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="recent">
                    <h4>Recent Members</h4>
                    <div class="recent-block">
                        <a class="media-flex-center">
                            <div class="h-avatar is-small">
                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/photos/7.jpg" alt="" data-user-popover="0">
                            </div>
                            <div class="flex-meta">
                                <span>Alice C.</span>
                                <span>Software Engineer</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-avatar is-small">
                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/photos/13.jpg" alt="" data-user-popover="6">
                            </div>
                            <div class="flex-meta">
                                <span>Tara S.</span>
                                <span>UI/UX Designer</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-avatar is-small">
                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/photos/22.jpg" alt="" data-user-popover="5">
                            </div>
                            <div class="flex-meta">
                                <span>Jimmy H.</span>
                                <span>Project Manager</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Page body-->

    <div id="home-sidebar" class="sidebar-panel is-generic is-active">
        <div class="subpanel-header">
            <h3 class="no-mb">DERMASOFT</h3>
            <div class="panel-close">
                <i data-feather="x"></i>
            </div>
        </div>
        <div class="inner" data-simplebar>
            <ul>
                @include('menu')
            </ul>
        </div>
    </div>
    <div class="mobile-subsidebar">
        <div class="inner">
            <div class="sidebar-title"><h3>Dashboards</h3></div>
            <ul class="submenu" data-simplebar>
                @include('menu')
            </ul>
        </div>
    </div>
    <!-- Content Wrapper -->
    <div class="view-wrapper is-pushed-full" data-naver-offset="150" data-menu-item="#home-sidebar-menu"
         data-mobile-item="#home-sidebar-menu-mobile">
        <div class="page-content-wrapper">
            <div class="page-content is-relative">
                <div class="page-title has-text-centered">
                    <!-- Sidebar Trigger -->
                    <div class="huro-hamburger nav-trigger push-resize" data-sidebar="home-sidebar">
                            <span class="menu-toggle has-chevron">
                              <span class="icon-box-toggle">
                                  <span class="rotate">
                                      <i class="icon-line-top"></i>
                                      <i class="icon-line-center"></i>
                                      <i class="icon-line-bottom"></i>
                                  </span>
                            </span>
                            </span>
                    </div>
                    <div class="title-wrap">
                        <h1 class="title is-4"><?= $title ?></h1>
                    </div>
                    <div class="toolbar ml-auto">
                        @if ($test_text)
                            <a href="/planes" class="danger-text button bd-fat-button"><?= $test_text ?></a>
                        @endif
                        <div class="toolbar-link"><label class="dark-mode ml-auto"><input type="checkbox"
                                                                                          checked><span></span></label>
                        </div>
                        <div class="toolbar-notifications is-hidden-mobile is-hidden">
                            <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                <div class="is-trigger" aria-haspopup="true">
                                    <i data-feather="bell"></i>
                                    <span class="new-indicator pulsate"></span>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <div class="heading">
                                            <div class="heading-left">
                                                <h6 class="heading-title">Notifications</h6>
                                            </div>
                                            <div class="heading-right">
                                                <a class="notification-link" href="/admin-profile-notifications.html">See
                                                    all</a>
                                            </div>
                                        </div>
                                        <ul class="notification-list">
                                            <li>
                                                <a class="notification-item">
                                                    <div class="img-left">
                                                        <img class="user-photo" alt=""
                                                             src="https://via.placeholder.com/150x150"
                                                             data-demo-src="assets/img/avatars/photos/7.jpg"/>
                                                    </div>
                                                    <div class="user-content">
                                                        <p class="user-info"><span class="name">Alice C.</span> left a
                                                            comment.</p>
                                                        <p class="time">1 hour ago</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="notification-item">
                                                    <div class="img-left">
                                                        <img class="user-photo" alt=""
                                                             src="https://via.placeholder.com/150x150"
                                                             data-demo-src="assets/img/avatars/photos/12.jpg"/>
                                                    </div>
                                                    <div class="user-content">
                                                        <p class="user-info"><span class="name">Joshua S.</span>
                                                            uploaded a file.</p>
                                                        <p class="time">2 hours ago</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="notification-item">
                                                    <div class="img-left">
                                                        <img class="user-photo" alt=""
                                                             src="https://via.placeholder.com/150x150"
                                                             data-demo-src="assets/img/avatars/photos/13.jpg"/>
                                                    </div>
                                                    <div class="user-content">
                                                        <p class="user-info"><span class="name">Tara S.</span> sent you
                                                            a message.</p>
                                                        <p class="time">2 hours ago</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="notification-item">
                                                    <div class="img-left">
                                                        <img class="user-photo" alt=""
                                                             src="https://via.placeholder.com/150x150"
                                                             data-demo-src="assets/img/avatars/photos/25.jpg"/>
                                                    </div>
                                                    <div class="user-content">
                                                        <p class="user-info"><span class="name">Melany W.</span> left a
                                                            comment.</p>
                                                        <p class="time">3 hours ago</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="toolbar-link right-panel-trigger is-hidden" data-panel="activity-panel">
                            <i data-feather="grid"></i>
                        </a>
                    </div>
                </div>
                <div class="page-content-inner">
                    @include('msj')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!--Huro Scripts-->
    <!--Load Mapbox-->
    <!-- Concatenated plugins -->

    @section('js')
    <script src="<?= asset('assets') ?>/js/app.js"></script>
    <!-- Huro js -->
    <script src="<?= asset('assets') ?>/js/functions.js"></script>
    <script src="<?= asset('assets') ?>/js/main.js" async></script>
    <script src="<?= asset('assets') ?>/js/components.js" async></script>
    <script src="<?= asset('assets') ?>/js/popover.js" async></script>
    <script src="<?= asset('assets') ?>/js/widgets.js" async></script>
    <!-- Additional Features -->
    <script src="<?= asset('assets') ?>/js/touch.js" async></script>
<!--<script src="<?= asset('assets') ?>/js/lifestyle-3.js" async></script>-->
    <script src="<?= asset('assets') ?>/js/card-grid.js" async></script>
    <script src="<?= asset('assets') ?>/js/syntax.js" async></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/fsc.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="<?= asset('assets') ?>/codes.js" async></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.9/locales/es.global.js'></script>
    <script>
        <?= !empty($o_chat_scx) ? $o_chat_scx : '' ?>
    </script>
    <script>
        $(document).ready(function () {
            function uuidv4() {
                return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c => (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16));
            }

            if ($('.import-file-all-fsc').length) {
                $('.import-file-all-fsc').on('change', function () {
                    $('.import-form-all-fsc').submit();
                });
            }
            if ($('.btn_delete_ppd_sv').length) {
                function actions_idelete_ps() {
                    $('.btn_delete_ppd_sv').each(function () {
                        var btnt = $(this);
                        btnt.on('click', function () {
                            $.post(btnt.data('url'), {
                                _token: $("meta[name='csrf-token']").attr("content")
                            }, function (data) {
                                $('.amount_total').html(data);
                                btnt.parent().parent().parent().remove();
                                swal('Enhorabuena!', btnt.data('msj'), 'success');
                            }, "html");
                        });
                    });
                }

                actions_idelete_ps();
            }
            if ($('.btn_ad_ppd_sv').length) {
                $('.btn_ad_ppd_sv').on('click', function () {
                    var btn = $(this);
                    const id = btn.data('iditem');
                    const tp = btn.data('type');
                    //table_prods_svs
                    $.post($('.table_prods_svs').data('url'), {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        id: id,
                        xtype: tp
                    }, function (data) {
                        if (data != '') {
                            $('.table_prods_svs tbody').append(data);
                            if ($('.inner_table_prods_svs').hasClass('is-hidden')) {
                                $('.inner_table_prods_svs').removeClass('is-hidden');
                            }
                            feather.replace();
                            actions_row_ps();
                        }
                    }, "html");
                });

                function actions_row_ps() {
                    $('.amount_xps').each(function () {
                        var inpa = $(this);
                        inpa.on('change', function () {
                            var tr = inpa.data('truid');
                            var price = inpa.data('price');
                            var amount = inpa.val();
                            if (amount == '') {
                                amount = 1;
                                inpa.val(1);
                            }
                            var total = amount * price;
                            $('.table_prods_svs tbody tr[data-trid="' + tr + '"] td.total_td').html(total);
                        });
                    });
                    $('.btn_trash_ppd_sv').each(function () {
                        var btnt = $(this);
                        btnt.on('click', function () {
                            btnt.parent().parent().parent().remove();
                        });
                    });
                }
            }

            if ($('.filter_table_fsc').length) {
                $('.filter_table_fsc').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    },
                    info: false,
                    scrollY: 200,
                    deferRender: true,
                    scroller: true,
                    responsive: true,
                    ordering: false,
                    paging: false
                });
            }

            if ($('.o_stable_fsc').length) {
                var stable_fsc = $('.o_stable_fsc').DataTable({
                    "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todos"]],
                    "iDisplayLength": 25,
                    "columnDefs": [{
                        targets: 'no-sort',
                        orderable: false
                    }],
                    "responsive": true,
                    "processing": true,
                    "ordering": true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    }
                });
                stable_fsc.on('click', 'tbody tr td .btn-deletesupport-confirm-x', (e) => {
                    //let classList = e.currentTarget.classList;
                    //classList.add('selected_trash');
                    let id = e.currentTarget.id;
                    const trash = $('#' + id + '.btn-deletesupport-confirm-x');
                    const innerpr = $('tr#' + id);
                    innerpr.addClass('selected_trash');
                    const url_trash = trash.data('href');
                    swal({
                        title: 'Estás seguro(a) que deseas finalizar ' + trash.data('itemtag').toLowerCase() + ' ' + trash.data('nameitem').toLowerCase() + ' seleccionad' + trash.data('itemselect') + '?',
                        text: "Esta acción es irreversible!",
                        icon: "warning",
                        buttons: ["Cancelar", "Si, finalizar!"],
                        dangerMode: true,
                        cancelButtonColor: '#d33'
                    }).then(function (willConfirm) {
                        if (willConfirm) {
                            let params = {_token: $("meta[name='csrf-token']").attr("content"), _method: 'DELETE'};
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: url_trash,
                                data: params,
                                processData: false,
                                contentType: false,
                                dataType: "json",
                                type: 'DELETE',
                                beforeSend: function () {
                                },
                                complete: function () {
                                },
                                success: function (data) {
                                    if (data.response == 'ok') {
                                        swal(
                                            'Enhorabuena!',
                                            $('form.delete-form-fsc').data('msj'),
                                            'success'
                                        );
                                        stable_fsc.row('.selected_trash').remove().draw(false);
                                    }
                                },
                                error: function (jqXHR) {
                                    console.log("ERROR FSC:", jqXHR);
                                }
                            });
                        }
                    });
                });
                stable_fsc.on('click', 'tbody tr td .btn-delete-confirm-x', (e) => {
                    //let classList = e.currentTarget.classList;
                    //classList.add('selected_trash');
                    let id = e.currentTarget.id;
                    const trash = $('#' + id + '.btn-delete-confirm-x');
                    const innerpr = $('tr#' + id);
                    innerpr.addClass('selected_trash');
                    const url_trash = trash.data('href');
                    swal({
                        title: 'Estás seguro(a) que deseas eliminar ' + trash.data('itemtag').toLowerCase() + ' ' + trash.data('nameitem').toLowerCase() + ' seleccionad' + trash.data('itemselect') + '?',
                        text: "Esta acción es irreversible!",
                        icon: "warning",
                        buttons: ["Cancelar", "Si, eliminar!"],
                        dangerMode: true,
                        cancelButtonColor: '#d33'
                    }).then(function (willConfirm) {
                        if (willConfirm) {
                            let params = {_token: $("meta[name='csrf-token']").attr("content"), _method: 'DELETE'};
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: url_trash,
                                data: params,
                                processData: false,
                                contentType: false,
                                dataType: "json",
                                type: 'DELETE',
                                beforeSend: function () {
                                },
                                complete: function () {
                                },
                                success: function (data) {
                                    if (data.response == 'ok') {
                                        swal(
                                            'Enhorabuena!',
                                            $('form.delete-form-fsc').data('msj'),
                                            'success'
                                        );
                                        stable_fsc.row('.selected_trash').remove().draw(false);
                                    }
                                },
                                error: function (jqXHR) {
                                    console.log("ERROR FSC:", jqXHR);
                                }
                            });
                        }
                    });
                });
            }

            if ($('#start-camera').length) {
                let link_button = document.querySelector("#link_download_capture");
                let camera_button = document.querySelector("#start-camera");
                let video = document.querySelector("#video_capture");
                let click_button = document.querySelector("#click-photo");
                let canvas = document.querySelector("#canvas");
                camera_button.addEventListener('click', async function () {
                    let stream = await navigator.mediaDevices.getUserMedia({video: true, audio: false});
                    video.srcObject = stream;
                    $('#video_capture').removeClass('hidden_fsc');
                    $('#click-photo').removeClass('hidden_fsc');
                    $('#start-camera').addClass('hidden_fsc');
                });
                click_button.addEventListener('click', function () {
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                    let image_data_url = canvas.toDataURL('image/jpeg');
                    // data url of the image
                    link_button.href = image_data_url;
                    link_button.download = uuidv4();
                    link_button.click();
                });
            }
            if ($('.btn_save_not_sign').length) {
                $('.btn_save_not_sign').on('click', () => {
                    //activamos el campo hidden y enviamos el formulario
                    $('input[name="urlredirect"]').val('normal');
                    $('.form_save_add_sign').submit();
                });
            }

            if ($('.btn_save_add_sign').length) {
                $('.btn_save_add_sign').on('click', () => {
                    //activamos el campo hidden y enviamos el formulario
                    $('input[name="urlredirect"]').val('add_sign');
                    $('.form_save_add_sign').submit();
                });
            }
            //add indication to table
            if ($('.btn_other_ad_indication').length) {
                $('.btn_other_ad_indication').on('click', () => {
                    const ind = $('.txt_other_ad_indication').val();
                    const x_value = '<td>' + ind + '</td>';
                    const x_check = '<td class="is-end"><div><div class="field"><div class="control"><label class="checkbox is-outlined is-info"><input name="indications[]" type="checkbox" value="' + ind + '"><span></span> </label></div></div></div></td>';
                    const item = '<tr>' + x_value + x_check + '</tr>';
                    $('.table_ad_indications tbody').append(item);
                    $('.txt_other_ad_indication').val('');
                });
            }
            //add prescription to table
            if ($('.btn_ad_medical_prescription').length) {
                $('.btn_ad_medical_prescription').on('click', () => {
                    if ($('.inner_table_medical_prescription').hasClass('is-hidden')) {
                        $('.inner_table_medical_prescription').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="prescription_med[]" value="' + $('.modal_f1_med').val() + '">' + $('.modal_f1_med option:selected').html() + '</td>';
                    const x_f2 = '<td><input type="hidden" name="prescription_dose[]" value="' + $('.modal_f2_dose').val() + '">' + $('.modal_f2_dose').val() + '</td>';
                    const x_f3 = '<td><input type="hidden" name="prescription_fre[]" value="' + $('.modal_f3_fre').val() + '">' + $('.modal_f3_fre').val() + '</td>';
                    const x_f4 = '<td><input type="hidden" name="prescription_via[]" value="' + $('.modal_f4_via').val() + '">' + $('.modal_f4_via').val() + '</td>';
                    const x_f5 = '<td><input type="hidden" name="prescription_dur[]" value="' + $('.modal_f5_dur').val() + '">' + $('.modal_f5_dur').val() + '</td>';
                    const x_f6 = '<td><input type="hidden" name="prescription_ind[]" value="' + $('.modal_f6_ind').val() + '">' + $('.modal_f6_ind').val() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_prescription_trash_sel_fn"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_f2 + x_f3 + x_f4 + x_f5 + x_f6 + x_trash + '</tr>';
                    $('.table_medical_prescription tbody').append(item);
                    $('.modal_f1_med').val('');
                    $('.modal_f2_dose').val('');
                    $('.modal_f3_fre').val('');
                    $('.modal_f4_via').val('');
                    $('.modal_f5_dur').val('');
                    $('.modal_f6_ind').val('');
                    trash_hcdermprescription_all();
                });

                function trash_hcdermprescription_all() {
                    $('.btn_prescription_trash_sel_fn').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //add sol exams to table
            if ($('.btn_ad_sol_exams').length) {
                $('.btn_ad_sol_exams').on('click', () => {
                    if ($('.inner_table_sol_exams').hasClass('is-hidden')) {
                        $('.inner_table_sol_exams').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="solexams_exam[]" value="' + $('.modal2_f1_exam').val() + '">' + $('.modal2_f1_exam option:selected').html() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_solexams_trash_sel_fn"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_trash + '</tr>';
                    $('.table_sol_exams tbody').append(item);
                    $('.modal2_f1_exam').val('');
                    trash_hcdermsolexams_all();
                });

                function trash_hcdermsolexams_all() {
                    $('.btn_solexams_trash_sel_fn').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //add sol proc to table
            if ($('.btn_ad_sol_proc').length) {
                $('.btn_ad_sol_proc').on('click', () => {
                    if ($('.inner_table_sol_proc').hasClass('is-hidden')) {
                        $('.inner_table_sol_proc').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="solproc_proc[]" value="' + $('.modal3_f1_proc').val() + '">' + $('.modal3_f1_proc option:selected').html() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_solproc_trash_sel_fn"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_trash + '</tr>';
                    $('.table_sol_proc tbody').append(item);
                    $('.modal3_f1_proc').val('');
                    trash_hcdermsolproc_all();
                });

                function trash_hcdermsolproc_all() {
                    $('.btn_solproc_trash_sel_fn').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //add sol path to table
            if ($('.btn_ad_sol_path').length) {
                $('.btn_ad_sol_path').on('click', () => {
                    if ($('.inner_table_sol_path').hasClass('is-hidden')) {
                        $('.inner_table_sol_path').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="solpath_path[]" value="' + $('.modal4_f1_path').val() + '">' + $('.modal4_f1_path option:selected').html() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_solpath_trash_sel_fn"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_trash + '</tr>';
                    $('.table_sol_path tbody').append(item);
                    $('.modal4_f1_path').val('');
                    trash_hcdermsolpath_all();
                });

                function trash_hcdermsolpath_all() {
                    $('.btn_solpath_trash_sel_fn').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //add
            if ($('.btn_diagnoses_sel_fn').length) {
                $('.btn_diagnoses_sel_fn').each(function (i, v) {
                    var btn = $(this);
                    btn.on('click', () => {
                        if ($('.table_diagnoses_sel_fn').hasClass('is-hidden')) {
                            $('.table_diagnoses_sel_fn').removeClass('is-hidden');
                        }
                        const tag_id = btn.data('id');
                        let item_tr = $('#' + tag_id);
                        //Agregamos item a tabla
                        const x_code = '<td><input type="hidden" name="diagnostics[]" value="' + item_tr.find('.code_inner').data('id') + '">' + item_tr.find('.code_inner').html() + '</td>';
                        const x_name = '<td>' + item_tr.find('.name_inner').html() + '</td>';
                        const x_type = '<td><input type="hidden" name="diagnosticsty[]" value="' + item_tr.find('select').val() + '">' + item_tr.find('select option:selected').html() + '</td>';
                        const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_diagnoses_trash_sel_fn"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                        const item = '<tr>' + x_code + x_name + x_type + x_trash + '</tr>';
                        $('.table_diagnoses_sel_fn tbody').append(item);
                        trash_hcdermdg_all();
                    });
                });

                function trash_hcdermdg_all() {
                    $('.btn_diagnoses_trash_sel_fn').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //HCPROCEDURE
            if ($('.fl_sel_parent_valid').length) {
                $('.fl_sel_parent_valid').each(function (i, v) {
                    var item = $(this);
                    var parent = item.data('xparent');
                    var box = item.data('box');
                    var option = item.data('option');
                    $(parent).on('change', function (e) {
                        const op = $(parent).find('option:selected');
                        if (op.data('val') == option) {
                            $(box).removeClass('is-hidden');
                        } else {
                            $(box).addClass('is-hidden');
                        }
                    });
                });
            }
            if ($('.fl_sel_parent_disb').length) {
                $('.fl_sel_parent_disb').each(function (i, v) {
                    var item = $(this);
                    var parent = item.data('xparent');
                    var option = item.data('option');
                    const opt = $(parent).val();
                    const p = opt != option;
                    item.prop('disabled', p);
                    $(parent).on('change', function (e) {
                        const op = $(parent).val();
                        const pt = op != option;
                        item.prop('disabled', pt);
                    });
                });
            }
            if ($('.btn_add_suture_caliber').length) {
                $('.btn_add_suture_caliber').on('click', function (e) {
                    e.preventDefault();
                    if ($('.box_suture_caliber').hasClass('is-hidden')) {
                        $('.box_suture_caliber').removeClass('is-hidden');
                    }
                    var base = '<div class="column is-3">';
                    base += '<div class="field"><div class="control"><label>Tipo de sutura</label>';
                    base += '<select name="suture_type[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    base += '<option value="Miralene">Miralene</option>';
                    base += '<option value="Prolene">Prolene</option>';
                    base += '<option value="Catgut">Catgut</option>';
                    base += '<option value="Seda">Seda</option>';
                    base += '<option value="Vicryl">Vicryl</option>';
                    base += '<option value="Mono-Nylon">Mono-Nylon</option>';
                    base += '<option value="Otro">Otro</option>';
                    base += '</select></div></div></div>';
                    //
                    base += '<div class="column is-3"><div class="field has-addons"><div class="control is-expanded">';
                    base += '<label>Calibre</label>';
                    base += '<input name="caliber[]" type="text" class="input" placeholder="Calibre" />';
                    base += '</div></div></div>';

                    $('.box_suture_caliber .box_suture_caliber_inner').append(base);
                });
            }

            if ($('.btn_add_lesion_fsc').length) {
                $('.btn_add_lesion_fsc').on('click', function (e) {
                    e.preventDefault();
                    if ($('.box_lesion').hasClass('is-hidden')) {
                        $('.box_lesion').removeClass('is-hidden');
                    }
                    var base = '<div class="columns is-multiline">';
                    base += '<div class="column is-12"><hr></div>';

                    base += '<div class="column is-6">';
                    base += '<div class="field"><div class="control"><label>Área corporal</label>';
                    base += '<select name="body_area[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    base += '<option value="Frente">Frente</option>';
                    base += '<option value="Espalda">Espalda</option>';
                    base += '</select></div></div></div>';

                    base += '<div class="column is-6">';
                    base += '<div class="field"><div class="control"><label>Ubicación de la lesión</label>';
                    base += '<select name="lesion[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    var xoptions = ['Cuero cabelludo', 'Frente', 'Parpado superior', 'Oreja derecha', 'Oreja izquierda', 'Ojo derecho', 'Parpado inferior ojo derecho', 'Parpado superior ojo izquierdo', 'Parpado inferior ojo izquierdo', 'Ceja derecha', 'Ceja izquierda', 'Mejilla derecha', 'Mejilla izquierda', 'Nariz', 'Mentón', 'Labios', 'Lengua', 'Cuello', 'Hombro derecho', 'Hombro izquierdo', 'Brazo izquierdo', 'Brazo derecho', 'Codo derecho', 'Codo izquierdo', 'Antebrazo derecho', 'Antebrazo izquierdo', 'Dorso mano derecha', 'Dorso mano izquierda', 'Palma mano derecha', 'Palma mano izquierda', 'Dedos mano derecha', 'Dedos mano izquierda', 'Tórax posterior', 'Tórax anterior', 'Abdomen', 'Región lumbar', 'Glúteos', 'Pubis', 'Genitales', 'Ano', 'Muslo izquierdo', 'Muslo derecho', 'Rodilla izquierda', 'Rodilla derecha', 'Pierna izquierda', 'Pierna derecha', 'Dorso del pie derecho', 'Dorso pie izquierdo', 'Palma pie derecho', 'Palma pie izquierdo', 'Dedos pie derecho', 'Dedos pie izquierdo'];
                    xoptions.forEach(function (item) {
                        base += '<option value="' + item + '">' + item + '</option>';
                    });
                    base += '</select></div></div></div>';

                    base += '<div class="column is-3">';
                    base += '<div class="field"><div class="control"><label>Desinfección</label>';
                    base += '<select name="disinfection[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    xoptions = ['SSN', 'Alcohol', 'Yodopovidona', 'Clorexidina', 'Otro antiséptico'];
                    xoptions.forEach(function (item) {
                        base += '<option value="' + item + '">' + item + '</option>';
                    });
                    base += '</select></div></div></div>';
                    //
                    base += '<div class="column is-3"><div class="field"><div class="control">';
                    base += '<label>Cual antiséptico?</label>';
                    base += '<input name="antiseptic[]" type="text" class="input" placeholder="Cual antiséptico?" />';
                    base += '</div></div></div>';

                    base += '<div class="column is-1">';
                    base += '<div class="field"><div class="control"><label>Anestésia</label>';
                    base += '<select name="anesthesia[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    base += '<option value="Si">Si</option>';
                    base += '<option value="No">No</option>';
                    base += '</select></div></div></div>';

                    base += '<div class="column is-3">';
                    base += '<div class="field"><div class="control"><label>Tipo de anestésia</label>';
                    base += '<select name="type_anesthesia[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    xoptions = ['Lidocaina al 1% con epinefrina', 'Lidocaina al 1% sin epinefrina', 'Lidocaina al 2% con epinefrina', 'Lidocaina al 2% sin epinefrina', 'Tópica', 'Otro'];
                    xoptions.forEach(function (item) {
                        base += '<option value="' + item + '">' + item + '</option>';
                    });
                    base += '</select></div></div></div>';

                    base += '<div class="column is-2"><div class="field"><div class="control">';
                    base += '<label>Cual?</label>';
                    base += '<input name="other_anesthesia[]" type="text" class="input" placeholder="Cual?" />';
                    base += '</div></div></div>';

                    base += '<div class="column is-3"><div class="field"><div class="control">';
                    base += '<label>Tiempo 1 de congelación</label>';
                    base += '<input name="freeze_time_1[]" type="text" class="input" placeholder="Tiempo 1 de congelación" />';
                    base += '</div></div></div>';

                    base += '<div class="column is-3"><div class="field"><div class="control">';
                    base += '<label>Tiempo 2 de congelación</label>';
                    base += '<input name="freeze_time_2[]" type="text" class="input" placeholder="Tiempo 2 de congelación" />';
                    base += '</div></div></div>';

                    base += '<div class="column is-3"><div class="field"><div class="control">';
                    base += '<label>Tiempo 1 de descongelación</label>';
                    base += '<input name="defrost_time_1[]" type="text" class="input" placeholder="Tiempo 1 de descongelación" />';
                    base += '</div></div></div>';

                    base += '<div class="column is-3"><div class="field"><div class="control">';
                    base += '<label>Tiempo 2 de descongelación</label>';
                    base += '<input name="defrost_time_2[]" type="text" class="input" placeholder="Tiempo 2 de descongelación" />';
                    base += '</div></div></div>';

                    base += '<div class="column is-3">';
                    base += '<div class="field"><div class="control"><label>Tiempos</label>';
                    base += '<select name="timex[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    base += '<option value="1 Ciclo">1 Ciclo</option>';
                    base += '<option value="2 Ciclo">2 Ciclo</option>';
                    base += '</select></div></div></div>';

                    base += '<div class="column is-3">';
                    base += '<div class="field"><div class="control"><label>Técnica</label>';
                    base += '<select name="technique[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    xoptions = ['Spray', 'Probeta', 'Cono', 'Ninguna', 'Otra'];
                    xoptions.forEach(function (item) {
                        base += '<option value="' + item + '">' + item + '</option>';
                    });
                    base += '</select></div></div></div>';

                    base += '<div class="column is-6"><div class="field"><div class="control">';
                    base += '<label>Cual?</label>';
                    base += '<input name="other_technique[]" type="text" class="input" placeholder="Cual?" />';
                    base += '</div></div></div>';

                    base += '</div>';

                    $('.box_lesion').append(base);
                });
            }

            if ($('.btn_add_treatment_fsc').length) {
                $('.btn_add_treatment_fsc').on('click', function (e) {
                    e.preventDefault();
                    if ($('.box_treatment').hasClass('is-hidden')) {
                        $('.box_treatment').removeClass('is-hidden');
                    }
                    var base = '<div class="columns is-multiline">';
                    base += '<div class="column is-12"><hr></div>';

                    base += '<div class="column is-6">';
                    base += '<div class="field"><div class="control"><label>Músculo</label>';
                    base += '<select name="muscle[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    var xoptions = ['Corrugador', 'Frontal', 'Procerus', 'Orbicular de ojo derecho', 'Orbicular de ojo izquierdo', 'Orbicular subpalpebral derecho', 'Orbicular subpalpebral Izquierdo', 'Región nasal', 'Orbicular de los labios', 'Platisma', 'Región del mentón'];
                    xoptions.forEach(function (item) {
                        base += '<option value="' + item + '">' + item + '</option>';
                    });
                    base += '</select></div></div></div>';
                    //
                    base += '<div class="column is-6"><div class="field"><div class="control">';
                    base += '<label>Unidades administradas</label>';
                    base += '<input name="units[]" type="number" class="input" placeholder="Unidades administradas" />';
                    base += '</div></div></div>';

                    base += '</div>';

                    $('.box_treatment').append(base);
                });
            }

            if ($('.btn_add_surgical').length) {
                $('.btn_add_surgical').on('click', function (e) {
                    e.preventDefault();
                    if ($('.box_surgical').hasClass('is-hidden')) {
                        $('.box_surgical').removeClass('is-hidden');
                    }
                    var base = '<div class="columns is-multiline">';

                    base += '<div class="column is-2">';
                    base += '<div class="field"><div class="control"><label>Tumores</label>';
                    base += '<select name="tumors[]" class="input">';
                    base += '<option value="" selected disabled >--Seleccione--</option>';
                    base += '<option value="Si">Si</option>';
                    base += '<option value="No">No</option>';
                    base += '</select></div></div></div>';
                    //
                    base += '<div class="column is-2"><div class="field"><div class="control">';
                    base += '<label>Tamaño</label>';
                    base += '<input name="size[]" type="text" class="input" placeholder="Tamaño" />';
                    base += '</div></div></div>';
                    //
                    base += '<div class="column is-2"><div class="field"><div class="control">';
                    base += '<label>Margen</label>';
                    base += '<input name="margin[]" type="text" class="input" placeholder="Margen" />';
                    base += '</div></div></div>';
                    //
                    base += '<div class="column is-2"><div class="field"><div class="control">';
                    base += '<label>Patología</label>';
                    base += '<input name="pathology[]" type="text" class="input" placeholder="Patología" />';
                    base += '</div></div></div>';
                    //
                    base += '<div class="column is-4"><div class="field"><div class="control">';
                    base += '<label>Observaciones</label>';
                    base += '<input name="observations[]" type="text" class="input" placeholder="Observaciones" />';
                    base += '</div></div></div>';

                    base += '</div>';

                    $('.box_surgical').append(base);
                });
            }

            if ($('.sel_consent_x').length) {
                $('.sel_consent_x').on('change', function () {
                    const consent = $('.sel_consent_x option:selected').data('val');
                    $('.txt_note_consent').val(consent);
                });
            }

            if ($('input[name="patient_authorization"]').length) {
                $('input[name="patient_authorization"]').on('change', function () {
                    const ax = $('input[name="patient_authorization"]:checked').val();
                    if (ax == 'Autoriza') {
                        $('.authorization_x_auto').removeClass('is-hidden');
                        $('.authorization_x_no_auto').addClass('is-hidden');
                    } else {
                        $('.authorization_x_auto').addClass('is-hidden');
                        $('.authorization_x_no_auto').removeClass('is-hidden');
                    }
                });
            }


            //add mp prescription to table
            if ($('.btn_add_pm').length) {
                $('.btn_add_pm').on('click', () => {
                    if ($('.inner_table_mp').hasClass('is-hidden')) {
                        $('.inner_table_mp').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="prescription_med[]" value="' + $('.mp_f1_med').val() + '">' + $('.mp_f1_med option:selected').html() + '</td>';
                    const x_f2 = '<td><input type="hidden" name="prescription_dose[]" value="' + $('.mp_f2_dose').val() + '">' + $('.mp_f2_dose').val() + '</td>';
                    const x_f3 = '<td><input type="hidden" name="prescription_fre[]" value="' + $('.mp_f3_fre').val() + '">' + $('.mp_f3_fre').val() + '</td>';
                    const x_f4 = '<td><input type="hidden" name="prescription_via[]" value="' + $('.mp_f4_via').val() + '">' + $('.mp_f4_via').val() + '</td>';
                    const x_f5 = '<td><input type="hidden" name="prescription_dur[]" value="' + $('.mp_f5_dur').val() + '">' + $('.mp_f5_dur').val() + '</td>';
                    const x_f6 = '<td><input type="hidden" name="prescription_ind[]" value="' + $('.mp_f6_ind').val() + '">' + $('.mp_f6_ind').val() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_mp_trash_sel_fn"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_f2 + x_f3 + x_f4 + x_f5 + x_f6 + x_trash + '</tr>';
                    $('.table_medicalp tbody').append(item);
                    $('.mp_f1_med').val('');
                    $('.mp_f2_dose').val('');
                    $('.mp_f3_fre').val('');
                    $('.mp_f4_via').val('');
                    $('.mp_f5_dur').val('');
                    $('.mp_f6_ind').val('');
                    trash_mp_all();
                });

                function trash_mp_all() {
                    $('.btn_mp_trash_sel_fn').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }

            if ($('.btn_diagnoses_eo').length) {
                $('.btn_diagnoses_eo').each(function (i, v) {
                    var btn = $(this);
                    btn.on('click', function () {
                        const tag_id = btn.data('id');
                        const diagnosticsty = document.querySelector("#o_diagnosesty");
                        const diagnosticsty_selectd = diagnosticsty.options[diagnosticsty.selectedIndex];
                        if (diagnosticsty_selectd.value == null || diagnosticsty_selectd.value == '') {
                            alert('Debe elejir el tipo');
                        } else {
                            if ($('.table_diagnoses_eo_fn').hasClass('is-hidden')) {
                                $('.table_diagnoses_eo_fn').removeClass('is-hidden');
                            }
                            if(document.querySelector('.table_diagnoses_eo_fn tr td input[value="'+ diagnosticsty_selectd.value  +'"]')){
                                alert('Este registro ay se encuentra seleccionado');
                            }
                            else{
                                //Agregamos item a tabla
                                const diag = document.querySelector("#diagnoses");
                                const opt_selectd = diag.options[diag.selectedIndex];
                                const code = opt_selectd.value;
                                const name = opt_selectd.dataset.name;
                                const x_code = '<td><input type="hidden" name="diagnostics[]" value="' + code + '"/>' + code + '</td>';
                                const x_name = '<td>' + name + '</td>';
                                const x_type = '<td><input type="hidden" name="diagnosticsty[]" value="' + diagnosticsty_selectd.value + '"/>' + diagnosticsty_selectd.innerHTML + '</td>';
                                const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_deo_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                                const item = '<tr>' + x_code + x_name + x_type + x_trash + '</tr>';
                                $('.table_diagnoses_eo_fn tbody').append(item);
                                trash_deo_all();
                            }
                        }
                    });
                });

                function trash_deo_all() {
                    $('.btn_deo_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            if ($('.btn_add_eoexam').length) {
                $('.btn_add_eoexam').on('click', function () {
                    if ($('.inner_table_eo_exams').hasClass('is-hidden')) {
                        $('.inner_table_eo_exams').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="solexams_exam[]" value="' + $('.inpeo_exam').val() + '">' + $('.inpeo_exam option:selected').html() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_eoexams_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_trash + '</tr>';
                    $('.table_eo_exams tbody').append(item);
                    $('.inpeo_exam').val('');
                    trash_eoexams_all();
                });

                function trash_eoexams_all() {
                    $('.btn_eoexams_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', () => {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //add prods
            if ($('.btn_add_prods').length) {
                $('.btn_add_prods').on('click', function () {
                    if ($('.inner_table_prods').hasClass('is-hidden')) {
                        $('.inner_table_prods').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="procedure[]" value="' + $('.prods_f1').val() + '">' + $('.prods_f1 option:selected').html() + '</td>';
                    const x_f2 = '<td><input type="hidden" name="note[]" value="' + $('.prods_f2').val() + '">' + $('.prods_f2').val() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_prods_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_f2 + x_trash + '</tr>';
                    $('.table_prods tbody').append(item);
                    $('.prods_f1').val('');
                    $('.prods_f2').val('');
                    trash_prods_all();
                });

                function trash_prods_all() {
                    $('.btn_prods_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', function () {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //add pths
            if ($('.btn_add_pths').length) {
                $('.btn_add_pths').on('click', function () {
                    var code = $('.pths_f1 option:selected').data('code');
                    var note = $('.pths_f1 option:selected').data('note');
                    if (code == null || code == '') {
                        alert('Debe elejir una patología');
                        return false;
                    }
                    if ($('.inner_table_pths').hasClass('is-hidden')) {
                        $('.inner_table_pths').removeClass('is-hidden');
                    }
                    const x_f1 = '<td><input type="hidden" name="code[]" value="' + code + '">' + code + '</td>';
                    const x_f2 = '<td><input type="hidden" name="pathologie[]" value="' + note + '">' + note + '</td>';
                    const x_f3 = '<td><input type="hidden" name="note[]" value="' + $('.pths_f2').val() + '">' + $('.pths_f2').val() + '</td>';
                    const x_trash = '<td class="is-end"><div><button type="button" class="button is-danger is-circle is-elevated btn_prods_trash"><span class="icon is-small"><i class="fas fa-trash"></i></span></button></div></td>';
                    const item = '<tr>' + x_f1 + x_f2 + x_f3 + x_trash + '</tr>';
                    $('.table_pths tbody').append(item);
                    $('.pths_f1').val('');
                    $('.pths_f2').val('');
                    trash_pths_all();
                });

                function trash_pths_all() {
                    $('.btn_pths_trash').each(function (i, v) {
                        var btn = $(this);
                        btn.on('click', function () {
                            btn.parent().parent().parent().remove();
                        });
                    });
                }
            }
            //END

            if ($('.sel_parent_hid').length) {
                $('.sel_parent_hid').each(function (i, v) {
                    var item = $(this);
                    var parent = item.data('xparent');
                    var box = item.data('box');
                    var option = item.data('option');
                    if ($(parent).val() == option) {
                        $(box).removeClass('is-hidden');
                    } else {
                        $(box).addClass('is-hidden');
                    }
                    $(parent).on('change', function (e) {
                        if ($(parent).val() == option) {
                            $(box).removeClass('is-hidden');
                        } else {
                            $(box).addClass('is-hidden');
                        }
                    });
                });
            }

            if ($('.sel_parent_vis').length) {
                $('.sel_parent_vis').each(function (i, v) {
                    var item = $(this);
                    var parent = item.data('xparent');
                    var box = item.data('box');
                    var option = item.data('option');
                    if ($(parent).val() != option) {
                        $(box).removeClass('is-hidden');
                    } else {
                        $(box).addClass('is-hidden');
                    }
                    $(parent).on('change', function (e) {
                        if ($(parent).val() != option) {
                            $(box).removeClass('is-hidden');
                        } else {
                            $(box).addClass('is-hidden');
                        }
                    });
                });
            }

            if ($('.sel_hid_directed_to').length) {
                $('.sel_hid_directed_to').on('change', function () {
                    load_directed_to();
                });

                function load_directed_to() {
                    /*$('.sel_parent_views option').prop('hidden', false);
                    if($('.sel_hid_directed_to').val() == 'Roles'){
                        $('.sel_parent_views option[data-tag="Users"]').prop('hidden', true);
                    } else if($('.sel_hid_directed_to').val() == 'Users'){
                        $('.sel_parent_views option[data-tag="Roles"]').prop('hidden', true);
                    }*/
                    const value_old = $('.sel_hid_directed_to').data('old') != 'Todos' ? $('.sel_hid_directed_to').data('oldv') : '';
                    $.post($('.sel_parent_views').data('url'), {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        val: value_old,
                        valtype: $('.sel_hid_directed_to').data('old'),
                        type: $('.sel_hid_directed_to').val()
                    }, function (data) {
                        $('.sel_parent_views').html(data);
                        $('.sel_parent_views').select2({
                            theme: "classic",
                            placeholder: $('.sel_hid_directed_to').val(),
                        });
                    }, "html");

                }

                load_directed_to();
            }

            if ($('.btn_next_tab_fsc').length) {
                $('.btn_next_tab_fsc').each(function (i, v) {
                    var btn = $(this);
                    btn.on('click', function () {
                        const tab = btn.data('idtab');
                        $('li[data-tab="' + tab + '"] a').click();
                        window.scrollTo(0, 0);
                    });
                });
            }
            if ($('div.message > a.delete').length) {
                $('div.message > a.delete').each(function (i, v) {
                    var a_delete = $(this);
                    a_delete.on('click', () => {
                        a_delete.parent().remove();
                    });
                });
            }
            if ($('.countrieskeys_fn').length) {
                function load_countrieskeys_fn() {
                    $('.countrieskeys_fn').each(function (i, v) {
                        var select_item = $(this);
                        var selected = select_item.data('select_id');
                        selected = selected != '' ? selected : '';
                        $.post(select_item.data('url'), {
                            _token: $("meta[name='csrf-token']").attr("content"),
                            select_id: selected
                        }, function (data) {
                            select_item.html(data);
                            select_item.select2({
                                theme: "classic",
                                placeholder: 'Código del país',
                            });
                        }, "html");
                    });
                }

                load_countrieskeys_fn();
            }
            if ($('.countries_fn').length) {
                function load_countries_fn() {
                    $('.countries_fn').each(function (i, v) {
                        var select_item = $(this);
                        var selected = select_item.data('select_id');
                        selected = selected != '' ? selected : '';
                        $.post(select_item.data('url'), {
                            _token: $("meta[name='csrf-token']").attr("content"),
                            select_id: selected
                        }, function (data) {
                            select_item.html(data);
                            select_item.select2({
                                theme: "classic",
                                placeholder: 'País',
                            });
                        }, "html");
                    });
                }

                load_countries_fn();
            }

            if ($(".select2_fsc").length) {
                $('.select2_fsc').each(function () {
                    $(this).select2({
                        theme: "classic",
                    });
                });
            }

            if ($("#pickaday-datepicker-fsc1").length) {
                var picker = new Pikaday({
                    field: document.getElementById('pickaday-datepicker-fsc1'),
                    format: 'YYYY-MM-DD',
                    onSelect: function () {
                    }
                });
            }

            if ($("#pickaday-datepicker-fsc2").length) {
                var picker = new Pikaday({
                    field: document.getElementById('pickaday-datepicker-fsc2'),
                    format: 'YYYY-MM-DD',
                    onSelect: function () {
                    }
                });
            }

            if ($("#bulma-datepicker-time-fsc1").length) {
                bulmaCalendar.attach('#bulma-datepicker-time-fsc1', {
                    lang: 'es'
                });
            }

            if ($("#bulma-datepicker-time-fsc2").length) {
                bulmaCalendar.attach('#bulma-datepicker-time-fsc2', {
                    lang: 'es'
                });
            }

            if ($(".datepicker-fsc").length) {
                $('.datepicker-fsc').each(function () {
                    $(this).daterangepicker({
                        "singleDatePicker": true,
                        "autoApply": true,
                        "locale": {
                            "format": "YYYY-MM-DD",
                            "separator": " - ",
                            "applyLabel": "Aplicar",
                            "cancelLabel": "Cancelar",
                            "fromLabel": "From",
                            "toLabel": "To",
                            "customRangeLabel": "Custom",
                            "weekLabel": "W",
                            "daysOfWeek": [
                                "Su",
                                "Mo",
                                "Tu",
                                "We",
                                "Th",
                                "Fr",
                                "Sa"
                            ],
                            "monthNames": [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December"
                            ],
                            "firstDay": 1
                        },
                        "drops": "auto"
                    }, function (start, end, label) {
                    });
                });
            }
            if ($(".checkbox_actives_fn").length) {
                $(".checkbox_actives_fn").on('change', () => {
                    const p = $(".checkbox_actives_fn").is(':checked');
                    $('input.checkbox_actives').prop('checked', p);
                });
            }
            if ($(".checkbox_required_fn").length) {
                $(".checkbox_required_fn").on('change', () => {
                    const p = $(".checkbox_required_fn").is(':checked');
                    $('input.checkbox_required').prop('checked', p);
                });
            }
        });
    </script>

    <script>
        if ($('.btn_plan_price_free').length) {
            $('.btn_plan_price_free').each(function (i, v) {
                var btn_item = $(this);
                btn_item.on('click', function (e) {
                    e.preventDefault();
                    swal({
                        title: 'Estás seguro(a) que deseas suscribirte al plan seleccionado?',
                        text: "Esta acción es irreversible!",
                        icon: "warning",
                        buttons: ["Cancelar", "Si, suscribirme!"],
                        dangerMode: true,
                        cancelButtonColor: '#d33'
                    }).then(function (willConfirm) {
                        if (willConfirm) {
                            $('#preloader').removeClass('preloader-hide');
                            $.post(btn_item.data('url'), {
                                _token: $("meta[name='csrf-token']").attr("content")
                            }, function (data) {
                                $('#preloader').addClass('preloader-hide');
                                if (data != 'ok') {
                                    swal('Error!', data, 'error');
                                } else {
                                    swal('Enhorabuena!', 'La suscripción ha sido completada correctamente', 'success');
                                }
                            }, "html");
                        }
                    });
                });
            });
        }

        if ($('#calendar_doctor').length) {
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar_doctor');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    selectable: true,
                    <?= isset($str_days) ? $str_days : '' ?><?= isset($locks_days) ? $locks_days : '' ?>
                    validRange: {
                        start: '<?= date("Y-m-d") ?>'
                    },
                    eventClick: function (info) {
                        var eventObj = info.event;
                        if (eventObj.url) {
                            $.post(eventObj.url, {
                                _token: $("meta[name='csrf-token']").attr("content")
                            }, function (data) {
                                $('.box_info_cite').html(data);
                                $('.btn_cita_show').trigger('click');
                            }, "html");
                            //window.open(eventObj.url);
                            info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                        }
                    },
                });
                calendar.render();
            });
        }

        if ($('#calendar_pct').length) {
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar_pct');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    selectable: true,
                    <?= isset($locks_days) ? $locks_days : '' ?>
                    eventClick: function (info) {
                        var eventObj = info.event;
                        if (eventObj.url) {
                            $.post(eventObj.url, {
                                _token: $("meta[name='csrf-token']").attr("content")
                            }, function (data) {
                                $('.box_info_cite').html(data);
                                $('.btn_cita_show').trigger('click');
                            }, "html");
                            //window.open(eventObj.url);
                            info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                        }
                    },
                });
                calendar.render();
            });
        }

        if ($('#sun-editorx').length) {
            const editor = SUNEDITOR.create((document.getElementById('sun-editorx') || 'sun-editorx'), {
                width: '100%',
                height: 450,
                placeholder: 'Escribe aquí...'
            });
            editor.onChange = function (contents, core) {
                $('textarea#sun-editorx').val(contents);
            }
            if ($('#tpl_html_fsc').length) {
                $('#tpl_html_fsc').on('change', function () {
                    if ($('#tpl_html_fsc').val() != '') {
                        $.post($('#tpl_html_fsc').data('url') + "/tpl/" + $('#tpl_html_fsc').val(), {
                            _token: $("meta[name='csrf-token']").attr("content")
                        }, function (data) {
                            editor.setContents(data);
                            $('textarea#sun-editorx').val(data);
                        }, "html");
                    } else {
                        editor.setContents('');
                        $('textarea#sun-editorx').val('');
                    }
                });
            }
        }
        //
        if ($('#roles_uss_fsc').length) {
            $('#roles_uss_fsc').on('change', function () {
                $.post($('#roles_uss_fsc').data('url') + "/uss/" + $('#roles_uss_fsc').val(), {
                    _token: $("meta[name='csrf-token']").attr("content")
                }, function (data) {
                    $('#sel_list_users_fsc').html(data);
                }, "html");
            });
        }
        //
        if ($('#sel_is_programmed').length) {
            $('#sel_is_programmed').on('change', function () {
                const dis = $('#sel_is_programmed').val() == 'no';
                $('#pickaday-datepicker-fsc1').prop('disabled', dis);
                $('#inp_name_event').prop('disabled', dis);
            });
        }
        //
        if ($('#sel_is_diagnostic').length) {
            $('#sel_is_diagnostic').on('change', function () {
                const dis = $('#sel_is_diagnostic').val() == 'no';
                $('#sel_diagnostic').prop('disabled', dis);
            });
        }
        //
        if ($('#is_attach').length) {
            //inner-attach
            $('#is_attach').on('change', function () {
                if ($('#is_attach').is(':checked')) {
                    $('.inner-attach').removeClass('is-hidden');
                } else {
                    $('.inner-attach').addClass('is-hidden');
                }
            });
        }


        if ($('.btn_plan_price_epayco').length) {
            $('.btn_plan_price_epayco').on('click', function (e) {
                e.preventDefault();
                var btn_item = $(this);
                btn_item.parent().parent().find('.epayco-button-render').click();
            });
        }

        if ($('.money_to_fsc').length) {
            $('.money_to_fsc').each(function () {
                var item = $(this);
                item.html(moneycop(item.html()));
            });
        }

        function moneycop(v) {
            const options2 = {style: 'currency', currency: 'COP'};
            const numberFormat2 = new Intl.NumberFormat('es-CO', options2);
            return numberFormat2.format(v);
        }

        $('#photo_profile_img').on('click', function () {
            $('#photo_profile_acc').click();
        });
        $('#photo_profile_btn').on('click', function () {
            $('#photo_profile_acc').click();
        });
        $('#photo_profile_acc').on('change', function (event) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $("#photo_profile_img").fadeIn("fast").attr('src', tmppath);
        });
    </script>
    @show
</div>
</body>
</html>
