<div class="col-lg-5  col-lg-offset-2 panel">
	<div class="col-lg-12 panel-heading panel-info">
	<h3 style="text-align: center;"><?php echo h(date('d-m-Y',strtotime($fecha))); ?></h3>
	<h3 style="text-align: center;"><?php echo h($clase->presentacionCorta); ?></h3>
	</div>
	<?= $this->assign('title', 'Cargar seguimiento'); ?>
	<?php foreach ($seguimientosClasesAlumnos as $seg) {?>
	<div class="col-lg-12 panel">
	    <?= $this->Form->create($seg) ?>
	    <fieldset>
	        <legend><?= __('Cargar seguimiento de ' . $seg->clases_alumno->alumno->presentacion) ?></legend>
	        <?php
	        	echo $this->Form->control('id',['type' => 'hidden']);
	        	echo $this->Form->control('observacion',['label' => 'Observación', 'onfocus' => "this.select()"]);
	            echo $this->Form->control('presente');
	            echo $this->Form->control('calificacion_id', ['label' => 'Calificación', 'options' => $calificaciones, 'empty' => true]);
	        ?>
	    </fieldset>
	    <?= $this->Form->button('Guardar', ['class' => 'btn-lg btn-success']) ?>
	    <?= $this->Form->end() ?>
	</div>
	<?php } ?>




</div>