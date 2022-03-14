<?php
get_header();
?>
    <article class="content px-3 py-5 p-md-5">
    <? if ( have_posts()): ?>
        <? while( have_posts() ): ?>
            <?php 
                the_post();
                the_content();
            ?>
        <? endwhile; ?> 
    <? else: ?>
        <p>You have no POST</p>
    <? endif; ?>
    </article>
<?php
get_footer();
?>

