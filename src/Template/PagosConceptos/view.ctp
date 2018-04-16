<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PagosConcepto $pagosConcepto
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagos Concepto'), ['action' => 'edit', $pagosConcepto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pagos Concepto'), ['action' => 'delete', $pagosConcepto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosConcepto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Conceptos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Concepto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['controller' => 'PagosAlumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['controller' => 'PagosAlumnos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pagosConceptos view large-9 medium-8 columns content">
    <h3><?= h($pagosConcepto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pagos Alumno') ?></th>
            <td><?= $pagosConcepto->has('pagos_alumno') ? $this->Html->link($pagosConcepto->pagos_alumno->id, ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosConcepto->pagos_alumno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detalle') ?></th>
            <td><?= h($pagosConcepto->detalle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pagosConcepto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($pagosConcepto->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($pagosConcepto->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pagosConcepto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pagosConcepto->modified) ?></td>
        </tr>
    </table>
</div>
