<?php
/**
 * The Template for displaying article layout
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'partials/header' ) ); ?>

<button class="scrollToTop" type="button"></button>
<div class="buffer"></div>
<div id="content-body" class="md-container">
	<h1><?php echo wp_title(''); ?></h1>
	<?php query_posts('posts_per_page=90'); ?>
		<?php if (have_posts()) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php 	
				$imageid = get_post_thumbnail_id($post->ID);
				$imagesrc = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
				$imagealt = get_post_meta($imageid,'_wp_attachment_image_alt',true);
			?>
	          <article class="row">
	          	<div class="col-md-4 super-img">
					<a href="<?php the_permalink(); ?>"><img class="lazy img-responsive" src="<?php echo $imagesrc; ?>" alt="<?php echo $imagealt; ?>"></a>
	            </div>
	            <div class="col-md-8">
	              <a href="<?php the_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
	              <address class="author">By <?php the_author_posts_link(); ?></address>
	              <p><?php echo get_the_excerpt(); ?></p>
	            </div>
	          </article>
			<?php endwhile; ?>
		<?php endif; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'partials/footer' ) ); ?>