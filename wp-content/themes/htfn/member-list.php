<?php /* Template Name: Member-List */ ?>

<?php
get_header();
?>

<?php
if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
 
$query = new WP_Query( array( 'post_type' => 'members', 'paged' => $paged ) );

?>
<div class="row" #id="member_listig_table">
  <div class="col-sm-2 title">
    <h4>Member</h4>
  </div>
  <div class="col-sm-2 title">
    <h4>City</h4>
  </div>
  <div class="col-sm-2 title">
    <h4>Gateway</h4>
  </div>
  <div class="col-sm-2 title">
    <h4>Country</h4>
  </div>
  <div class="col-sm-2 title">
    <h4>Region</h4>
  </div>
  <div class="col-sm-1 title">
    <h4>Aircode</h4>
  </div>
  <div class="col-sm-1 title">
    <h4>Web</h4>
  </div>
</div>
<div class="row">
<?php 
if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		<div class="col-sm-2">
			<h6><a href="<?php echo get_home_url(); ?>/member-detail?id=<?php echo get_the_id(); ?>"><?php the_field('company_name'); ?></a></h6>
		</div>
		<div class="col-sm-2">
		    <h6><?php the_field('member_city'); ?></h6>
		</div>
		<div class="col-sm-2">
		    <h6><?php the_field('gateway'); ?></h6>
		</div>
		<div class="col-sm-2">
		    <h6><?php the_field('member_country'); ?></h6>
		</div>
		<div class="col-sm-2">
		    <h6><?php the_field('member_region'); ?></h6>
		</div>
		<div class="col-sm-1">
		    <h6><?php the_field('aircode'); ?></h6>
		</div>
		<div class="col-sm-1">
		    <h6><?php the_field('website'); ?></h6>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>
</div>
<?php
get_footer();
?>