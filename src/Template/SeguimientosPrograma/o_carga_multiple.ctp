<div class="col-lg-6  col-lg-offset-3 panel panel-info">
	<div class="col-lg-12 panel-heading ">
	<h3 style="text-align: center;"><?php echo h(date('d-m-Y',strtotime($fecha))); ?></h3>
	<h3 style="text-align: center;"><?php echo h($clase->presentacionCorta); ?></h3>
	</div>
	<?= $this->assign('title', 'Cargar seguimiento'); ?>
	<?php foreach ($seguimientos as $seg) {?>
	<div class="col-lg-12 panel">
	    <?= $this->Form->create($seg) ?>
	    <fieldset>
	        <legend><?= __('Cargar seguimiento de ' . $seg->clases_alumno->alumno->presentacion) ?></legend>
	        <?php
	        	echo $this->Form->control('id',['type' => 'hidden']);
	        	echo $this->Form->control('observacion',['label' => 'Observación', 'onfocus' => "this.select()"]);
	            echo $this->Form->control('presente');
	        ?>
	    </fieldset>
	    <?= $this->Form->button('Guardar', ['class' => 'btn-lg btn-block btn-success']) ?>
	    <?= $this->Form->end() ?>
	</div>
	<?php } ?>




</div>