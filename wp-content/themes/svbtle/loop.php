<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'boilerplate' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'boilerplate' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>



<?php while ( have_posts() ) : the_post(); ?>
	<?php $options = get_option ( 'svbtle_options' ); ?>

	<?php /*$kudos = get_post_meta($post->ID, '_wp-svbtle-kudos', true); 
				if ($kudos > "") { $kudos = $kudos; } else { $kudos = "0"; } */ ?>
				
		<article id="<?php the_ID(); ?>" class="post">

			<h2 class="entry-title"><?php print_post_title(); ?></h2>



	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
	<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boilerplate' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'boilerplate' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>


			
			
			<aside class="kudo kudoable" id="<?php the_ID(); ?>">
				<!-- <a href="?" class="kudobject">
					<div class="opening clearfix">
						<span class="circle">&nbsp;</span>
					</div>
				</a> -->
		
				<a href="<?php the_permalink(); ?>" class="counter">
					<span class="num"><?php echo comments_number(0,1,"%"); ?></span>
					<span class="txt"><?php echo comments_number("Comments", "Comment", "Comments"); ?></span>
				</a>
			</aside>
		</article><!-- #post-## -->


<?php endwhile; // End the loop. Whew. ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>

	<nav class="pagination">

		<span class="next">
			<?php next_posts_link( __( 'Continue&nbsp;&nbsp;&nbsp;→', 'boilerplate' ) ); ?>
		</span>

	  <span class="prev">
			<?php previous_posts_link( __( '←&nbsp;&nbsp;&nbsp;Newer', 'boilerplate' ) ); ?>
		</span>
	
	</nav>
<?php endif; ?>
