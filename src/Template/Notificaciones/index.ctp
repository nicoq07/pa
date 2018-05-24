<script type="text/javascript">

function marcarLeido(mensajeId)
{
	$.ajax({
	url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Notificaciones','action'=>'marcarLeida'));?>",

     type: "get",
     data: {mensajeId:mensajeId },
     success: function(data) {
     	var button = $('#'+mensajeId);
     	button.hide('fast');
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
<?= $this->assign('title', 'Recibidas');?>
<div class="container-fluid col-lg-8 col-lg-offset-2 panel panel-default">
    <div class="row">
        <div class="col-md-12 current-chat">
            <div class="row chat-toolbar-row">
                <div class="col-sm-12" style="background-color: #116d76">

                     <div class="btn-group chat-toolbar panel-heading" role="group" aria-label="...">
                       <?php if($current_user['rol_id'] == ADMINISTRADOR): ?>
                        <?=  $this->Html->link(' Nuevo mensaje', ['controller' => 'Notificaciones', 'action' => 'add'],['class' => 'btn btn-default ticket-option fa fa-pencil ']) ?>
                        <?php endif; ?>
                        <?php if($current_user['rol_id'] == OPERADOR): ?>
                        <?=  $this->Html->link(' Nuevo mensaje', ['controller' => 'Notificaciones', 'action' => 'addOperador'],['class' => 'btn btn-default ticket-option fa fa-pencil ']) ?>
                        <?php endif; ?>

                    </div>
                    <div class="btn-group chat-toolbar" role="group" aria-label="...">
                        <?=  $this->Html->link(' Enviadas', ['controller' => 'Notificaciones', 'action' => 'enviadas'],['class' => 'btn btn-default ticket-option fa fa-send ']) ?>

                    </div>
                </div>
            </div>


             <div class="row current-chat-area panel-body">

                <div class="col-lg-12">
                      <ul class="media-list">
                          <?php foreach ($notificaciones as $mensaje) :  ?>
                        <li class="media">

                            <div class="media-body">
                                <div class="media">
                                    <div class="pull-left icono-mensaje">
                                        <?= h($users[$mensaje->emisor]) ?>
                                     <!--  </div> -->
                                    </div>
                                    <div style="height: 100%;" class="media-body">
                                		<div class='col-lg-10'>
                                			<?= h($mensaje->descripcion) ?>
                                        <small class="text-muted">  <?="  " . h($mensaje->created->format('h:m a d-m-Y '))  ?></small>
                                                                            
                                		</div>
                                        <div class='col-lg-2'>
                                        	<div class='col-lg-12'>
                                        	<?php echo $this->Html->link('a'); ?>
                                       		 </div>
                                       		 <div class='col-lg-12'>
<?php if (!$mensaje->leida) { ?> 
                                                                                <button title="Marcar como leída" id ="<?php echo $mensaje->id; ?>" style="background-color:#f2f1f2;"  class='pull-right btn-sm btn-default glyphicon glyphicon-check' onclick="marcarLeido(<?php echo $mensaje->id; ?>)"> </button>
                                       										 <?php } ?>                                        </div>
                                        </div>
                                        
                                        <hr>
                                       
                                    </div>
                                </div>
                            </div>

                        </li>
                          <?php endforeach; ?>
                    </ul>
                </div>
            </div>
	</div>
</div>
</div>
