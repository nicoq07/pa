<div class="col-lg-3 col-lg-offset-3 well">
	<fieldset>
  		<legend><?= h("¿Qué pago vas a generar?") ?></legend>
  		    <?= $this->Html->link('A todos',['action' => 'pagoGeneral' ],['class' => 'btn-lg btn-success pull-left','target' => '_blank']) ?>
         <?= $this->Html->link('A Particular',['action' => 'pagoManual' ],['class' => 'btn-lg btn-info pull-right','target' => '_blank']) ?>
   </fieldset>
 </div>
<div class="col-lg-3 col-lg-offset-3">
    <fieldset>
       </fieldset>
</div>
