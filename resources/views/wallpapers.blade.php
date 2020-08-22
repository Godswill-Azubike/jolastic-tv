@extends('layouts.master')


@section('contents')
    <!-- page title -->
	<section class="section section--first section--bg" data-bg="{{ asset('img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">All Wallpapers for Download</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="{{ url('/') }}">Jolastictv.com</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Wallpapers</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="filter__content">
						{{-- <div class="filter__items">
							<!-- filter item -->
							<div class="filter__item" id="filter__genre">
								<span class="filter__item-label">GENRE:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Action/Adventure">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
									<li>Action/Adventure</li>
									<li>Animals</li>
									
								</ul>
							</div>
							<!-- end filter item -->
							
						</div>
						
						<!-- filter btn -->
						<button class="filter__btn" type="button">apply filter</button>
						<!-- end filter btn --> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
                @forelse ($all_wallpapers as $item)
                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{ asset('storage/'.$item->photo) }}" alt="">
							<a href="{{ asset('storage/'.$item->photo) }}" download="{{ $item->name.'-from-jolastictv' }}" class="card__play">
								<i class="icon ion-ios-cloud-download"></i>
							</a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="#">{{ $item->name }}</a></h3>
							<span class="card__category">
								<a href="{{ asset('storage/'.$item->photo) }}" download="{{ $item->name.'-from-jolastictv' }}"">
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
				<!-- paginator -->
				<div class="col-12">
					{{$all_wallpapers->links()}}
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->

@endsection