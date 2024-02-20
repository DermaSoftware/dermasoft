@extends('layouts.app')
@section('content')
<div class="control has-icon">
    <input class="input custom-text-filter" placeholder="Filtrar..." data-filter-target=".column">
    <div class="form-icon">
        <i data-feather="search"></i>
    </div>
</div>
<br>
<div class="columns is-multiline">
    <?php foreach($o_all as $key => $row){ ?>
	<!--Grid item-->
    <div class="column is-4">
        <a target="_blank" href="<?= $row->url ?>" class="card-grid-item">
            <div class="fsc-container">
				<iframe class="fsc-responsive-iframe" src="<?= $row->url ?>"></iframe>
			</div>
			<div class="card-grid-item-footer">
                <div class="meta">
                    <span class="dark-inverted" data-filter-match=""><?= $row->name ?></span>
                    <span><?= $row->created_at ?></span>
                </div>
            </div>
			<p><?= $row->description ?></p>
        </a>
    </div>
	<?php } ?>

</div>
@endsection