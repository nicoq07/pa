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
                ['action' => 'delete', $gestorTareasPrioridad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gestorTareasPrioridad->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Gestor Tareas Prioridad'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gestorTareasPrioridad form large-9 medium-8 columns content">
    <?= $this->Form->create($gestorTareasPrioridad) ?>
    <fieldset>
        <legend><?= __('Edit Gestor Tareas Prioridad') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('valor');
            echo $this->Form->control('color');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
