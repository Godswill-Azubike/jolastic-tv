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
							<a href="{{ url('/') }}l" class="header__logo">
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

	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg.jpg') }}"></div>
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg2.jpg') }}"></div>
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg3.jpg') }}"></div>
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg4.jpg') }}"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>Jolastic TV.</b><br> Top Movies</h1>

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>

				<div class="col-12">
					<div class="owl-carousel home__carousel">
						@forelse ($slide as $item)
						<div class="item">
							<!-- card -->
							<div class="card card--big">
								<div class="card__cover">
									<img src="{{ asset('storage/'.$item->photo) }}" alt="">
									<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}" class="card__play">
										<i class="icon ion-ios-cloud-download"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">{{ $item->m_name }}</a></h3>
									<span class="card__category">
										<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}">Download Movie</a>
										<a href="#">Triler</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
							<!-- end card -->
						</div>
						@empty
							
						@endforelse
						

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Movies By Categories</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Foregin Movies</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Animation Movies</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">African Movies</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="New items">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Foregin Movies</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Animation Movies</a></li>

									<li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">African Movies</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content" id="myTabContent">
				
				<div class="tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
					<div class="row">
						@forelse ($f_movies as $item)
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="{{ ('storage/'.$item->photo) }}" alt="">
									<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}" class="card__play">
										<i class="icon ion-ios-cloud-download"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}">{{ $item->m_name }}</a></h3>
									<span class="card__category">
										<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}">{{ __('download') }}</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->
						@empty
						<!-- card -->
						<div class="col-12 col-sm-12 col-lg-10 col-xl-10">
							<div class="card">
								
								<div class="card__content">
									<h3 class="card__title">
										<a href="#">No movie is currently avialable on this Category</a>
									</h3>
								</div>
							</div>
						</div>
						<!-- end card -->
						@endforelse
					</div>
				</div>

				<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">
						@forelse ($ani_movies as $item)
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="{{ ('storage/'.$item->photo) }}" alt="">
									<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}" class="card__play">
										<i class="icon ion-ios-cloud-download"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}">{{ $item->m_name }}</a></h3>
									<span class="card__category">
										<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}">{{ __('download') }}</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>{{ $item->m_size }}</span>
								</div>
							</div>
						</div>
						<!-- end card -->
						@empty
						<!-- card -->
						<div class="col-12 col-sm-12 col-lg-10 col-xl-10">
							<div class="card">
								
								<div class="card__content">
									<h3 class="card__title">
										<a href="#">No movie is currently avialable on this Category</a>
									</h3>
								</div>
							</div>
						</div>
						<!-- end card -->
						@endforelse
					</div>
				</div>

				<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
					<div class="row">
						@forelse ($a_movies as $item)
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="{{ ('storage/'.$item->photo) }}" alt="">
									<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}" class="card__play">
										<i class="icon ion-ios-cloud-download"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}">{{ $item->m_name }}</a></h3>
									<span class="card__category">
										<a href="{{ url('movie/'.$item->id.'/'.$item->m_name.'/?cat='.$item->category) }}">{{ __('download') }}</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>{{ $item->m_size }}</span>
								</div>
							</div>
						</div>
						<!-- end card -->
						@empty
						<!-- card -->
						<div class="col-12 col-sm-12 col-lg-10 col-xl-10">
							<div class="card">
								
								<div class="card__content">
									<h3 class="card__title">
										<a href="#">No movie is currently avialable on this Category</a>
									</h3>
								</div>
							</div>
						</div>
						<!-- end card -->
						@endforelse
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end content -->

	<!-- expected premiere -->
	<section class="section section--bg" data-bg="{{ asset('img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">HD WallPaper</h2>
				</div>
				<!-- end section title -->
				@forelse ($wallpapers as $wallpaper)
				<!-- card -->
				<div class="col-6 col-sm-4 col-lg-4 col-xl-3">
					<div class="card">
						<div class="card__cover">
							<img src="{{ asset('storage/'.$wallpaper->photo) }}" alt="">
							<a href="{{ asset('storage/'.$wallpaper->photo) }}" download="{{ $wallpaper->name.'-from-jolastictv' }}" class="card__play">
								<i class="icon ion-ios-cloud-download"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="#">{{ $wallpaper->name }}</a></h3>
							<span class="card__category">
								<a href="{{ asset('storage/'.$wallpaper->photo) }}" download="{{ $wallpaper->name.'-from-jolastictv' }}"">
									<i class="icon ion-ios-cloud-download"></i> 
									Download Now
								</a>
							</span>
							<span class="card__rate"><i class="icon ion-ios-star"></i></span>
						</div>
					</div>
				</div>
				<!-- end card -->
				@empty
				<!-- card -->
				<div class="col-12 col-sm-12 col-lg-10 col-xl-10">
					<div class="card">
						
						<div class="card__content">
							<h3 class="card__title">
								<a href="#">No wallpaper is currently avialable</a>
							</h3>
						</div>
					</div>
				</div>
				<!-- end card -->
				@endforelse

				<!-- section btn -->
				<div class="col-12">
					<a href="{{ route('wallpapers') }}" class="section__btn">Show More</a>
				</div>
				<!-- end section btn -->
			</div>
		</div>
	</section>
	<!-- end expected premiere -->

	<!-- partners -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Advert Placement</h2>
				</div>
				<!-- end section title -->

				<!-- section text -->
				<div class="col-12">
					<p class="section__text section__text--last-with-margin">Contact us at jolastic tv for adverts placement and promotions</p>
				</div>
				<!-- end section text -->
				@forelse ($ads as $item)
					<!-- partner -->
					<div class="col-6 col-sm-4 col-md-4 col-lg-3">
						<a href="{{ $item->ads_link }}" class="partner">
							<img src="{{ 'storage/'.$item->photo }}" alt="" class="partner__img">
						</a>
					</div>
					<!-- end partner -->
				@empty
					
				@endforelse
				
			</div>
		</div>
	</section>
	<!-- end partners -->

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
							<li class="facebook"><a href="https://www.facebook.com/Jolastic-jokes-1825747194359956/" target="_blank"><i class="icon ion-logo-facebook"></i></a></li>
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