<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pagos Conceptos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Alumnos'), ['controller' => 'PagosAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Alumno'), ['controller' => 'PagosAlumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosConceptos form large-9 medium-8 columns content">
    <?= $this->Form->create($pagosConcepto) ?>
    <fieldset>
        <legend><?= __('Add Pagos Concepto') ?></legend>
        <?php
            echo $this->Form->control('pago_alumno_id', ['options' => $pagosAlumnos]);
            echo $this->Form->control('cantidad');
            echo $this->Form->control('monto');
            echo $this->Form->control('detalle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
