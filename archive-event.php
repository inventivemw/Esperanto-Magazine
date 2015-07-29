<?php
/*
Template Name: Event Template
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

?>

<?php Starkers_Utilities::get_template_parts( array( 'partials/header' ) ); ?>

<button class="scrollToTop" type="button"></button>

<div id="content-body" class="md-container">
	<div id="events" role="main">
		<h1>Events</h1>
		<?php
			// Events happening TODAY
			$args = array(
                'event_start_before' => 'now',
                'post_type'=>'event',
                'showpastevents'=> 1,
                'suppress_filters'=> false,
            );

            $eventloop = new WP_Query( $args );
    		if ( $eventloop->have_posts() ) : ?>
    			<h3>Today</h3>
				<?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
					<div class="event-entry">
						<time itemprop="startDate" datetime="<?php eo_the_start('jS M Y'); ?>">
							<?php echo eo_get_the_start('j l'); ?><br>
							<?php echo eo_get_the_start('g:ia'); ?>
						</time>
						<header class="entry-header">
							<div class="post-image">
								<a href="<?php the_permalink(); ?>">		
									<?php echo get_the_post_thumbnail($event->ID); ?>
									<div class="image-hover"></div>
								</a>
							</div>
							<h3 class="entry-title" style="display: inline;">
								<a href="<?php echo get_permalink($event->ID); ?>">	
									<?php echo get_the_title($event->ID); ?>
								</a>
							</h3>
						</header>
						<div class="event-entry-meta">
							<p class="venue">
								<span class="glyphicon glyphicon-map-marker"></span>
								<?php echo eo_get_venue_name(); ?>
							</p>
							<p><?php echo get_excerpt(140,'content'); ?></p>
						</div>			

						<div style="clear:both;"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		<?php
			// Events happening TOMORROW
			$args = array( 
				'event_end_after'=>'tomorrow +1',
                'event_start_before'=>'tomorrow',
                'post_type'=>'event',
                'showpastevents'=> 0,
                'suppress_filters'=>false, 
            );

            $eventloop = new WP_Query( $args );
    		if ( $eventloop->have_posts() ) : ?>
    			<h3>Tomorrow</h3>
				<p class="date-range"><?php echo date('j F',strtotime('tomorrow'))?></p>
				<?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
					<div class="event-entry">
						<time itemprop="startDate" datetime="<?php eo_the_start('jS M Y'); ?>">
							<?php echo eo_get_the_start('j l'); ?><br>
							<?php echo eo_get_the_start('g:ia'); ?>
						</time>
						<header class="entry-header">
							<div class="post-image">
								<a href="<?php the_permalink(); ?>">		
									<?php echo get_the_post_thumbnail($event->ID); ?>
									<div class="image-hover"></div>
								</a>
							</div>
							<h3 class="entry-title" style="display: inline;">
								<a href="<?php echo get_permalink($event->ID); ?>">	
									<?php echo get_the_title($event->ID); ?>
								</a>
							</h3>
						</header>
						<div class="event-entry-meta">
							<p class="venue">
								<span class="glyphicon glyphicon-map-marker"></span>
								<?php echo eo_get_venue_name(); ?>
							</p>
							<p><?php echo get_excerpt(140,'content'); ?></p>
						</div>			

						<div style="clear:both;"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		<?php
			// Events happening this week
			$args = array( 
				'event_end_after'=>'last Monday', 
				'event_start_before'=>'this Sunday', 
                'post_type'=>'event',
                'showpastevents'=> 0,
                'suppress_filters'=> false, 
            );

            $eventloop = new WP_Query( $args );
    		if ( $eventloop->have_posts() ) : ?>
    			<h3>This Week</h3>
				<p class="date-range"><?php echo date('j F',strtotime('monday this week')).' &ndash; '.date('j F',strtotime('sunday this week'));?></p>
				<?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
					<div class="event-entry">
						<time itemprop="startDate" datetime="<?php eo_the_start('jS M Y'); ?>">
							<?php echo eo_get_the_start('j l'); ?><br>
							<?php echo eo_get_the_start('g:ia'); ?>
						</time>
						<header class="entry-header">
							<div class="post-image">
								<a href="<?php the_permalink(); ?>">		
									<?php echo get_the_post_thumbnail($event->ID); ?>
									<div class="image-hover"></div>
								</a>
							</div>
							<h3 class="entry-title" style="display: inline;">
								<a href="<?php echo get_permalink($event->ID); ?>">	
									<?php echo get_the_title($event->ID); ?>
								</a>
							</h3>
						</header>
						<div class="event-entry-meta">
							<p class="venue">
								<span class="glyphicon glyphicon-map-marker"></span>
								<?php echo eo_get_venue_name(); ?>
							</p>
							<p><?php echo get_excerpt(140,'content'); ?></p>
						</div>			

						<div style="clear:both;"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		<?php
			// Events happening next week
			$args = array( 
				'event_end_after'=>'now', 
				'event_start_before'=>'+1 week',
                'post_type'=>'event',
                'showpastevents'=> 0,
                'suppress_filters'=>false, 
            );

            $eventloop = new WP_Query( $args );
    		if ( $eventloop->have_posts() ) : ?>
    			<h3>Next Week</h3>
				<p class="date-range"><?php echo date('j F',strtotime('monday next week')).' &ndash; '.date('j F',strtotime('sunday next week'));?></p>
				<?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
					<div class="event-entry">
						<time itemprop="startDate" datetime="<?php eo_the_start('jS M Y'); ?>">
							<?php echo eo_get_the_start('j l'); ?><br>
							<?php echo eo_get_the_start('g:ia'); ?>
						</time>
						<header class="entry-header">
							<div class="post-image">
								<a href="<?php the_permalink(); ?>">		
									<?php echo get_the_post_thumbnail($event->ID); ?>
									<div class="image-hover"></div>
								</a>
							</div>
							<h3 class="entry-title" style="display: inline;">
								<a href="<?php echo get_permalink($event->ID); ?>">	
									<?php echo get_the_title($event->ID); ?>
								</a>
							</h3>
						</header>
						<div class="event-entry-meta">
							<p class="venue">
								<span class="glyphicon glyphicon-map-marker"></span>
								<?php echo eo_get_venue_name(); ?>
							</p>
							<p><?php echo get_excerpt(140,'content'); ?></p>
						</div>			

						<div style="clear:both;"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php
			// Events happening THIS MONTH
			$args = array( 
				'event_end_after'=>'first day of this month', 
				'event_start_before'=>'last day of this month',
                'post_type' => 'event',
                'showpastevents'=> 1,
                'suppress_filters'=> false, 
            );

            $eventloop = new WP_Query( $args );
    		if ( $eventloop->have_posts() ) : ?>
    			<h3>This Month</h3>
				<?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
					<div class="event-entry">
						<time itemprop="startDate" datetime="<?php eo_the_start('jS M Y'); ?>">
							<?php echo eo_get_the_start('j l'); ?><br>
							<?php echo eo_get_the_start('g:ia'); ?>
						</time>
						<header class="entry-header">
							<div class="post-image">
								<a href="<?php the_permalink(); ?>">		
									<?php echo get_the_post_thumbnail($event->ID); ?>
									<div class="image-hover"></div>
								</a>
							</div>
							<h3 class="entry-title" style="display: inline;">
								<a href="<?php echo get_permalink($event->ID); ?>">	
									<?php echo get_the_title($event->ID); ?>
								</a>
							</h3>
						</header>
						<div class="event-entry-meta">
							<p class="venue">
								<span class="glyphicon glyphicon-map-marker"></span>
								<?php echo eo_get_venue_name(); ?>
							</p>
							<p><?php echo get_excerpt(140,'content'); ?></p>
						</div>			

						<div style="clear:both;"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php
			// Events happening THIS YEAR
			$args = array( 
				'event_end_after'=>'this year',
                'post_type' => 'event',
                'showpastevents'=> 1,
                'suppress_filters'=> false, 
            );

            $eventloop = new WP_Query( $args );
    		if ( $eventloop->have_posts() ) : ?>
    			<h3>This Year</h3>
				<?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
					<div class="event-entry">
						<time itemprop="startDate" datetime="<?php eo_the_start('jS M Y'); ?>">
							<?php echo eo_get_the_start('j l'); ?><br>
							<?php echo eo_get_the_start('g:ia'); ?>
						</time>
						<header class="entry-header">
							<div class="post-image">
								<a href="<?php the_permalink(); ?>">		
									<?php echo get_the_post_thumbnail($event->ID); ?>
									<div class="image-hover"></div>
								</a>
							</div>
							<h3 class="entry-title" style="display: inline;">
								<a href="<?php echo get_permalink($event->ID); ?>">	
									<?php echo get_the_title($event->ID); ?>
								</a>
							</h3>
						</header>
						<div class="event-entry-meta">
							<p class="venue">
								<span class="glyphicon glyphicon-map-marker"></span>
								<?php echo eo_get_venue_name(); ?>
							</p>
							<p><?php echo get_excerpt(140,'content'); ?></p>
						</div>			

						<div style="clear:both;"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
	</div>
</div>


<?php Starkers_Utilities::get_template_parts( array( 'partials/footer' ) ); ?>
