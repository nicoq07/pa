<nav class="top-bar expanded top-bar-border" style="text-align: center;" data-topbar role="navigation">
    <div class="col-lg-2">
	    <ul class="">
	    	<li class="name">
	        	<h1><a href=""><?= $this->fetch('title') ?></a></h1>
	        </li>
		</ul>
    </div>
	<div class="col-lg-7 ">
	 <div class="container-fluid">
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
 			<?= $this->Html->link(h('Clases del día'), ['controller' =>'Users', 'action' => 'oPerfil'],['class' => 'dropdown-toggle','escape' => true]) ?>	        </li>
	        <li class="dropdown">
	         	          
	        </li>
	<!--          SECCION ALUMNOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver'), ['controller' =>'Alumnos', 'action' => 'oIndex']) ?></li>
	         <li><?= $this->Html->link(h('Planillas'), ['controller' =>'Operadores', 'action' => 'planilla_cursos', $current_user['operador_id']]) ?></li>
	            
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	               <!--          SECCION SEGUIMIENTOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seguimientos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver seguimientos'), ['controller' =>'SeguimientosPrograma', 'action' => 'oIndex']) ?></li>
	            <li><?= $this->Html->link(h('Ver por día'), ['controller' =>'SeguimientosPrograma', 'action' => 'oPorDia']) ?></li>
	            <li><?= $this->Html->link(h('Agregar Manualmente'), ['controller' =>'SeguimientosPrograma', 'action' => 'addOperador', $current_user['operador_id']]) ?></li>
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	          <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notificaciones <span class="caret"></span><span id="<?= empty($not) ? "" : "noti"?>" style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-bell "></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	          	<li><?= $this->Html->link(h('Nueva'), ['controller' =>'Notificaciones', 'action' => 'addOperador']) ?></li>
	            <li><?= $this->Html->link(h('Recibidas'), ['controller' =>'Notificaciones', 'action' => 'index']) ?></li>
	            <li><?= $this->Html->link(h('Enviados'), ['controller' =>'Notificaciones', 'action' => 'enviadas']) ?></li>
	            </ul>
	            </li>
	 </ul>
    </div>
  </div>
	</div>
	<div  class="col-lg-2">
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a style="color: white; background-color:#01545B;" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if (!empty($current_user)) : print $current_user['nombre'] ; endif;?> <b class="caret"></b></a>
	                <ul class="dropdown-menu forAnimate">
	                	<?php if (!empty($current_user) && $current_user['rol_id'] === ADMINISTRADOR) : ?>
	                		<li><?= $this->Html->link(h('Parámetros'), ['controller' =>'Parametros', 'action' => 'index']) ?></li>							
	                	<?php endif; ?>
	                	<li><?= $this->Html->link(h('Cambiar fondo'), ['controller' =>'Users', 'action' => 'cargarFondo']) ?></li>							
						<li><?= $this->Html->link(h('Cambiar password'), ['controller' =>'Users', 'action' => 'cambiarPassword',$current_user['id']]) ?></li>							
	            		<li><?= $this->Html->link(h('Salir'), ['controller' =>'Users', 'action' => 'logout']) ?></li>
					</ul>
			</li>
		</ul>
	</div>
</nav>
<script type="text/javascript">
<script type="text/javascript">
$(document).ready(parpadear);
function parpadear(){
$('#noti').css('color', 'red').fadeIn(500).delay(250).fadeOut(500, parpadear) }
</script>  