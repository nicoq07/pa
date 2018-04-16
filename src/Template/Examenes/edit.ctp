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
                ['action' => 'delete', $examene->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examene->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Examenes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clases Alumnos'), ['controller' => 'ClasesAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clases Alumno'), ['controller' => 'ClasesAlumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examenes form large-9 medium-8 columns content">
    <?= $this->Form->create($examene) ?>
    <fieldset>
        <legend><?= __('Edit Examene') ?></legend>
        <?php
            echo $this->Form->control('clase_alumno_id', ['options' => $clasesAlumnos, 'empty' => true]);
            echo $this->Form->control('periodo');
            echo $this->Form->control('aprobado');
            echo $this->Form->control('calificacion');
            echo $this->Form->control('audioperceptiva');
            echo $this->Form->control('practica_ensamble');
            echo $this->Form->control('trabajos_practicos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
