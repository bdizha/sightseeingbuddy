<!DOCTYPE html>
<html lang="en_us">
    <!-- begin header here -->
    @include('partials.head', [])  
    <!-- end header here -->
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

        @if(!empty($hasJs))
        <script src="/js/vendors.js?v={{ Helper::timestamp('/js/vendors.js') }}"></script>
        <script src="/js/scripts.js?v={{ Helper::timestamp('/js/scripts.js') }}"></script>
        @endif
        
@include('experience.partials.js')

        <!-- begin footer here -->
        @include('partials.footer', [])  
        <!-- end footer here -->
    </body>
</html>