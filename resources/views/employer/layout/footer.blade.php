<!-- jQuery first, then Bootstrap JS -->
<!-- jQuery -->
<script src="{{asset('assets/vendor/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<!-- <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- WOW js -->
<script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>
<!-- Slick Slider -->
<script src="{{asset('assets/vendor/slick/slick.min.js')}}"></script>
<!-- Fancybox -->
<script src="{{asset('assets/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>
<!-- Lazy -->
<script src="{{asset('assets/vendor/jquery.lazy.min.js')}}"></script>
<!-- js Counter -->
<script src="{{asset('assets/vendor/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.waypoints.min.js')}}"></script>
<!-- Nice Select -->
<script src="{{asset('assets/vendor/nice-select/jquery.nice-select.min.js')}}"></script>
<!-- validator js -->
<script src="{{asset('assets/vendor/validator.js')}}"></script>

<!-- Theme js -->
<script src="{{asset('assets/js/theme.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script>
    $(document).on("click", function(e) {
        if (!$(e.target).closest('.dropdown-toggle').length && !$(e.target).closest('.dropdown-menu').length) {
            $(".dropdown-menu.show").removeClass("show");
        }
    });

    $(document).on("click" , ".dropdown-toggle" , function(e){
        let nextElement = this.nextElementSibling;
        $(".dropdown-menu.show").removeClass("show");
        $(nextElement).toggleClass("show");
    })
</script>