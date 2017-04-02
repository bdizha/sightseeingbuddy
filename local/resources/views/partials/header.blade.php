<header id="header" class="site-header">
    <div class="top-yellow-bg">
        <div class="container">
            <div class="inline">
                <a href="mailto:info@keepitlocal.co.za">
                    <i class="fa fa-envelope-o"></i>
                    <span>info@keepitlocal.co.za</span>
                </a>
                <span class="hidden-xs">
                    <i class="fa fa-link"></i>
                    <span>082 987 1234</span>
                </span>
            </div>
            @include('auth.partials.nav')
        </div>
    </div>
    <div class="clear-both"></div>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primaryNav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/uploads/files/_AUTOx52_crop_center-center/Keep-It-Local-Website-AssetsAsset-1.png" alt="Keep It Local" style="height: 52px">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="primaryNav">
                    <ul class="nav navbar-nav">
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/pages/how-it-works" >
                                How It Works
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/pages/about-keep-it-local" >
                                About Us
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/pages/becoming-a-local" >
                                Become a Local
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/local/search" >
                                Find a Host
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/local/contact-us/create" >
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="field form-group fields-search-field" id="fields-search-field">
                        <form id="search-form" action="/local/search" method="POST">
                            <div class="input ltr">
                                <input class="text form-control nicetext fullwidth" type="text" id="keyword" name="keyword" value="" data-show-chars-left="" autocomplete="off" placeholder="Search ...">
                            </div>
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
@include('partials.notice', [])