<script type="text/javascript">
// $(window).on('load', function() {
// 	jsShowWindowLoad("Enviando saludos de cumpleaños! Espere por favor.") ;
// 	 $.ajax({
 //url: "<?php  echo \Cake\Routing\Router::url(array('controller'=>'Alumnos','action'=>'ajaxEnviarMails'));?>",

		 
//       type: "get",
//       data: {},
//       success: function(data) {
//     	  jsRemoveWindowLoad();
//     	  if (data)
//     	  {
//     		  alert(data);
//     	  }
    	 
//       },
//       error: function(data){
//     	  jsRemoveWindowLoad();
//     	  console.log(data);
//       },
//       complete: function() {
//     	  jsRemoveWindowLoad();
//       }
//   });
	
// 	});

$(document).ready(parpadearHome);
function parpadearHome(){ $('#campanaHome').css('color', 'red').fadeIn(500).delay(250).fadeOut(500, parpadearHome) 
	$('#taskHome').css('color', 'red').fadeIn(500).delay(250).fadeOut(500, parpadearHome) }
</script>
<?= $this->assign('title', 'Bienvenido'); ?>
<div class="col-lg-5 col-lg-offset-2 panel panel-info">
	<div class="col-lg-12 panel panel-heading">
		<h1 style="text-align: center"><?= h("Hola ". $user->nombre."!")?> </h1>
	</div>
	&nbsp;
	<div class="well col-lg-12">
		<div style="text-align: center;">
		   <?php if ($current_user['rol_id'] == ADMINISTRADOR) {
			echo $this->Html->link(__('Ir a clases del día'), ['action' => 'perfil'], ['class' => 'btn-lg btn-success']);
			}
			elseif ($current_user['rol_id'] == PROFESOR) {
				echo $this->Html->link(__('Ir a clases del día'), ['action' => 'p_perfil'], ['class' => 'btn-lg btn-success']);
			}
			elseif ($current_user['rol_id'] == OPERADOR)
			{
				echo $this->Html->link(__('Ir a clases del día'), ['action' => 'o_perfil'], ['class' => 'btn-lg btn-success']);
			}
			?>
		</div>

	</div>
	 <?php if (count($notificaciones) > 0) {?>
	<div class="well col-lg-12">
		<div style="text-align: center;">
		 <div class="col-lg-12"><span id="campanaHome" style="color: #c80009" class="fa fa-lg fa-bell"></span></div>
		 <?php echo $this->Html->link(__('Tenés notificaciones nuevas'), ['controller' => 'Notificaciones' , 'action' => 'index'], ['class' => 'fa']);?>
			
		</div>
	</div>
	<?php }?>
	  <?php if ($current_user['rol_id'] === ADMINISTRADOR) {
	  if (count($tareas) > 0) {?>
	<div class="well col-lg-4 col-lg-offset-3">
		<div style="text-align: center;">
		 <div class="col-lg-12"><span id="taskHome" style="color: #c80009" class="showopacity fa fa-thumb-tack fa-2x"></span></div>
		 <?php echo $this->Html->link(__('Hay tareas pendientes'), ['controller' => 'GestorTareas' , 'action' => 'index'], ['class' => 'fa']);?>
			
		</div>
	</div>
	<?php } }?>
</div>
<?php echo $this->Html->css('switch');?>

<?php echo $this->Html->script('modal');?>