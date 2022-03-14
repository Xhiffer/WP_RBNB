<div class="container">
    <header class="content-header">
        <div class="meta mb-3"><span class="date"><?php the_date();?></span>
        <?php 
        the_tags('<span class="tag"><i class="fa fa-tag"></i>','</span>
        <span class="tag"><i class="fa fa-tag"></i>','</span>')
        ?> 
        <span class="comment"><a href="#comments"><i class='fa fa-comment'></i> <?php comments_number()?></a></span></div>
    </header>
    <?php if (get_post_meta(get_the_ID(), 'wpheticSponso', true)) : ?>
                        <div class="alert alert-primary" role="alert">
                            Contenu Soponso
                        </div>
                    <?php endif; ?>
                    <div class="alert alert-primary" role="alert">
                            <?get_post_meta(get_the_ID(), 'prix', true)?>
                        </div>
    <?php 
    the_content();
    ?>


<?php 
comments_template();
?>
</div>