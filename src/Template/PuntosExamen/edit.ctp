<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $puntosExaman->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $puntosExaman->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Puntos Examen'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Examenes'), ['controller' => 'Examenes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examene'), ['controller' => 'Examenes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calificaciones'), ['controller' => 'Calificaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calificacione'), ['controller' => 'Calificaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="puntosExamen form large-9 medium-8 columns content">
    <?= $this->Form->create($puntosExaman) ?>
    <fieldset>
        <legend><?= __('Edit Puntos Examan') ?></legend>
        <?php
            echo $this->Form->control('examen_id', ['options' => $examenes]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('nota');
            echo $this->Form->control('calificacion_id', ['options' => $calificaciones, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
