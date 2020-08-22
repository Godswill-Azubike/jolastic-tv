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
							<li class="breadcrumb__item"><a href="#">Acount</a></li>
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
				<div class="col-12">
					<ul class="row">
						<li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('admin.dashboard') }}" class="price__btn">Back To Dashboard</a>
                        </li>
                        <li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('add_movie_page') }}" class="price__btn">Upload Movie</a>
                        </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <!-- end pricing -->
    
	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
                <div class="col-12">
                    @include('layouts.messages')
                </div>

                @forelse ($movies as $movie)
                   <!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="{{ asset('storage/'.$movie->photo) }}" alt="">
							<a href="#" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="#">{{ $movie->m_name }}</a></h3>
							<span class="card__category">
								<a href="{{ route('edit_movie_page', $movie->id) }}">Edit Movie</a>
								<a href="{{ route('delete', $movie->id) }}">Delete Movie</a>
							</span>
							<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
						</div>
					</div>
				</div>
				<!-- end card --> 
                @empty
                    
                @endforelse
				

				<!-- paginator -->
				<div class="col-12">
                    {{ $movies->links() }}
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->
@endsection