<?= $this->assign('title', 'Cargar seguimiento'); ?>
<div class="col-lg-4 col-lg-offset-4 panel">
	<div class="panel-info">
		<div class="panel-heading">
			<h3><?= __('Editar seguimiento') ?></h3>
		</div>
	    <?= $this->Form->create($seguimientosPrograma) ?>
	    <fieldset>
	       
	        <?php
	        echo $this->Form->control('observacion',['label' => 'Observación', 'onfocus' => "this.select()"]);
	        echo $this->Form->control('presente', ['type' => 'select', 'options' => $tiposPresentes]);
	        ?>
	    </fieldset>
	    <?= $this->Form->button('Guardar', ['class' => 'btn-lg btn-success']) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
