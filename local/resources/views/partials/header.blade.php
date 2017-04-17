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
                        <img src="/cpresources/transforms/63?x=gdGXHQ18N" alt="Keep It Local" style="height: 52px">
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
                            <a href="/become-a-local" >
                                Become a Local
                            </a>
                        </li>
                        <li class="
                            item
                            item-level-1
                            ">
                            <a href="/local/search" >
                                Find a Local
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
                    <div class="field form-group search-field" id="fields-search-field">
                        <form id="search-form" action="/local/search" method="POST">
                            <div class="input ltr">
                                <input class="text form-control nicetext fullwidth" type="text" id="keyword" name="keyword" value=""  autocomplete="off" placeholder="Search ...">
                            </div>
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <input type="hidden" id="current_url" name="current_url" value="{{ Request::path() }}" />
</header>
@include('partials.notice', [])