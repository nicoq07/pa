<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="notas form large-9 medium-8 columns content">
    <?= $this->Form->create($nota) ?>
    <fieldset>
        <legend><?= __('Add Nota') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
