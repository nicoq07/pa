<div class="col-lg-12">
    <?php  echo $this->Form->create('searchCurrentYear', ['id' => 'frmBusquedaAnio', 'url' => ['action' => 'searchCurrentYear']]); ?>
    <div class="col-lg-4"style="top:10px;" > 
	  		  <?php echo $this->Form->year('cboYear',['empty' => 'Año', 'maxYear' => date('Y'), 'onchange'=>'document.getElementById("frmBusquedaAnio").submit()' ]);?>
    </div> 
    <?php  echo $this->Form->end();?>
</div>