<?php /* Template Name: Member Detail */ ?>

<?php
get_header();

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
?>
<div class="container" id="member-detail">
  <div class="row">
    <div class="col-sm-12">
      <h4>HTFN Profiles</h4>
      <h6><?php the_field('member_region',$id); ?></h6>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <?php
	    $image = get_field('company_logo',$id);
	  ?>
      <img src="<?php echo $image['url']; ?>" alt="" />
    </div>
    <div class="col-sm-2">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
	  <h4>Company</h4>
	</div>
	<div class="col-sm-8">
	  <h6><?php the_field('company_name',$id); ?></h6>
	  <?php 
	  $content_post = get_post($id);
	  $content = $content_post->post_content;
      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);
	  ?>
	  <p>
	    <?php the_field('company_description',$id); ?>
	  </p>
	</div>
  </div>
  <div class="row">
    <div class="col-sm-4">
	  <h4>Services</h4>
	</div>
	<div class="col-sm-8">
	  <?php 
	  $services = get_field('member_services',$id);
      $services_array = explode(',', $services);
	  ?>
	  <ul>
	  <?php
      foreach($services_array as $service){
	  ?>
	    <li><?php echo $service; ?></li>
	  <?php
	  }		  
	  ?>
	  </ul>
	</div>
  </div>
  <div class="row">
    <div class="col-sm-4">
	  <h4>Contact</h4>
	</div>
	<div class="col-sm-6">
	  <p>
	    <?php the_field('contact_address',$id); ?>
	  </p>
	</div>
	<div class="col-sm-2">
	  <p>Gateway: <?php the_field('gateway',$id); ?></p>
	  <p>For information regarding additional locations please contact this office</p>
	</div>
  </div>
  <div class="row">
    <div class="col-sm-4">
	  <h4>Telephone/Fax</h4>
	</div>
	<div class="col-sm-8">
	  <span><?php the_field('member_telephone',$id)?>&#47;<?php the_field('member_fax',$id); ?></span>
	</div>
  </div>
  <div class="row">
    <div class="col-sm-4">
	  <h4>Email</h4>
	</div>
	<div class="col-sm-8">
	  <span><a href="mailto:<?php the_field('member_email',$id); ?>" target="_blank"><?php the_field('member_email',$id); ?></a></span>
	</div>
  </div>
  <div class="row">
    <div class="col-sm-4">
	</div>
	<div class="col-sm-6">
	  <?php 
	  $contacts = get_field('member_contacts',$id);
      $contacts_array = explode(PHP_EOL, $contacts);
	  ?>
	  <ul>
	  <?php
      foreach($contacts_array as $contact){
		  $contact_detail_array = explode(',',$contact);
		  $contact_email = strip_tags($contact_detail_array[2]);
	  ?>
		  <li><a href="mailto:<?php echo $contact_email; ?>" target="_blank"><?php echo $contact_detail_array[0].','.$contact_detail_array[1]; ?></a></li>
	  <?php
	  }		  
	  ?>
	</div>
	<div class="col-sm-2">
	  <a href="<?php echo get_home_url(); ?>/show-shipping-instructions?id=<?php echo $id; ?>">Show Shipping Instructions</a>
	</div>
  </div>
  <div class="row">
    <div class="col-sm-12">
	  <h2>Uploaded Documents</h2>
	</div>
	<div class="col-sm-12">
	<?php 
	$file = get_field('member_document',$id);
	?>
	<a href="<?php echo $file['url']; ?>"><?php echo $file['title']; ?></a>
	</div>
  </div>
</div>
<?php
get_footer();
?>