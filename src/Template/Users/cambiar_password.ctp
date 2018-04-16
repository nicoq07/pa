<div class="col-lg-4 col-lg-offset-3 panel">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Cambiar contraseña') ?></legend>
        <?php
            echo $this->Form->control('password',['value' => '','label' => 'Contraseña nueva']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Cambiar')) ?>
    <?= $this->Form->end() ?>
</div>
