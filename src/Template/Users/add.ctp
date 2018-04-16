<?= $this->assign('title','Nuevo usuario')?>
 <div class="col-lg-5 col-lg-offset-2 panel">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Nuevo usuario') ?></legend>
        <?php
			echo $this->Text->autoParagraph("<b><em> Sí va a crear un usuario para un PROFESOR o un OPERADOR, los campos nombre y apellido no son necesarios.</em></b>");
            echo $this->Form->control('profesor_id', ['options' => $profesores,'id' => 'profesor_id' ,'empty' => true, 'onchange' => "$('#operador_id').attr('disabled',true)"]);
            echo $this->Form->control('operador_id', ['options' => $operadores,'id' => 'operador_id','empty' => true,'onchange' => "$('#profesor_id').attr('disabled',true)"]);
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('nombre_usuario');
            echo $this->Form->control('password');
            echo $this->Form->control('rol_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->control('active',['label' => 'Activo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear')) ?>
    <?= $this->Form->end() ?>
</div>
