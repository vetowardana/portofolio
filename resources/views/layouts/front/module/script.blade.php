<script src="{{asset('templatemo/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('templatemo/js/bootstrap.min.js')}}"></script>
<script src="{{asset('templatemo/js/parallax.min.js')}}"></script> <!-- https://pixelcog.github.io/parallax.js/ -->
<script src="{{asset('templatemo/slick/slick.min.js')}}"></script>
<script src="{{asset('templatemo/js/tooplate-script.js')}}"></script>
<script>
    $(document).ready(function () {
        // Testimonials carousel
        $('.tm-carousel').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    });
</script>