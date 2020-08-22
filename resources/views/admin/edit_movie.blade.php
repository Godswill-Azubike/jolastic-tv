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
                            <a href="{{ route('add_movie') }}" class="price__btn">Upload Movie</a>
                        </li>
                        <li class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('all_movies_page') }}" class="price__btn">Browse All Movies</a>
                        </li>
					</ul>
                </div>
                
                <div class="col-12 col-md-12 col-lg-12">
					<div class="price">
                        @include('layouts.messages')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card__cover">
                                        <img src="{{ asset('storage/'.$movie->photo) }}" alt="">
                                        <a href="#" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price__item price__item--first"><span>Update This Movie</span></div>
                        
                        <form action="{{ route('edit_movie', $movie->id) }}" method="POST" class="form" enctype="multipart/form-data">
                           @csrf
                            <div class="sign__group">
                                <label for="movie" style="color: whitesmoke;">Movie Name</label>
                                <input type="text" class="form__input" name="movie_name" placeholder="e.g. Batman (2019)" value="{{ $movie->m_name }}" required>
                            </div>
                            <div class="sign_group">
                                <label for="Movie size" style="color: whitesmoke;">Movie size</label>
                                <input type="text" class="form__input" name="movie_size" placeholder="e.g. 284.45mb" value="{{ $movie->m_size }}" required>  
                            </div>
                            <div class="sign_group" style="color: whitesmoke;">
                                <label for="Download Link">Movie Download Link</label>
                                <input type="text" class="form__input" name="download_link" placeholder="e.g. https://www." value="{{ $movie->d_link }}" required>  
                            </div>
                            <div class="sign_group" style="color: whitesmoke;">
                                <label for="Youtube Trailer Link">Youtube Trailer Link</label>
                                <input type="text" class="form__input" name="youtube_trailer_link" placeholder="e.g. https://www.youtube.com/TtVAY" value="{{ $movie->ytb_link }}"> 
                            </div>
                            <div class="sign_group">
                                <label for="Youtube Trailer Link" style="color: whitesmoke;">Select Movie Category</label>
                                <select name="category" class="form__input" id="" required>
                                    @if ($movie->category == 'Foregin Movies')
                                    <option value="Foregin Movies" selected>Foregin Movies</option>
                                    <option value="Animation Movies">Animation Movies</option>
                                    <option value="African Movies">African Movies</option>
                                    @elseif($movie->category == 'Animation Movies')
                                    <option value="Foregin Movies">Foregin Movies</option>
                                    <option value="Animation Movies" selected>Animation Movies</option>
                                    <option value="African Movies">African Movies</option>
                                    @else
                                    <option value="Foregin Movies">Foregin Movies</option>
                                    <option value="Animation Movies">Animation Movies</option>
                                    <option value="African Movies" selected>African Movies</option>
                                    @endif
                                </select>
                            </div>
                            {{-- <div class="sign_group">
                                <label for="Movie Photo" style="color: whitesmoke;">Movie Photo <small>(Recomended w/h 270x400)</small></label>
                               <input type="file" class="form__input" name="photo" required> 
                            </div> --}}
                            
                            
                            <textarea id="text" name="overview" class="form__textarea" placeholder="Movie Over-View"> {{ $movie->overview }}</textarea>
                            <button type="submit" class="form__btn">Update</button>
                        </form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
    <!-- end pricing -->
@endsection