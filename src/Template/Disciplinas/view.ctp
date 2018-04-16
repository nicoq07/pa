<div class="col-lg-8 col-lg-offset-1 well">
    <h3><?= h($disciplina->descripcion) ?></h3>
    <div class="related">
        <h4><?= __('Clases en esta disciplina') ?></h4>
        <?php if (!empty($disciplina->clases)): ?>
        <table class="table table-striped">
            <tr>
                <th scope="col"><?= __('Detalle') ?></th>
                <th scope="col"><?= __('Activa') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($disciplina->clases as $clases): ?>
            <tr>
                <td><?= h($clases->presentacion) ?></td>
                <td><?= $clases->active ?  h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Clases', 'action' => 'view', $clases->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Clases', 'action' => 'edit', $clases->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Clases', 'action' => 'delete', $clases->id],['class' => 'btn-sm btn-danger','confirm' => __('Dar de baja esta clase {0}?', $clases->presentacion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
