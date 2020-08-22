<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.cs') }}s">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
	<link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default-skin.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>JolasticTV – Online Movies Downloads, Adverts Placement & HD wallpaper Download.</title>

</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="{{ url('/') }}" class="header__logo">
								<img src="{{ asset('img/logo.svg') }}" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="header__nav-link" href="{{ url('/') }}">Home</a>

								</li>
								<!-- end dropdown -->

								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="header__nav-link" href="{{ route('movies') }}">Movies</a>

								</li>
								<!-- end dropdown -->

								<li class="header__nav-item">
									<a href="{{ route('wallpapers') }}" class="header__nav-link">wallpaper</a>
								</li>

								<li class="header__nav-item">
									<a href="faq.html" class="header__nav-link">Help</a>
								</li>

								<!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										@if (auth('admin')->check())
										<li><a href="{{route('admin.dashboard')}}"><b>{{ auth('admin')->user()->name }}</b></a></li>
                						<li><a href="{{route('logout')}}">Sign Out</a></li>
										@elseif( auth('user')->check())
										<li><a href="{{route('user.dashboard')}}"><b>{{ auth('user')->user()->username }}</b></a></li>
                						<li><a href="{{route('logout')}}">Sign Out</a></li>
										@else
										<li><a href="{{ route('login') }}">Sign In</a></li>
										<li><a href="{{ route('register') }}">Sign Up</a></li>
										@endif
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<i class="icon ion-ios-search"></i>
								</button>
								@if (auth('admin')->check() || auth('user')->check())
								<a href="{{ route('logout') }}" class="header__sign-in">
									<i class="icon ion-ios-log-in"></i>
									<span>sign Out</span>
								</a>
								@else
								<a href="{{ route('login') }}" class="header__sign-in">
									<i class="icon ion-ios-log-in"></i>
									<span>sign in</span>
								</a>
								@endif
							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form  action="{{ url('search')}}" method="get" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" name="query" placeholder="Search for a movie, TV Series that you are looking for">

							<button type="submit">search</button>
						</div>
					</div>
				</div>
			</div>
			@csrf
		</form>
		<!-- end header search -->
	</header>
    <!-- end header -->



    @yield('contents')    


	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Contact</h6>
					<ul class="footer__list">
						<li><a href="tel:+2348146874304">+234 814 687 4304</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">...</h6>
					<ul class="footer__list">
						<li><a href="mailto:support@Jolastictv.com">support@Jolastictv.com</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">Social Media</h6>
					<ul class="footer__social">
						<<li class="facebook"><a href="https://www.facebook.com/Jolastic-jokes-1825747194359956/" target="_blank"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="https://www.instagram.com/jolasticmediatv/" target="_blank"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="https://twitter.com/JoshuaOkanya4" target="_blank"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="https://wa.me/2348146874304"><i class="icon ion-logo-whatsapp"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<small><a target="_blank" href="{{ route('home') }}">Jolastic TV</a></small>

						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}"></script>
	<script src="{{ asset('js/wNumb.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/plyr.min.js') }}"></script>
	<script src="{{ asset('js/jquery.morelines.min.js') }}"></script>
	<script src="{{ asset('js/photoswipe.min.js') }}"></script>
	<script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>