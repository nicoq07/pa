<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PagosConcepto[]|\Cake\Collection\CollectionInterface $pagosConceptos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pagos Concepto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['controller' => 'PagosAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['controller' => 'PagosAlumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosConceptos index large-9 medium-8 columns content">
    <h3><?= __('Pagos Conceptos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pago_alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('detalle') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagosConceptos as $pagosConcepto): ?>
            <tr>
                <td><?= $this->Number->format($pagosConcepto->id) ?></td>
                <td><?= $pagosConcepto->has('pagos_alumno') ? $this->Html->link($pagosConcepto->pagos_alumno->id, ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosConcepto->pagos_alumno->id]) : '' ?></td>
                <td><?= $this->Number->format($pagosConcepto->cantidad) ?></td>
                <td><?= $this->Number->format($pagosConcepto->monto) ?></td>
                <td><?= h($pagosConcepto->detalle) ?></td>
                <td><?= h($pagosConcepto->created) ?></td>
                <td><?= h($pagosConcepto->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagosConcepto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagosConcepto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagosConcepto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosConcepto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
