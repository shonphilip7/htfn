<?php
// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
 
function htfn_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
	wp_enqueue_style('calendar_style', get_template_directory_uri() . '/calendar/fullcalendar.min.css');
	wp_enqueue_style('calendar_print', get_template_directory_uri() . '/calendar/fullcalendar.print.min.css',array(), false, 'print');
	
}
 
function htfn_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '4.0.0', true );
	wp_enqueue_script('htfn_fa', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js', $dependencies, '5.0.6', true );
	wp_enqueue_script('moment', get_template_directory_uri().'/calendar/moment.min.js', $dependencies, false, true );
	wp_enqueue_script('htfn_events', get_template_directory_uri().'/calendar/fullcalendar.min.js', $dependencies, '3.9.0', true );
}
 
add_action( 'wp_enqueue_scripts', 'htfn_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'htfn_enqueue_scripts' );

function htfn_wp_setup() {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'htfn' ),
		'social'  => __( 'Social Links Menu', 'htfn' ),
	) );
	
	/*
	 * Enable support for custom logo.
	 */
	$defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
	
	add_theme_support( 'post-thumbnails' );
}
 
add_action( 'after_setup_theme', 'htfn_wp_setup' );

function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );


function htfn_add_custom_meta_boxes() {
 

    // Define the custom attachment for documents
    add_meta_box(
        'wp_custom_attachment',
        'Upload Document',
        'wp_custom_attachment',
        'documents',
        'side'
    );
	
	add_meta_box(
		'my_url_section',           // The HTML id attribute for the metabox section
		'URL',     // The title of your metabox section
		'my_url_metabox_callback',  // The metabox callback function (below)
		'link'                  // Your custom post type slug
	);
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'htfn_add_custom_meta_boxes');

function wp_custom_attachment() {
 
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
     
    $html = '<p class="description">';
        $html .= 'Upload your PDF here.';
    $html .= '</p>';
    $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" />';
     
    echo $html;
 
} // end wp_custom_attachment

function my_url_metabox_callback( $post ) {
   // Create a nonce field.
	wp_nonce_field( 'my_url_metabox', 'my_url_metabox_nonce' );
	// Retrieve a previously saved value, if available.
	$url = get_post_meta( $post->ID, '_my_url', true );
   // Create the metabox field mark-up.
   ?>
      <p>
         <label>My URL </label><input style="width: 20em;" type="text" name="my_url" value="<?php echo esc_url( $url ); ?>" size="30" class="regular-text" />
      </p>
   <?php
}

/**
 * Save the metabox.
 */
function my_url_save_metabox( $post_id ) {
   // Check if our nonce is set.
   if ( ! isset( $_POST['my_url_metabox_nonce'] ) ) {
      return;
   }
   $nonce = $_POST['my_url_metabox_nonce'];
   // Verify that the nonce is valid.
   if ( ! wp_verify_nonce( $nonce, 'my_url_metabox' ) ) {
      return;
   }
   // If this is an autosave, our form has not been submitted, so we don't want to do anything.
   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
   }
   // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
   }
   // Check for and sanitize user input.
   if ( ! isset( $_POST['my_url'] ) ) {
      return;
   }
   $url = esc_url_raw( $_POST['my_url'] );
   // Update the meta fields in the database, or clean up after ourselves.
   if ( empty( $url ) ) {
      delete_post_meta( $post_id, '_my_url' );
   } else {
      update_post_meta( $post_id, '_my_url', $url );
   }
}
add_action( 'save_post', 'my_url_save_metabox' );

function htfn_save_custom_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
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
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment']['name'])) {
         
        // Setup the array of supported file types.
        $supported_types = array('application/pdf', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.slideshow');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wp_custom_attachment', $upload);
                update_post_meta($id, 'wp_custom_attachment', $upload);     
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not supported.");
        } // end if/else
         
    } // end if

     
} // end save_custom_meta_data
add_action('save_post', 'htfn_save_custom_meta_data');

function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');


add_shortcode( 'list-posts-basic', 'rmcc_post_listing_shortcode1' );
function rmcc_post_listing_shortcode1( $atts ) {
    ob_start();
	
	// define attributes and their defaults
    extract( shortcode_atts( array (
        'category' => ''
    ), $atts ) );
	
    $query = new WP_Query( array(
        'post_type' => 'documents',
        'order' => 'ASC',
        'orderby' => 'date',
		'tax_query' => array(
            array (
                'taxonomy' => 'document_types',
                'field' => 'slug',
                'terms' => $category,
		    )
        ),
    ));
    if ( $query->have_posts() ) { ?>
        <ul class="clothes-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php $img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php echo $img['url']; ?>"><?php the_title(); ?></a>
                <?php the_content(); ?>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

add_action('after_setup_theme', 'htfn_remove_admin_bar');
function htfn_remove_admin_bar() {
    if(!current_user_can('administrator') && !is_admin()){
        show_admin_bar(false);
    }
}

add_shortcode( 'list-link-posts', 'link_post_shortcode' );
function link_post_shortcode() {
    ob_start();
	
    $query = new WP_Query( array(
        'post_type' => 'link',
        'order' => 'ASC',
        'orderby' => 'title'
    ));
    if ( $query->have_posts() ) { ?>
        <ul class="links-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php $url = get_post_meta(get_the_ID(),'_my_url',true); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php echo $url; ?>"><?php the_title(); ?></a>
                <?php the_content(); ?>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $linkvariable = ob_get_clean();
    return $linkvariable;
    }
}

//add_action( 'user_register', 'htfn_add_user_to_member');
function htfn_add_user_to_member($user_id){

$id = $user_id;
$userdata = get_userdata($id);
// Create post object
$my_post = array();
$my_post['post_title']    = $userdata->user_login;
$my_post['post_status']   = 'publish';
$my_post['post_type'] = 'members';

// Insert the post into the database
wp_insert_post($my_post);
}

function cf7_member_email(){
 
    if(isset($_GET['mem'])){
	    $user = get_user_by('login', $_GET['mem']);
	    return $user->user_email;
    }
}
add_shortcode('CF7_ADD_MEMBER_EMAIL', 'cf7_member_email');
 
?>