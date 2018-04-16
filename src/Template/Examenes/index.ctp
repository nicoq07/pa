
<div class="examenes col-lg-8 col-lg-offset-2 well">
	<div class="row">
	<div class="col-lg-12">
		<h3><?= __('Examenes') ?></h3>
	</div>
	<div class="col-lg-3 col-lg-offset-9">
		  <?= $this->Html->link(__('Nuevo'), ['action' => 'add'],['class' => 'btn-lg btn-success']) ?>
	</div>
  	<div class="col-lg-12" style="margin-top: 10px; ">
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
	
  	  <div class="col-lg-3 "> 
		 <?php
			echo $this->Form->label('Búsqueda :');
            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Alumno o Operador ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	 </div>
  	 
	  <div class="col-lg-4" >
  		 <?php
  		 echo $this->Form->control('clases',['empty' => true ,  'onchange'=>'document.getElementById("frmIndex").submit()'])
          ?>
         	
	 </div>

	 <?php echo $this->Form->end(); ?>
  	 </div>
	
    
    <table>
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('alumno_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('periodo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aprobado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examenes as $examene): ?>
            <tr>
                <td><?= $examene->clases_alumno->alumno->presentacion ?></td>
                <td><?= $examene->clases_alumno->clase->disciplina->descripcion?></td>
                <td><?= h($examene->periodo) ?></td>
                <td><?= $examene->aprobado ? "Sí" : "No" ?></td>
                <td><?= h($examene->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Reimprimir'), ['action' => 'examen_pdf', $examene->id, '_ext' => 'pdf'],['class' => 'btn-sm btn-info','target' => '_blank']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   <?php 
  echo  $this->element('footer');
   ?>
   </div>
</div>
