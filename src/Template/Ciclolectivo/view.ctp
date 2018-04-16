<div class="col-lg-8 col-lg-offset-1 well">
    <h3><?= h($ciclolectivo->descripcion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($ciclolectivo->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($ciclolectivo->fecha_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $ciclolectivo->active ? __('Sí') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Horarios en este ciclo') ?></h4>
        <?php if (!empty($ciclolectivo->horarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Dia') ?></th>
                <th scope="col"><?= __('Hora') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ciclolectivo->horarios as $horarios): ?>
            <tr>
                <td><?= h($horarios->nombre_dia) ?></td>
                <td><?= h($horarios->hora) ?></td>
                <td><?= $horarios->active ? __('Sí') : __('No');?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Horarios', 'action' => 'view', $horarios->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Horarios', 'action' => 'edit', $horarios->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Baja'), ['controller' => 'Horarios', 'action' => 'delete', $horarios->id], ['class' => 'btn-sm btn-danger','confirm' => __('Dar de baja {0}?', $horarios->presentacion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
