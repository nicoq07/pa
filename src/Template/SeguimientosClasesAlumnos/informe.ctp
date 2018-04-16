<?= $this->assign('title', 'Informe de Seguimientos');?>
<script type="text/javascript">
function cambiarClase()
{
	$('#alumnos')
    .find('option')
    .remove()
    .end();
	document.getElementById("frmIndex").submit()
}
</script>
<div class="col-lg-5 col-lg-offset-2 panel">
		<div class="col-lg-12 separador">
		<?=  $this->Form->create($seg, ['id' => 'frmIndex', 'type' => 'post']);
			echo $this->Form->control('clases', ['options' => $clases, 'empty' => 'Seleccionar clase...','onchange'=>'cambiarClase()']);
			echo $this->Form->control('alumnos', ['options' => $alumnos, 'empty' => 'Seleccionar alumno...']);
		  ?>
		  <?= $this->Form->button(__('Descargar')) ?>
	    <?= $this->Form->end() ?>
	    </div>
</div>