<?= $this->assign('title', 'Vista de Seguimiento') ?>
<div align="center" class=" col-lg-5 col-lg-offset-2 panel panel-default">
	    <h3 class="panel-heading"><?= h("Seguimiento de " .$seguimientosPrograma->clases_alumno->alumno->presentacion) ?></h3>
	      <h4 class="panel-heading"><?= h($seguimientosPrograma->clases_alumno->clase->presentacion) ?></h4>
	    
	    
	    
	    <div class="col-lg-12">
	    	 <?= $this->Html->link(__('Edit'), ['action' => 'edit', $seguimientosPrograma->id],['class' => 'btn btn-warning']) ?>
		   <div class = "col-lg-4 "><?= h("Fecha: ")  . h($seguimientosPrograma->fecha->format('d-m-Y')) ?></div>
		   <div class = "col-lg-4 "><?=h("Presente: ")?><?=  $seguimientosPrograma->presente ? __('Sí') : __('No'); ?></div>
	    </div>
	    
	    <div class="col-lg-12 panel-body">
	        <h4><?= __('Observación') ?></h4>
	        <?= $this->Text->autoParagraph(h($seguimientosPrograma->observacion)); ?>
	    </div>
</div>