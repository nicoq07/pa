<style>
.container-clases { border:2px solid #ccc; width:100%; height: 100px; overflow-y: scroll; }

 </style>
 <script type="text/javascript"> 
//en busca los dias y horarios, pero el id es de la clase
 function getDiaHorario()
 {
 	
 	var disciplina_id = $( "#disciplinas" ).val();
 	var operador_id = $( "#operadores" ).val();
 	 $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDiaHorario'));?>",

 	        type: "get",
 	        data: {operador_id:operador_id,disciplina_id:disciplina_id },
 	        success: function(data) {
 	        	var array = data.split('.');
 	        	var sel = $('#clases');
 	        	sel.empty();
  	        	sel.append($("<option>").attr('value','').text('Seleccione horario'));
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

 function buscarDisciplinas()
 {
 	
 	var operador_id = $( "#operadores" ).val();
     $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDisciplinas'));?>",
         type: "get",
         data: {operador_id:operador_id},
         success: function(data) {
         	var array = data.split('.');
       		var sel = $('#disciplinas');
       		sel.empty();
         	sel.append($("<option>").attr('value',null).text('Seleccione disciplina'));
          	$(array).each(function() {
         	
         		d = this.split('-');
             	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
            	})
         	},
         error: function(){
 			alert("Error buscando las disciplinas");
         },
         complete: function() {
            // alert('Disciplinas disponibles');
         }
     });
 }
 $(document).ready(function(){
	 $("#divPadres").toggle();
	    $("#botonDiv").click(function(){
	    	$("#botonDiv").html('-');
	        $("#divPadres").toggle();
	        return false;
	    });
	});
</script>
<?= $this->assign('title', 'Nuevo alumno');?>

<div class="col-lg-6 col-lg-offset-3 panel panel-info" >
   <h3 style="text-align:center;" class="panel-heading"><?= __('Nuevo alumno') ?></h3>
	   <?= $this->Form->create($alumno,['type' => 'file']) ?>
	    <fieldset class="panel-body">
	    <div >
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
	        
	       </div>
	        
<!------------------------ SECCION PADRES -->
				<div class="col-lg-2 col-lg-offset-10"> 
					<button title="Ocultar datos de padres" class="btn-sm btn-info" id="botonDiv">+</button>
		         </div>
			<div id="divPadres">
				
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
		      </div>
 <!------------------------ FIN SECCION PADRES -->
	         <div class="col-lg-8 col-lg-offset-2"> 
	         <?php
	         echo $this->Form->control('colegio');
			 ?>
	         </div> 
	         <div class="col-lg-12" id="div-clases"> 
		         	<div id = 'sprofesor' class= "col-lg-4">
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
		         			echo $this->Form->input('clases[]',['label' => 'Fecha y hora','option' => '-','empty' => '-','id' => 'clases','type' => 'select']);
			      		  ?>
			        </div>
			        <div class="col-lg-1" id="div-add" > 	<input type="button" class="btn-sm btn-info" id="btnAdd" value="+" onclick="addClase();" /></div>
	         </div>  
	    	 <div class="col-lg-12"> 
	         <?php
	         echo $this->Form->control('observacion',['label' => 'Observación']);
			 ?>
			 </div>
	         <div class="col-lg-4"> 
	         <?php
	         echo $this->Form->control('active',['label' => 'Activo']);
			 ?>
	         </div> 
	         <div class="col-lg-8"> 
	          <label for="foto"> Foto</label>
	         <?=
 			 $this->Form->file('foto',['label' => 'Foto']) 
 			 ?>
	         </div>
	    	<div class="col-lg-12"> 
	         <?=
 			 $this->Form->button('Guardar',['class' => 'btn-lg btn-success','text-align' => 'center']) 
 			 ?>
	         </div>
	          
	         </fieldset>
	    <?= $this->Form->end() ?>
</div> 
