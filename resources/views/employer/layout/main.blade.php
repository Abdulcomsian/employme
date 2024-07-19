<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	@include('employer.layout.header')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Fix Internet Explorer ______________________________________-->
	<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
	@stack('page-css')
	@yield('page-head')
</head>

<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
				Loading Transition
			==================================================== -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				
			<span style="font-size: 25px;font-weight: bold;color:#000;">employme</span>
			</div>
		</div>

		<!-- 
		=============================================
				Dashboard Aside Menu
		============================================== 
		-->

		@include('employer.layout.aside-nav')

		<!-- /.dash-aside-navbar -->


		@yield('content')



		<!-- Modal -->
		<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen modal-dialog-centered">
				<div class="container">
					<div class="remove-account-popup text-center modal-content">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<img src="../images/lazy.svg" data-src="{{asset('assets/images/dashboard-icon/icon_22.svg')}}" alt="" class="lazy-img m-auto">
						<h2>Are you sure?</h2>
						<p>Are you sure to delete your account? All data will be lost.</p>
						<div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
							<a href="#" class="confirm-btn fw-500 tran3s me-3">Yes</a>
							<button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
						</div>
					</div>
					<!-- /.remove-account-popup -->
				</div>
			</div>
		</div>



		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>




		<!-- Optional JavaScript _____________________________  -->

		@include('employer.layout.footer')
		<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
		@vite('resources/js/app.js')
		<script type="module">
				@if(request()->is('employer/employer-dashboard-message'))
				Echo.private(`candidate-chat.{{auth()->user()->id}}`)
					.listen('CandidateEvent', (e) => {
						if(e.conversationId == conversationId)
						{
							$(".conversation-"+e.conversationId).append(e.html);
							$(".compose-new-email-container").find(".compose-body textarea").focus();
							$(".email-body").scrollTop($(".email-body")[0].scrollHeight);
						}
						else
						{
							$(".users[data-user-id='" + e.conversationId + "']").remove();
							$(".email-read-panel").prepend(e.newCandidate);
						}
					});
				@endif
 


				Echo.private(`user-notification-{{auth()->user()->id}}`)
					.listen('MessageNotificationEvent' , (e)=>{
						let unseenMessagesCount = e.unseenMessagesCount;
						let messageNav = document.querySelector(".message-nav");
						let userMessage = document.querySelector(".user-message");
						if(userMessage){
							userMessage.remove();
						}
						if(unseenMessagesCount != 0){
							let html = `<i class="fa-solid fa-envelope user-message blink mx-2"><span class="unseen-message-count">${unseenMessagesCount}</span> </i>`;
							messageNav.insertAdjacentHTML("beforeend", html)
						}
					});

			

		</script>
		@stack('page-script')

	</div> <!-- /.main-page-wrapper -->
</body>

</html>