<div class="col-lg-6 col-lg-offset-3 panel panel-info">
	<div  class="col-lg-12 panel-heading">  <h3><?= __('Nuevo seguimiento') ?></h3></div>
	<div  class="col-lg-12 alert alert-danger"> <?= h("ATENCIÓN : Esta opción debe usarse solamente cuando el seguimiento no se encuentra ya generado en VER SEGUIMIENTOS."); ?></div>
		<div  class="col-lg-12 panel-body">  
    <?= $this->Form->create($seguimientosPrograma) ?>
      
        <?php
            echo $this->Form->control('clase_alumno_id', ['options' => $clasesAlumnos, 'empty' => true,'label' => 'Alumno','required']);
            echo $this->Form->control('observacion',['required','label' => 'Observación']);
            echo $this->Form->control('presente', ['options' => $tiposPresentes, 'empty' => false]);
            $this->Form->templates(
                ['dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}']
                );
            echo $this->Form->control('fecha', ['false' => true,'label' => 'Fecha (sólo se requieren los primeros TRES campos)']);
        ?>
    <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-lg btn-success btn-block','confirm' => 'VA A CARGAR ESTE SEGUIMIENTO. YA REVISÓ VER SEGUIMIENTOS?']) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
