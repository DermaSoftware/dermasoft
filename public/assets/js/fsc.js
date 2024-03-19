$(document).ready(function(){
	if($('.btn-delete-confirm').length){
		$('.btn-delete-confirm').on('click',function(e){
			e.preventDefault();
			const trash = $(this);
			const url_trash = trash.data('href');
			swal({
				title: 'Estás seguro(a) que deseas eliminar '+trash.data('itemtag').toLowerCase()+' '+trash.data('nameitem').toLowerCase()+' seleccionad'+trash.data('itemselect')+'?',
				text: "Esta acción es irreversible!",
				icon: "warning",
				buttons: ["Cancelar", "Si, eliminar!"],
				dangerMode: true,
				cancelButtonColor: '#d33'
			}).then(function (willConfirm) {
				if(willConfirm){
					let params = {_token: $("meta[name='csrf-token']").attr("content"),_method: 'DELETE'};
					$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						url: url_trash,
						data: params,
						processData: false,
						contentType: false,
						dataType: "json",
						type: 'DELETE',
						beforeSend: function () {},
						complete: function () {},
						success: function (data) {
							if(data.response == 'ok'){
								swal(
								  'Enhorabuena!',
								  $('form.delete-form-fsc').data('msj'),
								  'success'
								);
								//table_ajax.ajax.reload(null,false);
								const tr = trash.parent().parent().parent().parent().parent();
								tr.remove();
							}
						},
						error: function (jqXHR) {
							console.log("ERROR FSC:",jqXHR);
						}
					});
				}
			});
		});
	}
	//
	if($('.alert-remove-fsc').length){
		setInterval(function(){ $('.alert-remove-fsc').remove(); }, 8000);
	}
	
	if($('.btn_plan_price_epayco').length){
		$('.btn_plan_price_epayco').on('click',function(e){
			e.preventDefault();
			var btn_item = $(this);
			btn_item.parent().parent().find('.epayco-button-render').click();
		});
	}
	
	if($('.btn_access_fsc').length){
		$('.btn_access_fsc').each(function(i,v){
			var btn_item = $(this);
			btn_item.on('click',function(e){
				e.preventDefault();
				$('#preloader').removeClass('preloader-hide');
				$.post(btn_item.data('url'), {
                    _token: $("meta[name='csrf-token']").attr("content"),
                    page: btn_item.data('page')
                }, function(data) {
					if(data == 'La pagina solicitada no existe' || data == 'No tiene una suscripción activa' || data == 'No se ha podido completar el registro'){
						swal('Lo sentimos!',data,'error');
						$('#preloader').addClass('preloader-hide');
					} else {
						//window.open(data,'_blank');
						location.href = data;
						//$('#preloader').addClass('preloader-hide');
					}
				}, "html");
			});
		});
	}
	
	if($('.btn_noplan_fsc').length){
		$('.btn_noplan_fsc').each(function(i,v){
			var btn_item = $(this);
			btn_item.on('click',function(e){
				e.preventDefault();
				const msj = btn_item.hasClass('btn_next_dev')?'Este botón no se encuentra disponible hasta próximo aviso':'Debe pagar una membresía para acceder a los beneficios';
				swal('Lo sentimos!',msj,'warning');
			});
		});
	}
	
	if($('.btn_noplanlimit_fsc').length){
		$('.btn_noplanlimit_fsc').each(function(i,v){
			var btn_item = $(this);
			btn_item.on('click',function(e){
				e.preventDefault();
				swal('Lo sentimos!','La membresía no tiene incluido el acceso solicitado','warning');
			});
		});
	}
	
	if($('.btn_slider_link_fsc').length){
		$('.btn_slider_link_fsc').each(function(i,v){
			var btn_item = $(this);
			btn_item.on('click',function(e){
				e.preventDefault();
				if(btn_item.hasClass('link_noplanlimit_fsc')){
					swal('Lo sentimos!','La membresía no tiene incluido el acceso solicitado','warning');
				} else if(btn_item.hasClass('link_noplan_fsc')){
					const msj = btn_item.hasClass('link_next_dev')?'Este botón no se encuentra disponible hasta próximo aviso':'Debe pagar una membresía para acceder a los beneficios';
					swal('Lo sentimos!',msj,'warning');
				} else if(btn_item.hasClass('link_access_fsc')){
					$('#preloader').removeClass('preloader-hide');
					$.post(btn_item.data('url'), {
						_token: $("meta[name='csrf-token']").attr("content"),
						page: btn_item.data('page'),
						linkp: btn_item.data('href')
					}, function(data) {
						if(data == 'La pagina solicitada no existe' || data == 'No tiene una suscripción activa' || data == 'No se ha podido completar el registro'){
							swal('Lo sentimos!',data,'error');
							$('#preloader').addClass('preloader-hide');
						} else {
							location.href = data;
						}
					}, "html");
				}
			});
		});
	}
	
	if($('.money_to_fsc').length){
		$('.money_to_fsc').each(function(){
			var item = $(this);
			item.html(moneycop(item.html()));
		});
	}
	
	function moneycop(v){
		const options2 = { style: 'currency', currency: 'COP' };
		const numberFormat2 = new Intl.NumberFormat('es-CO', options2);
		return numberFormat2.format(v);
	}
});