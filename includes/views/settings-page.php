<?php 

if( ! defined("IESAY_VERSION") ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

$networks = array(
	'twitter' => 'Twitter',
	'facebook' => 'Facebook',
	'googleplus' => 'Google Plus',
    'linkedin' => 'LinkedIn',
	'qq' => 'QQ',
	'weibo' => 'Weibo',
	'weixin' => 'Weixin',
	'renren' => 'Renren',
	'pinterest' => 'Pinterest',
	'qqzone' => 'QQzone',
	'donate' => 'Donate',
);

?><div id="iesay" class="wrap">
	<div class="iesay-container">
		<div class="iesay-column iesay-primary">

			<h1>Iesay Social Sharing &nbsp; <small style="font-weight: normal; font-style: italic; font-size: 70%;"><?php _e( 'by','iesay-sharing' ); ?> 99839</small></h1>


		<form id="iesay_settings" method="post" action="options.php">
			<?php settings_fields( 'ie_social_sharing' ); ?>
	
			<h2><?php _e('Settings','iesay-sharing'); ?></h2>

			<table class="form-table">

				<tr valign="top">
					<th scope="row">
						<?php _e('Add to', 'iesay-sharing'); ?>
					</th>
					<td>
						<ul>
						<?php foreach( $post_types as $post_type_id => $post_type ) { ?>
							<li>
								<label>
									<input type="checkbox" name="ie_social_sharing[auto_add_post_types][]" value="<?php echo esc_attr( $post_type_id ); ?>" <?php checked( in_array( $post_type_id, $opts['auto_add_post_types'] ), true ); ?>> <?php echo $post_type->labels->name; ?>
								</label>
							</li>
						<?php } ?>
						</ul>
						
						<small><?php _e('Automatically adds the sharing links to the end of the selected post types.', 'iesay-sharing'); ?></small>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<?php _e('Social networks', 'iesay-sharing'); ?>
					</th>
					<td>
						<ul>
							<?php foreach( $networks as $network_slug => $network_name ) { ?>
								<li>
									<label>
										<input type="checkbox" name="ie_social_sharing[social_options][]" value="<?php echo esc_attr( $network_slug ); ?>" <?php checked( in_array( $network_slug, $opts['social_options'] ), true ); ?>> <?php echo $network_name; ?>
									</label>
								</li>
							<?php } ?>
						</ul>

						<small><?php _e('Show these social network options.', 'iesay-sharing'); ?></small>
					</td>
				</tr>
                
                <tr valign="top">
					<th scope="row">
						<label for="iesay_donate_aqrcode"><?php _e('Donate Alipay Qrcode', 'iesay-sharing'); ?></label>
					</th>
					<td>
						<input type="text" name="ie_social_sharing[donate_aqrcode]" id="iesay_donate_aqrcode" class="widefat" value="<?php echo esc_attr($opts['donate_aqrcode']); ?>">
						<small><?php _e('Alipay donate qrcode url for the donate.', 'iesay-sharing'); ?></small>
					</td>
				</tr>
                
                <tr valign="top">
					<th scope="row">
						<label for="iesay_donate_wqrcode"><?php _e('Donate Wechat Qrcode', 'iesay-sharing'); ?></label>
					</th>
					<td>
						<input type="text" name="ie_social_sharing[donate_wqrcode]" id="iesay_donate_wqrcode" class="widefat" value="<?php echo esc_attr($opts['donate_wqrcode']); ?>">
						<small><?php _e('Wechat donate qrcode url for the donate.', 'iesay-sharing'); ?></small>
					</td>
				</tr>

				<tr valign="top" class="row-icon-size">
					<th scope="row">
						<label for="iesay_icon_style"><?php _e('Icon style', 'iesay-sharing'); ?></label>
					</th>
					<td>
						<select name="ie_social_sharing[icon_style]" id="iesay_icon_style" class="widefat">
                            <option value="1" <?php selected($opts['icon_style'], '1'); ?> ><?php _e('Square'); ?> - 1 <?php _e( 'style' ); ?></option>
                            <option value="2" <?php selected($opts['icon_style'], '2'); ?> ><?php _e('Icon'); ?> - 2 <?php _e( 'style' ); ?></option>
							<option value="3" <?php selected($opts['icon_style'], 3); ?> ><?php _e('Round'); ?> - 3 <?php _e( 'style' ); ?></option>
							<option value="4" <?php selected($opts['icon_style'], 4); ?> ><?php _e('Normal'); ?> - 4 <?php _e( 'style' ); ?></option>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<?php _e('Load pop-up JS?', 'iesay-sharing'); ?>
					</th>
					<td>
						<label><input type="radio" name="ie_social_sharing[load_popup_js]" value="1" <?php checked($opts['load_popup_js'], 1); ?> > <?php _e('Yes'); ?></label> &nbsp; 
						<label><input type="radio" name="ie_social_sharing[load_popup_js]" value="0" <?php checked($opts['load_popup_js'], 0); ?> > <?php _e('No'); ?></label>
						<br>
						<small><?php _e("A small JavaScript file of just 600 bytes so people won't have to leave your website to share.", 'iesay-sharing'); ?></small>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="iesay_twitter_username"><?php _e('Twitter username', 'iesay-sharing'); ?></label>
					</th>
					<td>
						<input type="text" name="ie_social_sharing[twitter_username]" id="iesay_twitter_username" class="widefat" placeholder="99839" value="<?php echo esc_attr($opts['twitter_username']); ?>">
						<small><?php _e('Set this if you want to append "via @yourTwitterUsername" to tweets.', 'iesay-sharing'); ?></small>
					</td>
				</tr>

			</table>

			<?php
				submit_button();
			?>

		</form>

	</div>

	<!-- Start iesay Sidebar -->
	<div class="iesay-column iesay-secondary">

		<div class="iesay-box">
			<h3 class="iesay-title"><?php _e( 'Happy with the plugin?', 'iesay-sharing' ); ?></h3>
			<p><?php _e( 'If you like this plugin, consider supporting it in one the following ways.', 'iesay-sharing' ); ?></p>
            <p class="paypal"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=99839@163.com&item_name=Friends+of+the+Park&item_number=Fall+Cleanup+Campaign&amount=5%2e00&currency_code=USD" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" /></a><?php _e( 'Buy me a cup of coffee.', 'iesay-sharing' ); ?></p>
            <div class="donate-content"> <span class="alipay-code"><img src="<?php echo plugins_url( '/assets/images/alipay.png', $this->plugin_file ); ?>"></span><span class="wechat-code"><img src="<?php echo plugins_url( '/assets/images/wechat.png', $this->plugin_file ); ?>"></span></div>
            
            <p>作者推荐项目</p>
            <ul class="ul-square">
                <li>
                    <a href="https://s.click.taobao.com/t?e=m%3D2%26s%3D%2Br2gkNCFn0McQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAi2ZNwCIEQKOoReYVz0U1Mgp%2FebutesI17f5e%2FfIh0h%2B23MP8O4cBqEkKocIEXnMHudn1BbglxZYxUhy8exlzcpAFEHVckI7b93srg%2FL%2FeD3keUEnoKELDlWYetMiZZgV%2BSx6OrKqagyklzFeKMz7Cc%2FGaP4xw11%2FizZhcM3IxQF">阿里云爆款云主机</a><br />
                    高质不高价，日均0.73元/日起，即可享有云时代。
                </li>
                <li>
                    <a href="https://cloud.tencent.com/redirect.php?redirect=1010&cps_key=dc41de9d22809704917c133a01abf5e3">腾讯云主机</a><br />
                    云服务器新购特惠，最低2折起。

                </li>
                <li>
                    <a href="https://shop129778211.taobao.com/">汉化主题</a><br />
                    更多汉化主题插件，价格更优。
                </li>
                 <li>
                    <a href="https://www.iesay.com/">爱壹主题</a><br />
                    免费下载各种国外商业主题，破解主题等等。
                </li>
            </ul>

		</div>

		<div class="iesay-box">
			<h3 class="iesay-title"><?php _e( 'Looking for support?', 'iesay-sharing' ); ?></h3>
			<p><?php printf( __( 'Please use the %splugin support forums%s on iesay.com.', 'iesay-sharing' ), '<a href="https://www.iesay.com/iesay-social-sharing/">', '</a>' ); ?></p>
		</div>

		<!-- End iesay Sidebar -->

		<br style="clear:both; " />
	</div>
</div>

