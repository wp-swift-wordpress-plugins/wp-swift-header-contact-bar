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

$options = get_option( 'wp_swift_contact_bars_settings' );
if (isset($options['wp_swift_contact_bars_select_footer_links'])) {
	$wp_swift_contact_bars_select_footer_links = $options['wp_swift_contact_bars_select_footer_links'];
}
?>
<div class="buffer" id="brightlight-buffer">

	<div class="row">

		<?php if ($wp_swift_contact_bars_select_footer_links == '1'): ?>

			<div id="brightlight-contact">
				<span class="info">Contact Will Hayes in BrightLight</span>
				<a href="#" class="hvr-sweep-to-top "><i class="fa fa-envelope"></i></a><!-- 
				 --><a href="#" class="hvr-sweep-to-top "><i class="fa fa-phone"></i></a>
			</div>

		<?php elseif ($wp_swift_contact_bars_select_footer_links == '2'): ?>

			<?php wp_swift_contact_bars_social_media(); ?>

		<?php endif; ?>


		<a id="brightlight-wrapper" href="http://www.brightlight.ie/" title="Site design &amp; build by BrightLight Web Design & Graphic Design Solutions" target="_blank">
			<span  id="brightlight-1" class="brightlight hvr-effect">
			<span class="bright">Bright</span><span class="light">Light</span>
			</span>
			<span id="brightlight-tagline">Site design &amp; build by BrightLight Web Design &amp; Graphic Design Solutions</span>
		</a>

	</div>
	<!-- </div> -->
</div>

