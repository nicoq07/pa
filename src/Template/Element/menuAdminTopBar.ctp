<nav class="top-bar expanded top-bar-border" data-topbar role="navigation">
    <div class="col-lg-2">
	    <ul class="text-center">
	    	<li class="name">
	        	<h1><a href=""><?= $this->fetch('title') ?></a></h1>
	        </li>
		</ul>
    </div>
	<div class="col-lg-8 ">
	 <div class="container-flex">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
    <ul class="nav navbar-nav font-menu">
	      <li class="dropdown">
	        	 <?php echo $this->Html->link("<span style='font-size:20px;' class='fa fa-home'></span>", ['controller' => 'Users' , 'action' => 'perfil'], ['title' => 'Clases de día','escape' => false]);?>	
	        </li>
	        <li class="dropdown">
	         	          
	        </li>
	<!--          SECCION ALUMNOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	             <li><?= $this->Html->link(h('Alta'), ['controller' =>'alumnos', 'action' => 'add']) ?></li>
	             <li><?= $this->Html->link(h('Ver todos'), ['controller' =>'alumnos', 'action' => 'index']) ?></li>
	          	 <li><?= $this->Html->link(h('Cumpleaños'), ['controller' =>'alumnos', 'action' => 'listadoCumple']) ?></li>
	          	 <li><?= $this->Html->link(h('Exámenes'), ['controller' =>'examenes', 'action' => 'index']) ?></li>
	          
	          </ul>
	        </li>    
	          <!--  FIN SECCION ALUMNOS-->
	          <!--          SECCION Operadores-->
	      <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
	       		 <li class="dropdown-submenu">
	       		   <a tabindex="-1" href="#">Operadores</a>
				          <ul class="dropdown-menu">
				            <li><?= $this->Html->link(h('Alta'), ['controller' =>'Operadores', 'action' => 'add']) ?></li>
            	            <li><?= $this->Html->link(h('Ver todos'), ['controller' =>'Operadores', 'action' => 'index']) ?></li>
            	            <li><?= $this->Html->link(h('Planillas'), ['controller' =>'Operadores', 'action' => 'planillas']) ?></li>
        	          	</ul>
				  </li>	
				  <li class="divider"></li>
				  <li class="dropdown-submenu"> 
				   <a tabindex="-1" href="#">Profesores</a>
				          <ul class="dropdown-menu">
				            <li><?= $this->Html->link(h('Alta'), ['controller' =>'Profesores', 'action' => 'add']) ?></li>
            	            <li><?= $this->Html->link(h('Ver todos'), ['controller' =>'Profesores', 'action' => 'index']) ?></li>
        	          	</ul>
				  </li>	
	          </ul>
	        </li>
	           <!--  FIN SECCION Operadores-->
	    <!--          SECCION CLASES-->
	      <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	             <li><?= $this->Html->link(h('Nueva clase'), ['controller' =>'clases', 'action' => 'add']) ?></li>
	             <li><?= $this->Html->link(h('Ver clases'), ['controller' =>'clases', 'action' => 'index']) ?></li>
	           	 <li class="divider"></li>
	           	<li><?= $this->Html->link(h('Nueva disciplina'), ['controller' =>'disciplinas', 'action' => 'add']) ?></li>
	             <li><?= $this->Html->link(h('Ver disciplinas'), ['controller' =>'disciplinas', 'action' => 'index']) ?></li>
	           	 <li class="divider"></li>
	           	 <li><?= $this->Html->link(h('Nuevo horario'), ['controller' =>'horarios', 'action' => 'add']) ?></li>
	           	 <li><?= $this->Html->link(h('Ver horarios'), ['controller' =>'horarios', 'action' => 'index']) ?></li>
	           	 <li class="divider"></li>
	           	 <li><?= $this->Html->link(h('Nuevo ciclo lectivo'), ['controller' =>'Ciclolectivo', 'action' => 'add']) ?></li>
	           	 <li><?= $this->Html->link(h('Ver ciclo lectivo'), ['controller' =>'Ciclolectivo', 'action' => 'index']) ?></li>
	           
	          </ul>
	        </li>
	           <!--  FIN SECCION CLASES-->
	             <!--          SECCION SEGUIMIENTOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seguimientos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-sort"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver seguimientos'), ['controller' =>'SeguimientosPrograma', 'action' => 'index']) ?></li>
	            <li><?= $this->Html->link(h('Informe'), ['controller' =>'SeguimientosPrograma', 'action' => 'informe'],['target' => '_blank' ]) ?></li>
	         	<li class="divider"></li>
	           	 <li><?= $this->Html->link(h('Nueva calificación'), ['controller' =>'calificaciones', 'action' => 'add']) ?></li>
	           	 <li><?= $this->Html->link(h('Ver calificaciones'), ['controller' =>'calificaciones', 'action' => 'index']) ?></li>
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	             <!--          SECCION USERS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span><span style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-user-o "></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver usuarios'), ['controller' =>'Users', 'action' => 'index']) ?></li>
	            <li><?= $this->Html->link(h('Crear'), ['controller' =>'Users', 'action' => 'add']) ?></li>
	          </ul>
	        </li>
	         <!--  FIN SECCION USERS-->
	         <li class="dropdown">
	         <?php empty($not) ? $not = '' : $not ='noti'?>
        		 <?php echo $this->Html->link("<span id='$not' style='font-size:20px;' class='fa fa-lg fa-bell'></span>", ['controller' => 'Notificaciones' , 'action' => 'index'], ['title' => 'Notificaciones','escape' => false]);?>
	         </li>
	         <li class="dropdown" style="height: 50px">
	         <?php empty($task) ? $task= '' : $task='campana'?>
        		 <?php echo $this->Html->link("<span id='$task' style='font-size:20px;' class='fa fa-thumb-tack'></span>", ['controller' => 'GestorTareas' , 'action' => 'index'], ['title' => 'Tareas','escape' => false]);?>
	         </li>
	      </ul>
    </div>
  </div>
	</div>
	<div  class="col-lg-2">
		<ul class="nav navbar-nav navbar-left text-center">
			<li>
				<a style="color: white; background-color:#01545B;" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if (!empty($current_user)) : print $current_user['nombre'] ; endif;?> <b class="caret"></b></a>
	                <ul class="dropdown-menu forAnimate">
	                	<?php if (!empty($current_user) && $current_user['rol_id'] === ADMINISTRADOR) : ?>
	                		<li><?= $this->Html->link(h('Parámetros'), ['controller' =>'Parametros', 'action' => 'index']) ?></li>							
	                	<?php endif; ?>
	                	<li><?= $this->Html->link(h('Cambiar fondo'), ['controller' =>'Users', 'action' => 'cargarFondo']) ?></li>							
						<li><?= $this->Html->link(h('Cambiar password'), ['controller' =>'Users', 'action' => 'cambiarPassword',$current_user['id']]) ?></li>	
						<li class="dropdown-submenu pull-left"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notificaciones</a>
				          <ul class="dropdown-menu forAnimate">
				            <li><?= $this->Html->link(h('Nueva'), ['controller' =>'Notificaciones', 'action' => 'add']) ?></li>
				            <li><?= $this->Html->link(h('Enviadas'), ['controller' =>'Notificaciones', 'action' => 'enviadas']) ?></li>
				            <li><?= $this->Html->link(h('Recibidas'), ['controller' =>'Notificaciones', 'action' => 'index']) ?></li>
				          </ul>
				        </li>						
	            		<li><?= $this->Html->link(h('Salir'), ['controller' =>'Users', 'action' => 'logout']) ?></li>
	            		
					</ul>
			</li>
		</ul>
	</div>
</nav>
<script type="text/javascript">
$(document).ready(parpadear);
function parpadear(){ $('#campana').css('color', 'red').fadeIn(500).delay(250).fadeOut(500, parpadear);
$('#noti').css('color', 'red').fadeIn(500).delay(250).fadeOut(500, parpadear) }
</script>    