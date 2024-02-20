	@if (Session::has('msj_success'))
	<div class="message is-success alert-remove-fsc mt-5">
		<a class="delete"></a>
		<div class="message-body">{{ session('msj_success') }}</div>
	</div>
	@endif
	@if (Session::has('msj_error'))
	<div class="message is-danger alert-remove-fsc mt-5">
		<a class="delete"></a>
		<div class="message-body">{{ session('msj_error') }}</div>
	</div>
	@endif