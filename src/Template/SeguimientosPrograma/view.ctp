<?= $this->assign('title', 'Vista de Seguimiento') ?>
<div align="center" class=" col-lg-5 col-lg-offset-3 panel panel-info">
	    <h3 class="panel-heading"><?= h("Seguimiento de " .$seguimientosPrograma->clases_alumno->alumno->presentacion) ?></h3>
	      <h4 class="panel-heading"><?= h($seguimientosPrograma->clases_alumno->clase->presentacion) ?></h4>
	    
	    	<div class = "col-lg-3 col-lg-offset-9 "> <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosPrograma->id],['class' => 'btn btn-warning']) ?> </div>
		   <div class = "col-lg-12 "><h4><?= h("Fecha: ")  . h($seguimientosPrograma->fecha->format('d-m-Y')) ?></h4></div>
		   <div class = "col-lg-12 "><h4><?=h("Presente: ") . h($seguimientosPrograma->presente)?></h4></div>
	    
	    <div class="col-lg-12 panel-body">
	        <h4><?= __('Observación') ?></h4>
	        <?= $this->Text->autoParagraph(h($seguimientosPrograma->observacion)); ?>
	    </div>
</div>