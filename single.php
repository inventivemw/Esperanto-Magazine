<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'partials/header' ) ); ?>

<div class="md-container">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article id="post-content">
		<div class="entry-header">
			<h1><?php the_title(); ?></h1>
			<address class="author">by <?php the_author_posts_link(); ?> · <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date('F j, Y'); ?></time></address>
			<?php
				if ( function_exists( 'sharing_display' ) ) {
				    sharing_display( '', true );
				}
				 
				if ( class_exists( 'Jetpack_Likes' ) ) {
				    $custom_likes = new Jetpack_Likes;
				    echo $custom_likes->post_likes( '' );
				}
			?>
		</div>
		
		<?php the_content(); ?>
		<?php comments_template(); ?>
		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<footer class="author-footer">
				<h3>About the author</h3>
				<div id="short-user-profile">
					<div class="user-dp"><?php echo get_avatar(get_the_author_meta('user_email'),'large'); ?></div>
						<section class="user-meta">
							<strong><?php echo get_the_author_link(); ?></strong>
							<div class="user-bio">
								<p><?php the_author_meta( 'description' ); ?></p>
							</div>
							<?php if ( get_the_author_meta( 'twitter' ) ) : ?>
							<p class="handler">follow <a href="https://twitter.com/<?php echo the_author_meta('twitter');?>">@<?php echo the_author_meta('twitter'); ?></a></p>
							<?php endif; ?>
						</section>
				</div>
			</footer>
		<?php endif; ?>
	</article>
	<?php endwhile; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'partials/footer' ) ); ?>