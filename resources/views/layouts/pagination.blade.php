<?php if($pagination['hasPages']){ ?>
<nav class="flex-pagination pagination is-rounded" aria-label="pagination">
	<p style="margin-right: 50px;" data-path="<?= $pagination['path'] ?>" data-perpage="<?= $pagination['per_page'] ?>">Mostrando del <?= $pagination['from'] ?> al <?= $pagination['to'] ?> de <?= $pagination['total'] ?> elementos</p>
	<?php if($pagination['current_page'] > 1){ ?>
	<a href="<?= $pagination['first_page_url'] ?>" class="pagination-previous">Anterior</a>
    <?php } ?>
	<?php if($pagination['current_page'] < $pagination['last_page']){ ?>
	<a href="<?= $pagination['last_page_url'] ?>" class="pagination-next">Siguiente</a>
	<?php } ?>
    <ul class="pagination-list">
        <?php if($pagination['current_page'] > 1){ ?>
		<li><a href="<?= !empty($pagination['prev_page_url'])?$pagination['prev_page_url']:'javascript:void(0)' ?>" class="pagination-link" aria-label="Goto page <?= $pagination['current_page']-1 ?>"><?= $pagination['current_page']-1 ?></a></li>
		<?php } ?>
		<li><a href="javascript:void(0)" class="pagination-link is-current" aria-label="Page <?= $pagination['current_page'] ?>" aria-current="page"><?= $pagination['current_page'] ?></a></li>
		<?php if($pagination['hasMorePages']){ ?>
		<?php if($pagination['current_page'] < $pagination['last_page']){ ?>
		<li><a href="<?= !empty($pagination['next_page_url'])?$pagination['next_page_url']:'javascript:void(0)' ?>" class="pagination-link" aria-label="Goto page <?= $pagination['current_page']+1 ?>"><?= $pagination['current_page']+1 ?></a></li>
		<?php } ?>
		<?php } ?>
    </ul>
</nav>
<?php } ?>