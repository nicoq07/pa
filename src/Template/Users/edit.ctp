<div class="col-lg-8 col-lg-offset-2 panel">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('profesor_id',['options' => $profesores, 'empty' => true]);
            echo $this->Form->control('operador_id',['options' => $operadores, 'empty' => true]);
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('nombre_usuario');
            echo $this->Form->control('password');
            echo $this->Form->control('rol_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
