<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PuntosExaman[]|\Cake\Collection\CollectionInterface $puntosExamen
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Puntos Examan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examenes'), ['controller' => 'Examenes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examene'), ['controller' => 'Examenes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['controller' => 'Calificaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calificacione'), ['controller' => 'Calificaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="puntosExamen index large-9 medium-8 columns content">
    <h3><?= __('Puntos Examen') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('examen_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nota') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calificacion_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($puntosExamen as $puntosExaman): ?>
            <tr>
                <td><?= $this->Number->format($puntosExaman->id) ?></td>
                <td><?= $puntosExaman->has('examene') ? $this->Html->link($puntosExaman->examene->id, ['controller' => 'Examenes', 'action' => 'view', $puntosExaman->examene->id]) : '' ?></td>
                <td><?= h($puntosExaman->descripcion) ?></td>
                <td><?= $this->Number->format($puntosExaman->nota) ?></td>
                <td><?= h($puntosExaman->created) ?></td>
                <td><?= h($puntosExaman->modified) ?></td>
                <td><?= $puntosExaman->has('calificacione') ? $this->Html->link($puntosExaman->calificacione->id, ['controller' => 'Calificaciones', 'action' => 'view', $puntosExaman->calificacione->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $puntosExaman->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $puntosExaman->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $puntosExaman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $puntosExaman->id)]) ?>
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
