@extends('layouts.app')
@section('content')
<div class="account-wrapper">
    <div class="columns">
        <div class="column is-12">
            <form action="{{url($menu.'/'.$o->uuid)}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('PATCH')}}
			<div class="account-box is-form is-footerless">
                <div class="form-head stuck-header">
                    <div class="form-head-inner">
                        <div class="left">
                            <h3>{{$title}}</h3>
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
                                <button type="submit" class="button h-button is-primary is-raised">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <!--Fieldset-->
                    <div class="fieldset">
                        <div class="fieldset-heading">
                            <h4>Complete los campos requeridos</h4>
                            <p></p>
                        </div>
                        <div class="columns is-multiline">
                            @include($menu.'.form',['modo' => 'editar'])
                        </div>
                    </div>
                </div>
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