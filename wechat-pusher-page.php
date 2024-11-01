<?phpfunction wechat_article_section_getnumber() {	echo '<p>输入您想显示的最近文章数。</p><p>设置将会在您点保存以后生效。</p>';	if ( get_option( 'errmsg' ) ){		echo "<span style='color:red'>注意：您上次的文章:";		$options = get_option( 'wechat_options' );		foreach( $options as $id=>$value ):{			if ( $id == preg_replace( '/[^0-9]/','', $id ) ){				echo get_post($id)->post_title." ";			}		}endforeach;		echo "没有发送成功。</br>错误原因：".get_option( 'errmsg' )."</span>";		delete_option( 'errmsg' );	}}function wechat_token(){	$options 		= 		get_option( 'wechat_options' );	$token 			= 		$options[ 'token' ];	echo "<input id='token' name='wechat_options[token]' type='text' value='$token' />";}function wechat_appid(){	$options 		= 		get_option( 'wechat_options' );	$appid 			= 		$options[ 'appid' ];	echo "<input id='appid' name='wechat_options[appid]' type='text' value='$appid' />";}function wechat_appsecret(){	$options 		= 		get_option( 'wechat_options' );	$appsecret 		= 		$options[ 'appsecret' ];	echo "<input id='appsecret' name='wechat_options[appsecret]' type='text' value='$appsecret' />";}function wechat_defaultImg(){	$options 		= 		get_option( 'wechat_options' );	$defaultImg 	= 		$options[ 'defaultImg' ];	echo "<input id='defaultImg' name='wechat_options[defaultImg]' type='text' value='$defaultImg' />";	echo "</br><p>如果您的文章里没有设置默认缩略图，同时文章里也没有任何图片，它将会被启用。</p>";}function wechat_article_select() {	$options 		= 		get_option( 'wechat_options' );	$article_num 	= 		$options[ 'article_num' ];	if ($article_num == 0)		$article_num = 5;	echo "<input id='article_num' name='wechat_options[article_num]' type='text' value='$article_num' />";}function wechat_article_article() {	$options 		= 		get_option( 'wechat_options' );	$article_num 	= 		$options[ 'article_num' ];		if ($article_num == 0)		$article_num = 5;	global $post;	$myposts = get_posts( 'numberposts=' . $article_num );	foreach($myposts as $post) :  		global $id;		$id = get_the_ID();?>    		<input type="checkbox" name="wechat_options[<?php echo $id;?>]" value="1" <?php if ( 1 == $options[$id] ) echo 'checked="checked"'; ?>/>		<?php 			the_title(); 			if ( get_option($id) && get_option( 'errmsg' ) == 'send job submission success' )									echo "(已发送)";		?>		</br>	<?php endforeach;}function wechat_article_validate_options( $input ) {	$valid 					 = 		array();	$input['article_num']	 = 		preg_replace('/[^0-9]/','', $input['article_num'] );	$input['year'] 			 = 		preg_replace('/[^0-9]/','', $input['year'] );	$input['month'] 		 = 		preg_replace('/[^0-9]/','', $input['month'] );	$input['day'] 			 = 		preg_replace('/[^0-9]/','', $input['day'] );	$input['hour']			 = 		preg_replace('/[^0-9]/','', $input['hour'] );	$input['minute'] 		 = 		preg_replace('/[^0-9]/','', $input['minute'] );	$input['second'] 		 = 		preg_replace('/[^0-9]/','', $input['second'] );	return $input;}