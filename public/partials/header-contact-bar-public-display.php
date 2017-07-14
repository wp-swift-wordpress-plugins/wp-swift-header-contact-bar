<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/GarySwift
 * @since      1.0.0
 *
 * @package    Header_Contact_Bar
 * @subpackage Header_Contact_Bar/public/partials
 */

$phone_readable='000-123-4444';
$phone='#';
$email = 'info@yoursite.com';
if ( function_exists('get_phone') )  {
    $phone_readable = get_phone('office_phone');
    $phone = get_phone('office_phone', true);

} 
if (function_exists('get_field')) {
	if( get_field('email', 'option') ) {
	    $email = get_field('email', 'option');
	}
}
?>
<div class="header-links black-bar" id="header-links">
	<div class="not-row">
		<a href="#" id="show-map-button" class="close-map active effect"><i class="fa fa-map-marker"></i> Find Our Location</a><!-- 
		 --><a href="tel:<?php echo $phone; ?>" class="effect"><i class="fa fa-volume-control-phone"></i> Call Today! <?php echo $phone_readable; ?></a><!-- 
		 --><a href="mailto:<?php echo $email ?>" class="effect"><i class="fa fa-envelope-o"></i> <?php echo $email ?></a>
		<?php //include 'template-parts/_social-media-links.php'; ?>

		<div class="float-right">
			<?php if (function_exists('get_social_media')): ?>
				<?php $social_media_links = get_social_media(); ?>

				<?php if ( is_array($social_media_links) && count($social_media_links) ) : ?>		     
				   		<div class="social">
				   		<?php foreach ($social_media_links as $key => $link): 
							if (isset($link['image']['url'])): 
								?><a href="<?php echo $link['link']; ?>" class="<?php echo $link['slug']; ?>" target="_blank">
								        		<img src="<?php echo $link['image']['url']; ?>" alt="">
								        		<span class="hide">Social Media Link <?php echo $link['name']; ?></span>
								        	</a>
							<?php else: ?><a href="<?php echo $link['link']; ?>" class="effect hvr-sweep-to-top icon-link <?php echo $link['slug']; ?>" target="_blank">
								        		<i class="fa <?php echo $link['icon'].' '. $link['slug']; ?>" aria-hidden="true"></i>
								        		<span class="hide">Social Media Link <?php echo $link['name']; ?></span>
								        	</a><?php 
							endif;
				        endforeach ?>
				        </div>
				<?php endif; ?>	

			<?php endif ?>
		</div>

	</div>
	<div id="close-map-wrapper" class="close-map hide"><i class="fa fa-window-close" id="close-map-button"></i></div>
</div>
<div id="google-map" class="hide" >
	<?php if (function_exists('get_google_map')) { echo get_google_map( $attributes=array('class'=>'acf-map-hidden')); } // Render the Google Map ?>
</div>

