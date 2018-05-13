<div class="col-lg-8 col-lg-offset-2 panel">
    <h3><?= __('Usuarios') ?></h3>
    <table>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre_usuario',['label' => 'Nombre de usuario']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('rol_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->apellido) ?></td>
                <td><?= h($user->nombre_usuario) ?></td>
                <td><?= $user->has('role') ? $this->Html->link($user->role->descripcion, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                <td><?= $user->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Desactivar'), ['action' => 'desactivar', $user->id], ['confirm' => __('Quitar acceso?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<?= $this->element('footer');?>
</div>
