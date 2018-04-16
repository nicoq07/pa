<div class="col-lg-8 col-lg-offset-1 well">
    <h3><?= __('Horarios') ?></h3>
    <div class="col-lg-10 ">
    	<div class="col-lg-3 col-lg-offset-11">
    	      <?= $this->Html->link(__('Nuevo'), ['action' => 'add'],  ['class' => 'btn btn-success']) ?>
    	</div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ciclolectivo_id',['label' => 'Ciclo Lectivo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_dia',['label' => 'Día']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora',['label' => 'Hora']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active',['label' => 'Activo']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horarios as $horario): ?>
            <tr>
                <td><?= $horario->has('ciclolectivo') ? $this->Html->link($horario->ciclolectivo->descripcion, ['controller' => 'Ciclolectivo', 'action' => 'view', $horario->ciclolectivo->id]) : '' ?></td>
                <td><?=__($horario->nombre_dia)?></td>
                <td><?= h($horario->hora->format('H:i')) ?></td>
                <td><?= $horario->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $horario->id],  ['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $horario->id],  ['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $horario->id], ['class' => 'btn-sm btn-danger', 'confirm' => __('Borrar el horario de  {0}?', $horario->presentacion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <?= $this->element('footer') ?>
</div>
