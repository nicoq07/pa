<div class="calificaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($calificacione) ?>
    <fieldset>
        <legend><?= __('Editar calificación') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('valor');
            echo $this->Form->control('aprobado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
