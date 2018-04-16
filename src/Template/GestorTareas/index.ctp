<script type="text/javascript">

function marcarResuelta(tareaId)
{
	$.ajax({
	url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'GestorTareas','action'=>'marcarResuelta'));?>",

     type: "get",
     data: {tareaId:tareaId },
     success: function(data) {
     	var button = $('#'+tareaId);
     	button.hide('fast');
     	var div = $('#div'+tareaId);
     	div.css("text-decoration","line-through;");
     	
	 console.log(data);
     },
     error: function(){
			alert("Error");
     },
     complete: function() {
     }
 });
}


</script>
<?= $this->assign('title', 'Lista de tareas'); ?>
<!-- <div class="container"> -->
<!--     <div class="notices notice-success"> -->
<!--         <strong>Notice</strong> notice-success -->
<!--     </div> -->
<!--     <div class="notices notice-danger"> -->
<!--         <strong>Notice</strong> notice-danger -->
<!--     </div> -->
<!--     <div class="notices notice-info"> -->
<!--         <strong>Notice</strong> notice-info -->
<!--     </div> -->
<!--     <div class="notices notice-warning"> -->
<!--         <strong>Notice</strong> notice-warning -->
<!--     </div> -->
<!--     <div class="notices notice-lg"> -->
<!--         <strong>Big notice</strong> notice-lg -->
<!--     </div> -->
<!--     <div class="notices notice-sm"> -->
<!--         <strong>Small notice</strong> notice-sm -->
<!--     </div> -->
<!-- </div> -->
<?php $ver = ""; $action="";
if($this->request->action == 'index')
{
	$ver = 'Ver resueltas'; $action = 'indexResueltas';
}
else
{
	$ver = 'Ver pendientes'; $action = 'index';
}

?>
<div class="col-lg-8 col-lg-offset-1 panel panel-sm">
<div class="row">
	<div class='col-lg-6'><h2>Lista de Tareas</h2></div>
	<div style="margin-top:15px;" class="col-lg-4"><?php echo $this->Html->Link($ver,['action' => $action],['class' => 'btn-lg btn-info'] ) ?></div>
	<div style="margin-top:15px;" class="col-lg-2"><?php echo $this->Html->Link('Nueva',['action' => 'add'],['class' => 'btn-lg btn-success'] ) ?></div>
</div>
<div class="col-lg-12">
            <?php foreach ($gestorTareas as $gestorTarea){
            	$tachada = "";
            	if ($gestorTarea->resuelta) { $tachada = "text-decoration:line-through;"; }
            	?>
				<?php if($gestorTarea->gestor_tareas_prioridad) { ?>
            	<?php if ($gestorTarea->gestor_tareas_prioridad->valor === URGENTE) { ?>
            	<div style="<?php print $tachada;?>;" id="div<?= h($gestorTarea->id)?>" title="<?= h('Prioridad '.$gestorTarea->gestor_tareas_prioridad->nombre)?>" class="notices notice-danger">
				        <strong><?= h($gestorTarea->titulo)?></strong> <?= h($gestorTarea->descripcion)?>
				  <?php if (!$gestorTarea->resuelta) { ?> 
                                                                                <button title="Resuelta" id ="<?php echo $gestorTarea->id?>" style="background-color:#faf9fa " class="pull-right btn-sm btn-default glyphicon glyphicon-check" onclick="marcarResuelta(<?php echo $gestorTarea->id ?>)"> </button>
                                       <?php } ?>
				  <?php if ($gestorTarea->fecha_vencimiento) { ?> 
                                                                                <small class="pull-right"><strong><?php echo $gestorTarea->fecha_vencimiento->format('d-m-Y')?></strong> </small>
                          <?php } ?>
				 
				</div>
            	
            	 <?php  } ?>
            	<?php if ($gestorTarea->gestor_tareas_prioridad->valor === NORMAL) { ?>
            	 <div style="<?php print $tachada;?>;" id="div<?= h($gestorTarea->id)?>" title="<?= h('Prioridad '.$gestorTarea->gestor_tareas_prioridad->nombre)?>" class="notices notice-warning">
        			    <strong><?= h($gestorTarea->titulo)?></strong> <?= h($gestorTarea->descripcion)?>
				      <?php if (!$gestorTarea->resuelta) { ?> 
                                                                                <button title="Resuelta" id ="<?php echo $gestorTarea->id?>" style="background-color:#faf9fa " class="pull-right btn-sm btn-default glyphicon glyphicon-check" onclick="marcarResuelta(<?php echo $gestorTarea->id ?>)"> </button>
                                       <?php } ?>
				  <?php if ($gestorTarea->fecha_vencimiento) { ?> 
                                                                                <small class="pull-right"><strong><?php echo $gestorTarea->fecha_vencimiento->format('d-m-Y')?></strong> </small>
                          <?php } ?>
				    </div>
            	
            	 <?php   } ?>
            	<?php if ($gestorTarea->gestor_tareas_prioridad->valor === BAJA) { ?>
            	<div style="<?php print $tachada;?>;" id="div<?= h($gestorTarea->id)?>" title="<?= h('Prioridad '.$gestorTarea->gestor_tareas_prioridad->nombre)?>" class="notices notice-success">
			        	<strong><?= h($gestorTarea->titulo)?></strong> <?= h($gestorTarea->descripcion)?>
			  			  <?php if (!$gestorTarea->resuelta) { ?> 
                                                                                <button title="Resuelta" id ="<?php echo $gestorTarea->id?>" style="background-color:#faf9fa " class="pull-right btn-sm btn-default glyphicon glyphicon-check" onclick="marcarResuelta(<?php echo $gestorTarea->id ?>)"> </button>
                                       <?php } ?>
				  <?php if ($gestorTarea->fecha_vencimiento) { ?> 
                                                                                <small class="pull-right"><strong><?php echo $gestorTarea->fecha_vencimiento->format('d-m-Y')?></strong> </small>
                          <?php } ?>
			    </div>
            	<?php } 
            	}?>
            	<?php if (empty($gestorTarea->gestor_tareas_prioridad->valor)) { ?>
            	<div style="<?php print $tachada;?>;" id="div<?= h($gestorTarea->id)?>" title="<?= h('Sin prioridad ')?>" class="notices notice-default">
			        	<strong><?= h($gestorTarea->titulo)?></strong> <?= h($gestorTarea->descripcion)?>
			  			  <?php if (!$gestorTarea->resuelta) { ?> 
                                                                                <button title="Resuelta" id ="<?php echo $gestorTarea->id?>" style="background-color:#faf9fa " class="pull-right btn-sm btn-default glyphicon glyphicon-check" onclick="marcarResuelta(<?php echo $gestorTarea->id ?>)"> </button>
                                       <?php } ?>
				  <?php if ($gestorTarea->fecha_vencimiento) { ?> 
                                                                                <small class="pull-right"><strong><?php echo $gestorTarea->fecha_vencimiento->format('d-m-Y')?></strong> </small>
                          <?php } ?>
			    </div>
            	<?php } ?>
            	
            <?php } ?>
 </div>     
 </div>