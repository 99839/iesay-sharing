<?php

/**
* Returns a string containing the sharing buttons HTML 
*
* @param array $args
* @return string 
*/
function ie_social_sharing( $args = array() ) {

    $opts = iesay_get_options();
	$defaults = array(
		'element' => 'p',
		'social_options' => join( ', ', $opts['social_options'] ),
        'twitter_username' => $opts['twitter_username'],
        'linkedin_text' => __( 'On LinkedIn', 'iesay-sharing' ),
        'twitter_text' => __( 'On Twitter', 'iesay-sharing' ),
        'facebook_text' => __( 'On Facebook', 'iesay-sharing' ),
        'googleplus_text' => __( 'On Google+', 'iesay-sharing' ),
		'qq_text' => __( 'On QQ', 'iesay-sharing' ),
		'weibo_text' => __( 'On Weibo', 'iesay-sharing' ),
		'weixin_text' => __( 'On Weixin', 'iesay-sharing' ),
		'renren_text' => __( 'On Renren', 'iesay-sharing' ),
		'pinterest_text' => __( 'On Pinterest', 'iesay-sharing' ),
		'qqzone_text' => __( 'On QQzone', 'iesay-sharing' ),
		'donate_text' => __( 'Donate', 'iesay-sharing' ),
		'icon_style' => $opts['icon_style'],
		'donate_aqrcode' => $opts['donate_aqrcode'],
		'donate_wqrcode' => $opts['donate_wqrcode'],
	);

	// create final arguments array
	$args = wp_parse_args( $args, $defaults );
	$args['social_options'] = array_filter( array_map( 'trim', explode( ',', $args['social_options'] ) ) );

	$title = urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) );
	$url = urlencode( get_permalink() );
	$image	= wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

	ob_start();
	?>
	<!-- Social Sharing by iesay.com -->
	<?php echo sprintf( '<%s class="iesay-sharing icon-style-%d">', $args['element'], absint( $args['icon_style'] ) ); ?>

        <?php foreach($args['social_options'] as $o) {
        	switch($o) {
				case 'twitter':
        			?><a rel="external nofollow" class="ss-twitter" href="https://twitter.com/intent/tweet/?text=<?php echo $title; ?>&url=<?php echo $url; ?><?php if( ! empty( $args['twitter_username'] ) ) {  echo '&via=' . sanitize_text_field( $args['twitter_username'] ); } ?>" target="_blank">
					<span class="ie icon-twitter"></span>
					<span class="ss-text"><?php echo $args['twitter_text']; ?></span>
					</a> <?php
        		break;

        		case 'facebook':
        			?><a rel="external nofollow" class="ss-facebook" href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $url; ?>&p[title]=<?php echo $title; ?>" target="_blank" >
						<span class="ie icon-facebook"></span>
						<span class="ss-text"><?php echo $args['facebook_text']; ?></span>
					</a> <?php
        		break;

        		case 'googleplus':
        			?><a rel="external nofollow" class="ss-googleplus" href="https://plus.google.com/share?url=<?php echo $url; ?>" target="_blank" >
						<span class="ie icon-google-plus"></span>
						<span class="ss-text"><?php echo $args['googleplus_text']; ?></span>
					</a> <?php
        		break;

                case 'linkedin':
        			?><a rel="external nofollow" class="ss-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>&summary=&source=" target="_blank" >
                    <span class="ie icon-linkedin"></span>
                    <span class="ss-text"><?php echo $args['linkedin_text']; ?></span>
                    </a> <?php
                break;
				
				case 'qq':
        			?><a rel="external nofollow" class="ss-qq" href="http://connect.qq.com/widget/shareqq/index.html?url=<?php echo $url; ?>&title=<?php echo $title; ?>&desc=&summary=&site=<?php bloginfo('name'); ?>" target="_blank" >
                    <span class="ie icon-qq"></span>
                    <span class="ss-text"><?php echo $args['qq_text']; ?></span>
                    </a> <?php
                break;
				
				case 'weibo':
        			?><a rel="external nofollow" class="ss-weibo" href="http://service.weibo.com/share/share.php?title=<?php echo $title; ?>&url=<?php echo $url; ?>&pic=<?php echo esc_url( $image );?>" target="_blank" >
                    <span class="ie icon-weibo"></span>
                    <span class="ss-text"><?php echo $args['weibo_text']; ?></span>
                    </a> <?php
                break;
				
				case 'weixin':
        			?><span class="ss-weixin" >    
                    <span class="ie icon-weixin"></span>
                    <span class="ss-text"><?php echo $args['weixin_text']; ?></span>
                    <span class="tip_content"><span class="qrcode-title"><?php _e('Wechat Share', 'iesay-sharing'); ?></span><img src="http://qr.liantu.com/api.php?text=<?php the_permalink(); ?>&w=150" alt="<?php the_title(); ?>" /></span>
                    </span> <?php
                break;
				
				case 'renren':
        			?><a rel="external nofollow" class="ss-renren" href="http://widget.renren.com/dialog/share?resourceUrl=<?php echo $url; ?>&pic=<?php echo esc_url( $image );?>&title=<?php echo $title; ?>" target="_blank" >
                    <span class="ie icon-renren"></span>
                    <span class="ss-text"><?php echo $args['renren_text']; ?></span>
                    </a> <?php
                break;
				
				case 'pinterest':
        			?><a rel="external nofollow" class="ss-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo esc_url( $image );?>&description=<?php echo $title; ?>" target="_blank" >
                    <span class="ie icon-pinterest"></span>
                    <span class="ss-text"><?php echo $args['pinterest_text']; ?></span>
                    </a> <?php
                break;
				
				case 'qqzone':
        			?><a rel="external nofollow" class="ss-qqzone" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo $url; ?>&title=<?php echo $title; ?>&pics=<?php echo esc_url( $image );?>" target="_blank" >
                    <span class="ie icon-qqzone"></span>
                    <span class="ss-text"><?php echo $args['qqzone_text']; ?></span>
                    </a> <?php
                break;
				
				case 'donate':
        			?><span class="ss-donate">
                    <span class="ie icon-donate"></span>
                    <span class="ss-text"><?php echo $args['donate_text']; ?></span>
                    <span class="tip_content"><span class="qrcode-title"><?php _e('Helpful to you, Please donate me.', 'iesay-sharing'); ?></span><span class="qrcode-img"><img src="<?php echo $args['donate_aqrcode']; ?>"><?php _e('Alipay.', 'iesay-sharing'); ?></span><span class="qrcode-img"><img src="<?php echo $args['donate_wqrcode']; ?>"><?php _e('Wechat.', 'iesay-sharing'); ?></span></span>
                    </span> <?php
                break;
        	}
        } ?>
    </<?php echo $args['element']; ?>>
    <!-- / Social Sharing By 99839 -->
   <?php
  	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}

