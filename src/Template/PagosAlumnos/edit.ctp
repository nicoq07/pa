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
                ['action' => 'delete', $pagosAlumno->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pagosAlumno->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($pagosAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Pagos Alumno') ?></legend>
        <?php
            echo $this->Form->control('alumno_id', ['options' => $alumnos]);
            echo $this->Form->control('monto');
            echo $this->Form->control('pagado');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
