<div class="col-lg-8 col-lg-offset-1 well">
     <h3><?= __('Disciplinas') ?></h3>
     <div class="col-lg-2 col-lg-offset-8">
     	 <?= $this->Html->link(__('Nuevo'), ['action' => 'add'],['class' => 'btn btn-success']) ?>
     </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active',['label' => 'Activa']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($disciplinas as $disciplina): ?>
            <tr>
                <td><?= h($disciplina->descripcion) ?></td>
                <td><?=$disciplina->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $disciplina->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $disciplina->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Baja'), ['action' => 'delete', $disciplina->id],['class' => 'btn-sm btn-danger','confirm' => __('Dar de baja {0}?', $disciplina->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('footer') ?>
</div>
