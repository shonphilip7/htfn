<?php /* Template Name: Broadcast */ 
get_header();
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'list', 'post_status'=>'publish', 'posts_per_page'=>-1, 'orderby'=>'ID','order'=>'ASC'));
$attachments='';

//wp_nonce_field(plugin_basename(__FILE__), 'broadcast_upload_nonce');
     
    $html = '<p class="description">';
        $html .= 'Upload your PDF here.';
    $html .= '</p>';
    $html .= '<input type="file" id="broadcast_upload" name="broadcast_upload" value="" size="25" />';
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$name = $_POST['broadcast_name'];
		$email = $_POST['broadcast_email'];
		$subject = $_POST['broadcast_subject'];
		$area = $_POST['area'];
		$list = $_POST['list_id'];
		$message = $_POST['braodcast_message'];
		
		/* --- security verification --- 
    if(!wp_verify_nonce($_POST['broadcast_upload_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if*/
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
	
	if(!empty($_FILES['broadcast_upload']['name'])) {
		$supported_types = array('application/pdf');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['broadcast_upload']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
			$upload = wp_upload_bits($_FILES['broadcast_upload']['name'], null, file_get_contents($_FILES['broadcast_upload']['tmp_name']));
			$attachments = $upload['file'];
			//echo $attachments;
			//wp_mail('test@test.com', 'subject', 'message', $headers, $attachments);
		}
	}
	 $email_query = "SELECT * FROM wp_email_list where list_id=".$list;
	 
      $emails=$wpdb->get_results($email_query);
	  foreach($emails as $email){
		  echo $email->email;
	  }
	  
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

<form id="email_broadcast_form" name="email_broadcast_form" method="post" action="<?php echo get_page_link();?>" enctype="multipart/form-data">
	   <div class="row">
	     <div class="col-sm-4">
	       <label>Add an Attachment(.pdf only)</label>
	     </div>
	     <div class="col-sm-8">
	       <?php echo $html; ?>
	     </div>
	   </div>
	   <div class="row">
	     <div class="col-sm-4">
	       <label>Your Name</label>
	     </div>
	     <div class="col-sm-8">
	       <input type="text" id="broadcast_name" name="broadcast_name" value="<?php echo $current_user->user_login; ?>" size="25" />
	     </div>
	   </div>
	   <div class="row">
	     <div class="col-sm-4">
	       <label>Your E-mail</label>
	     </div>
	     <div class="col-sm-8">
	       <input type="email" id="broadcast_email" name="broadcast_email" value="<?php echo $current_user->user_email; ?>" size="25" required />
	     </div>
	   </div>
	   <div class="row">
	     <div class="col-sm-4">
	       <label>Subject</label>
	     </div>
	     <div class="col-sm-8">
	       <input type="text" id="broadcast_subject" name="broadcast_subject" value="" size="25" required />
	     </div>
	   </div>
	   <div class="row">
	     <div class="col-sm-4">
	       <label>Region</label>
	     </div>
	     <div class="col-sm-8">
	       <select name='area' size='1'>
		     <option selected value='fm'>All Regions</option>
		     <option value='1'>Asia Pacific</option>
		     <option value='3'>Europe</option>
		     <option value='4'>Latin America</option>
		     <option value='5'>Middle East & Africa</option>
		     <option value='6'>North America</option>
		   </select>
	     </div>
	   </div>
	   <div class="row lists">
	     <div class="col-sm-4">
	       <label>Lists</label>
	     </div>
		 <div class="col-sm-8">
		 <?php if ( $wpb_all_query->have_posts() ) : ?>
		 <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div class="row">
		     <div class="col-sm-8">
			   <label><?php the_title(); ?></label>
			 </div>
			 <div class="col-sm-4">
			   <input type="checkbox" name="list_id" value="<?php the_ID(); ?>">
			 </div>
		</div>
    <?php endwhile; ?>
    <!-- end of the loop -->
	<?php wp_reset_postdata(); ?>
		 <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
		   
		 </div>
	   </div>
	   <div class="row">
	     <div class="col-sm-4">
		   <label>Message</label>
		 </div>
		 <div class="col-sm-8">
		   <textarea name="braodcast_message" cols="55" rows="10" wrap="true"></textarea>
		 </div>
	   </div>
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
	     <div class="col-sm-8">
		   <input type="submit" name="broadcast_submit" value="Post">
		 </div>
	   </div>
</form>
	 <script>
$("#email_broadcast_form").validate();
</script>
<?php
get_footer();
?>
