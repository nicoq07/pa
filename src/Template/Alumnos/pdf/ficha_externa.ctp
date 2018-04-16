<div class="general">
	<div class="header-ficha-externa">
		<div>
	    	 <div class="div-logo-externa"> <?php  echo $this->Html->image('logoIba.png', ['height' => "150px" , 'width' => "150px",'fullBase' => true]); ?></div>
			<div class="div-logo-externa"><span class="texto-titulo"> <?= h("Instituto Buenos Aires") ?></span> </div>
			<div class="div-logo-externa"><span style="margin:0; width:100% ;font-size: 2rem; font-size-adjust: none; "> <?= h("Escuela de Música") ?></span> </div>
			<div class="div-logo-externa"><span style="margin:0; width:100% ;font-size: 2rem; font-size-adjust: none; "> <?= h("Profesor Hugo Castro") ?></span> </div>
		</div>
			
	    	<div class="div-alumno-externa"><p style="margin:0; width:100% ;font-size: 2.5rem; font-size-adjust: none; " > <?= h("Alumno: ". $alumno->presentacion) ?></p> </div>
	</div>
	<div>
		<table class="table">
			<tr>
				<td style="border: 4px solid; text-align:center; " class="view-div text-dia-horaio"  colspan="1"><?= h("Ingreso") ?></td><td style="text-align:center;border: 4px solid; " class="view-div text-dia-horaio" colspan="2"><?= h($alumno->created->format('d/m/Y')) ?></td>
				<td style="border: 4px solid; text-align:center; " class="view-div text-dia-horaio"  colspan="1"><?= h("Arancel") ?></td><td style="border: 4px solid; text-align:center; " class="view-div text-dia-horaio" colspan="2"><?=$alumno->monto_arancel?  h($this->Number->format($alumno->monto_arancel,[
	                                  'before' => '$',
	                                  'locale' => 'es_Ar'
	                                  ])) : "-" ?></td>
			</tr>
		</table>
	</div>
	 <div class="related separador">
        <span style="text-align:center;  font-size:1.5rem; font-style: bold; " ><?= __('Clases: ' ) ?></span>
        <?php if (!empty($alumno->clases)): ?>
        <table class="table table-striped">
            <?php foreach ($alumno->clases as $clases): ?>
            <tr>
                <td style="text-align:center;  font-size:1.5rem; font-style: bold; "><?= h($clases->presentacion) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="div-footer">
	    <div style="border: 1px dotted; float:left; text-align:center;  font-size:2rem; font-style: bold; width: 34.2cm" class="separador" ><span> <?=  h("José León Suárez 5246 CP(1439) - Tel: 4638-5062")?></span> 
	    </div>
		 <div style="border: 1px dotted;float:left; text-align:center;  font-size:1.5rem; font-style: bold; width: 10cm" class="separador"  >
		 			<span>
						 <?=  h("www.ibalugano.com.ar")?>
	    			</span>
		 </div>
		<div style="border: 1px dotted;float:left; text-align:center;  font-size:1.5rem; font-style: bold; width: 14.2cm" class="separador"  >
		 			<span > <?=  h("www.facebook.com/ibalugano")?></span>
		 </div>
		  <div style="border: 1px dotted;float:left; text-align:center;  font-size:1.5rem; font-style: bold; width: 10cm" class="separador"  >
		 			 	<span ><?=  h("ibalugano@gmail.com")?></span>
		 </div>	
    </div>
</div>
