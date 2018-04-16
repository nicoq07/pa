<script type="text/javascript">
function cambiarEstado(id)
{
	jsShowWindowLoad() ;
 	 $.ajax({
        url: "<?php echo \Cake\Routing\Router::url(array('controller'=>'Parametros','action'=>'cambiarEstado'));?>",
 	        type: "post",
 	        data: {id:id },
 	        success: function(data) {
 	        },
 	        error: function(error){
 				alert("Error " 
 		 				+ error);
 				jsRemoveWindowLoad();
 	        },
 	        complete: function() {
 	        	jsRemoveWindowLoad();
 	        }
 	    });
 }
</script>
<?php echo $this->Html->css('switch');?>
<div class="parametros large-9 medium-8 columns content">
    <h3><?= __('Parametros') ?></h3>
          <div><?= $this->Html->link(__('Nuevo'), ['action' => 'add'],['class' => 'btn btn-success pull-right']) ?> </div>
    <table>
        <thead>
            <tr>
                <th width="20%" scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col" class="actions"><?= __('Info') ?></th>
                 <th width="20%" scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametros as $parametro): ?>
            <tr>
                <td><?= h($parametro->nombre) ?></td>
                <td>
						    <p><?= h($parametro->descripcion)?></p>
				</td>
                <td>
	               <label class="switch">
					  <input onChange="cambiarEstado('<?php echo $parametro->id ;?>');" type="checkbox" <?=  $parametro->valor ?  "checked" :  "" ;?>>
					  <span class="slider"></span>
					</label>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php echo $this->Html->script('modal');?>

