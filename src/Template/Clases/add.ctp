<style>
.container-clases { border:2px solid #ccc; width:100%; height: 400px; overflow-y: scroll; }

</style>
<div class="col-lg-6 col-lg-offset-2 well">
    <?= $this->Form->create($clase) ?>
    <fieldset>
        <legend><?= __('Nueva clase ' .$tipo) ?></legend>
        <?php
      
            echo $this->Form->control('profesor_id', ['options' => $profesores]);
            if ($this->request->params['action'] == 'addPrograma')
            {
	            echo $this->Form->control('programa_adolescencia',['label' => 'Programa Adolescencia']);
	            echo $this->Form->control('operador_id', ['id' => 'operador_id','options' => $operadores,'empty' => true]);
            }
            echo $this->Form->control('horario_id', ['options' => $horarios]);
            echo $this->Form->control('disciplina_id', ['options' => $disciplinas]);
            echo $this->Form->control('active',['label' => 'Activa']);
            //echo $this->Form->control('alumnos._ids', ['options' => $alumnos]);
          ?>  
          <div class="container-clases">
            
            <?php
            echo $this->Form->select('alumnos._ids', $alumnos, [
            		'multiple' => 'checkbox' ]);?>
	        </div> 
     
    </fieldset>
     <div class="col-lg-12">
      	      <?= $this->Form->button(__('Guardar'),['class' => 'btn-lg btn-success']) ?>
      </div>
    <?= $this->Form->end() ?>
</div>
