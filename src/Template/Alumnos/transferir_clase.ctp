<div class='col-lg-6 col-lg-offset-3 panel panel-info'>
	<div class="col-lg-12 panel-heading">
		<?php echo h('Alumno: '. $alumno->presentacion); ?>
	</div>
	<div class="col-lg-12 panel-heading">
		<?php echo h('Trasferir de clase : ' . $clase->presentacion . ' a :'); ?>
	</div>
<?php echo $this->Form->create('tranferir');?>
<div class='co-lg-12 panel-body'>
	<div class='col-lg-12'> &nbsp;</div>
	<div class="col-lg-12" id="div-clases"> 
		         	<div id = 'sprofesor' class= "col-lg-4">
					<?php 
			       	 echo $this->Form->control('profesores',['id' => 'profesores', 'option' => $profesores, 'label' => 'Profesores','empty' => 'Seleccione profesor','onchange' => 'buscarDisciplinas()']);
			        ?>
		         	</div>
		         	<div id = 'sdisciplina' class= "col-lg-4">
		         	   	<?php  
		         	   	echo $this->Form->label('disciplinas',['label' => 'Disciplinas']);
		         	   	echo $this->Form->select('disciplinas',['empty' => '-'],['id' => 'disciplinas','onchange' => 'getDiaHorario();']);
		         	   	?>
		         	</div>
		         	<div id = 'shorario' class= "col-lg-4">
		         			<?php  
		         			echo $this->Form->input('clases[]',['label' => 'Fecha y hora','option' => '-','empty' => '-','id' => 'clases','type' => 'select']);
			      		  ?>
			        </div>
	</div> 
</div>
<div class='col-lg-4 col-lg-offset-4'><?php echo $this->Form->button('Tranferir', ['class' => 'btn btn-primary btn-block']);?></div>
<?php
echo $this->Form->hidden('alumno_id', ['value' => $alumno->id]);
echo $this->Form->hidden('clase_id', ['value' => $clase->id]);
echo $this->Form->end();?>

</div>
<script type="text/javascript">
function getDiaHorario()
{
	var idDisciplina = $( "#disciplinas" ).val();
	var profesor_id = $( "#profesores" ).val();
	 $.ajax({
       url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDiaHorario'));?>",

	        type: "get",
	        data: {profesor_id:profesor_id,idDisciplina:idDisciplina },
	        success: function(data) {
	        	var array = data.split('.');
	        	var sel = $('#clases');
	        	sel.empty();
 	        	sel.append($("<option>").attr('value','-1').text('Seleccione horario'));
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
	var profesor_id = $( "#profesores" ).val();
    $.ajax({
       url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'getDisciplinas'));?>",
        type: "get",
        data: {profesor_id:profesor_id},
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
</script>