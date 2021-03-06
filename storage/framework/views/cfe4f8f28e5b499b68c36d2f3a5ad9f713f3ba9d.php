<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'KSR-DASHBOARD')); ?></title>

    <!-- Favicon -->
    <link href="<?php echo e(asset('img/favicon/favicon.ico')); ?>" rel="icon">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="57x57" href="<?php echo e(asset('img/favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="60x60" href="<?php echo e(asset('img/favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="72x72" href="<?php echo e(asset('img/favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="76x76" href="<?php echo e(asset('img/favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="114x114" href="<?php echo e(asset('img/favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="120x120" href="<?php echo e(asset('img/favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="144x144" href="<?php echo e(asset('img/favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="152x152" href="<?php echo e(asset('img/favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" class="rounded-circle" sizes="180x180" href="<?php echo e(asset('img/favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" class="rounded-circle" sizes="192x192"  href="<?php echo e(asset('img/favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" class="rounded-circle" sizes="32x32" href="<?php echo e(asset('img/favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" class="rounded-circle" sizes="96x96" href="<?php echo e(asset('img/favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" class="rounded-circle" sizes="16x16" href="<?php echo e(asset('img/favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('img/favicon/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
     
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
     <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />
 
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Crop image css -->
    <link href="<?php echo e(asset('ijaboCropTool/ijaboCropTool.min.css')); ?>" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <!-- ckeditor JavaScript -->

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/05fa2a7c5c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?php echo e(asset('fontawsome/js/all.js')); ?>"></script>
    <script src="<?php echo e(asset('fontawsome/js/fontawesome.js')); ?>"></script>
    <link href="<?php echo e(asset('fontawsome/css/all.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('fontawsome/css/regular.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('fontawsome/css/brands.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('fontawsome/css/solid.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('fontawsome/css/fontawesome.css')); ?>" rel="stylesheet" />

    <script src="<?php echo e(asset('ckeditor/build/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('ckeditor/build/translations/si.js')); ?>"></script>
    <script src="<?php echo e(asset('ckeditor/build/translations/ar.js')); ?>"></script>
    <!-- Styles -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <div id="app" class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-2 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="navbar-brand mx-4 mb-3">
                    <h5 class="text-primary"><?php echo e(config('app.name', 'KSR-DASHBOARD')); ?></h5>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <?php if(Auth::user()->profileimage == null): ?>
                            <?php if(Auth::user()->gender == 'm'): ?>
                                <img class="rounded-circle" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 40px; height: 40px;">
                            <?php elseif(Auth::user()->gender == 'f'): ?>
                                <img class="rounded-circle" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 40px; height: 40px;">
                            <?php endif; ?>                            
                        <?php else: ?>
                            <img class="rounded-circle image-previewer" src="<?php echo e(asset('img/user-images/'.Auth::user()->profileimage )); ?>" alt="" style="width: 40px; height: 40px;">
                        <?php endif; ?>

                        <?php if(Cache::has('user-is-online-' .Auth::user()->email)): ?>
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        <?php else: ?>
                            <div class="bg-danger rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        <?php endif; ?>

                        
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo e(Auth::user()->fname); ?></h6>
                        <span class="capitalize"><?php echo e(Auth::user()->getUserType()); ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100 text-wrap">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-item nav-link <?php echo e((request()->is('admin/dashboard')) ? 'active' : ''); ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <?php if(Auth::user()->role_id == 1): ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>User-Settings</a>
                            <div class="dropdown-menu bg-transparent border-0" data-bs-popper="none">
                                <a href="<?php echo e(route('users')); ?>" class="dropdown-item <?php echo e((request()->is('admin/users*')) ? 'active' : ''); ?>"><i class="bi-book me-2"></i>Users</a>
                                <a href="<?php echo e(route('admin.userTypes')); ?>" class="dropdown-item <?php echo e((request()->is('admin/userType')) ? 'active' : ''); ?>"><i class="bi-bookmark-dash me-2"></i>Job Roles</a>
                                <a href="<?php echo e(route('admin.loginsessions')); ?>" class="dropdown-item <?php echo e((request()->is('admin/userLoginSessions')) ? 'active' : ''); ?>"><?php echo e(__('Login Sessions')); ?></a>
                                <a href="<?php echo e(route('admin.add-permissions')); ?>" class="dropdown-item <?php echo e((request()->is('admin/add-user-permissions')) ? 'active' : ''); ?>"><?php echo e(__('User Permissions')); ?></a>
                            </div>
                            
                        </div>
                    <?php endif; ?>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Projects</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?php echo e(route('get.topics')); ?>" class="dropdown-item <?php echo e((request()->is('projects/topics/topics')) ? 'active' : ''); ?>">Topics</a>
                            <a href="<?php echo e(URL::to('u/projcategory')); ?>" class="dropdown-item <?php echo e((request()->is('projects/maincategory/index')) ? 'active' : ''); ?>"><i class="bi-bookmark-dash me-2"></i>Research Materials</a>
                            <a href="<?php echo e(route('requestprojects')); ?>" class="dropdown-item">Requested Projects</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                                       
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Materials</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="" class="dropdown-item <?php echo e((request()->is('admin/projects')) ? 'active' : ''); ?>"><i class="bi-book me-2"></i>Education Materials</a>
                            <a href="" class="dropdown-item <?php echo e((request()->is('admin/projects')) ? 'active' : ''); ?>"><i class="bi-bookmark-dash me-2"></i>Research Materials</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>    
                    <a href="form.html" class="nav-item nav-link <?php echo e((request()->is('admin/projects')) ? 'active' : ''); ?>"><i class="fa-solid fa-money-bill me-2"></i>Pricing</a>
                    <a href="table.html" class="nav-item nav-link <?php echo e((request()->is('admin/projects')) ? 'active' : ''); ?>"><i class="far fa-file-alt me-2"></i>Reports</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>    
                    
                    <?php if(Auth::user()->role_id == 1): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-sm" data-bs-toggle="dropdown"><i class="fa-solid fa-circle-info me-2"></i>Terms & Conditions</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?php echo e(route('userterms.index')); ?>" class="dropdown-item <?php echo e((request()->is('admin/userterms')) ? 'active' : ''); ?>">View</a>
                            <a href="<?php echo e(route('userterms.create')); ?>" class="dropdown-item <?php echo e((request()->is('admin/userterms/create')) ? 'active' : ''); ?>">Add</a>
                        </div>
                    </div>                        
                    <?php else: ?>
                        <a href="<?php echo e(route('get.userterms')); ?>" class="nav-item nav-link"><i class="bi-info-circle-fill me-2"></i>Terms & Conditions</a>
                    <?php endif; ?> 

                </div>
            </nav>
        </div>
        <!-- Sidebar End  -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="navbar-brand d-flex d-lg-none me-4">
                    <img class="rounded-circle" src="<?php echo e(asset('img/logo/ksr_logo_2.png')); ?>" alt="ksr_logo" style="width: 40px; height: 40px;">
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <?php if(Auth::user()->profileimage == null): ?>
                                        <?php if(Auth::user()->gender == 'm'): ?>
                                            <img class="rounded-circle image-previewer" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 40px; height: 40px;">
                                        <?php elseif(Auth::user()->gender == 'f'): ?>
                                            <img class="rounded-circle image-previewer" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 40px; height: 40px;">
                                        <?php endif; ?>                                        
                                    <?php else: ?>
                                        <img class="rounded-circle image-previewer" src="<?php echo e(asset('img/user-images/' . Auth::user()->profileimage)); ?>" alt="" style="width: 40px; height: 40px;">
                                    <?php endif; ?>

                                    
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <?php if(Auth::user()->profileimage == null): ?>
                                <?php if(Auth::user()->gender == 'm'): ?>
                                    <img class="rounded-circle image-previewer" src="<?php echo e(asset('img/user-images/default/user-male.png')); ?>" alt="" style="width: 40px; height: 40px;">
                                <?php elseif(Auth::user()->gender == 'f'): ?>
                                    <img class="rounded-circle image-previewer" src="<?php echo e(asset('img/user-images/default/user-female.png')); ?>" alt="" style="width: 40px; height: 40px;">
                                <?php endif; ?>                                
                            <?php else: ?>
                                <img class="rounded-circle image-previewer" src="<?php echo e(asset('img/user-images/'.Auth::user()->profileimage)); ?>" alt="" style="width: 40px; height: 40px;">
                            <?php endif; ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item">My Profile</a>
                            <a href="<?php echo e(route('admin.settings')); ?>" class="dropdown-item">Settings</a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Navbar End -->
            <main class="py-4 container mt-3">
                <?php echo $__env->yieldContent('content'); ?>
            </main>  
            <!-- Content End --> 

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square" id="btn-back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
        
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('lib/chart/chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/tempusdominus/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/tempusdominus/js/moment-timezone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>

    <!-- Template Javascript -->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/btnTop.js')); ?>"></script>
    <script src="<?php echo e(asset('ijaboCropTool/ijaboCropTool.min.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="<?php echo e(asset('ijaboCropTool/ijaboCropTool.min.js')); ?>"></script>
    
    <script>
        $('#_userAvatarFile').ijaboCropTool({
            preview : '.image-previewer',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'<?php echo e(route("admin.crop")); ?>',
            withCSRF:['_token','<?php echo e(csrf_token()); ?>'],
            onSuccess:function(message, element, status){
                alert(message);
            },
            onError:function(message, element, status){
                alert(message);
            }
        });
    </script>
    
    <?php if(Session::has('user_type_added')): ?>
        <script>
            toastr.success("<?php echo Session::get('user_type_added'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_type_removed')): ?>
        <script>
            toastr.error("<?php echo Session::get('user_type_removed'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_type_updated')): ?>
        <script>
            toastr.info("<?php echo Session::get('user_type_updated'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('add_new_user')): ?>
        <script>
            toastr.success("<?php echo Session::get('add_new_user'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_removed')): ?>
        <script>
            toastr.error("<?php echo Session::get('user_removed'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('user_updated')): ?>
        <script>
            toastr.info("<?php echo Session::get('user_updated'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('profile_updated')): ?>
        <script>
            toastr.info("<?php echo Session::get('profile_updated'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        <script>
            toastr.error("<?php echo Session::get('error'); ?>");
        </script>
    <?php endif; ?>
    
    <?php if(Session::has('update_password')): ?>
        <script>
            toastr.error("<?php echo Session::get('update_password'); ?>");
        </script>
    <?php endif; ?>
    
    <?php if(Session::has('same_password')): ?>
        <script>
            toastr.info("<?php echo Session::get('same_password'); ?>");
        </script>
    <?php endif; ?>  

    <?php if(Session::has('delete_user_permission')): ?>
        <script>
            toastr.error("<?php echo Session::get('delete_user_permission'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('update_permission')): ?>
        <script>
            toastr.info("<?php echo Session::get('update_permission'); ?>");
        </script>
    <?php endif; ?>  

    <?php if(Session::has('add_topic')): ?>
        <script>
            toastr.success("<?php echo Session::get('add_topic'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('update_topic')): ?>
        <script>
            toastr.info("<?php echo Session::get('update_topic'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('delete_topic')): ?>
        <script>
            toastr.error("<?php echo Session::get('delete_topic'); ?>");
        </script>
    <?php endif; ?> 

    <?php if(Session::has('suc')): ?>
        <script>
            toastr.success("<?php echo Session::get('suc'); ?>");
        </script>
    <?php endif; ?>

    <?php if(Session::has('err')): ?>
        <script>
            toastr.error("<?php echo Session::get('err'); ?>");
        </script>
    <?php endif; ?>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

</body>
</html>
<?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/layouts/adminApp.blade.php ENDPATH**/ ?>