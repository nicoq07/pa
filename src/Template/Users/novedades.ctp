<style>
.fading-side-menu.affix-top {
    opacity: 1;
    transition: opacity 1s
}
.fading-side-menu.affix {
    top: 11.5px;
}
.fading-side-menu.affix {
    opacity: 0.2;
    transition: opacity 5s
}
.fading-side-menu.affix:hover {
    opacity: 1;
    transition: opacity 0.3s
}
/* RECOMMENDED STYLING BUT NOT REQUIRED */
.fading-side-menu a {
    color: rgb(102, 102, 102);
}
.fading-side-menu a .fa {
    padding-right:15px;
}

/* FOR DEMO ONLY */
</style>
<div class="container">
           <div class="panel fading-side-menu" data-spy="affix" data-offset-top="350">
            <h5><?php echo h($version)?></h5><hr class="no-margin">
            <ul class="list-unstyled">
            <?php foreach ($contenido as $line) :?>
            
                <li>
                    <a href="#intro">
                        <span class="fa fa-angle-double-right text-primary"></span> <?php echo h($line);?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
</div>
