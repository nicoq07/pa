 <style>
 	.tamano-titulo
 	{
 	font-size: 3rem;
 	}
 	
 	.tamano-encabezado
 	{
 	font-size: 1.8rem;
 	}
 	
 	.tamano-tabla
 	{
 	font-size: 1.5rem;
 	}
 	
 
 </style> 
<?= $this->assign('title', "Cumpleaños del mes de $month");?> 
   <div class= "col-lg-12"><p class ="legend tamano-titulo"><?= h("Cumpleaños del mes de $month")?></p> </div>
    <table class= "table table-striped">
            <tr>
                <th width = "80%" scope="row" class = "tamano-encabezado"><?= h("Nombre") ?></th>
                <th scope="row"  class = "tamano-encabezado" ><?= h("Dia") ?></th>
            </tr>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td  class = "tamano-tabla"><?= h($alumno->presentacion)?></td>
                <td  class = "tamano-tabla"><?= h($alumno->fecha_nacimiento->format('j')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>