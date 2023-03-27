
<!DOCTYPE html>
<html lang="en-US" class="no-js">


@include('frontend.include.header')
<body>

    <!-- PRELOADER START -->
    <div id="loader-wrapper">
        <div class="loader">
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
        </div>
    </div>
    <!-- PRELOADER END -->

    <header>

        @include('frontend.include.body_header')

        @include('frontend.include.silder')


    </header>



    <!-- CONTENT START -->
    @yield('section')

    <!-- CONTENT END -->

    <!-- FOOTER START -->
    @include('frontend.include.body_footer')
    <!-- FOOTER END -->

    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->

    @include('frontend.include.footer')

</body>

</html>
