 <div class="col-lg-4  col-lg-offset-2 index">
    <h3><?= __('Cursos por Profesor') ?></h3>
    <div class = "col-lg-12 separador">
 <?php echo $this->Form->create('',['id' => 'frmIndex', 'type' => 'post']); ?>
 	
 	 	<div class="col-lg-6 " > 
		 <?php
            echo $this->Form->control('profesor_id', ['options' => $profesores, 'empty' => 'Seleccione profesor...']);
            ?>
	</div>
 	<div class="col-lg-6 " > 
		 <?php
            echo $this->Form->label('Período');
            echo $this->Form->month('mes', ['type' => 'mob', 'empty' => 'Seleccione mes...','onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	</div>
<?php echo $this->Form->end(); ?>
 </div>
</div>