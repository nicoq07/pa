<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\GestorTarea $gestorTarea
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gestor Tarea'), ['action' => 'edit', $gestorTarea->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gestor Tarea'), ['action' => 'delete', $gestorTarea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestorTarea->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gestor Tareas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gestor Tarea'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gestor Tareas Prioridad'), ['controller' => 'GestorTareasPrioridad', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gestor Tareas Prioridad'), ['controller' => 'GestorTareasPrioridad', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gestorTareas view large-9 medium-8 columns content">
    <h3><?= h($gestorTarea->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($gestorTarea->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($gestorTarea->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gestor Tareas Prioridad') ?></th>
            <td><?= $gestorTarea->has('gestor_tareas_prioridad') ? $this->Html->link($gestorTarea->gestor_tareas_prioridad->id, ['controller' => 'GestorTareasPrioridad', 'action' => 'view', $gestorTarea->gestor_tareas_prioridad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gestorTarea->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Vencimiento') ?></th>
            <td><?= h($gestorTarea->fecha_vencimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gestorTarea->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gestorTarea->modified) ?></td>
        </tr>
    </table>
</div>
