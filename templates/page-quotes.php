<?php
/******
 * Template Name: All Quote Page
 *
 * The template for displaying quote information.
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

			<?php
				if((isset($_GET['quote_search_submit'])) && (isset($_GET['quote_title']))){
			?>
					<div class="search_wrapper clearfix">
					<label for="quote_title">Find quotes</label>
					<form class="quote-search-form clearfix" id="search_quotes" action="/all-quotes/" method="get">
						<div class="form-group">
							<input type="text" name="quote_title" id="quote_title" value="<?php echo $quote_title; ?>" class="form-control" placeholder="Keyword... " />
						</div>
						<input type="submit" name="quote_search_submit" id="quote_search_submit" class="btn btn-default" value="Search Quotes">
					</form>
					</div><!-- .search_wrapper -->
			<?php
				$quote_title = urldecode($_GET['quote_title']);
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				
				$args_quote = array(
					'post_type' => 'quote',
					'posts_per_page' => 10,
					'paged' => $paged,
					's' => $quote_title,
					'orderby' => 'title', 
					'order' => 'ASC'
				);	
				
		
			$search_query = new WP_Query( $args_quote );
		
			if($search_query->have_posts()) :
				echo '<h3>Search result of: '.$quote_title.'</h3>';
				echo '<ul class="quotes_list">';
				while ( $search_query->have_posts() ) :
					$search_query->the_post();
		?>			
					<li class="single_quote_wrap">
						<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						<p><?php echo get_the_excerpt(); ?></p>
						<div class="quote_author"><?php echo get_the_term_list( $post->ID, 'quoteauthor', '', '' ); ?></div>
						<div class="quote_tags">
							<?php echo get_the_term_list( $post->ID, 'quotetag', 'Tags: ', ' ' ); ?>
						</div>
					</li>
		<?php			
					
				endwhile;
				echo '</ul>';
		
				wp_reset_postdata();
				
				echo qmgt_pagination($search_query->max_num_pages, $range = 2);
				
		
			else:
				echo 'No quote found';
		
			endif;
		
			} else {
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				
				$args_quote = array(
					'post_type' => 'quote',
					'posts_per_page' => 10,
					'paged' => $paged,
					's' => $quote_title,
					'orderby' => 'title',
					'order' => 'ASC'
				);	
		
				$search_query = new WP_Query( $args_quote );
		
				if($search_query->have_posts()) :
					echo '<ul class="quotes_list">';
					while ( $search_query->have_posts() ) :
						$search_query->the_post();
			?>			
						<li class="single_quote_wrap">
							<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							<p><?php echo get_the_excerpt(); ?></p>
							<div class="quote_author"><?php echo get_the_term_list( $post->ID, 'quoteauthor', '', '' ); ?></div>
							<div class="quote_tags">
								<?php echo get_the_term_list( $post->ID, 'quotetag', 'Tags: ', ' ' ); ?>
							</div>
						</li>
			<?php
						
					endwhile;
					echo '</ul>';
			
					wp_reset_postdata();
					
					echo qmgt_pagination($search_query->max_num_pages, $range = 2);
					
				endif;
			}
			?>
		
			</div><!-- #left-area -->

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>