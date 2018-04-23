<div class="col-lg-12 panel">

	<div class = "col-lg-12 panel-heading">
    	<h3><?= __('Alumnos') ?></h3>
	</div>
	<?php 
	if($this->request->session()->read('search_key') != "")
	{
		$search_key = $this->request->session()->read('search_key');
	}
	else
	{
		$search_key = "";
	}
	
	 echo $this->Form->create('search', ['id' => 'frmIndex', 'url' => ['action' => 'search']]); ?>
	<div class = "well col-lg-12 container">
		<div class ="col-lg-3">
		 <?php
            echo $this->Form->label('Activos');
            echo $this->Form->checkbox('activos', ['label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
		
		<div class ="col-lg-9">
		 <?php
			echo $this->Form->label('Búsqueda :');
			echo $this->Form->control('palabra_clave', ['value' => $search_key,  'label' => false,'placeholder' => 'Nombre, Apellido ó DNI ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
	 </div>
	   <?php echo $this->Form->end(); ?>
     <div id="no-more-tables">
            <table class="col-lg-12 table-striped table-condensed cf">
        		<thead class="cf">
            <tr>
                <th width="15%" scope="row"><?= $this->Paginator->sort('apellido') ?></th>
                <th width="10%" scope="row"><?= $this->Paginator->sort('telefono') ?></th>
                <th width="10%" scope="row"><?= $this->Paginator->sort('celular') ?></th>
                <th width="10%" scope="row"><?= $this->Paginator->sort('nro_documento',['label'  => 'DNI']) ?></th>
                <th width="15%" scope="row"><?= $this->Paginator->sort('email') ?></th>
                <th width="5%" scope="row"><?= $this->Paginator->sort('activo') ?></th>
                <th width="10%" scope="row" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td data-title="Alumno"><?= $this->Html->link($alumno->presentacion, [ 'action' => 'view', $alumno->id]) ?></td>
                <td data-title="Teléfono"><?= h($alumno->telefono) ?></td>
                <td data-title="Celular"><?= h($alumno->celular) ?></td>
                <td data-title="Dni"><?= h($alumno->nro_documento) ?></td>
                <td data-title="Correo" style="font-size:12px" ><?= h($alumno->email) ?></td>
                <td data-title="Activo"><?= $alumno->active ? h("Sí") : h("No") ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $alumno->id],['class' => 'btn-sm btn-warning']) ?>
                    <?= $this->Form->postLink(__('Baja'), ['action' => 'baja', $alumno->id],['class' => 'btn-sm btn-danger','confirm' => __('Vas a dar de baja a {0}?', $alumno->presentacion)]) ?>
               
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="panel">
    	<?= $this->element('footer') ?>
    </div>
     
</div>

