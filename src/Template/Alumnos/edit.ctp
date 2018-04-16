<style>
.container-clases { border:2px solid #ccc; width:100%; height: 100px; overflow-y: scroll; }

</style>

<script type="text/javascript">
//en busca los dias y horarios, pero el id es de la clase
function getDiaHorario()
{
	
	var idDisciplina = $( "#disciplinas" ).val();
	var operador_id = $( "#operadores" ).val();
	 $.ajax({
// 	        url: "getDiaHorario",
       url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDiaHorario'));?>",

	        type: "get",
	        data: {operador_id:operador_id,idDisciplina:idDisciplina },
	        success: function(data) {
	        	var array = data.split('.');
	        	var sel = $('#clases');
	        	sel.empty();
// 	        	sel.on('change', function (data) {
// 						mifuncion();
// 	            })
// 	            sel.attr('id', 'clases._ids');
	           	
 	        	sel.append($("<option>").attr('value',null).text('Seleccione horario'));
	         	$(array).each(function() {
	        	
	        		d = this.split('-');
	            	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
	           	})
// 		         	div = document.createElement('div');
// 		        	$(div).addClass('input select')
// 		     	    .html(sel);
		        	
// 		         	$('#shorario').append(div)
	        },
	        error: function(){
				alert("Error");
	        },
	        complete: function() {
	        }
	    });
}

function buscarDisciplinas()
{
	
	var operador_id = $( "#operadores" ).val();
    $.ajax({
        //url: "getDisciplinas",
       url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDisciplinas'));?>",
        type: "get",
        data: {operador_id:operador_id},
        success: function(data) {

            
        	//$("#disciplinas").remove();
        	var array = data.split('.');
        //	var sel = $('<select>');
      		var sel = $('#disciplinas');
      		sel.empty();
//         	sel.on('change', function (data) {
//         		getDiaHorario();
//             })
//             sel.attr('id', 'disciplinas');
//             ;
        	sel.append($("<option>").attr('value',null).text('Seleccione disciplina'));
         	$(array).each(function() {
        	
        		d = this.split('-');
            	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
           	})
           		
// 	         	div = document.createElement('div');
// 	        	$(div).addClass('input select')
// 	     	    .html(sel);
	        	
// 	         	$('#sdisciplina').append(div)
	         	
        },
        error: function(){
			alert("Error buscando las disciplinas");
        },
        complete: function() {
           // alert('Disciplinas disponibles');
        }
    });
}
</script>
<div class="col-lg-10 col-lg-offset-1 panel">
	   <?= $this->Form->create($alumno,['type' => 'file']) ?>
	    <fieldset>
	    <div class="panel-heading"><h3><?= __('Modificar alumno') ?></h3></div>
	        
	      
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
	      
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         	echo $this->Form->control('nro_documento',['label' => 'DNI']);
			 ?>
	         </div>
	       
	        <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        	echo $this->Form->control('nombre');
	        ?>
	        </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         	echo $this->Form->control('apellido');
			 ?>
	         </div>
	         <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        $this->Form->templates(
	        		['dateWidget' => '{{day}}{{month}}{{year}}']
	        		);
	        echo $this->Form->control('fecha_nacimiento', ['label' => 'Fecha de nacimiento', 'empty' => false, 'type' => 'date' ,'dateFormat' => 'DMY', 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 5 ]);
	        ?>
	        </div>
	       
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('telefono',['label' => 'Tel. Fijo']);
			 ?>
	         </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('celular');
			 ?>
	         </div>
	          <div class="col-lg-8 col-lg-offset-2"> 
	         	<?php
	         	echo $this->Form->control('email');
			 	?>
			 </div>
	         <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        echo $this->Form->control('direccion',['label' => 'Domicilio']);
	        ?>
	        </div>
	         <div class="col-lg-8 col-lg-offset-2">
	        <?php
	        echo $this->Form->control('ciudad');
	        ?>
	        </div>
	        <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('codigo_postal',['label' => 'CP']);
			 ?>
	         </div>
	        
	        
<!------------------------ SECCION PADRES -->
				
		         <div class="col-lg-8 col-lg-offset-2"> 
		         <?php
		         echo $this->Form->control('nombre_madre',['label' => 'Nombre de madre o tutor']);
				 ?>
		         </div>
		        <div class="col-lg-8 col-lg-offset-2"> 
		         <?php
		         echo $this->Form->control('celular_madre',['label' => 'Celular de madre o tutor']);
				 ?>
		         </div>
		         <div class="col-lg-8 col-lg-offset-2"> 
		         <?php
		         echo $this->Form->control('email_madre',['label' => 'Email de madre o tutor']);
				 ?>
		         </div>
		         <div class="col-lg-8 col-lg-offset-2"> 
		         <?php
		         echo $this->Form->control('nombre_padre',['label' => 'Nombre de padre o tutor']);
				 ?>
		         </div>
		        <div class="col-lg-8 col-lg-offset-2"> 
		         <?php
		         echo $this->Form->control('celular_padre',['label' => 'Celular de padre o tutor']);
				 ?>
		         </div>
		         <div class="col-lg-8 col-lg-offset-2"> 
		         <?php
		         echo $this->Form->control('email_padre',['label' => 'Email de padre o tutor']);
				 ?>
		         </div>
 <!------------------------ FIN SECCION PADRES -->
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('colegio');
			 ?>
	         </div> 
	    	 <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('observacion',['label' => 'Observación']);
			 ?>
			 </div>
	         <div class="col-lg-3 col-lg-offset-1"> 
	         <?php
	         echo $this->Form->control('active',['label' => 'Activo']);
			 ?>
	         </div> 
	          <div class="col-lg-12"> 
	          <div class="col-lg-2 col-lg-offset-1">
	        
	          	<?php  
	          	echo ("Clases")?>
			  </div>				         
				<div class="col-lg-7 1 ">
				 <ul>
					   	<?php 	foreach ($alumno->clases as $clase):?>
					  <?php 	echo  $this->Form->hidden('clases[]',['value' => $clase->id]); ?>
							  <li><?= h($clase->presentacion) ?> <?= $this->Html->link(__('Tranferir de Clase'), ['controller' => 'Alumnos', 'action' => 'transferirClase', $alumno->id,$clase->id],  ['class' => 'btn-sm btn-primary']) ?>
							   </li>
			         <?php endforeach; ?>
			      </ul> 
	         	</div>
	         </div> 
	          <div class="col-lg-10 col-lg-offset-1" id="div-clases"> 
		         	<div id = 'soperador' class= "col-lg-4">
					<?php 
			       	 echo $this->Form->control('operadores',['id' => 'operadores', 'option' => $operadores, 'label' => 'operadores','empty' => 'Seleccione operador','onchange' => 'buscarDisciplinas()']);
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
	    	<div class="col-lg-10 col-lg-offset-1"> 
	         <?=
 			 $this->Form->button('Guardar',['class' => 'btn-lg btn-info']) 
 			 ?>
	         </div>
	          
	         </fieldset>
	    <?= $this->Form->end() ?>
</div> 
