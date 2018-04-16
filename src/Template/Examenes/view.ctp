<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Examene $examene
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examene'), ['action' => 'edit', $examene->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examene'), ['action' => 'delete', $examene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examene->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examenes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examene'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clases Alumnos'), ['controller' => 'ClasesAlumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clases Alumno'), ['controller' => 'ClasesAlumnos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examenes view large-9 medium-8 columns content">
    <h3><?= h($examene->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clases Alumno') ?></th>
            <td><?= $examene->has('clases_alumno') ? $this->Html->link($examene->clases_alumno->id, ['controller' => 'ClasesAlumnos', 'action' => 'view', $examene->clases_alumno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Periodo') ?></th>
            <td><?= h($examene->periodo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calificacion') ?></th>
            <td><?= h($examene->calificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Audioperceptiva') ?></th>
            <td><?= h($examene->audioperceptiva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Practica Ensamble') ?></th>
            <td><?= h($examene->practica_ensamble) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trabajos Practicos') ?></th>
            <td><?= h($examene->trabajos_practicos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examene->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aprobado') ?></th>
            <td><?= $this->Number->format($examene->aprobado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($examene->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($examene->modified) ?></td>
        </tr>
    </table>
</div>
