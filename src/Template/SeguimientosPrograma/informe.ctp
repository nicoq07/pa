<?= $this->assign('title', 'Informe de Seguimientos');?>
<script type="text/javascript">
function getDiaHorario()
{
	
	var idDisciplina = $( "#disciplinas" ).val();
	var operador_id = $( "#operadores" ).val();
	var year = $( "#year" ).val();
	 $.ajax({
       url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosPrograma','action'=>'getDiaHorario'));?>",

	        type: "get",
	        data: {operador_id:operador_id,idDisciplina:idDisciplina,year:year},
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
function buscarDisciplinas()
{
	
	var operador_id = $( "#operadores" ).val();
	var year = $( "#year" ).val();
   $.ajax({
      url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosPrograma','action'=>'getDisciplinas'));?>",
       type: "get",
       data: {operador_id:operador_id,year:year},
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
       }
   });
}
function getOperadoresPorAnio()
{
	
	var year = $( "#year" ).val();
   $.ajax({
      url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosPrograma','action'=>'getOperadoresPorAnio'));?>",
       type: "get",
       data: {year:year},
       success: function(data) {
       	var array = data.split('.');
     		var sel = $('#operadores');
     		sel.empty();
       	sel.append($("<option>").attr('value',null).text('Seleccione Profesor'));
        	$(array).each(function() {
       	
       		d = this.split('-');
           	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
          	})
       },
       error: function(){
			alert("Error buscando los operadores");
       },
       complete: function() {
       }
   });
}
function getAlumnoClase()
{
	
	var clase = $( "#clases" ).val();
   $.ajax({
      url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosPrograma','action'=>'getAlumnoClase'));?>",
       type: "get",
       data: {clase:clase},
       success: function(data) {
       	var array = data.split('.');
     		var sel = $('#alumnos');
     		sel.empty();
       	sel.append($("<option>").attr('value',null).text('Seleccione alumno'));
        	$(array).each(function() {
       		
       		 d = this.split('-');
           	 sel.append($("<option>").attr('value',d[0]).text(d[1]));
           	console.log(d);
          	})
          	
       },
       error: function(){
			alert("Error buscando los operadores");
       },
       complete: function() {
       }
   });
}
</script>
<div class="col-lg-5 col-lg-offset-3 panel">
		<?=  $this->Form->create($seg, ['id' => 'frmIndex', 'type' => 'post']);
			//echo $this->Form->control('clases', ['options' => $clases, 'empty' => 'Seleccionar clase...','onchange'=>'cambiarClase()']);
			//echo $this->Form->control('alumnos', ['options' => $alumnos, 'empty' => 'Seleccionar alumno...']);
		  ?>
          <div class="col-lg-12" > 
	  		  <?php
	  		  echo $this->Form->year('year',['empty' => 'Año','id' => 'year','name' => 'year','maxYear' => date('Y'),'onchange' => 'getOperadoresPorAnio();']);
	          ?>
          </div> 
          
           <div class="col-lg-12" id="div-clases"> 
	 	<div id = 'sprofesor' class= "col-lg-12">
			<?php 
	       		 echo $this->Form->label('operadores',['label' => 'Operadores']);
	       		 echo $this->Form->select('operadores',['empty' => '-'],['id' => 'operadores','name' => 'operadores','onchange' => 'buscarDisciplinas();']);
	        ?>
        </div>
        <div id = 'sdisciplina' class= "col-lg-12">
         	   	<?php  
         	   	echo $this->Form->label('disciplinas',['label' => 'Disciplinas']);
         	   	echo $this->Form->select('disciplinas',['empty' => '-'],['id' => 'disciplinas','name' => 'disciplinas','onchange' => 'getDiaHorario();']);
         	   	?>
         </div>
         <div id = 'shorario' class= "col-lg-12">
          <?php  
          echo $this->Form->input('clases[]',['label' => 'Fecha y hora','option' => '-','empty' => '-','id' => 'clases','name' => 'clases','type' => 'select','onchange' => 'getAlumnoClase();']);
	       ?>
		 </div>
		 <div id = 'shorario' class= "col-lg-12">
          <?php  
         	 echo $this->Form->input('alumnos[]',['label' => 'Alumnos','option' => '-','empty' => '-','id' => 'alumnos','name' => 'alumnos','type' => 'select']);
	       ?>
		 </div>
	 </div>
		  <?= $this->Form->button(__('Descargar')) ?>
	    <?= $this->Form->end() ?>
</div>