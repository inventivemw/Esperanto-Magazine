<?php
/**
 * The template for displaying Author Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'partials/header' ) ); ?>

<?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<div id="content-body" class="md-container">
	<div class="spacer"></div>
	<div class="user-profile">
		<div class="user-dp"><?php echo get_avatar(get_the_author_meta('user_email'),'large'); ?></div>
		<section class="user-meta">
			<h1><?php echo get_the_author_meta('display_name') ?></h1>
			<ul>
				<li><strong>Joined</strong> <?php echo date_i18n( "d M Y", strtotime(get_the_author_meta('registered'))) ?></li>
				<li><strong>Articles</strong> <?php the_author_posts(); ?></li>
				<?php if (!empty($curauth->user_url)){ ?>
					<li><strong>Website</strong> <a href="<?php echo the_author_meta('user_url'); ?>" target="_blank"><?php echo the_author_meta('user_url'); ?></a></li>
				<?php } ?>
				<?php if (!empty($curauth->user_email)){ ?>
					<li><strong>Email</strong> <a href="mailto:<?php echo the_author_meta('user_email'); ?>" target="_blank"><?php the_author_meta('user_email'); ?></a></li>
				<?php } ?>
				<?php if (!empty($curauth->twitter)){ ?>
					<li><strong>Twitter</strong> <a href="http://twitter.com/<?php echo $curauth->twitter; ?>" target="_blank"><?php echo $curauth->twitter; ?></a></li>
				<?php } ?>
				<?php if (!empty($curauth->facebook)){ ?>
					<li><strong>Facebook</strong> <a href="http://facebook.com/<?php echo $curauth->facebook; ?>" target="_blank"><?php echo $curauth->facebook; ?></a></li>
				<?php } ?>
			</ul>
			<div class="clearfix"></div>
			<div class="user-bio">
				<p><?php the_author_meta( 'description' ); ?></p>
			</div>
		</section>
	</div>

	<div id="user-articles">
		<?php if ( have_posts() ): the_post(); ?>
		<h3>Published Articles</h3>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php 	
				$imageid = get_post_thumbnail_id($post->ID);
				$imagesrc = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
				$imagealt = get_post_meta($imageid,'_wp_attachment_image_alt',true);
			?>
	          <article class="row">
	          	<div class="col-md-3 super-img">
					<a href="<?php the_permalink(); ?>"><img class="lazy img-responsive" src="<?php echo $imagesrc; ?>" alt="<?php echo $imagealt; ?>"></a>
	            </div>
	            <div class="col-md-9">
	              <a href="<?php the_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
	              <div class="meta-date">on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date('F j, Y'); ?></time></div>
	            </div>
	          </article>
			<?php endwhile; ?>
	</div>
</div>		
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'partials/footer' ) ); ?>