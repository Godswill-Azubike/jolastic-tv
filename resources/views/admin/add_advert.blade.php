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
							<li class="breadcrumb__item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Add Movie</li>
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
                            <a href="{{ route('admin.dashboard') }}" class="price__btn">Back To Dashboard</a>
                        </li>
                        <li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('all_adverts_page') }}" class="price__btn">Browse All Adverts</a>
                        </li>
					</ul>
				</div>
				<!-- end plan features -->

				<div class="col-12 col-md-12 col-lg-12">
					<div class="price">
                        <div class="price__item price__item--first"><span>Upload New Advert</span></div>
                        @include('layouts.messages')
                        <form action="{{ route('add_advert') }}" method="POST" class="form" enctype="multipart/form-data">
                           @csrf
                            <div class="sign__group">
                                <label for="Advert" style="color: whitesmoke;">Advert</label>
                                <input type="text" class="form__input" name="ads"  required>
                            </div>
                            <div class="sign_group" style="color: whitesmoke;">
                                <label for="Download Link">Movie Download Link</label>
                                <input type="text" class="form__input" name="ads_link" placeholder="e.g. https://www." required>  
                            </div>
                            <div class="sign_group">
                                <label for="Movie Photo" style="color: whitesmoke;">Advert Photo <small>(Recomended w/h 270x400)</small></label>
                               <input type="file" class="form__input" name="photo" required> 
                            </div>
                            <button type="submit" class="form__btn">Upload advert</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end pricing -->
@endsection