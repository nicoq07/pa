<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Parametro $parametro
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parametro'), ['action' => 'edit', $parametro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parametro'), ['action' => 'delete', $parametro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parametro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parametros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parametro'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parametros view large-9 medium-8 columns content">
    <h3><?= h($parametro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($parametro->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($parametro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $parametro->valor ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($parametro->descripcion)); ?>
    </div>
</div>
