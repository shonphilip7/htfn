<?php /* Template Name: Shipping Instructions */ 

get_header();
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
?>
<div class="container" id="shipping_instructions">
  <div class="row">
    <div class="col-sm-12">
	  <h4>HTFN Country Specific Shipping Instructions</h4>
	  <h6><?php the_field('member_country',$id); ?></h6>
	</div>
  </div>
  <div class="row">
    <div class="col-sm-4">
	  <b>How to consign a Master Airwaybill</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('how_to_consign_a_master_airwaybill',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>How to consign a Master B/L</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('how_to_consign_a_master_b/l',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>How to consign a House Airwaybill</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('how_to_consign_a_house_airwaybill',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>How to consign a House B/L</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('how_to_consign_a_house_b/l',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Creating Consolidation Manifest: Air</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('creating_consolidation_manifest:_air',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Creating Consolidation Manifest: Ocean</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('creating_consolidation_manifest:_ocean',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Instructions for issuance of a MAWB</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('instructions_for_issuance_of_a_mawb',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Instructions for issuance of a MB/L</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('instructions_for_issuance_of_a_mb/l',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Instructions for issuance of a HAWB</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('instructions_for_issuance_of_a_hawb',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Instructions for issuance of a HB/L</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('instructions_for_issuance_of_a_hb/l',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Pre-Alert instructions: Air</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('pre-alert_instructions:_air',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Pre-Alert instructions: Ocean</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('pre-alert_instructions:_ocean',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Customs Clearance</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('customs_clearance',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Transshipment requirements</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('transshipment_requirements',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Legal requirements with regards to commercial invoices, certificates of origin, etc.</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('legal_requirements_with_regards_to_commercial_invoices,_certificates_of_origin,_etc.',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Dangerous goods requirements</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('dangerous_goods_requirements',$id); ?>
	  </p>
	</div>
	<div class="col-sm-4">
	  <b>Special Instructions</b> 
	</div>
	<div class="col-sm-8">
	  <p>
	    <?php the_field('special_instructions',$id); ?>
	  </p>
	</div>
  </div>
</div>
<?php
get_footer();
?>