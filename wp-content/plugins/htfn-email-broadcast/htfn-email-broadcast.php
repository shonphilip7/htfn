<?php
/*
  Plugin Name: HTFN Email Broadcast
  Description: Custom broadcast email plugin for HTFN client
  Version: 1.0
  Author: Shon Philip
 */
 require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

 function htfn_email_broadcast_form(){
	 global $current_user;
      get_currentuserinfo();
	  
	  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		 

$attachment_id = media_handle_upload('broadcast_upload', 0);
print_r($attachment_id);
	// Make sure the file array isn't empty
    /*if(!empty($_FILES['broadcast_upload']['name'])) {
		// Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('application/pdf');
		// Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['broadcast_upload']['name']));
        $uploaded_type = $arr_file_type['type'];
		// Check if the type is supported. If not, throw an error.
         // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['broadcast_upload']['name'], null, file_get_contents($_FILES['broadcast_upload']['tmp_name']));
			print_r($upload);
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
				echo "success";
                //add_post_meta($id, 'broadcast_upload', $upload);
                //update_post_meta($id, 'broadcast_upload', $upload);     
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not supported.");
        } // end if/else
	}*/
	
	  }
	  //print_r($current_user);
	 ?>
	 
	 <?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'list', 'post_status'=>'publish', 'posts_per_page'=>-1, 'orderby'=>'ID','order'=>'ASC')); ?>
 
	 
	 <form id="email_broadcast_form" name="email_broadcast_form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
	   <div class="row">
	     <div class="col-sm-4">
	       <label>Add an Attachment(.pdf only)</label>
	     </div>
	     <div class="col-sm-8">
	       <input type="file" id="broadcast_upload" name="broadcast_upload" value="" size="25" />
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
			   <input type ="checkbox" name="<?php the_ID(); ?>" />
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
		   <textarea name="body1" cols="55" rows="10" wrap="true"></textarea>
		 </div>
	   </div>
	   <div class="row">
	     <div class="col-sm-8">
		   <input type="submit" name="broadcast_submit" value="Post">
		 </div>
	   </div>
	 </div>
	 <script>
$("#email_broadcast_form").validate();
</script>
	 <?php
 }
 
 add_shortcode('email_broadcast', 'htfn_email_broadcast_shortcode');
 function htfn_email_broadcast_shortcode(){
	 ob_start();
	 htfn_email_broadcast_form();
	 return ob_get_clean();
 }
 