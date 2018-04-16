<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Notificacione $notificacione
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notificacione'), ['action' => 'edit', $notificacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notificacione'), ['action' => 'delete', $notificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notificaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notificacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notificaciones view large-9 medium-8 columns content">
    <h3><?= h($notificacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($notificacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emisor') ?></th>
            <td><?= $this->Number->format($notificacione->emisor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receptor') ?></th>
            <td><?= $this->Number->format($notificacione->receptor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($notificacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leida') ?></th>
            <td><?= $notificacione->leida ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Broadcast') ?></th>
            <td><?= $notificacione->broadcast ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($notificacione->descripcion)); ?>
    </div>
</div>
