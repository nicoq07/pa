	&nbsp;
	<?= $this->assign('title', 'Cargar tarea'); ?>
<div class="col-lg-5 col-lg-offset-2 well">
    <?= $this->Form->create($gestorTarea) ?>
    <fieldset>
        <legend><?= __('Nueva tarea') ?></legend>
        <?php
            echo $this->Form->control('titulo',['label' => 'Título']);
            echo $this->Form->control('descripcion',['label' => 'Descripción']);
            echo $this->Form->control('prioridad_id', ['label' => 'Prioridad' ,  'options' => $gestorTareasPrioridad, 'empty' => true]);
           // echo $this->Form->control('fecha_vencimiento', ['empty' => true]);
            $this->Form->templates(
            ['dateWidget' => '{{day}}{{month}}{{year}}']
            );
            echo $this->Form->input('fecha_vencimiento', ['type'=>'date','label' => 'Fecha de Vencimiento']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar'),['class' => 'btn-xl btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
