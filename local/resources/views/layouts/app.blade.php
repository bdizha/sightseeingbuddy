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
                @yield('content')
            </main>
        </div>
        
        <!-- begin footer here -->
        @include('partials.footer', [])  
        <!-- end footer here -->
    </body>
</html>