<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ClasesAlumno $clasesAlumno
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clases Alumno'), ['action' => 'edit', $clasesAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clases Alumno'), ['action' => 'delete', $clasesAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clasesAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clases Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clases Alumno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clasesAlumnos view large-9 medium-8 columns content">
    <h3><?= h($clasesAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clase') ?></th>
            <td><?= $clasesAlumno->has('clase') ? $this->Html->link($clasesAlumno->clase->id, ['controller' => 'Clases', 'action' => 'view', $clasesAlumno->clase->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clasesAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alumno Id') ?></th>
            <td><?= $this->Number->format($clasesAlumno->alumno_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($clasesAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($clasesAlumno->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $clasesAlumno->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
