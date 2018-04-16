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
                ['action' => 'delete', $clasesAlumno->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clasesAlumno->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clases Alumnos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clasesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($clasesAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Clases Alumno') ?></legend>
        <?php
            echo $this->Form->control('alumno_id');
            echo $this->Form->control('clase_id', ['options' => $clases]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
