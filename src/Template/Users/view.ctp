<div class="col-lg-6 col-lg-offset-2 panel panel-default">
    <h3 class="panel-heading"><?= h($user->presentacion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($user->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($user->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Usuario') ?></th>
            <td><?= h($user->nombre_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->descripcion, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created->format('d/m/Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified->format('d/m/Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Si') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Pagos recibidos') ?></h4>
        <?php if (!empty($user->pagos_alumnos)): ?>
        <table>
            <tr>
                <th scope="col"><?= __('Alumno Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($user->pagos_alumnos as $pagosAlumnos): ?>
            <tr>
                <td><?= h($pagosAlumnos->alumno_id) ?></td>
                <td><?= h($pagosAlumnos->created) ?></td>
                <td><?= h($pagosAlumnos->monto) ?></td>
                <td><?= $pagosAlumnos->pagado ? h("Si") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PagosAlumnos', 'action' => 'view', $pagosAlumnos->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
