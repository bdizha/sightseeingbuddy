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
        <section class="gray-block" id="step">
            <div class="container vertilize">
                @include('step.partials.sidebar', ['active' => $active, 'links' => $links, 'index' => $index])
                <div class="col-sm-8 col-sm-offset-1 gray-bottom-border gray-top-border same-height mt-3 mb-1 pt-1"
                     data-mh="step">
                    @yield('form')
                </div>
            </div>
        </section>
    </main>
</div>

@include('experience.partials.js')

<!-- begin footer here -->
@include('partials.footer', [])
<!-- end footer here -->
</body>
</html>