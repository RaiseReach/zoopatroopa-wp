<?php
require( dirname(__FILE__) . '/wp-load.php' );
$result = array();
$token = 'be4ab042f198607eb6c0a0ca4a733f94';
$api_id  = "015BDF1F-C391-D2F6-67E4-0339371EA932";
$number = '380939092213';
add_option("last_error_message", "0");
switch ($_POST['action']) {
	case 'login' :
		$user = get_user_by('email',$_POST['email']);
		if( $user ){
			$password = $_POST['pass'];
			$hash     = $user->data->user_pass;
			if ( wp_check_password( $password, $hash ) ) {
			   $result['success'] = 1;
			} else {
			   $result['error'] = 1;
			}
		}
		break;
	case 'take_info':
		$user = get_user_by('email',$_POST['email']);
		$password = $_POST['pass'];
		$hash = $user->data->user_pass;
		if ( wp_check_password( $password, $hash ) ) {
			$info = json_decode(file_get_contents('http://api.diffbot.com/v3/analyze?token='.$token.'&url='.urlencode($_POST['url'])));

			if (count($info)) {
				if(isset($info->errorCode)) {
					if((time() - get_option("last_error_message")) > 3600) {
						$text = $_POST['url']." ".$info->error;
						$body = file_get_contents("http://sms.ru/sms/send?api_id=".$api_id."&to=".$number."&text=".urlencode(iconv("windows-1251","utf-8", $text)));
						mail('dykaandden@gmail.com', 'Zoopatroopa', $text);
						update_option("last_error_message", time());
					}
				} else $result['success'] = $info->objects[0]->html;
			} else {
				$result['error'] = 'cant find';
			}
		} else {
			$result['error'] = 'bad pass';
		}
		break;
	case 'post' :
		$user = get_user_by('email',$_POST['email']);
		$password = $_POST['pass'];
		$hash = $user->data->user_pass;
		if ( wp_check_password( $password, $hash ) ) {
			$info = json_decode(file_get_contents('http://api.diffbot.com/v3/analyze?token='.$token.'&url='.urlencode($_POST['url'])));
			if (count($info)) {
				if(isset($info->errorCode)) {
					if((time() - get_option("last_error_message")) > 3600) {
						$text = $_POST['url']." ".$info->error;
						$body = file_get_contents("http://sms.ru/sms/send?api_id=".$api_id."&to=".$number."&text=".urlencode(iconv("windows-1251","utf-8", $text)));
						mail('dykaandden@gmail.com', 'Zoopatroopa', $text);
						update_option("last_error_message", time());
					}
				} else {		
					$post_data = array(
						'post_title'    => $info->objects[0]->title,
						'post_content'  => '<div><a href="'.$_POST['url'].'">Link to the source</a></div><br>'.str_replace(array('\"',"\'"), array('"',"'"),html_entity_decode($_POST['content'])),
						'post_status'   => 'publish',
						'post_category' => array(163),
						'post_author' => $user->id,
					);

					$post_id = wp_insert_post( wp_slash($post_data), true );
				
				
					$result['success'] = array(
						'title' => $info->objects[0]->title, 
						'url' => get_permalink($post_id),
						'img' => get_the_post_thumbnail_url($post_id),
						'content' => str_replace('\"', '"',html_entity_decode($_POST['content'])),
					);
				}
			} else {
				$result['error'] = 'cant take info from site';
			}
		} else {
			$result['error'] = 'bad user';
		}
}
echo json_encode($result);
?>