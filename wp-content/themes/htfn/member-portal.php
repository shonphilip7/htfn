<?php /* Template Name: Member Portal */ 
get_header();
if(is_user_logged_in()){
	$current_user = wp_get_current_user();
	?>
	<div class="container">
	  <div class="row">
	    <div class="col-sm-4">
		  <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Information and Research
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
		  <?php $img = get_post_meta(154, 'wp_custom_attachment', true); ?>
		  <li class="list-group-item"><a href="<?php echo $img['url'];?>">HTFN Case Study</a></li>
		  <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/projects">Project Summaries</a></li>
		  <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/downloads-and-links">Downloads and Links</a></li>
		</ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Discussion Groups
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <?php
		echo do_shortcode("[bbp-forum-index]");
		?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Applications and Productivity
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
		  <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/member-broadcast-email">Broadcast Email</a></li>
		  <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/events">Event Calender</a></li>
		  <li class="list-group-item"><a href="http://www.timeanddate.com/worldclock/meeting.html">World Clock Meeting Planner</a></li>
		</ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          HTFN Members and Regions
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
		  <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/member-list">HTFN Member List</a></li>
		  <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/events">Event Calender</a></li>
		  <li class="list-group-item"><a href="http://www.timeanddate.com/worldclock/meeting.html" target="_blank">World Clock Meeting Planner</a></li>
		</ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Sales Information
        </button>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
		  <li class="list-group-item">HTFN Brochure</li>
		  <li class="list-group-item">HTFN Brochure Customized for a Member</li>
		  <li class="list-group-item">HTFN Logo Usage</li>
		  <li class="list-group-item">HTFN Marketing Material Order Forms</li>
		  <li class="list-group-item">HTFN Business Card Order Forms</li>
		  <li class="list-group-item">Bid Library</li>
		</ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSix">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          HTFN Endorsed Cargowise Consultants
        </button>
      </h5>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
		  <li class="list-group-item">HTFN Brochure</li>
		</ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSeven">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          Member Relations
        </button>
      </h5>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
		  <li class="list-group-item">Administrative Information</li>
		  <li class="list-group-item">Corporate Bylaws</li>
		  <li class="list-group-item">Company Registry</li>
		  <li class="list-group-item">Membership Agreement</li>
		  <li class="list-group-item">Report a Grievance</li>
		  <li class="list-group-item">Prospective Members</li>
		  <li class="list-group-item">Warning Probation</li>
		</ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingEight">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          Account Profile and Settings
        </button>
      </h5>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
		  <li class="list-group-item"><a href="<?php echo get_home_url(); ?>/member-update">Update Profile</a></li>
		</ul>
      </div>
    </div>
  </div>
</div>
		</div>
		<div class="col-sm-8">
<div class="row">
<div class="col-sm-10 posts">
<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'paged'          => $paged
);
$the_query = new WP_Query($args);
?>
 

<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
 
<div class="post">
<div class="col-sm-12"><h2 class="post-title"><?php the_title(); ?></h2></div>

<div class="col-sm-12 post-image"><?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?></div>
 
<div class="col-sm-12 post-content"><?php the_content(); ?></div>
<?php 
$value = get_field("whole_story_link", get_the_ID());
if($value!=''){
?>
	<div class="col-sm-12 post-link"><a href="<?php echo $value; ?>" target="_blank">Click here for more information</a></div>
<?php
}
?> 
</div>
<?php 
endwhile;
wp_reset_postdata();
$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $the_query->max_num_pages
) );
?>
</div>
<div class="col-sm-2">
<a href="<?php echo get_home_url();  ?>/add-post">Add Post</a>
</div>		  
</div>

		</div>
	  </div>
	</div>
	<?php
}
get_footer();
?>