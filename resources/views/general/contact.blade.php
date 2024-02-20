@extends('layouts.ext')

@section('content')
<section class="pt-5 pb-0" style="background-image:url(assets/images/element/map.svg); background-position: center left; background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xl-10 text-center mx-auto">
				<!-- Title -->
				<h6 class="text-primary">Contacto</h6>
				<h1 class="mb-4">¡Estamos aquí para ayudar!</h1>
			</div>
		</div>
		
		<!-- Contact info box -->
		<div class="row g-4 g-md-5 mt-0 mt-lg-3">
			<!-- Box item -->
			<div class="col-lg-6 mt-lg-0">
				<div class="card card-body bg-primary shadow py-5 text-center h-100">
					<!-- Title -->
					<h5 class="text-white mb-3">Atención al cliente</h5>
					<ul class="list-inline mb-0">
						<!-- Address -->
						<li class="list-item mb-3">
							<a href="#" class="text-white"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>Chicago HQ Estica Cop.  Macomb, MI 48042 </a>
						</li>
						<!-- Phone number -->
						<li class="list-item mb-3">
							<a href="#" class="text-white"> <i class="fas fa-fw fa-phone-alt me-2"></i>(423) 733-8222 </a>
						</li>
						<!-- Email id -->
						<li class="list-item mb-0">
							<a href="#" class="text-white"> <i class="far fa-fw fa-envelope me-2"></i>example@email.com </a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Box item -->
			<div class="col-lg-6 mt-lg-0">
				<div class="card card-body shadow py-5 text-center h-100">
					<!-- Title -->
					<h5 class="mb-3">Dirección de contacto</h5>
					<ul class="list-inline mb-0">
						<!-- Address -->
						<li class="list-item mb-3 h6 fw-light">
							<a href="#"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>2492 Centennial NW, Acworth, GA, 30102 </a>
						</li>
						<!-- Phone number -->
						<li class="list-item mb-3 h6 fw-light">
							<a href="#"> <i class="fas fa-fw fa-phone-alt me-2"></i>+896-789-546 </a>
						</li>
						<!-- Email id -->
						<li class="list-item mb-0 h6 fw-light">
							<a href="#"> <i class="far fa-fw fa-envelope me-2"></i>example@email.com </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>


<section>
	<div class="container">
		<div class="row g-4 g-lg-0 align-items-center">

			<div class="col-md-6 align-items-center text-center">
				<!-- Image -->
				<img src="assets/images/element/contact.svg" class="h-400px" alt="">

				<!-- Social media button -->
				<div class="d-sm-flex align-items-center justify-content-center mt-2 mt-sm-4">
					<h5 class="mb-0">Siga con nosotros:</h5>
					<ul class="list-inline mb-0 ms-sm-2">
						<li class="list-inline-item"> <a class="fs-5 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-square"></i></a> </li>
						<li class="list-inline-item"> <a class="fs-5 me-1 text-instagram" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
						<li class="list-inline-item"> <a class="fs-5 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
						<li class="list-inline-item"> <a class="fs-5 me-1 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
						<li class="list-inline-item"> <a class="fs-5 me-1 text-dribbble" href="#"><i class="fas fa-fw fa-basketball-ball"></i></a> </li>
						<li class="list-inline-item"> <a class="fs-5 me-1 text-pinterest" href="#"><i class="fab fa-fw fa-pinterest"></i></a> </li>
					</ul>
				</div>
			</div>

			<!-- Contact form START -->
			<div class="col-md-6">
				<!-- Title -->
				<h2 class="mt-4 mt-md-0">Hablemos</h2>
				<p>Para solicitar un presupuesto o desea hacer alguna pregunta, contáctenos directamente o complete el formulario y nos pondremos en contacto con usted a la brevedad.</p>
					
				<form action="{{url($menu)}}" method="post" enctype="multipart/form-data">
					@csrf
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
					@endif
					<!-- Name -->
					<div class="mb-4 bg-light-input">
						<label for="yourName" class="form-label">Nombre *</label>
						<input name="name" type="text" class="form-control form-control-lg" id="yourName" value="{{ Auth::user()->name }}" required>
					</div>
					<!-- Email -->
					<div class="mb-4 bg-light-input">
						<label for="emailInput" class="form-label">Correo *</label>
						<input name="email" type="email" class="form-control form-control-lg" id="emailInput" value="{{ Auth::user()->email }}" required>
					</div>
					<!-- Message -->
					<div class="mb-4 bg-light-input">
						<label for="textareaBox" class="form-label">Mensaje *</label>
						<textarea name="message" class="form-control" id="textareaBox" rows="4" required></textarea>
					</div>
					<!-- Button -->
					<div class="d-grid">
						<button class="btn btn-lg btn-primary mb-0" type="submit">Enviar</button>
					</div>	
				</form>
			</div>
			<!-- Contact form END -->
		</div>
	</div>
</section>
@endsection
