<?= $this->assign('title', 'Informe de Seguimientos');?>
<script type="text/javascript">
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
       	sel.append($("<option>").attr('value','').text('Seleccione...'));
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
	       		 echo $this->Form->select('operadores',['empty' => 'Seleccione ...'],['id' => 'operadores','name' => 'operadores']);
	        ?>
        </div>
	 </div>
		  <?= $this->Form->button(__('Ver')) ?>
	    <?= $this->Form->end() ?>
</div>