<?php
/******
 * Template Name: All Emails Page
 *
 * The template for displaying email information.
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
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				
				$args_emails = array(
					'post_type' => 'emails',
					'posts_per_page' => 10,
					'paged' => $paged,
					'orderby' => 'date',
					'order' => 'DESC'
				);	
		
				$email_query = new WP_Query( $args_emails );
		
				if($email_query->have_posts()) :
					echo '<ul class="quotes_list emails">';
					while ( $email_query->have_posts() ) :
						$email_query->the_post();
			?>			
						<li class="single_quote_wrap">
							<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							<p><?php echo get_the_excerpt(); ?></p>
							<!--<div class="quote_author"><?php //echo get_the_term_list( $post->ID, 'quoteauthor', '', '' ); ?></div>
							<div class="quote_tags">
								<?php //echo get_the_term_list( $post->ID, 'quotetag', 'Tags: ', ' ' ); ?>
							</div>-->
						</li>
			<?php			
						
					endwhile;
					echo '</ul>';
			
					wp_reset_postdata();
					
					echo qmgt_pagination($email_query->max_num_pages, $range = 2);
					
				endif;
			?>

			</div><!-- #left-area -->

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>