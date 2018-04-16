<div class="col-lg-9 col-lg-offset-1 well well-sm">
    <h3><?= __('Operadores') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nro_documento',['label'=>'DNI']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cuit',['label'=>'CUIT']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono',['label'=>'Tel. Fijo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active',['label'=>'Activo']) ?></th>
                <th width="15%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operadores as $operadore): ?>
            <tr>
                <td><?= h($operadore->apellido) ?></td>
                <td><?= h($operadore->nombre) ?></td>
                <td><?= h($operadore->nro_documento) ?></td>
                <td><?= h($operadore->email) ?></td>
                <td><?= h($operadore->cuit) ?></td>
                <td><?= h($operadore->telefono) ?></td>
                <td><?= h($operadore->celular) ?></td>
               
                <td><?= $operadore->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $operadore->id ],[ 'class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $operadore->id],[ 'class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Baja'), ['action' => 'baja', $operadore->id], ['class' => 'btn-sm btn-danger', 'confirm' => __('Vas a dar de baja a {0}?', $operadore->nombre)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('footer') ?>
 </div>
 
   

  