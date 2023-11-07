<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="{{ asset('frontend/img/icons/saralmind_favicon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <!--  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('backend/admin-lte/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/admin-lte/css/custom.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <!-- Temp CSS -->
    <style type="text/css">
    #progressBar {
        width: 0px;
        height: 5px;
        background-color: #F44336;
        display: none;
    }

    #progressBar.active {
        display: block;
        transition: 3s linear width;
        -webkit-transition: 3s linear width;
        -moz-transition: 3s linear width;
        -o-transition: 3s linear width;
        -ms-transition: 3s linear width;
    }
    </style>
    @yield('extra-css')
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
    showProcessingMessages: false,
    tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
  });
</script>

    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML">
    </script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <!--     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <a href="{{url('/')}}" class="site-url" target="_blank">Visit Saralmind.</a> -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle user-visible-icon" data-toggle="dropdown">
                        <img src="{{ asset('backend/admin-lte/img/user-icon.svg') }}"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('backend/admin-lte/img/user-icon.svg') }}" class="img-circle elevation-2"
                                alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>Admin</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('admin-user.edit',auth()->id()) }}"
                                class="btn btn-default btn-flat">Profile</a>

                            <a class="btn btn-default btn-flat float-right" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="{{ asset('backend/admin-lte/img/avatar.png') }}" alt="Saralmind Logo" class="brand-image"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('admin.dashboard')}}"
                                class="nav-link {{Request::is('admin/dashboard*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/dashboard.svg')}}" class="nav-icon" alt="">
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li
                            class="nav-item has-treeview {{ Request::is('admin/study-period*') || Request::is('admin/program*') || Request::is('admin/grade*') || Request::is('admin/subject*') || Request::is('admin/unit*') || Request::is('admin/lesson*')? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/study-period*') || Request::is('admin/program*') || Request::is('admin/grade*') || Request::is('admin/subject*') || Request::is('admin/unit*')|| Request::is('admin/lesson*')  ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/syllabus.svg')}}" class="nav-icon" alt="">
                                <p>
                                    Syllabus
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view-course-timeline')
                                <li class="nav-item">
                                    <a href="{{ route('course-timeline.index') }}"
                                        class="nav-link {{Request::is('admin/course-timeline*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Course Timeline
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-program')
                                <li class="nav-item">
                                    <a href="{{ route('program.index') }}"
                                        class="nav-link {{Request::is('admin/program*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Programs
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-faculty')
                                <li class="nav-item">
                                    <a href="{{ route('faculty.index') }}"
                                        class="nav-link {{Request::is('admin/faculty*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Faculties
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-grade')
                                <li class="nav-item">
                                    <a href="{{ route('grade.index') }}"
                                        class="nav-link {{Request::is('admin/grade*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Grades
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-subject')
                                <li class="nav-item">
                                    <a href="{{ route('subject.index') }}"
                                        class="nav-link {{Request::is('admin/subject*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Subjects
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-unit')
                                <li class="nav-item">
                                    <a href="{{ route('unit.index') }}"
                                        class="nav-link {{Request::is('admin/unit*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Units
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-lesson')
                                <li class="nav-item">
                                    <a href="{{ route('lesson.index') }}"
                                        class="nav-link {{Request::is('admin/lesson*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Lessons
                                        </p>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </li>
                        @can('view-note')
                        <li
                            class="nav-item has-treeview {{ Request::is('admin/note*') || Request::is('admin/video*') || Request::is('admin/exercise*') || Request::is('admin/mcq*') || Request::is('admin/comment*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/note*') || Request::is('admin/video*') || Request::is('admin/exercise*') || Request::is('admin/mcq*') || Request::is('admin/comment*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/notes.svg')}}" class="nav-icon" alt="">
                                <p>
                                    Content Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('note.index') }}"
                                        class="nav-link {{Request::is('admin/note*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Notes
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('video.index') }}"
                                        class="nav-link {{Request::is('admin/video*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Videos
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('exercise.index') }}"
                                        class="nav-link {{Request::is('admin/exercise*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Exercises
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mcq.index') }}"
                                        class="nav-link {{Request::is('admin/mcq*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            MCQs
                                        </p>
                                    </a>
                                </li>

                                @can('view-updated-notes')
                                <li class="nav-item">
                                  <a href="{{ route('note.viewUpdated') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                      Note Updates
                                    </p>
                                  </a>
                                </li>
                                @endcan

                                @can('view-updated-subjective-questions')
                                <li class="nav-item">
                                  <a href="{{ route('exercise.viewUpdated') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                      Exercise Updates
                                    </p>
                                  </a>
                                </li>
                                @endcan

                                <!-- <li class="nav-item">
                <a href="{{ route('comment.index') }}" class="nav-link {{Request::is('admin/comment*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Comments
                  </p>
                </a>
              </li> -->

                            </ul>
                        </li>
                        @endcan

                        @can('view-nnc')
                        <li class="nav-item has-treeview">
                          <a href="#" class="nav-link {{ Request::is('admin/note*') || Request::is('admin/video*') || Request::is('admin/exercise*') || Request::is('admin/mcq*') || Request::is('admin/comment*') ? 'active' : '' }}" >
                            <img src="{{asset('backend/images/icons/notes.svg')}}" class="nav-icon" alt="">
                            <p>
                              Nursing Council Entrance Exam
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('nnc.index') }}" class="nav-link {{Request::is('admin/nncquestion*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                  Manage Objective Questions
                                </p>
                              </a>
                            </li>
                          </ul>

                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('nnc.result') }}" class="nav-link {{Request::is('admin/nncquestion*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                  NNC Results
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                        @endcan


                        <li
                            class="nav-item has-treeview {{ Request::is('admin/module*') || Request::is('admin/role*') || Request::is('admin/permission*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/module*') || Request::is('admin/role*') || Request::is('admin/permission*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/lock.png')}}" class="nav-icon" alt="">
                                <p>
                                    Access Control
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view-module')
                                <li class="nav-item">
                                    <a href="{{ route('module.index') }}"
                                        class="nav-link {{Request::is('admin/module*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Modules
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-permission')
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}"
                                        class="nav-link {{Request::is('admin/permission*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Permissions
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-role')
                                <li class="nav-item">
                                    <a href="{{route('role.index')}}"
                                        class="nav-link {{Request::is('admin/role*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Roles
                                        </p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>


                        <li
                            class="nav-item has-treeview {{ Request::is('admin/admin-user*') || Request::is('admin/front-user*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/admin-user*') || Request::is('admin/front-user*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/networking.svg')}}" class="nav-icon" alt="">
                                <p>
                                    User Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view-admin-user')
                                <li class="nav-item">
                                    <a href="{{ route('admin-user.index') }}"
                                        class="nav-link {{Request::is('admin/admin-user*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Admins
                                        </p>
                                    </a>
                                </li>
                                @endcan

                                @can('view-front-user')
                                <li class="nav-item">
                                    <a href="{{route('front-user.index')}}"
                                        class="nav-link {{Request::is('admin/front-user*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Front Users
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        @can('view-glossary')
                        <li class="nav-item has-treeview {{ Request::is('admin/glossary*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/glossary*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/dictionary.svg')}}" class="nav-icon" alt="">
                                <p>
                                    Glossary Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('glossary.index') }}"
                                        class="nav-link {{Request::is('admin/glossary*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Glossaries
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        <li class="nav-item has-treeview {{ Request::is('admin/blog*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/blog*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/blog.png')}}" class="nav-icon" alt="">
                                <p>
                                    Blog Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('blog-category.index') }}"
                                        class="nav-link {{Request::is('admin/blog-category*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Category
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blog.index') }}"
                                        class="nav-link {{request()->route()->named('blog.index') || request()->route()->named('blog.create') || request()->route()->named('blog.edit') || request()->route()->named('blog.trash') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Blogs
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item has-treeview {{ Request::is('admin/award*') || Request::is('admin/product*') || Request::is('admin/testimonial*') || Request::is('admin/media-feed*') || Request::is('admin/search-term*') || Request::is('admin/partner*') || Request::is('admin/subscriber*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request::is('admin/award*') || Request::is('admin/product*') || Request::is('admin/testimonial*') || Request::is('admin/media-feed*') || Request::is('admin/partner*') || Request::is('admin/search-term*')  || Request::is('admin/subscriber*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/dashboard.png')}}" class="nav-icon" alt="">
                                <p>
                                    Catalog
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('product.index') }}"
                                        class="nav-link {{Request::is('admin/product*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Products
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('media-feed.index') }}"
                                        class="nav-link {{Request::is('admin/media-feed*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Media Feeds
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('testimonial.index') }}"
                                        class="nav-link {{Request::is('admin/testimonial*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Testimonials
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('partner.index') }}"
                                        class="nav-link {{Request::is('admin/partner*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Partners
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('award.index') }}"
                                        class="nav-link {{Request::is('admin/award*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Awards
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('search-term.index') }}"
                                        class="nav-link {{Request::is('admin/search-term*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Search Terms
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subscriber.index') }}"
                                        class="nav-link {{Request::is('admin/subscriber*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Subscribers
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('inquiry.index')}}"
                                class="nav-link {{Request::is('admin/inquiry*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/customer-support.png')}}" class="nav-icon"
                                    alt="">
                                <p>
                                    Inquiries
                                </p>
                            </a>
                        </li>

                        @can('view-bug')
                        <li class="nav-item">
                            <a href="{{route('bug.index')}}"
                                class="nav-link {{Request::is('admin/bug*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/bug.png')}}" class="nav-icon" alt="">
                                <p>
                                    Bugs
                                </p>
                            </a>
                        </li>
                        @endcan


                        <li class="nav-item">
                            <a href="{{ route('advertisement.index') }}"
                                class="nav-link {{Request::is('admin/advertisement*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/bug.png')}}" class="nav-icon" alt="">
                                <p>
                                    Advertisements
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('client.index') }}"
                                class="nav-link {{Request::is('admin/client*') ? 'active' : '' }}">
                                <img src="{{asset('backend/images/icons/bug.png')}}" class="nav-icon" alt="">
                                <p>
                                    Clients
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->


        @yield('content')


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="#">{{ config('app.name', 'Laravel') }}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE -->
    <!-- include summernote css/js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script> -->
    <script>
    var base_url = "{{ url('/') }}";
    </script>
    <script src="{{ asset('backend/js/main.js') }}"></script>

    @yield('extra-js')
    <script src="{{ asset('backend/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/admin-lte/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>


    <script>
    var youtubeApiKey = "{{ config('services.youtube_api.key') }}"
    $(document).ready(function() {
        // $('.summer_note').summernote();

        $('.select2').select2();

    });

    tinymce.init({
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        selector: "textarea.advanceEditor2",
        theme: "modern",
        width: 640,
        height: 300,
        plugins: [
            "advlist autolink link image lists charmap print preview hr pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | image",
        toolbar2: "| link unlink | image media | forecolor backcolor  | print preview code ",
        image_advtab: true,

        automatic_uploads: false,

        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', "{{ route('upload') }}");

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.file_path != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.file_path);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
            xhr.send(formData);
        },
    });

    tinymce.init({
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        selector: "textarea.simpleEditor2",
        theme: "modern",
        width: 640,
        height: 100,
        plugins: [
            "advlist autolink link lists charmap print preview hr pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect ",
        toolbar2: "| link unlink | forecolor backcolor  | print preview code ",
        image_advtab: true,

        automatic_uploads: false,


    });

    if (document.querySelectorAll("#advanceEditor").length) {
        var preview = CKEDITOR.document.getById('preview');

        function syncPreview() {
            setTimeout(function() {
                MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
            }, 100);
            preview.setHtml(editor.getData());
        }

        var editor =
            CKEDITOR.replace('advanceEditor', {
                width: '100%',
                height: 400,
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
                // extraPlugins: 'mathjax,preview',
                extraPlugins: 'embed,youtube',
                on: {
                    // Synchronize the preview on user action that changes the content.
                    change: syncPreview,

                    // Synchronize the preview when the new data is set.
                    contentDom: syncPreview
                }
            });
    }


    CKEDITOR.replaceClass = 'simpleEditor';

    //Icons
    feather.replace()
    </script>

    <script type="text/javascript">
    if (window.MathJax) {
        setTimeout(function() {
            MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
        }, 100);
    }
    </script>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>