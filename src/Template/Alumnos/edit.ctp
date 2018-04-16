<style>
.container-clases { border:2px solid #ccc; width:100%; height: 100px; overflow-y: scroll; }

</style>

<script type="text/javascript">
//en busca los dias y horarios, pero el id es de la clase
function getDiaHorario()
{
	var programa = 0;
	 if ($('#programa_adolecencia').is(":checked"))
	 {
		 programa = 1;
	}
	
	var idDisciplina = $( "#disciplinas" ).val();
	var profesor_id = $( "#profesores" ).val();
	 $.ajax({
       url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDiaHorario'));?>",

	        type: "get",
	        data: {profesor_id:profesor_id,idDisciplina:idDisciplina,programa:programa },
	        success: function(data) {
	        	var array = data.split('.');
	        	var sel = $('#clases');
	        	sel.empty();
	           	
 	        	sel.append($("<option>").attr('value',null).text('Seleccione horario'));
	         	$(array).each(function() {
	        	
	        		d = this.split('-');
	            	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
	           	})
	        },
	        error: function(){
				alert("Error");
	        },
	        complete: function() {
	        }
	    });
}

function buscarDisciplinas(programa)
{
	var programa = 0;
	 if ($('#programa_adolecencia').is(":checked"))
	 {
		 programa = 1;
	}
	
	var profesor_id = $( "#profesores" ).val();
    $.ajax({
        //url: "getDisciplinas",
       url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDisciplinas'));?>",
        type: "get",
        data: {profesor_id:profesor_id,programa:programa},
        success: function(data) {

//         	var array = data.split('.');
//       		var sel = $('#disciplinas');
//       		sel.empty();
//         	sel.append($("<option>").attr('value',null).text('Seleccione disciplina'));
//          	$(array).each(function() {
        	
//         		d = this.split('-');
//             	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
//            	})
        	if (data != '')
            {
       		var array = data.split('.');

          		var sel = $('#disciplinas');
          		sel.attr('disabled',false);
          		var sel2 = $('#clases');
       		sel2.attr('disabled',false);
       		
          		sel.empty();

            	sel.append($("<option>").attr('value',null).text('Seleccione disciplina'));
             	$(array).each(function() {
                 
            		d = this.split('-');
                	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
               	})
             }
       	else
       	{
       		var sel = $('#disciplinas');
       		sel.attr('disabled',true);
          		sel.empty();
       		sel.append($("<option>").attr('value',null).text('Sin clases'));
       		var sel = $('#clases');
       		sel.attr('disabled',true);
          		sel.empty();
       		sel.append($("<option>").attr('value',null).text('Sin clases'));
       	}
            
        },
        error: function(){
			alert("Error buscando las disciplinas");
        },
        complete: function() {
        }
    });
}
</script>
<div class="col-lg-8 col-lg-offset-1 well">
	   <?= $this->Form->create($alumno,['type' => 'file']) ?>
	    <fieldset>
	        <h3><?= __('Modificar alumno') ?></h3>
	      
	      <div class="col-lg-12 pull-right nopadding">
		        <div class="col-lg-7">
		        
		        <?php 
		        $ds  = DS;
		        if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
		        {
		        	$ds = DS_WINDOWS_IMG;
		        }
		        echo $this->Html->image('alumnos'.$ds.$alumno->referencia_foto, ['title' => $alumno->presentacion ,'alt' => $alumno->presentacion, 'class' => 'pull-right' , 'height' => "250" , 'width' => "250"]); ?>
		        </div>
		         <div class="col-lg-6">
		          <?=  $this->Form->label('foto',['label' => 'Cargar nueva foto']); ?>
		       <?=  $this->Form->file('foto',['label' => 'Cargar nueva foto']); ?>
		        </div>
	        </div>
	      
	      
	        <div class="col-lg-5">
	        <?php
	       	 	echo $this->Form->control('legajo_numero',['label' => 'Legajo sistema anterior']);
	        ?>
	        </div>
	        <div class="col-lg-5"> 
	         <?php
	         	echo $this->Form->control('nro_documento',['label' => 'DNI']);
			 ?>
	         </div>
	       
	        <div class="col-lg-5">
	        <?php
	        	echo $this->Form->control('nombre');
	        ?>
	        </div>
	        <div class="col-lg-5"> 
	         <?php
	         	echo $this->Form->control('apellido');
			 ?>
	         </div>
	         <div class="col-lg-10">
	       <?php
	        $this->Form->templates(
	        		['dateWidget' => '{{day}}{{month}}{{year}}']
	        		);
	        echo $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de nacimiento', 'empty' => false, 'type' => 'date' ,'dateFormat' => 'DMY', 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 5 ]);
	        ?>
	        </div>
	       
	         <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('telefono',['label' => 'Tel. Fijo']);
			 ?>
	         </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('celular');
			 ?>
	         </div>
	          <div class="col-lg-4"> 
	         	<?php
	         	echo $this->Form->control('email');
			 	?>
			 </div>
	         <div class="col-lg-10">
	        <?php
	        echo $this->Form->control('direccion',['label' => 'Domicilio']);
	        ?>
	        </div>
	         <div class="col-lg-7">
	        <?php
	        echo $this->Form->control('ciudad');
	        ?>
	        </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('codigo_postal',['label' => 'CP']);
			 ?>
	         </div>
	        
	        
	        
<!------------------------ SECCION PADRES -->
	         <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('nombre_madre',['label' => 'Nombre de madre o tutor']);
			 ?>
	         </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('celular_madre',['label' => 'Celular de madre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-4"> 
	         <?php
	         echo $this->Form->control('email_madre',['label' => 'Email de madre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('nombre_padre',['label' => 'Nombre de padre o tutor']);
			 ?>
	         </div>
	        <div class="col-lg-3"> 
	         <?php
	         echo $this->Form->control('celular_padre',['label' => 'Celular de padre o tutor']);
			 ?>
	         </div>
	         <div class="col-lg-4"> 
	         <?php
	         echo $this->Form->control('email_padre',['label' => 'Email de padre o tutor']);
			 ?>
	         </div>
 <!------------------------ FIN SECCION PADRES -->
	         <div class="col-lg-8"> 
	         <?php
	         echo $this->Form->control('colegio');
			 ?>
	         </div> 
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('monto_arancel');
			 ?>
	         </div> 
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('monto_materiales');
			 ?>
	         </div>  
	        
	    	 <div class="col-lg-10"> 
	         <?php
	         echo $this->Form->control('observacion',['label' => 'Observación']);
			 ?>
			 </div>
			  <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('futuro_alumno');
			 ?>
	         </div>  
	         
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('programa_adolecencia',['id' => 'programa_adolecencia' ]);
			 ?>
	         </div> 
	         <div class="col-lg-5"> 
	         <?php
	         echo $this->Form->control('active',['label' => 'Activo']);
			 ?>
	         </div> 
	          <div class="col-lg-10"> 
	          <div class="col-lg-1 ">
	        
	          	<?php  
	          	echo ("Clases ")?>
			  </div>				         
				<div class="col-lg-7 ">
				 <ul>
					   	<?php 	foreach ($alumno->clases as $clase):?>
					  <?php 	echo  $this->Form->hidden('clases[]',['value' => $clase->id]); ?>
							  <li><?= h($clase->presentacion) ?> </li>
			         <?php endforeach; ?>
			      </ul> 
	         	</div>
	         </div> 
	          <div class="col-lg-10" id="div-clases"> 
		         	<div id = 'sprofesor' class= "col-lg-4">
					<?php 
					echo $this->Form->control('profesores',['id' => 'profesores', 'option' => $profesores, 'label' => 'Profesores','empty' => 'Seleccione profesor','onchange' => "buscarDisciplinas('$alumno->programa_adolecencia')"]);
					?>
		         	</div>
		         	<div id = 'sdisciplina' class= "col-lg-3">
		         	   	<?php  
		         	   	echo $this->Form->label('disciplinas',['label' => 'Disciplinas']);
		         	   	echo $this->Form->select('disciplinas',['empty' => '-'],['id' => 'disciplinas','onchange' => 'getDiaHorario();']);
		         	   	?>
		         	</div>
		         	<div id = 'shorario' class= "col-lg-3">
		         			<?php  
		         			echo $this->Form->input('clasesnuevas[]',['label' => 'Fecha y hora','option' => '-','empty' => '-','id' => 'clases','type' => 'select']);
			      		  ?>
			        </div>
			        <div class="col-lg-1" id="div-add" > 	<input type="button" class="btn-sm btn-info" id="btnAdd" value="+" onclick="addClase();" /></div>
	         </div>  
	    	<div class="col-lg-10"> 
	         <?=
 			 $this->Form->button('Guardar',['class' => 'btn-lg btn-info']) 
 			 ?>
	         </div>
	          
	         </fieldset>
	    <?= $this->Form->end() ?>
</div> 
