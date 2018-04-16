<div class="col-lg-6 col-lg-offset-2 well">
    <?= $this->Form->create($horario) ?>
    <fieldset>
         <legend><?= __('Nueva horario') ?></legend>
	        <?php
	            echo $this->Form->control('ciclolectivo_id', ['label' => 'Ciclo lectivo',  'options' => $ciclolectivo]);
	            echo $this->Form->control('nombre_dia',['label' => 'Día','options' => $dias, 'value' => $dias ,'empty' => false]);
	            echo $this->Form->control('hora',[ 'interval' => 30]);
	            echo $this->Form->control('active',['label' => 'Activo']);
	        ?>
	         <?= $this->Form->button(__('Guardar'),['class' => 'btn-lg btn-success']) ?>
    </fieldset>
   
    
   
    <?= $this->Form->end() ?>
</div>