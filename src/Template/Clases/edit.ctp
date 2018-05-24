<style>
.container-clases { border:2px solid #ccc; width:100%; height: 300px; overflow-y: scroll; }

</style>
<div class="col-lg-6 col-lg-offset-3 well">
    <?= $this->Form->create($clase) ?>
    <fieldset>
        <legend><?= __('Editar clase') ?></legend>
        <?php
            echo $this->Form->control('operador_id', ['options' => $operadores]);
            echo $this->Form->control('profesor_id', ['options' => $profesores]);
            echo $this->Form->control('horario_id', ['options' => $horarios]);
            echo $this->Form->control('disciplina_id', ['options' => $disciplinas]);
            echo $this->Form->control('active',['label' => 'Activa']);
            ?>  
             <div class='col-lg-12'><span><?php  echo h('Alumnos');?></span></div>
            <?php foreach ($clase->alumnos as $alumno) :?>
            <div class='col-lg-12'>
			<div class='col-lg-6'>
				<?= h($alumno->presentacion);?>
			</div>
			<div class='col-lg-3'>
			 <?= $this->Html->link(__('Tranferir de Clase'), ['controller' => 'Alumnos', 'action' => 'transferirClase', $alumno->id,$clase->id],  ['class' => 'btn-sm btn-primary']) ?>
			</div>
			<div class='col-lg-3'>
			  <?= $this->Form->postLink(__('Quitar de la clase'),['action' => 'desactivarClaseAlumno', $alumno->id,$clase->id],['class' => 'btn-sm btn-danger','confirm' => __('Quitar de la clase a {0}?', $alumno->presentacion)]) ?>
			</div>
			
			&nbsp;
			</div> 
			<?php endforeach; ?>
    
        <?= $this->Form->button(__('Guardar'),['class' => 'btn-lg btn-success']) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>

