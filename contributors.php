<?php 
/* Template Name: Contributors */ 
?>
<?php Starkers_Utilities::get_template_parts( array( 'partials/header' ) ); ?>
<div class="buffer"></div>
<div id="content-body" class="md-container">
	<?php
		$page = get_page_by_title( 'contributors' );
		$content = apply_filters('the_content', $page->post_content); 
		echo $content;
	?>
	<?php 
	$user_query = new WP_User_Query( array( 'role' => 'Contributor' ) );
	if ( ! empty( $user_query->results ) ) { ?>
		<h1 class="title">Contributors</h1>
		<?php
		foreach ( $user_query->results as $user ) { ?>
			<div class="post-author">
				<div class="user-profile">
					<div class="user-dp">
						<?php echo get_avatar($user->ID); ?>
					</div>
					<section class="user-meta">
						<h3><a href="<?php echo site_url().'/?author='.$user->ID ?>"><?php echo the_author_meta('display_name', $user->ID); ?></a></h3>
						<div class="user-bio">
							<p><?php echo getFirstPara(author_excerpt($user->ID)); ?></p>
						</div>
					</section>
				</div>
			</div>
		<?php
		}
	} else {
		echo 'No users found.';
	}
	?>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'partials/footer' ) ); ?>