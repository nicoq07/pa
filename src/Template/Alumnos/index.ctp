<div class="col-lg-10 panel">

	<div class = "col-lg-12 container">
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
		<div class ="col-lg-3">
		  <?php
            echo $this->Form->label('Adolescencia');
            echo $this->Form->checkbox('adolecencia', ['label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
        </div>
		
		<div class ="col-lg-3">
		 <?php
            echo $this->Form->label('Futuros');
            echo $this->Form->checkbox('futuro', ['label' => false, 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
		<div class ="col-lg-6">
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
                <th width=" 5%" style="font-size:10px"  scope="row"><?= $this->Paginator->sort('programa_adolecencia',['label'  => 'Adolescencia']) ?></th>
                <th width="5%" style="font-size:10px" scope="row"><?= $this->Paginator->sort('futuro_alumno') ?></th>
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
                <td data-title="Adolescencia"><?=$alumno->programa_adolecencia? h("Sí") : h("No") ?></td>
                <td data-title="Futuro"><?= $alumno->futuro_alumno ? h("Sí") : h("No")?></td>
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
     <?= $this->element('footer') ?>
</div>

