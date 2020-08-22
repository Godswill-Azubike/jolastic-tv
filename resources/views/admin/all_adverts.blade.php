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
                            <a href="{{ route('add_advert_page') }}" class="price__btn">Upload Advert</a>
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

                @forelse ($adverts as $advert)
                   <!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="{{ asset('storage/'.$advert->photo) }}" alt="">
							<a href="{{ $advert->ads_link }}" class="card__play">
								<i class="icon ion-ios-cloud-download"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="{{ $advert->ads_link }}">{{ $advert->ads }}</a></h3>
							<span class="card__category">
								<a href="{{ route('delete_advert', $advert->id) }}">Delete Advert</a>
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
                                <a href="#">No advert Have been uploaded. you can <a href="{{ route('add_advert_page') }}"><b>UPLOAD AN ADVERT NOW</b></a></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                @endforelse
				

				<!-- paginator -->
				<div class="col-12">
                    {{ $adverts->links() }}
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->
@endsection