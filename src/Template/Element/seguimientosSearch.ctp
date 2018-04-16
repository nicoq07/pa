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
	
  	  <div class="col-lg-6 "> 
		 <?php
			echo $this->Form->label('Búsqueda :');
            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Alumno o Profesor ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	 </div>
  	 
	  <div class="col-lg-6" >
  		 <?php
  		 echo $this->Form->control('clases',['empty' => true ,  'onchange'=>'document.getElementById("frmIndex").submit()'])
          ?>
         	
	 </div>
	  <div class="col-lg-2" >
  		 <?php
  		 echo $this->Form->label('modificados','Ver sólo cargados');
  		 echo $this->Form->checkbox('modificados', ['label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
  		 ?>
         	
	 </div>
	

	 <div class="col-lg-10" style="top:10px ;text-align:center;">
		 <div class="col-lg-4 "style="top:10px;" > 
	  		  <?php
	            echo $this->Form->month('mob',['empty' => 'Mes']);
	          ?>
          </div> 	
          <div class="col-lg-4 "style="top:10px;" > 
	  		  <?php
	  		  echo $this->Form->year('year',['empty' => 'Año', 'maxYear' => date('Y')]);
	          ?>
          </div> 	
          
          <div class="col-lg-2" style="top:15px;">
          <?= $this->Form->button('Buscar',['class' => 'btn-sm btn-success'])  ?>
          </div>
          
           <div class="col-lg-2">
			<?php
			echo $this->Html->link('Reset',['action'=>'reset'],[ 'class' => 'btn-sm btn-danger']);
	        ?>          
	      </div>
          
	 </div>
	 <?php echo $this->Form->end(); ?>
  	 </div>