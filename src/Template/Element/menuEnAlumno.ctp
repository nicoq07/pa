<div class="col-lg-12">
<div class="col-lg-2"><div style="margin: 5px 0px 5px 5px;"><?php  echo $this->Html->link('Ficha externa', ['action' => 'fichaExterna', $alumno->id ,'_ext' => 'pdf'],['class' => 'btn btn-info', 'margin-top' => '10px','target' => '_blank']); ?></div>
</div>
<div class="col-lg-2"><div style="margin: 5px 0px 5px 5px;"><?php  echo $this->Html->link('Ficha interna', ['action' => 'fichaInterna', $alumno->id ,'_ext' => 'pdf'],['class' => 'btn btn-info', 'margin-top' => '10px','target' => '_blank']); ?></div>
</div>
<div class="col-lg-2"><div style="margin: 5px 0px 5px 5px;"><?php  echo $this->Html->link('Editar', ['action' => 'edit', $alumno->id],['class' => 'btn btn-warning']); ?></div>
</div>
<div class="col-lg-2"><div style="margin: 5px 0px 5px 5px;"> <?= $this->Form->postLink(__('Baja'), ['action' => 'baja', $alumno->id],[ 'margin-top' => '10px','class' => 'btn btn-danger','confirm' => __('Vas a dar de baja a {0}?', $alumno->presentacion)]) ?> </div>
</div>
<div class="col-lg-2"><div style="margin: 5px 0px 5px 5px;"> <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $alumno->id],[ 'margin-top' => '10px','class' => 'btn btn-danger','confirm' => __('Vas a elimnar a {0}. Cuidado!', $alumno->presentacion)]) ?> </div>
</div>
</div>     
	     
	     
