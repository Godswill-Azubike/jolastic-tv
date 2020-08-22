@extends('layouts.master')


@section('contents')
        <!-- page title -->
	<section class="section section--first section--bg" data-bg="{{ asset('img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">{{ auth('admin')->User()->name }}</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="#">Dashboard</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Home</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- end page title -->
    




    

    	<!-- pricing -->
	<div class="section">
		<div class="container">
			<div class="row">
				<!-- plan features -->
				<div class="col-12">
					<ul class="row">
						<li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('admin.dashboard') }}" class="price__btn">Admin Dashboard</a>
                        </li>
                        <li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('add_movie_page') }}" class="price__btn">Browse Movies</a>
                        </li>
                        <li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('add_wallpaper_page') }}" class="price__btn">Browse Wallpapers</a>
                        </li>
                        <li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('add_advert_page') }}" class="price__btn">Browse  Adverts</a>
                        </li>
                        <li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('admin.dashboard') }}" class="price__btn">Browse Users</a>
                        </li>
					</ul>
				</div>
				<!-- end plan features -->

				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>Total Movies</span> <span>{{ $movie_count }}</span></div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price price--premium">
						<div class="price__item price__item--first"><span>Total Wallpapers</span> <span>{{ $wallpaper_count }}</span></div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>Total Adverts</span> <span>{{ $advert_count }}</span></div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>Total Users</span> <span>{{ $user_count }}</span></div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>Total Page-Visitors</span> <span>{{ $visit_count }}</span></div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>Total Movie-Requests</span> <span>0</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end pricing -->
@endsection