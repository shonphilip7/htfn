<?php /* Template Name: Contact */ ?>

<?php
get_header();
if(isset($_GET['mem'])){
	$user = get_user_by('login', $_GET['mem']);
	echo "member email is ".$user->user_email;
	echo do_shortcode('[contact-form-7 id="53" title="HTFN Member Request Form"]');
}
?>

<?php
get_footer();
?>