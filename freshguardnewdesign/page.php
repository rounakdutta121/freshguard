<?php
get_header();
?>
<main class="shell" style="padding:120px 0;background:#fff;min-height:50vh">
<?php
while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class(); ?>><h1><?php the_title(); ?></h1><div><?php the_content(); ?></div></article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
