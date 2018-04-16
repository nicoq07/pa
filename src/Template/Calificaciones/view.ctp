<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Calificacione $calificacione
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calificacione'), ['action' => 'edit', $calificacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calificacione'), ['action' => 'delete', $calificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calificacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calificaciones view large-9 medium-8 columns content">
    <h3><?= h($calificacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($calificacione->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($calificacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($calificacione->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aprobado') ?></th>
            <td><?= $this->Number->format($calificacione->aprobado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($calificacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($calificacione->modified) ?></td>
        </tr>
    </table>
</div>
