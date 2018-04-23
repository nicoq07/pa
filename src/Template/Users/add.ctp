<?= $this->assign('title','Nuevo usuario')?>
 <div class="col-lg-5 col-lg-offset-3 panel panel-info">
   <div class="panel-heading"><h3><?= __('Nuevo usuario') ?></h3></div>
    <?= $this->Form->create($user) ?>
    <fieldset>
		 <div class="col-lg-12 alert alert-danger alert-dismissable"><?php  echo $this->Text->autoParagraph("<b><em> Sí va a crear un usuario para un operador, los campos nombre y apellido no son necesarios.</em></b>");?></div>
		<?php
		echo $this->Form->control('operador_id', ['options' => $operadores, 'empty' => 'Seleccione operador...']);
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
