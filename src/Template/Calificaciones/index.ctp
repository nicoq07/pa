<div class="calificaciones index large-9 medium-8 columns content">
    <h3><?= __('Calificaciones') ?></h3>
    <div class="col-lg-3 col-lg-offset-11"> <?= $this->Html->link(__('Nueva'), ['action' => 'add'],['class' => 'btn btn-success']) ?> </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aprobado',['label' => 'Aprueba']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calificaciones as $calificacione): ?>
            <tr>
                <td><?= h($calificacione->nombre) ?></td>
                <td><?= $this->Number->format($calificacione->valor) ?></td>
                <td><?= $calificacione->aprobado ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calificacione->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calificacione->id], ['class' => 'btn-sm btn-danger','confirm' => __('Borrar?', $calificacione->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
