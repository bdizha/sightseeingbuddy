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
                @include('step.partials.sidebar', ['active' => $active, 'links' => $links])
                <div class="col-sm-8 col-sm-offset-1 same-height mt-3" data-mh="step">
                    @yield('form')
                </div>
            </div>
        </section>
    </main>
</div>

@if(empty($excludeJs))
    <script src="/js/vendors.js?v={{ Helper::timestamp('/js/vendors.js') }}"></script>
    <script src="/js/scripts.js?v={{ Helper::timestamp('/js/scripts.js') }}"></script>
@endif

@include('experience.partials.js')

<!-- begin footer here -->
@include('partials.footer', [])
<!-- end footer here -->
</body>
</html>