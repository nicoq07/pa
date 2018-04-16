<?= $this->assign('title', 'Enviadas');?>
<div class="container-fluid col-lg-8 col-lg-offset-1 panel panel-default">
    <div class="row">
        <div class="col-md-12 current-chat">
            <div class="row chat-toolbar-row">
                <div class="col-sm-12">

                    <div class="btn-group chat-toolbar panel-heading" role="group" aria-label="...">
                       <?php if($current_user['rol_id'] == ADMINISTRADOR): ?>
                        <?=  $this->Html->link(' Nuevo mensaje', ['controller' => 'Notificaciones', 'action' => 'add'],['class' => 'btn btn-default ticket-option fa fa-pencil ']) ?>
                        <?php endif; ?>
                        <?php if($current_user['rol_id'] !== ADMINISTRADOR): ?>
                        <?=  $this->Html->link(' Nuevo mensaje', ['controller' => 'Notificaciones', 'action' => 'addProfesor'],['class' => 'btn btn-default ticket-option fa fa-pencil ']) ?>
                        <?php endif; ?>

                    </div>
                     <div class="btn-group chat-toolbar" role="group" aria-label="...">
                        <?=  $this->Html->link(' Recibidas', ['controller' => 'Notificaciones', 'action' => 'index'],['class' => 'btn btn-default ticket-option fa fa-send ']) ?>

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
                                        <?= //h($users[$mensaje->emisor]) 
											h("Yo") 
										?>
                                     <!--  </div> -->
                                    </div>
                                    <div class="pull-left" style="text-align: center; margin-top:10px;">
                                     <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </div>
                                    <div class="pull-left icono-mensaje4">
                                        <?= h($users[$mensaje->receptor]) ?>
                                     <!--  </div> -->
                                    </div>
                                    
                                    <div style="height: 100%;" class="media-body">
                                        <?= h($mensaje->descripcion) ?>
                                        <br>
                                        <small class="text-muted">  <?="  " . h($mensaje->created->format('h:m a d-m-Y '))  ?></small>
                                        <small class="pull-right "> <?= $mensaje->leida ? h("Vista") : h("")  ?> </small>
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
