<!DOCTYPE html>
<html>
    @include('partials.head', [])
    <body>        
        <!-- begin header here -->
        @include('partials.header', [])  
        <!-- end header here -->

        <div class="headerContainer">
            <div class="wrapper headerWrapper">
                <div class="jobCategory">
                    <a href="/category/{{ $position->category->slug }}">{{ $position->category->name }}</a>
                </div>
            </div>      
        </div>      

        <div class="mainContainer">
            <div id="main_wrap" class="wrapper mainWrapper homeWrapper">
                @yield('content')
            </div>
        </div>

        <!-- begin footer here -->
        @include('partials.footer', [])  
        <!-- end footer here -->

        <script>
            window.addEventListener('load', function () {
                hljs.initHighlightingOnLoad();

                // Async load some styles
                function loadStyle(href) {
                    var s = document.createElement('link');
                    s.setAttribute('rel', 'stylesheet');
                    s.setAttribute('href', href);
                    s.setAttribute('type', 'text/css');
                    document.getElementsByTagName('head')[0].appendChild(s);
                }
                loadStyle("/css/default.min.css");
                loadStyle("/css/font-awesome.min.css");
            });
        </script>
    </body>
</html>