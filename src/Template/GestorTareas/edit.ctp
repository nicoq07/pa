<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gestorTarea->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gestorTarea->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Gestor Tareas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Gestor Tareas Prioridad'), ['controller' => 'GestorTareasPrioridad', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gestor Tareas Prioridad'), ['controller' => 'GestorTareasPrioridad', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gestorTareas form large-9 medium-8 columns content">
    <?= $this->Form->create($gestorTarea) ?>
    <fieldset>
        <legend><?= __('Edit Gestor Tarea') ?></legend>
        <?php
            echo $this->Form->control('titulo');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('prioridad_id', ['options' => $gestorTareasPrioridad, 'empty' => true]);
            echo $this->Form->control('fecha_vencimiento', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
