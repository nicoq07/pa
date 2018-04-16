<?= $this->assign('title', 'Nueva');?>
<div class="col-lg-8 col-lg-offset-1 well">
    <?= $this->Form->create($notificacione) ?>
    <fieldset>
        <legend><?= __('Enviar mensaje') ?></legend>
        <?php
            echo $this->Form->input('descripcion', ['label' => 'Mensaje' ]);
            // echo $this->Form->input('emisor', ['options' => $users]);
            echo $this->Form->input('receptor', ['options' => $users]);
            // echo $this->Form->input('leida');
            if ($current_user['rol_id'] === ADMINISTRADOR)
            {
             echo $this->Form->input('broadcast', ['label' => 'Enviar a todos' ]);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'),['class' => 'btn-lg btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
