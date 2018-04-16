<script type="text/javascript">
$(document).ready(parpadear);
function parpadear(){
$('#noti').css('color', 'red').fadeIn(500).delay(250).fadeOut(500, parpadear) }
</script>
<div class="col-lg-2 nopadding">
	<nav class="navbar navbar-default sidebar" role="navigation">
	    <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
	        <span class="sr-only">Menu</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>      
	    </div>
	    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	       <li class="dropdown">
	          
	        
	           <?= $this->Html->link(h('Clases del día'), ['controller' =>'Users', 'action' => 'pPerfil'],['class' => 'dropdown-toggle','escape' => true]) ?>
	             <!--          SECCION SEGUIMIENTOS-->
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver'), ['controller' =>'Alumnos', 'action' => 'pIndex']) ?></li>
	          	 <li><?= $this->Html->link(h('Exámenes'), ['controller' =>'examenes', 'action' => 'addProfesor'],['target' => '_blank' ]) ?></li>
	            
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	               <!--          SECCION SEGUIMIENTOS-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seguimientos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	            <li><?= $this->Html->link(h('Ver por día'), ['controller' =>'SeguimientosClasesAlumnos', 'action' => 'pPorDia']) ?></li>
	            <li><?= $this->Html->link(h('Ver todos'), ['controller' =>'SeguimientosClasesAlumnos', 'action' => 'pIndex']) ?></li>
	          </ul>
	        </li>
	         <!--  FIN SECCION SEGUIMIENTOS-->
	          <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notificaciones <span class="caret"></span><span id="<?= empty($not) ? "" : "noti"?>" style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-bell "></span></a>
	          <ul class="dropdown-menu forAnimate" role="menu">
	          	<li><?= $this->Html->link(h('Nueva'), ['controller' =>'Notificaciones', 'action' => 'addProfesor']) ?></li>
	            <li><?= $this->Html->link(h('Recibidas'), ['controller' =>'Notificaciones', 'action' => 'index']) ?></li>
	            <li><?= $this->Html->link(h('Enviados'), ['controller' =>'Notificaciones', 'action' => 'enviadas']) ?></li>
	         	
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
</div>