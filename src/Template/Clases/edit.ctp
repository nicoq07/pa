<style>
.container-clases { border:2px solid #ccc; width:100%; height: 300px; overflow-y: scroll; }

</style>
<div class="col-lg-6 col-lg-offset-3 well">
    <?= $this->Form->create($clase) ?>
    <fieldset>
        <legend><?= __('Editar clase') ?></legend>
        <?php
            echo $this->Form->control('operador_id', ['options' => $operador]);
            echo $this->Form->control('horario_id', ['options' => $horarios]);
            echo $this->Form->control('disciplina_id', ['options' => $disciplinas]);
            echo $this->Form->control('active',['label' => 'Activa']);
            //echo $this->Form->control('alumnos._ids', ['options' => $alumnos]);
            ?>  <div class="container-clases">
            
            <?php
            echo $this->Form->select('alumnos._ids', $alumnos, [
            		'multiple' => 'checkbox'
            		
	         ]);?>
	         </div> 
    
        <?= $this->Form->button(__('Guardar'),['class' => 'btn-lg btn-success']) ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>

