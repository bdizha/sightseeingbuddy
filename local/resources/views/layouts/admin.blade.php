<!DOCTYPE html>
<html>
    @include('partials.head', $params) 
    <body class="jobPage{{ !empty($page) ? ucfirst($page) : '' }}">  
        <!-- begin header here -->
        @include('admin.partials.header', ['links' => $links])
        @include('admin.partials.heading', $params)
        
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