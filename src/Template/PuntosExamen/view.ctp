<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PuntosExaman $puntosExaman
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Puntos Examan'), ['action' => 'edit', $puntosExaman->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Puntos Examan'), ['action' => 'delete', $puntosExaman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $puntosExaman->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Puntos Examen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Puntos Examan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examenes'), ['controller' => 'Examenes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examene'), ['controller' => 'Examenes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['controller' => 'Calificaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificacione'), ['controller' => 'Calificaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="puntosExamen view large-9 medium-8 columns content">
    <h3><?= h($puntosExaman->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Examene') ?></th>
            <td><?= $puntosExaman->has('examene') ? $this->Html->link($puntosExaman->examene->id, ['controller' => 'Examenes', 'action' => 'view', $puntosExaman->examene->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($puntosExaman->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calificacione') ?></th>
            <td><?= $puntosExaman->has('calificacione') ? $this->Html->link($puntosExaman->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $puntosExaman->calificacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($puntosExaman->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nota') ?></th>
            <td><?= $this->Number->format($puntosExaman->nota) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($puntosExaman->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($puntosExaman->modified) ?></td>
        </tr>
    </table>
</div>
