<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    
 <!-- Google Tag Manager -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5QPXLR');</script>
<!-- End Google Tag Manager -->
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/05fa2a7c5c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('fronte/css/style.css')); ?>" />
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
    <meta name="google-site-verification" content="RAagbKACglfW7ir-0SI8Kvpi5HP1H6T0ACqOokYTdX0" />
    <title>KSR PROJECTHUB</title>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5QPXLR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <div class="logo">KSR PROJECTHUB</div>
        <div class="toggle"></div>
        <div class="navigation">
            <ul>
                <li><a href="index">Home</a></li>
                <!-- <li><a href="services.html">Services</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="work.html">Projects</a></li>-->
                <li><a href="/readterms">Terms and Conditions</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
            <div class="social-bar">
                <ul>
                    <li>
                        <a href="https://facebook.com">
                            <img src="<?php echo e(asset('fronte/images/facebook.png')); ?>" target="_blank" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com">
                            <img src="<?php echo e(asset('fronte/images/twitter.png')); ?>" target="_blank" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ksrprojecthub/">
                            <img src="<?php echo e(asset('fronte/images/instagram.png')); ?>" target="_blank" alt="link_to_instagram" />
                        </a>
                    </li>
                </ul>
                <a href="mailto:you@email.com" class="email-icon">
                    <img src="<?php echo e(asset('fronte/images/email.png')); ?>" alt="" />
                </a>
            </div>
        </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>
    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                instagram: "ksrprojecthub", // Instagram username
                call_to_action: "Message us", // Call to action
                button_color: "#405DE6", // Color of button
                position: "left", // Position may be 'right' or 'left'
            };
            var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /GetButton.io widget -->

    <script src="<?php echo e(asset('fronte/js/script.js')); ?>"></script>
    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+94715178352", // WhatsApp number
                call_to_action: "Message Us", // Call to action
                button_color: "#FF6550", // Color of button
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /GetButton.io widget -->
</body>

</html>
<?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/layouts/appFront.blade.php ENDPATH**/ ?>