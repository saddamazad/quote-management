<?php
/******
 * Template Name: Quote Search and Tag Page
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
				<?php require_once("content-quote-search-and-tag.php"); ?>
			</div><!--content-->
			
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>