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
                            <a href="{{ route('add_wallpaper_page') }}" class="price__btn">Upload Wallpaper</a>
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

                @forelse ($wallpapers as $wallpaper)
                   <!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="{{ asset('storage/'.$wallpaper->photo) }}" alt="">
							<a href="#" class="card__play">
								<i class="icon ion-ios-cloud-download"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="#">{{ $wallpaper->name }}</a></h3>
							<span class="card__category">
								<a href="{{ route('delete_wallpaper', $wallpaper->id) }}">Delete Advert</a>
							</span>
							<span class="card__rate"><i class="icon ion-ios-star"></i> HD</span>
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
                                <a href="#">No wallpaper Have been uploaded. you can <a href="{{ route('add_wallpaper_page') }}"><b>UPLOAD A Wallpaper FOR NOW</b></a></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                @endforelse
				

				<!-- paginator -->
				<div class="col-12">
                    {{ $wallpapers->links() }}
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->
@endsection