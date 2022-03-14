<?php
get_header();
?>
    <article class="content px-3 py-5 p-md-5">
    <? if ( have_posts()): ?>
        <? while( have_posts() ): ?>
            <?php 
                the_post();
                get_template_part('template-parts/content','allhouses');
            ?>
        <? endwhile; ?> 
    <? else: ?>
        <p>You have no POST</p>
    <? endif; ?>
    <?php 
        the_posts_pagination();
    ?>
    </article>
<?php
get_footer();
?>

