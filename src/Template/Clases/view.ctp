<div class="col-lg-8 col-lg-offset-2 panel panel-info">
	<div class='col-lg-12 panel-heading'>
    	<h3><?= h($clase->presentacion) ?></h3>
		<h4><?= h('Operador: '.$clase->operadore->presentacion) ?></h4>
	</div>
		&nbsp;
	
    <div class="panel-body">
       		<div class="col-lg-6"> <h4><?= __('Alumnos en esta clase:') ?></h4> </div>
       		<div class="col-lg-3 pull-right">  <?= $this->Html->link(__('Editar clase'), ['action' => 'edit', $clase->id],['class' => 'btn btn-warning']) ?></div>
        <?php if (!empty($clase->alumnos)): ?>
        <table class = "table table-striped">
            <tr>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col" class="actions"><?= __('Acciones sobre alumnos') ?></th>
            </tr>
            <?php foreach ($clase->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->presentacion) ?></td>
                <td><?= $alumnos->active ? h("Sí") : h("No")?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Alumnos', 'action' => 'view', $alumnos->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Form->postLink(__('Quitar de la clase'),['action' => 'desactivarClaseAlumno', $alumnos->id,$clase->id],['class' => 'btn-sm btn-danger','confirm' => __('Quitar de la clase a {0}?', $alumnos->presentacion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
