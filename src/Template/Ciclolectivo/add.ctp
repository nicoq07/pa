<div class="col-lg-5 col-lg-offset-2 well">
    <?= $this->Form->create($ciclolectivo) ?>
    <fieldset>
        <legend><?= __('Nuevo ciclo lectivo') ?></legend>
        <?php
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active',['label' => 'Activa']);
        ?>
          <?= $this->Form->button(__('Guardar'),['class' => 'btn-lg btn-success']) ?>
    </fieldset>
  
    <?= $this->Form->end() ?>
</div>
