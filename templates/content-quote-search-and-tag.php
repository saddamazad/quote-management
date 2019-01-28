<?php
/******
 * The template for displaying quote information.
 * @package WordPress
 * @subpackage KeithCraft
 * @since version 1.0 
 * @author Keith Craft
 *****/
?>
<?php while ( have_posts() ) : the_post(); ?>

<?php global $post; ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				$quote_title = '';
				if(isset($_GET['quote_title']))
					$quote_title = $_GET['quote_title'];
			?>
			<div class="search_wrapper clearfix">
			<label for="quote_title">Find quotes</label>
			<form class="quote-search-form clearfix" id="search_quotes" action="<?php echo get_permalink( get_option('quotes_page_id') ); ?>" method="get">
				<div class="form-group">
					<input type="text" name="quote_title" id="quote_title" value="<?php echo $quote_title; ?>" class="form-control" placeholder="Keyword... " />
				</div>
				<input type="submit" name="quote_search_submit" id="quote_search_submit" class="btn btn-default" value="Search Quotes">
			</form>
			</div><!-- .search_wrapper -->
			
			<div class="quote_section clearfix">
				<div class="bubble_title">Popular Topics</div>
				<?php
					$defaults = array(
						'theme_location'  => 'topic_menu',
						'container'       => false,
						'menu_class'       => 'popular_topic_list clearfix',
						'echo'            => true
					);
				
					wp_nav_menu( $defaults );
				?>
				<a href="<?php echo get_permalink( get_option('topics_page_id') ); ?>" class="more_link">More Topics</a>
			</div><!-- .quote_section -->

			<div class="quote_section">
				<div class="bubble_title">Favorite Quotes</div>
				<?php the_content(); ?>
				<a href="<?php echo get_permalink( get_option('quotes_page_id') ); ?>" class="more_link">More Quotes</a>
			</div><!-- .quote_section -->


			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'QMGT' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'QMGT' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
    
    <?php //comments_template(); ?>
    
<?php endwhile; ?>