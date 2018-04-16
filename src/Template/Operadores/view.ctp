<div class="col-lg-8 col-lg-offset-2 panel panel-info">
<div class="col-lg-2 col-lg-offset-10">
	     <?php  echo $this->Html->link('Editar', ['action' => 'edit', $operadore->id],['class' => 'btn btn-warning']); ?>
</div>
   <div  style="margin-top:10px" class="col-lg-12 panel-heading">
	     <div class="col-lg-5">
	     <h1><?= h($operadore->presentacion) ?></h1>
	      </div>
	</div>
<div class="separador col-lg-12"></div>
	
	<div class="col-lg-2 view-div borde"><?= __('DNI') ?></div>
	<div class="col-lg-4 borde"><?= $operadore->nro_documento ? h($operadore->nro_documento) : h("-") ?></div>
	<div class="col-lg-2 view-div borde"><?= __('Direccion') ?></div>
	<div class="col-lg-4 borde"><?= $operadore->direccion ? h($operadore->direccion) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Código Postal') ?></div>
	<div class="col-lg-4 borde "><?=$operadore->codigo_postal ?  h($operadore->codigo_postal) : "-" ?></div>
	<div class="col-lg-2 borde view-div"><?= __('Ciudad') ?></div>
	<div class="col-lg-4 borde"><?= $operadore->ciudad ? h($operadore->ciudad) : "-"?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular') ?></div>
	<div class="col-lg-4 borde"><?= $operadore->celular ? h($operadore->celular) : "-"?></div>
	<div class="col-lg-2 borde view-div"><?= __('Télefono') ?></div>
	<div class="col-lg-4 borde"><?= $operadore->telefono ? h($operadore->telefono) : "-"?> </div>
	
	<div class="col-lg-2 borde view-div"><?= __('Contacto') ?></div>
	<div class="col-lg-2 borde"><?= $operadore->nombre_contacto ? h($operadore->nombre_contacto) : "-" ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Celular cont.') ?></div>
	<div class="col-lg-2 borde"><?=$operadore->celular_contacto ? h($operadore->celular_contacto) : "-"?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Email') ?></div>
	<div class="col-lg-2 borde"><?= $operadore->email ? h($operadore->email) : "-"?> </div>
		<div class="col-lg-2 borde view-div"><?= __('Legajo') ?></div>
	<div class="col-lg-4 borde"><?= h($operadore->id) ?> </div>
	<div class="col-lg-2 borde view-div"><?= __('Legajo anterior') ?></div>
	<div class="col-lg-4 borde"><?= $operadore->legajo_numero ? h($operadore->legajo_numero) : "-"?></div>

			<div class="col-lg-2 borde view-div"><?= __('Alta en sistema') ?></div>
	<div class="col-lg-4 borde"><?= h($operadore->created->format('d/m/Y')) ?> </div>
			<div class="col-lg-2 borde view-div"><?= __('Modificado') ?></div>
	<div class="col-lg-4 borde"><?= h($operadore->modified->format('d/m/Y')) ?> </div>
	
	<div class="col-lg-2 borde view-div"><?= __('Activo') ?></div>
	<div class="col-lg-2 borde"><?=$operadore->active ? __('Sí') : __('No');?> </div>
    
    <div class="col-lg-12 separador-ligth">
        <h4><?= __('Observación') ?></h4>
        <?= $this->Text->autoParagraph(h($operadore->observacion)); ?>
    </div>
    <div class="col-lg-12 related">
        <h4><?= __('Clases impartidas' ) ?></h4>
        <?php if (!empty($operadore->clases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
            	 <th scope="col"><?= __('Disciplina') ?></th>
                <th scope="col"><?= __('Horario') ?></th>
                <th width="10%" scope="col"><?= __('Cant. A') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($operadore->clases as $clases): ?>
            <tr>
             <td><?= h($clases->disciplina->descripcion) ?></td>
                <td><?= h($clases->horario->presentacion) ?></td>
                <td><?= h($clases->alumno_count) ?></td>
                <td><?= $clases->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clases', 'action' => 'view', $clases->id],['class' => 'btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clases', 'action' => 'edit', $clases->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clases', 'action' => 'delete', $clases->id], ['class' => 'btn-sm btn-danger', 'confirm' => __('Borrar clase?', $clases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

