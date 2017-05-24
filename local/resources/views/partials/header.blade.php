<header id="header" class="site-header">
    <div class="top-yellow-bg">
        <div class="container">
            <div class="inline">
                <a href="mailto:info@sightseeingbuddy.com">
                    <i class="fa fa-envelope-o"></i>
                    <span>info@sightseeingbuddy.com</span>
                </a>
                <span class="hidden-xs">
                    <i class="fa fa-link"></i>
                    <span>+27 21 811 709</span>
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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#primaryNav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/uploads/files/_AUTOx52_crop_center-center/sightseeingbuddy.png" alt="Sightseeing Buddy" style="height: 67px">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="primaryNav">
                    <ul class="nav navbar-nav">
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/pages/how-it-works">
                                How It Works
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/pages/about-sightseeing-buddy">
                                About Us
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/become-a-buddy">
                                become a buddy
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/local/search">
                                find a buddy
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/local/contact-us/create">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="flag-select">
                        <ul class="flag-nav">
                            <li class="selected">
                                <span class="flag-icon flag-icon-gb" data-currency="GBP"></span>
                            </li>
                            <li class="dropdown">
                                <ul class="dropdown-menu">
                                    <li class="hide">
                                        <span data-flag="gb" data-currency="GBP" class="flag-icon flag-icon-gb"></span>
                                    </li>
                                    <li>
                                        <span data-flag="us" data-currency="USD" class="flag-icon flag-icon-us"></span>
                                    </li>
                                    <li>
                                        <span data-flag="eu" data-currency="EUR" class="flag-icon flag-icon-eu"></span>
                                    </li>
                                    <li>
                                        <span data-flag="za" data-currency="ZAR" class="flag-icon flag-icon-za"></span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="field form-group search-field" id="fields-search-field">
                        <form id="search-form" action="/local/search" method="POST">
                            <div class="input ltr">
                                <input class="text form-control nicetext fullwidth" type="text" id="keyword"
                                       name="keyword" value="" autocomplete="off" placeholder="Search ...">
                            </div>
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <input type="hidden" id="current_url" name="current_url" value="{{ Request::path() }}"/>
    <input type="hidden" id="current_currency" name="current_currency" value="{{ Session("currency") }}"/>
</header>
@include('partials.notice', [])