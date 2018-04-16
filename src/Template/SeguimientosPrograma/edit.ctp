<?= $this->assign('title', 'Cargar seguimiento'); ?>
<div class="col-lg-5 col-lg-offset-2 panel">
    <?= $this->Form->create($seguimientosPrograma) ?>
    <fieldset>
        <legend><?= __('Editar seguimiento') ?></legend>
        <?php
        echo $this->Form->control('observacion',['label' => 'Observación', 'onfocus' => "this.select()"]);
            echo $this->Form->control('presente');
        ?>
    </fieldset>
    <?= $this->Form->button('Guardar', ['class' => 'btn-lg btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
