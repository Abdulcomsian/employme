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

<!--- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
  
      $(".save_job").click(function(){
            var _token = "{{ csrf_token() }}";
            var job_id = $(this).attr("id");
            var that = this;
            
              $.post("{{ url('save-job')}}", {_token:_token,job_id:job_id}).done( function(response){
                var result = JSON.parse(response);
                  if (result.status === "added") {
                    console.log('job added');
                    $(that).addClass("bg-black");
                  } else if (result.status === "removed") {
                    console.log('job removed');
                    $(that).removeClass("bg-black");
                  }
              }).fail(function(xhr, error, message){
                    // console.log(xhr)
                    //  toastr.error(message);
                        if(xhr.status === 401)
                        {
                        toastr.error("You are not Logged In, Please Login");
                      }
                        else if(xhr.status === 403)
                       {
                          toastr.error(" Only Canidate can save the Job");
                       }
              });
          
        });
    });
    $(window).ready(function() { 
        $("#LoginForm").on("keypress", function (event) { 
            // console.log("aaya"); 
            var keyPressed = event.keyCode || event.which; 
            if (keyPressed === 13) { 
                // alert("You pressed the Enter key!!"); 
                event.preventDefault(); 
		        $("#loginButton").trigger("click");
			

                // return false; 
            } 
        }); 
        }); 
  
</script>