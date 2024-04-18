@extends('layouts.app')
@section('content')
<h1 class="title is-3"><?= $title ?></h1>
<?php if($o_all->count() > 0){ ?>
<?php foreach($o_all as $key => $row){ ?>
<?php $nk = $key + 1; ?>
<div class="collapse has-plus">
    <div class="collapse-header"><h3><?= $nk ?>. <?= $row->name ?></h3><div class="collapse-icon"><i data-feather="plus"></i></div></div>
    <div class="collapse-content"><p><?= $row->description ?></p></div>
</div>
<?php } ?>
<?php } ?>
@endsection