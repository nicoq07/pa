<div class="col-lg-12" style="margin-top: 10px; ">
 <?php echo $this->Form->create('search', ['id' => 'frmIndex', 'url' => ['action' => 'oSearch']]); ?>
  	<div class="col-lg-12">
  		<div class="col-lg-2 col-lg-offset-10">
			<?php
				echo $this->Html->link('Borrar filtros',['action'=>'pReset'],[ 'class' => 'btn-sm btn-danger']);
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
	 <div class="col-lg-2" >
  		 <?php
  		 echo $this->Form->label('faltantes','Ver faltantes de carga');
  		 echo $this->Form->checkbox('faltantes', ['label' => false]);
  		 ?>
	 </div>
	 <div class="col-lg-2" style="top:10px ;text-align:center;">
          <div class="col-lg-12" style="top:10px;" > 
	  		  <?php
	  		  echo $this->Form->year('year',['empty' => 'Año','id' => 'year','name' => 'year','maxYear' => date('Y'),'onchange' => 'buscarDisciplinas();']);
	          ?>
          </div> 
	 </div>  	
     <div class="col-lg-6" id="div-clases"> 
        <div id = 'sdisciplina' class= "col-lg-6">
         	   	<?php  
         	   	echo $this->Form->input('disciplinas',['label' => 'Disciplinas','id' => 'disciplinas','type' => 'select','name' => 'disciplinas','onchange' => 'getDiaHorario();']);
         	   	?>
         </div>
         <div id = 'shorario' class= "col-lg-6">
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
            echo $this->Form->control('palabra_clave', ['label' => false,'placeholder' => 'Alumno', 'onchange'=>'document.getElementById("frmIndex").submit()']);
          ?>
	 </div>
  	 <div class="col-lg-2" style="top:18px;">
          <?= $this->Form->button('Buscar',['class' => 'btn btn-success btn-block'])  ?>
     </div>
	
	 
	 <?php echo $this->Form->end(); ?>
	<div class="col-lg-12 alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php
                if ($mensaje){ echo $this->Html->nestedList($mensaje);}
                	?>
    </div>
</div>
<script type="text/javascript"> 
//en busca los dias y horarios, pero el id es de la clase
 function getDiaHorario()
 {
 	
 	var idDisciplina = $( "#disciplinas" ).val();
 	var profesor_id = "<?php echo $current_user['profesor_id']?>";
 	var year = $( "#year" ).val();
 	 $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosClasesAlumnos','action'=>'getDiaHorario'));?>",

 	        type: "get",
 	        data: {profesor_id:profesor_id,idDisciplina:idDisciplina,year:year},
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
 	var profesor_id = "<?php echo $current_user['profesor_id']?>";
 	console.log(profesor_id);
 	var year = $( "#year" ).val();
     $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'SeguimientosClasesAlumnos','action'=>'getDisciplinas'));?>",
         type: "get",
         data: {profesor_id:profesor_id,year:year},
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
 window.onload = function() {
	 $("#year").prop('selectedIndex',0);
	 $("#mob").prop('selectedIndex',0);
	};
</script>