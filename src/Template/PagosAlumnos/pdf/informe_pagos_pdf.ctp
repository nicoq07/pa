 <style>
 	.tamano-titulo
 	{
 	font-size: 2rem;
 	}
 	
 	.tamano-encabezado
 	{
 	font-size: 1.8rem;
 	}
 	
 	.tamano-tabla
 	{
 	font-size: 1.5rem;
 	}
 	
 	.divs-contenedores
 	{
 		paddin:0;
 		margin-bottom:10px;
 		width:100%;
		float:left;
		border: 1px grey;
		border-style:dotted;
 	}
 .td-numeros
 {
  text-align:center;
  font-size: 1rem;
  font-weight: bold;
  }
 
 </style> 
<?= $this->assign('title', "Informe de Pagos : $nombreMes");?> 
 <body>
   <div style="width: 80%;float:left;"><p class ="legend tamano-titulo"><?= h("Informe de Pagos : $nombreMes $year")?></p> </div>
   <div class="nopadding" >
  <div style="width: 20%; float:left;">
	   <div style="margin: 0; top:0 text-align:center">
				<?php  echo $this->Html->image('logoIba.png', ['height' => '100px', 'width' => '100px', 'fullBase' => true]); ?>
		</div>
	</div>
      <!-- $cantPagosGenerados -->
    <div class="divs-contenedores">
	     <table class="table"> 
   				<tr>
   					<th width="30%">
   						<?php echo h("Cantidad de pagos generados: ")?>
   					</th>
   					<td class="td-numeros" width="20%">
   						<?php echo h($cantPagosGenerados->pagosgenerados)?>
   					</td>
   					<th width="30%">
   						<?php echo  h("Monto de pagos generados: ")?>
   					</th>
   					<td  class="td-numeros" width="20%">
   						<?php echo h($this->Number->format($cantPagosGenerados->montototal,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ]))?>
   					</td>
   				</tr>
   			</table>
    </div>
    
    
    <div class="divs-contenedores">
     <table class="table"> 
   				<tr>
   					<th width="30%">
   						<?php echo h("Cantidad de pagos pagados: ")?>
   					</th>
   					<td  class="td-numeros" width="20%">
   						<?php echo h($cantPagosPagados->cantidadDePagosPagados)?>
   					</td>
   					<th width="30%">
   						<?php echo  h("Monto de pagos pagados: ")?>
   					</th>
   					<td  class="td-numeros" width="20%">
   						<?php echo h($this->Number->format($cantPagosPagados->montoTotal,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ]))?>
   					</td>
   				</tr>
   			</table>
    </div>
    
    
    <div class="divs-contenedores">
     <table class="table"> 
   				<tr>
   					<th width="30%">
   						<?php echo h("Cantidad de pagos adeudados: ")?>
   					</th>
   					<td  class="td-numeros" width="20%">
   						<?php echo h($cantPagosNoPagados->noPagados)?>
   					</td>
   					<th width="30%">
   						<?php echo  h("Monto de pagos adeudados: ")?>
   					</th>
   					<td  class="td-numeros" width="20%">
   						<?php echo h($this->Number->format($cantPagosNoPagados->montoTotal,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ]))?>
   					</td>
   				</tr>
   			</table>
    </div>
     <!-- del 1 al 10 -->
    <div class="divs-contenedores">
   		<div class="col-lg-3"><span><?php echo h("Pagos del 1 al 10: ") ?> </span> </div>
   		<div class="col-lg-6"> 
   			<table class="table"> 
   				<tr>
   					<th>
   						<?php echo h("Alumno")?>
   					</th>
   					<th>
   						<?php echo h("Fecha de pago")?>
   					</th>
   				</tr>
   				<?php foreach ($pagosAlDiez as $pa) {?>
   				<tr>
   					<td  class="td-numeros">
   						<?php echo h($pa->alumno)?>
   					</td>
   					<td  class="td-numeros">
   						<?php echo h($pa->fecha->format('d/m/Y'))?>
   					</td>
   				</tr>
   				<?php }?>
   			</table>
   		</div>
   		
    </div>
    
      <!-- del 11 a FIN -->
    <div class="divs-contenedores">
     <div class="col-lg-3"><span><?php echo h("Pagos del 11 a Fin de Mes: ") ?> </span> </div>
   		<div class="col-lg-6"> 
   			<table class="table"> 
   				<tr>
   					<th>
   						<?php echo h("Alumno")?>
   					</th>
   					<th>
   						<?php echo h("Fecha de pago")?>
   					</th>
   				</tr>
   				<?php foreach ($pagosDelOnceAFin as $pa) {?>
   				<tr>
   					<td  class="td-numeros">
   						<?php echo h($pa->alumno)?>
   					</td>
   					<td  class="td-numeros">
   						<?php echo h($pa->fecha->format('d/m/Y'))?>
   					</td>
   				</tr>
   				<?php }?>
   			</table>
   		</div>
    </div>
    
    
    <div class="divs-contenedores">
     <div class="col-lg-3"><span><?php echo h("Deudores: ") ?> </span> </div>
   		<div class="col-lg-6"> 
   			<table class="table"> 
   				<tr>
   					<th>
   						<?php echo h("Alumno")?>
   					</th>
   					<th>
   						<?php echo h("Monto que adeuda")?>
   					</th>
   				</tr>
   				<?php foreach ($alumnosDeudoresDelMes as $pa) {?>
   				<tr>
   					<td  class="td-numeros">
   						<?php echo h($pa->alumno)?>
   					</td>
   					<td  class="td-numeros">
   						<?php echo h($this->Number->format($pa->montoadeudado,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ]))?>
   					</td>
   				</tr>
   				<?php }?>
   			</table>
   		</div>
    </div>
    
   </div>
   </body>