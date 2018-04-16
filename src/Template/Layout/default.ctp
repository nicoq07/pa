<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$description = 'Iba Escuela ' .date("Y");
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $description?>:
        <?= $this->fetch('title') ?>
    </title>
     
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['bootstrap.min', 'base.css', 'font-awesome.min', 'login' ,'menulateral' , 'varios','css-loader','chat','cards','noTables','top-nav-bar']) ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script(['jquery-3.1.1.min','bootstrap','varios','ajaxAlumnos']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script')?>
	<?php $fondo  = $current_user['fondo'];
	$ds  = DS;
	if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
	{
		$ds = DS_WINDOWS_IMG;
	}
	?>
<?php if (!empty($current_user['fondo'])) : ?>
    <style type="text/css">
     body{
		background: url('<?php echo $this->Url->image('fondos'.$ds.$fondo)?>') no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
    
    </style>
<?php endif; ?>
</head>
<body>
 <?php if (!empty($current_user)) : ?>
    
         <?php if (!empty($current_user) && $current_user['rol_id'] === ADMINISTRADOR) : ?>
          	 <?= $this->element('menuAdminTopBar');?>
         <?php elseif (!empty($current_user) && $current_user['rol_id'] === PROFESOR) : ?>
         	<?= $this->element('menuProfeTopBar') ?>
         <?php endif; ?>
        
     
   <?php endif;?>
   
         
    
    <?= $this->Flash->render() ?>
	<div class='image' ></div>
    <div class ="flex-container" >
     	<div  class="col-lg-12 nopadding">
     	
           	 <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
