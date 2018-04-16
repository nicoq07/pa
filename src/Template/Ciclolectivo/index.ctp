<div class="col-lg-8 col-lg-offset-1 well">
    <h3><?= __('Ciclos Lectivos') ?></h3>
     <div class="col-lg-2 col-lg-offset-8">
     	 <?= $this->Html->link(__('Nuevo'), ['action' => 'add'],['class' => 'btn btn-success pull-right']) ?>
     </div>
    <table class= "table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciclolectivo as $ciclolectivo): ?>
            <tr>
                <td><?= h($ciclolectivo->fecha_inicio->format('d/m/Y')) ?></td>
                <td><?= h($ciclolectivo->fecha_fin->format('d/m/Y')) ?></td>
                <td><?= h($ciclolectivo->descripcion) ?></td>
                <td><?= $ciclolectivo->active ? h("Sí") : h("No")?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $ciclolectivo->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ciclolectivo->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Baja'), ['action' => 'delete', $ciclolectivo->id], ['class' => 'btn-sm btn-danger' ,'confirm' => __('Borrar ciclo {0}?', $ciclolectivo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <?= $this->element('footer') ?>
</div>
