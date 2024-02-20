<form class="delete-form-fsc is-hidden" data-msj="<?php echo $tag_the.' '. strtolower($c_name) .' ha sido eliminad'. $tag_o .' correctamente.'; ?>">
{{csrf_field()}}
{{method_field('DELETE')}}
</form>