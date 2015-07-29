<?php
/**
 * The template for displaying Category Archive pages
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

<div id="masthead">
  <div class="masthead-container">
    <img src="<?php bloginfo('template_directory'); ?>/images/esperanto-logo.png" alt="Esperanto Magazine" width="80%">
  </div>
</div>

<div id="main-content">
	<div id="featured">

		<!-- Carousel -->
		<?php query_posts('category_name=features,sex-edition&posts_per_page=4&orderby=menu_order'); ?>
		<?php if ( have_posts() ): ?>
      	<div class="list_carousel responsive" >
            <ul id="carousel">
			<?php while ( have_posts() ) : the_post();
				$imageid = get_post_thumbnail_id($post->ID);
				$imagesrc = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
				$imagealt = get_post_meta($imageid,'_wp_attachment_image_alt',true);
			?>
				<li>
					<a href="<?php the_permalink() ?>"><img src="<?php echo $imagesrc; ?>" alt="<?php echo $imagealt; ?>">
	                  <div class="meta">
	                    <h3><?php echo get_the_title(); ?></h3>
	                    <p><?php echo get_the_excerpt(); ?></p>
	                  </div>
	                </a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			</ul>
			<div class="clearfix"></div>
            <div id="controller">
              <a id="prev" class="prev" href="#"></a>
              <a id="next" class="next" href="#"></a>
            </div>
            <div class="clearfix"></div>
		</div>
		<?php else: ?>
			<h2>No posts to display</h2>
		<?php endif; ?>
		<!-- END Carousel -->
	</div>

	<!-- Super Articles -->
	<?php query_posts('category_name=sex-edition&meta_key=type&meta_value=super&posts_per_page=2'); ?>
	<?php if( have_posts() ): ?>
		<div id="super" class="container">
		<?php while ( have_posts() ) : the_post(); ?>
		<?php 	
			$imagesrc = get_the_post_thumbnail();
		?>
          <article class="row featurette">
          	<div class="col-md-5 super-img">
				<a href="<?php the_permalink(); ?>"><?php echo $imagesrc; ?></a>
            </div>
            <div class="col-md-7">
              <a href="<?php the_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
              <address class="author">By <?php the_author_posts_link(); ?></address>
              <p><?php echo get_the_excerpt(); ?></p>
            </div>
          </article>
		<?php endwhile; ?>
		</div>
		<?php wp_reset_query(); ?>
	<?php endif; ?>
	<!-- END Super Articles -->

	<!-- Grid Bucket -->
	<div id="grid-bucket">
		<?php query_posts('category_name=sex-edition&meta_key=type&meta_value=grid-super&posts_per_page=1'); ?>
		<?php if( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$imagesrc = get_the_post_thumbnail($post_id);
			?>
		<div class="col-super">
			<a href="<?php the_permalink(); ?>">
				<?php echo $imagesrc; ?>
				<span class="meta"><?php echo get_the_title(); ?></span>
			</a>
		</div>
		<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		<?php endif; ?>

		<div class="col-grid">
		<?php query_posts('category_name=sex-edition&meta_key=type&meta_value=grid&posts_per_page=4'); ?>
		<?php if( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php 	
				$imagesrc = get_the_post_thumbnail($post_id, 'medium');
			?>
				<div class="col-cell">
					<a href="<?php the_permalink(); ?>">
						<?php echo $imagesrc; ?>
						<span class="meta"><?php echo get_the_title(); ?></span>
					</a>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		<?php endif; ?>
		</div>
	</div>
	<div class="clearfix"></div>
	<!-- END Grid Bucket -->

	<!-- Recent & Popular Articles -->
	<div id="articles" class="md-container">
	<?php
		$args = array(
			'meta_query' => array(
								array(
									'key' => 'type',
									'value' => 'super',
									'compare' => 'NOT EXISTS'
								)
			),
			'category__not_in' => 6,
			'category_name' => 'sex-edition',
			'posts_per_page' => 7
		);
			$featuredposts = new WP_Query($args);
		while ( $featuredposts -> have_posts() ) {
			$featuredposts -> the_post();
			$imageid = get_post_thumbnail_id($post->ID);
			$imagesrc = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			$imagealt = get_post_meta($imageid,'_wp_attachment_image_alt',true);
		?>
		
	        <article class="row">
	          	<div class="col-sm-4">
					<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $imagesrc; ?>" alt="<?php echo $imagealt; ?>"></a>
	            </div>
	            <div class="col-sm-8">
	              <a href="<?php the_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
	              <p><?php echo get_the_excerpt(); ?></p>
	            </div>
			</article>
	<?php 
		wp_reset_postdata();
	} ?>
	</div>
	<!-- END Recent & Popular Articles -->

	<?php Starkers_Utilities::get_template_parts( array( 'partials/footer') ); ?>