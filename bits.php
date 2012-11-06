<?php
/*
Template Name: Bits
*/

get_header();
query_posts('cat=13');
?>

<header id="begin">
    <p>Bits are shorter, less formal, and less detailed than regular posts.</p>
</header>

<?php while ( have_posts() ) : the_post(); ?>
	<?php $options = get_option ( 'svbtle_options' ); ?>

	<?php $kudos = get_post_meta($post->ID, '_wp-svbtle-kudos', true); 
				if ($kudos > "") { $kudos = $kudos; } else { $kudos = "0"; } ?>
				
		<article id="<?php the_ID(); ?>" class="post">

			<h2 class="entry-title"><?php print_post_title(); ?></h2>



	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_content(); ?>
			</div><!-- .entry-summary -->
	<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boilerplate' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'boilerplate' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>


			
			
			<aside class="kudo kudoable" id="<?php the_ID(); ?>">
				<a href="?" class="kudobject">
					<div class="opening clearfix">
						<span class="circle">&nbsp;</span>
					</div>
				</a>
		
				<a href="?" class="counter">
					<span class="num"><?php echo $kudos; ?></span>
					<span class="txt">Kudos</span>
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

<?php get_footer(); ?>