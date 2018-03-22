<?php /* Template Name: Member Update */ 
acf_form_head();
get_header();

?>
<div id="primary">
		<div id="content" role="main">

		  <?php 
		  $current_user = wp_get_current_user();
		  //print_r($current_user);
		  $page_detail = get_page_by_title($current_user->user_login, OBJECT, 'members');
		  /* The loop */ 
		  ?>
		  <a href="<?php echo get_home_url(); ?>/member-portal">Back to member portal</a>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php acf_form(array(
					'post_id'	=> $page_detail->ID,
					'post_title'	=> true,
					'submit_value'	=> 'Update the post!'
				)); ?>

			<?php endwhile; ?>
           
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer();
?>
