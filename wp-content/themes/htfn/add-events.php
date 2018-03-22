<?php /* Template Name: Add Events */ 
get_header();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$title = $_POST['event_title'];
	$description = $_POST['event_desc'];
	$start_date = date('Y-m-d', strtotime($_POST['start_date']));
	$end_date = date('Y-m-d', strtotime($_POST['end_date']));
	
	$my_post = array(
	    'post_title' => wp_strip_all_tags($_POST['event_title']),
		'post_content' => $_POST['event_desc'],
		'post_status'   => 'publish',
		'post_type' => 'events'
	);
	
	$the_post_id = wp_insert_post($my_post);
	
	if($the_post_id!=0){
	    $update_start = update_post_meta( $the_post_id, 'start_day',  date('m/d/Y', strtotime($_POST['start_date'])));
	    $update_end = update_post_meta( $the_post_id, 'end_day',  date('m/d/Y', strtotime($_POST['start_date'])));
		$url = get_permalink($the_post_id);
	}
	
	if($update_start!=0 && $update_end!=0){
		$wpdb->query('INSERT INTO wp_events(title, start, end, description, url) values ("'.$title.'", "'.$start_date.'", "'.$end_date.'", "'.$description.'", "'.$url.'")');
	}
}

?>
<div class="container">
  <div class="row">
    <form action = "<?php $_SERVER['PHP_SELF'] ?>" method="post" class="col-sm-12">
	  <div class="row">
	    <div class="col-sm-4"><label>Event Title</label></div>
	    <div class="col-sm-8"><input type="text" name="event_title" id="event_time" /></div>
	  </div>
	  <div class="row">
	    <div class="col-sm-4"><label>Event Decription</label></div>
	    <div class="col-sm-8"><textarea name="event_desc"></textarea></div>
	  </div>
	  <div class="row">
	    <div class="col-sm-4"><label>Start Date</label></div>
	    <div class="col-sm-8"><input type="date" name="start_date" id="start_date" /></div>
	  </div>
	  <div class="row">
	    <div class="col-sm-4"><label>End Date</label></div>
	    <div class="col-sm-8"><input type="date" name="end_date" id="end_date" /></div>
	  </div>
	  <div class="row">
	    <div class="col-sm-12">
		  <input type="submit" value="Add Event" />
		</div>
	  </div>
    </form>
  </div>    
</div>
<?php
get_footer();
?>