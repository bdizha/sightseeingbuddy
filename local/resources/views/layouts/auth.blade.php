<!DOCTYPE html>
<html>
    @include('partials.head', []) 
    <body class="jobPage{{ !empty($page) ? ucfirst($page) : '' }}">  
        <!-- begin header here -->
        @include('partials.auth_header', [])  
        <!-- end header here -->
        
        <div class="mainContainer">
            <div id="main_wrap" class="wrapper mainWrapper homeWrapper">
                @yield('content')
            </div>
        </div>
        
        <!-- begin footer here -->
        @include('partials.footer', [])  
        <!-- end footer here -->
    </body>
</html>