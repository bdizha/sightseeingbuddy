<!DOCTYPE html>
<html lang="en_us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,200,200italic,300italic,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/vendors.css?v={{ Helper::timestamp('/css/style.css') }}">
        <link rel="stylesheet" href="/css/style.css?v={{ Helper::timestamp('/css/style.css') }}">
        <title>Keep It Local</title>
        <meta content="Keep It Local" property="og:title"/>
        <meta name="description" content="">
        <meta property="og:description" content="" />
        <meta itemprop="description" content="">
        <!-- Image -->
        <meta property="og:image" content="http://keepitlocal.dev/uploads/files/_600xAUTO_crop_center-center/Keep-It-Local-Website-AssetsAsset-2@3x.png"/>
        <meta itemprop="image" content="http://keepitlocal.dev/uploads/files/_600xAUTO_crop_center-center/Keep-It-Local-Website-AssetsAsset-2@3x.png">
        <link rel="image_src" href="http://keepitlocal.dev/uploads/files/_600xAUTO_crop_center-center/Keep-It-Local-Website-AssetsAsset-2@3x.png"/>
        <link rel="author" href="">
        <script>
            window.socialPlatforms = {"twitter": "", "facebook": "", "youtube": "", "google": "", "pinterest": ""};
        </script>
        <script>console.warn("Please insert your Google Webmaster HTML Tag")</script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries  -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="/js/html5shiv.min.js"></script>
        <script type="text/javascript" src="/js/respond.min.js"></script>
        <![endif]-->
        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/favicons/manifest.json">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#ffffff">
        <link rel="shortcut icon" href="/favicons/favicon.ico">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">
        <meta name="msapplication-config" content="/favicons/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">    
    </head>
    <body>
        <!-- begin header here -->
        @include('partials.header', [])  
        <!-- end header here -->

        <div id="container">
            <main id="content" role="main">

                <section class="gray-block" id="page">
                    <div class="container vertilize">
                        @yield('content')
                    </div>
                </section>
                
            </main>
        </div>

        <script src="/js/vendors.js?v={{ Helper::timestamp('/js/vendors.js') }}"></script>
        <script src="/js/scripts.js?v={{ Helper::timestamp('/js/scripts.js') }}"></script>
        <!-- begin footer here -->
        @include('partials.footer', [])  
        <!-- end footer here -->
    </body>
</html>