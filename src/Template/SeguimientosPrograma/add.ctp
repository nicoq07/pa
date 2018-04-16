<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Seguimientos Programa'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clases Alumnos'), ['controller' => 'ClasesAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clases Alumno'), ['controller' => 'ClasesAlumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="seguimientosPrograma form large-9 medium-8 columns content">
    <?= $this->Form->create($seguimientosPrograma) ?>
    <fieldset>
        <legend><?= __('Add Seguimientos Programa') ?></legend>
        <?php
            echo $this->Form->control('clase_alumno_id', ['options' => $clasesAlumnos, 'empty' => true]);
            echo $this->Form->control('observacion');
            echo $this->Form->control('presente');
            echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
