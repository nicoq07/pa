<div class="col-lg-5 col-lg-offset-2 panel">
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
