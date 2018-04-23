<style>
.card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    margin-bottom: 10px;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,1,1);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}
</style>



<div class="col-lg-4 col-lg-offset-4 panel panel-info">
<div class="panel-heading"><h3>Seleccione fondo</h3></div>
<?php echo $this->Form->create();?>
<?php  foreach ($fondos as $nombre => $fondo){?>
	
	<div class="card">
	<?php
		$ds  = DS;
		if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
		{
			$ds = DS_WINDOWS_IMG;
		}
		echo $this->Html->image('fondos/'. $ds .$fondo, ['escape' => true , 'width' => "300px"]); 
		echo $this->Form->button($nombre,['name'=> 'fondo', 'value' =>$fondo]);  
	?>
	
 </div>
  <?php } ?>
  <?php $this->Form->end();?>


</div>