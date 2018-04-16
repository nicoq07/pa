<div class="col-lg-6 col-lg-offset-3 panel">
    <?= $this->Form->create($calificacione) ?>
    <fieldset>
        <legend><?= __('Nueva calificación') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('valor');
            echo $this->Form->control('aprobado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
