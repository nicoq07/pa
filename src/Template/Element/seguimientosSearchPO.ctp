<div class="col-lg-12" style="margin-top: 10px; ">
  		<?php echo $this->Form->create($form, ['url' => [ 'action' => $form], 'id' => 'frmIndex', 'type' => 'post']); ?>
  	  <div class ="col-lg-3">
		 <?php
            echo $this->Form->label('modificados','Ver sólo cargados');
            echo $this->Form->checkbox('modificados', ['label' => false,'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
		 </div>
		<div class ="col-lg-3">
	  <?php
	        $this->Form->templates(
	        		['dateWidget' => '{{day}}{{month}}']
	        		);
	        echo $this->Form->control('fecha', ['label' => 'Fecha', 'empty' => true, 'type' => 'date' ,'dateFormat' => 'DMY', 'maxYear' => date('Y'), 'class' => 'btn-lg']);
	        ?>
	 </div>
          <div class="col-lg-3" style="top:20px;">
			<?php
  			  echo $this->Form->button('', ['label' => '', 'class' => 'btn-sm btn-info glyphicon glyphicon-search', 'escape' => true]);
	        ?>          
	      </div>
	      <div class="col-lg-3">
			<?php
			echo $this->Html->link('Reset',['action'=>'reset'],[ 'class' => 'btn-sm btn-danger']);
	        ?>          
	      </div>
	     <div class="col-lg-12"> 
			  	  <div class="col-lg-6"> 
					 <?php
						echo $this->Form->label('Búsqueda :');
			            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Alumno', 'onchange'=>'document.getElementById("frmIndex").submit()']);
			          ?>
				 </div>
				 
				  <div class="col-lg-6" >
			  		 <?php
			  			 echo $this->Form->control('clases',['empty' => true ,  'onchange'=>'document.getElementById("frmIndex").submit()'])
			          ?>
			         	
				 </div>
		</div>
          
	 <?php echo $this->Form->end(); ?>
 </div>