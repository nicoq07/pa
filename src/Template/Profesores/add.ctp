	<div class="col-lg-6 col-lg-offset-3 panel panel-info">
	<div class="panel-heading"><h3><?= __('Nuevo Profesor') ?></h3></div>
	    <?= $this->Form->create($profesore) ?>
	    <fieldset>
	        <div class="col-lg-12">
	        <?php
	       	 	//echo $this->Form->control('legajo_numero',['label' => 'Legajo sistema anterior']);
	        ?>
	        </div>
	        <div class="col-lg-12"> 
	         <?php
	         	echo $this->Form->control('nro_documento',['label' => 'DNI']);
			 ?>
	         </div>
	       
	        <div class="col-lg-12">
	        <?php
	        	echo $this->Form->control('nombre');
	        ?>
	        </div>
	        <div class="col-lg-12"> 
	         <?php
	         	echo $this->Form->control('apellido');
			 ?>
	         </div>
	         <div class="col-lg-12">
	        <?php
	        echo $this->Form->control('titulo');
	        ?>
	        </div>
	         
	       <div class="col-lg-12">
	        <?php
	        echo $this->Form->control('cuit',['label' => 'CUIT']);
	        ?>
	        </div>
	        <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('email');
			 ?>
	         </div>
	         <div class="col-lg-12"> 
	         <?php
	         $this->Form->templates(
	         		['dateWidget' => '{{day}}{{month}}{{year}}']
	         		);
	         echo $this->Form->control('fecha_nacimiento',['label' => 'Fecha de nacimiento','type' => 'date' ,'empty' => false, 'dateFormat' => 'DMY', 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 5 ]);
			 ?>
	         </div>
	         <div class="col-lg-12">
	        <?php
	        echo $this->Form->control('direccion',['label' => 'Dirección']);
	        ?>
	        </div>
	        <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('codigo_postal',['label' => 'CP']);
			 ?>
	         </div>
	         <div class="col-lg-12">
	        <?php
	        echo $this->Form->control('ciudad');
	        ?>
	        </div>
	        
	        <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('telefono',['label' => 'Tel. Fijo']);
			 ?>
	         </div>
	        <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('celular');
			 ?>
	         </div>
	         <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('nombre_contacto',['label' => 'Contacto alternativo']);
			 ?>
	         </div>
	        <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('celular_contacto');
			 ?>
	         </div>
	         <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('observacion',['label' => 'Observación']);
			 ?>
	         </div>  
	         <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('active',['label' => 'Activo']);
			 ?>
	         </div>  
	            

	        
	    
	    	<div class="col-lg-12"> 
	         <?=
 			 $this->Form->button('Guardar',['class' => 'btn-lg btn-info']) 
 			 ?>
	         </div>  
	         </fieldset>
	    <?= $this->Form->end() ?>
	</div>

