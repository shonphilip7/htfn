
    <footer class="blog-footer">
	  <div id="upper-footer">
	    <div class="container">
		  <div class="row">
			<div class="col-sm-3">
			  <h5>WHAT WE DO</h5>
		      <ul>
				<li>Air Freight</li>
				<li>Ocean Freight</li>
				<li>Road and Rail</li>
				<li>Imports and Exports</li>
				<li>Freight Management Services</li>
				<li>Contract Logistics</li>
				<li>Specialist Services</li>
				<li>Consultancy</li>
			  </ul>
			</div>
			<div class="col-sm-3">
			  <h5>IMPORTANT LINKS</h5>
		      <ul>
				<li>CONTACT US</li>
				<li>PRIVACY POLICY</li>
				<li>DISCLAIMER</li>
				<li>SITE MAP</li>
				<li>REQUEST A QUOTE</li>
				<li>JOIN HTF</li>
			  </ul>
			</div>
			<div class="col-sm-3">
			  <h5>STAY CONNECTED</h5>
			  <div class="row social">
			  <div class="col-sm-3">
				<a href="" class="so-icons col-sm-4"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/02/e0678ef25486466ba65ef6ad47b559e1.png" /></a>
		      </div>
			  <div class="col-sm-3">
				<a href="" class="so-icons col-sm-4"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/02/c4392d634a0148fda8b7b2b0ad98293b.png" /></a>
			  </div>
			  <div class="col-sm-3">
				<a href="" class="so-icons col-sm-4"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/02/f61c7a3b4b4947b28511a25034973383.png" /></a>
			  </div>
			  </div>
			  <div class="row bottom-logo">
			  <div class="col-sm-12">
			    <?php
		        $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if( has_custom_logo() ){
                    echo '<img src="'. esc_url( $logo[0] ) .'">';
                }else{
                    echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
                }
		        ?>
			  </div>
			  </div>
			</div>
			<div class="col-sm-3">
			  <h5>MEMBER LOG IN</h5>
			  <div class="row">
			    <div class="col-sm-8" id="member-log">
				  HTFN Member Login
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div id="lower-footer">
	    <div class="container">
		  <div class="row">
		    <div class="col-sm-8">
			  @ Copyright <?php echo date("Y"); ?> HTFN. Proudly Created by <a href="https://www.adaptingsocial.com/" target="_blank" style="color:#ffffff">Adapting Social</a>.
		    </div>
		  </div>
		</div>
	    <p></p>
	  </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
