@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/'.$o->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>Ticket de soporte</h3>
                            <p><?= $o->title ?></p>
							@if ($errors->any())
							<div class="message is-danger">
								<a class="delete"></a>
								<div class="message-body">
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</ul>
								</div>
							</div>
							@endif
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <a href="{{url($menu)}}" class="button h-button is-light is-dark-outlined">
                                    <span class="icon"><i class="lnir lnir-arrow-left rem-100"></i></span><span>Regresar</span>
                                </a>
								<?php if($o->status != 'Finalizado'){ ?>
                                <button type="submit" class="button h-button is-primary is-raised">Responder</button>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php if($o->status != 'Finalizado'){ ?>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Información del ticket</h4>
                            <p></p>
                        </div>
                        <div class="columns is-multiline">
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <input name="title" type="text" class="input" placeholder="Asunto" value="{{ old('title') }}" required>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <textarea name="description" class="textarea" rows="4" placeholder="Ingrese el mensaje" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!--Field-->
                            <div class="column is-12">
                                <div class="field">
                                    <div class="control">
                                        <input name="file" type="file" class="input" accept="image/*" placeholder="Archivo">
										<small>Adjuntar solo imagenes (JPG, PNG, GIF)</small>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
				<?php } ?>
            </div>
			</form>
        </div>

    </div>
</div>
				<?php if($o_all->count() > 0){ ?>
				<?php $tag_file = 'file'; ?>
				<?php foreach($o_all as $key => $row){ ?>
				<?php if($key > 0){ ?><hr><?php } ?>
				<div class="content">
					<div class="card h-card">
                        <header class="card-header">
                            <div class="card-header-title">
                                <?= $row->title ?>
                            </div>
                        </header>
                        <div class="card-content">
                            <div class="media-flex p-b-10">
                                <div class="h-avatar is-medium">
                                    <?php $photo = $row->getUser()->photo; ?>
									<img class="avatar is-squared" src="<?= !empty($photo)?$photo:'https://via.placeholder.com/150x150' ?>" data-demo-src="<?= !empty($photo)?$photo:'https://via.placeholder.com/150x150' ?>" alt="" data-user-popover="17">
                                </div>
                                <div class="flex-meta">
                                    <span><?= $row->getUser()->name ?></span>
                                    <span><?= $row->description ?></span>
                                    <span><a class="text-twitter" href="javascript:void(0)"><?= $row->date_init ?></a>.</span>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <?php if(!empty($row->$tag_file)){ ?><img src="<?= $row->$tag_file ?>" class="img-fluid rounded-s mb-2"><?php } ?>
                        </footer>
                    </div>
				</div>
				<?php } ?>
				<?php } ?>
@endsection