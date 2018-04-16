<div class="parametros form large-9 medium-8 columns content">
    <?= $this->Form->create($parametro) ?>
    <fieldset>
        <legend><?= __('Nuevo parámetro') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('valor');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
