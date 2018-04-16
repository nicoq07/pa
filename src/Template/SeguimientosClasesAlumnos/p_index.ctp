<?= $this->assign('title', 'Mis Seguimientos'); ?>
<div class=" col-lg-9 panel">
	<h3 class="panel-heading"><?= __('Seguimientos') ?></h3> 
  	<?php 
  	 echo $this->element('seguimientosSearchPO');
  	?>
  	&nbsp;
    <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
            <tr>
                <th width="30%" scope="col"><?= h('Clase') ?></th>
                <th width="20%" scope="col"><?=  $this->Paginator->sort('alumno_id') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('presente') ?></th>
                <th width="15%" scope="col"><?= h('Calificación') ?></th>
                <th width="10%" scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th width="15%" scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seguimientosClasesAlumnos as $seguimientosClasesAlumno): ?>
            <tr>
                <td><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->clase->presentacionCorta, ['controller' => 'Clases', 'action' => 'p_view', $seguimientosClasesAlumno->clases_alumno->clase->id])  ?></td>
                <td><?= $this->Html->link($seguimientosClasesAlumno->clases_alumno->alumno->presentacion, ['controller' => 'Alumnos', 'action' => 'p_view', $seguimientosClasesAlumno->clases_alumno->alumno->id])  ?></td>
                <td><?= $seguimientosClasesAlumno->presente ? h('Sí') : h("No") ?></td>
                <td><?= $seguimientosClasesAlumno->has('calificacione') ? $seguimientosClasesAlumno->calificacione->presentacion : '' ?></td>
                <td><?= h($seguimientosClasesAlumno->fecha->format('d-m-Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Cargar'), ['action' => 'edit', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-success']) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $seguimientosClasesAlumno->id], ['class' => 'btn-sm btn-info']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?=  $this->element('footer')?>
</div>
