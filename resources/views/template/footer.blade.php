<!-- Optional JavaScript _____________________________  -->

<!-- jQuery first, then Bootstrap JS -->
<!-- jQuery -->
<script src="{{asset('assets/vendor/jquery.min.js')}} "></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- WOW js -->
<script src="{{asset('assets/vendor/wow/wow.min.js')}} "></script>
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

<script type="text/javascript">
 
  $(function() {
        
      /*------------------------------------------
      --------------------------------------------
      Submit Event
      --------------------------------------------
      --------------------------------------------*/
      $(document).on("click", "#loginButton", function() {
        // e.preventDefault();
        //   var e = this;
  
  
          $.ajax({
              url: $("#LoginForm").attr('action'),
              data: {
                _token:"{{csrf_token()}}",
                email: $("#LoginForm").find('input[name=email]').val(),
                password: $("#LoginForm").find('input[name=password]').val(),
                        },
              type: "POST",
              dataType: 'json',
              success: function (data) {
    
                if (data.status) {
                    window.location = data.redirect;
                }else{
                    $(".alert").remove();
                    $.each(data.errors, function (key, val) {
                        $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                    });
                }
               
              }
          });
  
          return false;
      });
  
    });
  
</script>