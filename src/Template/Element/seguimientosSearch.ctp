<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

</style>
<script type="text/javascript"> 
//en busca los dias y horarios, pero el id es de la clase
 function getDiaHorario()
 {
 	
 	var idDisciplina = $( "#disciplinas" ).val();
 	var Operador_id = $( "#operadores" ).val();
 	var year = $( "#year" ).val();
 	 $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosClasesAlumnos','action'=>'getDiaHorario'));?>",

 	        type: "get",
 	        data: {Operador_id:Operador_id,idDisciplina:idDisciplina,year:year},
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
 	
 	var Operador_id = $( "#operadores" ).val();
 	var year = $( "#year" ).val();
     $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosClasesAlumnos','action'=>'getDisciplinas'));?>",
         type: "get",
         data: {Operador_id:Operador_id,year:year},
         success: function(data) {
         	var array = data.split('.');
       		var sel = $('#disciplinas');
       		sel.empty();
         	sel.append($("<option>").attr('value','').text('Seleccione disciplina'));
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
 function getoperadoresPorAnio()
 {
 	
 	var year = $( "#year" ).val();
     $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosClasesAlumnos','action'=>'getoperadoresPorAnio'));?>",
         type: "get",
         data: {year:year},
         success: function(data) {
         	var array = data.split('.');
       		var sel = $('#operadores');
       		sel.empty();
         	sel.append($("<option>").attr('value','').text('Seleccione Operador'));
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
 var myVar;
 function ejecutarLoader()
 {
	     myVar = setTimeout(showPage, 3000);
 }
 function showPage() {
	   document.getElementById("loader").style.display = "none";
}
 window.onload = function() {
	 $("#year").prop('selectedIndex',0);
	 $("#mob").prop('selectedIndex',0);
	 ejecutarLoader();
	};
</script>
<div class="col-lg-12 " id="loader"> </div>
<div class="col-lg-12" style="margin-top: 10px; ">
 <?php echo $this->Form->create('search', ['id' => 'frmIndex', 'url' => ['action' => 'search']]); ?>
  	<div class="col-lg-12">
  		<div class="col-lg-2 col-lg-offset-10">
			<?php
				echo $this->Html->link('Borrar filtros',['action'=>'reset'],[ 'class' => 'btn-sm btn-danger']);
	        ?>          
	      </div>
	 </div>
	 <div class="col-lg-12">
	 &nbsp;
	 </div>
	 <div class="col-lg-2" >
  		 <?php
  		 echo $this->Form->label('modificados','Ver sólo cargados');
  		 echo $this->Form->checkbox('modificados', ['label' => false]);
  		 ?>
	 </div>
	 <div class="col-lg-4" style="top:10px ;text-align:center;">
		 <div class="col-lg-6 "style="top:10px;" > 
	  		  <?php
	  		  echo $this->Form->month('mob',['empty' => 'Mes','name' => 'mob','id' => 'mob']);
	          ?>
          </div> 	
          <div class="col-lg-6" style="top:10px;" > 
	  		  <?php
	  		  echo $this->Form->year('year',['empty' => 'Año','id' => 'year','name' => 'year','maxYear' => date('Y'),'onchange' => 'getoperadoresPorAnio();']);
	          ?>
          </div> 
	 </div>  	
           <div class="col-lg-6" id="div-clases"> 
	 	<div id = 'sOperador' class= "col-lg-4">
			<?php 
	       		 echo $this->Form->label('operadores',['label' => 'operadores']);
	       		 echo $this->Form->select('operadores',['empty' => '-'],['id' => 'operadores','name' => 'operadores','onchange' => 'buscarDisciplinas();']);
	        ?>
        </div>
        <div id = 'sdisciplina' class= "col-lg-4">
         	   	<?php  
         	   	echo $this->Form->label('disciplinas',['label' => 'Disciplinas']);
         	   	echo $this->Form->select('disciplinas',['empty' => '-'],['id' => 'disciplinas','name' => 'disciplinas','onchange' => 'getDiaHorario();']);
         	   	?>
         </div>
         <div id = 'shorario' class= "col-lg-4">
          <?php  
          echo $this->Form->input('clases[]',['label' => 'Fecha y hora','option' => '-','empty' => '-','id' => 'clases','name' => 'clases','type' => 'select','onchange'=>'document.getElementById("frmIndex").submit()']);
	       ?>
		 </div>
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
	?>
	
	
  	  <div class="col-lg-6 "> 
		 <?php
			echo $this->Form->label('Búsqueda :');
            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Alumno o Operador ', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	 </div>
  	 <div class="col-lg-2" style="top:18px;">
          <?= $this->Form->button('Buscar',['class' => 'btn btn-success'])  ?>
     </div>
	
	 
	 <?php echo $this->Form->end(); ?>
	<div class="col-lg-12 alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php if ($mensaje) { echo 
                 $this->Html->nestedList($mensaje); }
                	?>
    </div>
</div>