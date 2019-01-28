<?php
/******
 * The template for displaying quote posts.
 * @package WordPress
 * @subpackage KeithCraft
 * @since version 1.0 
 * @author Keith Craft
 *****/  
 
get_header();

?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

			<?php if ( have_posts() ) : ?>
		
				<?php while ( have_posts() ) : the_post(); ?>
			
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<h2 class="entry-title" style="margin-bottom: 0; padding-left: 15px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
			<div class="entry-content">
				<ul class="quotes_list tax_archieve">
					<li style="padding-top:0;">
						<p><?php echo get_the_excerpt(); ?></p>
						<div class="quote_author"><?php echo get_the_term_list( $post->ID, 'quoteauthor', '', '' ); ?></div>
						<div class="quote_tags">
							<?php echo get_the_term_list( $post->ID, 'quotetag', 'Tags: ', ' ' ); ?>
						</div>
					</li>
				</ul>
			</div><!-- .entry-content -->
			
			</article><!-- #post -->
			
				<?php endwhile; ?>
				<?php echo qmgt_pagination($pages = '', $range = 2); ?>
				<?php else : ?>
					<?php echo '<p>Nothing Found.</p>'; ?>
			<?php endif; ?>	
	
			</div><!-- #left-area -->

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>