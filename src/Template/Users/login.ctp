<?= $this->assign('title', 'Ingreso'); ?>
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-md-12">
    	     <?= $this->Flash->render('auth') ?>
        	    <div class="col-lg-4 col-lg-offset-4">
                <h1><?= h("Ingreso a SIBA"); ?> </h1>
                    <?= $this->Form->create('login-form') ?>
                        <div class="form-group">
                        <?= $this->Form->input('nombre_usuario',['class' => 'form-control', 'placeholder' => 'Nombre de usuario',
                         'label' => false , 'require'])?>
<!--                             <label for="email" class="sr-only">Nombre de usuario</label> -->
<!--                             <input type="email" name="email" id="email" class="form-control" placeholder="nperez"> -->
                        </div>
                        <div class="form-group">
<!--                             <label for="key" class="sr-only">Password</label> -->
<!--                             <input type="password" name="key" id="key" class="form-control" placeholder="Password"> -->
                                <?= $this->Form->input('password',['name' => "password" , 'class' => 'form-control', 'placeholder' => 'Password',
                         'label' => false , 'require'])?>
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span>Mostrar password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Ingresar">
                    <?= $this->Form->end() ?>
                   <!--  <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Te olvidaste la password?</a>  -->
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
           	    <p><?php echo h($version. '- '.date('Y'));?></p>
                <p>Powered by <strong><a href="https://www.linkedin.com/in/nicol%C3%A1s-quiroga-20a541b6/" target="_blank"><?php echo h('©NiQ')?></a></strong></p>
            </div>
        </div>
    </div>
</footer>