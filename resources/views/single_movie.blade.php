@extends('layouts.master')

@section('contents')
    <!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="{{ asset('img/home/home__bg.jpg') }}"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title">{{  $movie->m_name }}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="{{ asset('storage/'. $movie->photo) }}" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>

										<ul class="card__list">
											<li>HD</li>
											<li>16+</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Genre:</span> <a href="#">{{ $movie->category }}</a>
										<li><span>Movie Size:</span> {{ $movie->m_size }}</li>
										<li><span>Up date/time:</span> {{ $movie->created_at }}</li>
										<li>
                                            <a href="{{ $movie->d_link }}" class="price__btn">
                                                <i class="icon ion-ios-cloud-download"></i> &nbsp; Download Now 
                                            </a>
                                        </li>
									</ul>

									<div class="card__description card__description--details">
										{{  $movie->overview }}
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<iframe width="560" height="315" src="{{ $movie->ytb_link }}" 
					    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
					</iframe>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available Options:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-ios-cloud-download"></i><span>Download Now</span></li>
								<li><i class="icon ion-logo-youtube"></i><span>Watch Triler</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={ url()->full() }}"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="twitter"><a href="https://twitter.com/intent/tweet?text{{ $movie->m_name.'&url='.url()->full() }}"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="whatsapp://send?text={{ $movie->m_name.' '.url()->full() }}"><i class="icon ion-logo-whatsapp"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->
@endsection