<?php
/*
 * Plugin Name: Auto Builder
 * Description: Auto upload content to wordpress.
 * Version: 1.04
 * Author: Joseph & Johnny & Sam
 * Author URI: boost-connect.net
 * Plugin URI: boost-connect.net
 */
 
define('AUTO_BUILDER_DIR', plugin_dir_path(__FILE__));
define('AUTO_BUILDER_URL', plugin_dir_url(__FILE__));


wp_register_style('stylespace', plugins_url('css/style.css',__FILE__ ));
wp_register_script( 'scriptspace', plugins_url('js/scripts.js',__FILE__ ));


function my_plugin_menu() {

	add_dashboard_page( 'Auto Builder', 'Auto Builder', 'manage_options', 'content', 'plugin_options' );

}

add_action( 'admin_menu', 'my_plugin_menu' );
wp_enqueue_style('stylespace');

function plugin_options() {

	?>	<div class="wrap">

		<form action="index.php?page=content&upload=true" method="post" enctype="multipart/form-data">
		<label style="font-size: 18px;" for="file"></label>
		<input style="width: 223px; color: white; background-color: #428bca; border-color: #357ebd; text-align: center; cursor: pointer; border: 1px solid transparent; padding: 6px 12px; font-size: 14px; border-radius: 4px; margin: 20px; margin-right: 20px;
" type="file" name="file" id="file">
		<input style="width: 150px; color: white; background-color: #428bca; border-color: #357ebd; text-align: center; cursor: pointer; border: 1px solid transparent; padding: 6px 12px; font-size: 14px; border-radius: 4px; height: 36px;" type="submit" name="submit" value="Upload">
		</form>

	<?php

	if (isset($_GET['upload']) && $_GET['upload'] == "true") { 
		$filename = $_FILES['file']['name'];
		if ($filename == 'content.json'){
		?>
		
		
		<?php creat_site(); ?>
		
		<?php } else {
				echo '<p style="color:red;">Make sure the content.php is named correctly and try again</p>';
				} 
	}

		$allowedExts = array("json");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		
		
		if ($_FILES["file"]["error"] > 0){
		    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}

		else{
			move_uploaded_file($_FILES["file"]["tmp_name"],
			AUTO_BUILDER_DIR . $_FILES["file"]["name"]);

		}
		if (!isset($_GET['upload'])){
			echo "<div style='margin: 20px; margin-left: 15px; font-size: 18px; font-weight: bold;'>Please Upload Content.json</div>";
		}
		

	?></div><?php

}



add_action('admin_menu', 'AB_add_menu_items');

if ( isset($_GET['ajax']) && $_GET['ajax'] == "true" ){
	// when the admin menu is built
	add_action('admin_menu', 'ABontent_do_ajax');
	
}


function creat_site(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);

	// WIREFRAME
	$wireframe = ($main_data['wireframe']);

	switch($wireframe) {
	
		case 1:
			wireframe1();
			break;
		case 2:
			wireframe2();
			break;	
		case 3:
			wireframe3();
			break;
		case 4:
			wireframe4();
			break;
		case 5:
			wireframe5();
			break;
		case 6:
			wireframe6();
			break;
		case 7:
			wireframe7();
			break;
		case 8:
			wireframe8();
			break;
		case 9:
			wireframe9();
			break;
		case 10:
			wireframe10();
			break;
		case 11:
			wireframe11();
			break;
		case 12:
			wireframe12();
			break;
		case 13:
			wireframe13();
			break;		
		case 14:
			wireframe14();
			break;	
		case 15:
			wireframe15();
			break;		
		case 16:
			wireframe16();
			break;
		case 17:
			wireframe17();
			break;	
		case 18:
			wireframe18();
			break;
		case 19:
			wireframe19();
			break;
		case 20:
			wireframe20();
			break;
		case 21:
			wireframe21();
			break;
		case 22:
			wireframe22();
			break;
		case 23:
			wireframe23();
			break;
		case 24:
			wireframe24();
			break;
		case 25:
			wireframe25();
			break;
		case 26:
			wireframe26();
			break;
		case 27:
			wireframe27();
			break;
		case 28:
			wireframe28();
			break;		
		case 29:
			wireframe29();
			break;	
		case 30:
			wireframe30();
			break;				
	}

}


function wireframe1(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TAGLINE
	$tagline = ($main_data['tagline']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	// CONTENT AND PRIVACY


	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content

	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	// UPDATE TAGLINE
	update_option( 'blogdescription', $tagline );
	echo "Updated site tagline. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);
  
   	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe2(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	update_option('deepfocus_logo', $upload_dir['url'].'/logo.png'); 
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'./favicon.ico', $favicon);
	update_option('deepfocus_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe3(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);

	// TAGLINE
	$tagline = ($main_data['tagline']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	update_option('chameleon_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";

	// UPDATE TAGLINE
	update_option('blogdescription', $tagline);
	echo "Tagline was created.<br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe4(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page 

}

function wireframe5(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe6(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe7(){ 

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);

	// TAGLINE
	$tagline = ($main_data['tagline']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";

	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	update_option('thesource_logo', $upload_dir['url'].'/logo.png'); 
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	update_option('thesource_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	/*// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); */

	//$wk_id = wp_insert_post($create_widgetkit);
	//$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	//echo "Widgetkit created. <br>";
	

		/*//Create Slides
			$counter = 1;
			$count = 1;
			for ($i = 1; $i <= 3; $i++){
				$slide_name = 'Slide'.$counter;
				//$slide_count = 'slide_title_'.$counter;
				//$slide_page_id = 'slide_page_id_'.$counter;
				/*foreach ($thesource_array[$slide_count] as $key => $val){
					$slide_title = $key;
					$slide_content = $val;
				}
				$$slide_name = array(
			
    			    'post_type'   => 'slide',
    			    'post_title'  => stripslashes($slide_title),
    			    'post_name'   => stripslashes($slide_title),
    			    'post_status' => 'publish',
    			    'post_content' => stripslashes($caption),
    			    'post_author' => 1,
    			    'post_parent' => ''
    			);
	
    			$new_slide_id = wp_insert_post($$slide_name);
	
    			$path = $wp_upload_dir['url'].'/slider'.$counter.'.jpg';
	
    			$attachment = array(
	
  					'guid' => $upload_dir['path'].'/slider1.jpg', 
	
  					'post_mime_type' => 'image/jpeg',
	
  					'post_title' => 'slide'.$counter,
	
  					'post_content' => '',
	
  					'post_status' => 'inherit'
	
  				);
	
  				$filename = $wp_upload_dir['path'].'/slider'.$counter.'.jpg';
	
  				$attach_id = wp_insert_attachment( $attachment, $filename, $new_slide_id );
	
  				// you must first include the image.php file
	
  				// for the function wp_generate_attachment_metadata() to work
	
  				require_once( ABSPATH . 'wp-admin/includes/image.php' );
	
  				$attach_data = wp_generate_attachment_metadata( $attach_id, $path );
	
  				wp_update_attachment_metadata( $attach_id, $attach_data );
	
  				set_post_thumbnail( $new_slide_id, $attach_id );
  				$counter++;
			}*/

	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// CREATE SLIDES

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	update_option('thesource_feat_pages', $slide_pages);

	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";

	// UPDATE TAGLINE
	update_option( 'blogdescription', $tagline );
	echo "Updated site tagline. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe8(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page 

}

function wireframe9(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	update_option('woo_custom_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page 

}

function wireframe10(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe11(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	
	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content

	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe12(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	update_option('woo_custom_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
	);

	// WOO FAVICON SOLUTION
	
	$favicon_parent = array(
		'post_type'   => 'wooframework',
		'post_title'  => 'Woo Custom Favicon',
		'post_name'   => 'woo-wf-woo_custom_favicon',
		'post_status' => 'draft',
		'post_author' => 1
	);

	$filename = $upload_dir['path'].'/favicon.ico';
	$fav_parent_id = wp_insert_post($favicon_parent);
	$fav_id = wp_insert_attachment( $favicon_maker, $filename, $fav_parent_id );
	echo "Favicon image set in settings. <br>";
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}
	
function wireframe13(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	

	// CREATE SLIDES

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	if (!update_option('professional_feat_pages', $slide_pages)) {
		add_option('professional_feat_pages', $slide_pages);
	}

	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page 

}	

function wireframe14(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	update_option('dailyjournal_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.png', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'default'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe15(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe16(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);

	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);

	// TAGLINE
	$tagline = ($main_data['tagline']);
	
	// HOME
	$home_title = 'Home';
	$homepage_title = ($main_data['content']['homepage']['content']['homepage_title']);
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	$wp_insert = array(
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	update_post_meta(215, '_menu_item_url', home_url()); // Reset the home URL
	
	// Content & Privacy page
	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);
	$privacy_id = wp_insert_post ($privacy_page);	// Insert Privacy page and returns page id
	
	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id ); // remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);	// Turn privacy page into an object
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/'); // Create link url for Privacy page
	update_option('privacy_url', $privacy_url);
	
	
	// CREATE SLIDES

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	if (!update_option('magnificent_feat_pages', $slide_pages)) {
		add_option('magnificen_tfeat_pages', $slide_pages);
	}

	/* HOME PAGE CREATION
	$text_widget = get_option('widget_text');
	$widget_array = maybe_unserialize( $text_widget );
	$counter = 1;
	foreach($widget_array as $k => $v) {		
          if($widget_array[$k]['title'] == 'title' . $counter) {
          	$widget_array[$k]['title'] = $main_data['content']['homepage']['title'][$counter - 1];
          	$widget_array[$k]['text'] = $main_data['content']['homepage']['box'][$counter - 1];
          	$counter++;
          }
	}
	update_option('widget_text', $widget_array);
	*/

	// TEXT WIDGET CREATION
	//Get sidebar configuration array and unserialize it
  	$sidebars_widgets = maybe_unserialize( get_option('sidebars_widgets') );

  	//Get text widget array and unserialize it
  	$text_widgets = maybe_unserialize( get_option('widget_text') );

  	for ($i = 1; $i < 5; $i++){
	  	//Append a new array item to the sidebar
	  	$sidebars_widgets['sidebar-' . $i][] = 'text-' . ($i + 100);
	  	//Append a new text widget title
  		$text_widgets[$i + 100]['title'] = $main_data['content']['homepage']['title'][$i - 1];
  		//Append a new text widget text
  		$text_widgets[$i + 100]['text'] = $main_data['content']['homepage']['box'][$i - 1];
	}   

 	//Update the widget_text option. The array is serialized automatically in the update_option function
  	update_option('widget_text', $text_widgets);

  	//Update the sidebars_widgets option. The array is serialized automatically in the update_option function
  	update_option('sidebars_widgets', $sidebars_widgets);



	// META DESCRIPTION
	update_option('frontpage_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";

	// UPDATE HOMEPAGE H1
	update_option('magnificent_quote', $homepage_title);
	echo "H1 was created.<br>";

	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

}


function wireframe17(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page
	
	
	// CREATE SLIDES

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	if (!update_option('modest_feat_pages', $slide_pages)) {
		add_option('modest_feat_pages', $slide_pages);
	}

	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

}	

function wireframe18(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);

	// ICONS
	$icon1 = base64_decode($main_data['icon1']);
	$icon2 = base64_decode($main_data['icon2']);
	$icon3 = base64_decode($main_data['icon3']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
    
    // HOMEPAGE TITLE IMAGE
	$homepage_image = base64_decode($main_data['content']['homepage']['background']);
	
	// SLIDE IMAGES
	$slider1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	

	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";


    // IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	/*file_put_contents($upload_dir['path'].'/slider1.jpg', $slider1);
	echo "slider1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider2);
	echo "slider2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider3);
	echo "slider3 uploaded.  <br>";*/
	file_put_contents($upload_dir['path'].'/background.jpg', $homepage_image);
	echo "background image uploaded.  <br>";
	file_put_contents($wp_upload_dir['path'].'/icon1.png', $icon1);
	echo "icon1 uploaded. <br>";
	file_put_contents($wp_upload_dir['path'].'/icon2.png', $icon2);
	echo "icon2 uploaded. <br>";
	file_put_contents($wp_upload_dir['path'].'/icon3.png', $icon3);
	echo "icon3 uploaded. <br>";

	update_option('woo_custom_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	// upload slider images
	for ($i = 0; $i < 3; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/slider' . ($i + 1) . '.jpg', $image);
		echo "slider" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	// upload icons
	for ($i = 3; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/icon' . ($i - 2) . '.png', $image);
		echo "icon" . ($i-2) . ".png uploaded. <br>";
		
	}
	
	
	/*
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	*/

	$wp_insert = array(	
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	/*
	//INSERT HOMEPAGE FEATURES
	$features_array = array(
		'feature_1' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][0]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature_2' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][1]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature_3' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][2]),
			'post_author' => 1,
			'post_parent' => ''
		),
	);

	for ($i = 1; $i < 4; $i++) {
		${'feature' . $i . '_id'} = wp_insert_post($features_array['feature_' . $i]);
	}
	*/
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	
	update_post_meta(223, '_menu_item_url', home_url()); // Reset the home URL
    
    $privacy_policy = array(
        'post_type'   => 'page',
        'post_title'  => stripslashes($main_data['content']['privacy']['title']),
        'post_name'   => stripslashes($main_data['content']['privacy']['title']),
        'post_status' => 'publish',
        'post_content' => stripslashes($main_data['content']['privacy']['content']),
        'post_author' => 1,
        'post_parent' => ''
    );
    
    $privacy_id = wp_insert_post ($privacy_policy);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page
	
    
	/*
	//ATTACH IMAGES TO FEATURES
	for ($i = 0; $i < 3; $i++) {
		$filename = 'image' . ($i + 1) . '.jpg';
		$parent_post_id = ${'feature' . ($i + 1) . '_id'};
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'image' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'image' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'image' . ($i +1) . '.jpg' );
		$attach_data['width'] = 250;
		$attach_data['height'] = 250;
		$attach_data['hwstring_small'] = 'height="250" width="250"'; 
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	*/
    
    // HUSTLE HOMEPAGE OPTIONS

    //  Pulls page info from database for the page that the slide is linking too.
    $about_page_obj = get_post($page_ids['about_page']['page']);

    //  Creates url to the page that the slide is linking too
    $about_page_url = site_url('/' . $about_page_obj->post_name . '/');
    
    $hustle_options = array(
        //Sets homepage h1
        'woo_homepage_intro_message_heading' => $main_data['content']['homepage']['intro_message_label'],
        //Sets content under h1
        'woo_homepage_intro_message_content' => $main_data['content']['homepage']['intro_message_content'],
        //Button links to about page
        'woo_homepage_intro_message_button_url' => $about_page_url,
        //Sets top image on homepage
        'woo_homepage_intro_message_bg' => $upload_dir['url'] . '/background.jpg',
        
        //BLOG AREA TITLE AND BUTTON TEXT DON'T WORK YET
        //Sets title over blog posts on the homepage
        //'woo_homepage_blog_area_title' => $main_data['content']['homepage']['blog_area_title'],
		//Sets link button text
        //'woo_homepage_intro_message_button_label' => $main_data['content']['homepage']['content']['intro_message_button_label'],
        
    );
    
    $woo_options = maybe_unserialize(get_option('woo_options'));

    //Loops through $hustle_options array and adds options if they aren't added, and updates them if they are
    foreach ($hustle_options as $key => $val) {
        if (!add_option($key, $val)) {
            update_option($key, $val);
        } 
        else {
           echo $key . " wasn't updated. <br>";
        }
        $woo_options[$key] = $val;
    }
    
    update_option('woo_options', $woo_options);

    //  Loop to add features and slides
    for ($i = 1; $i < 4; $i++) {

        //  Pulls page info from database for the page that the slide is linking too.
        $page_obj = get_post($page_ids['page' . $i]['page']);

        //  Creates url to the page that the slide is linking too
        $page_url = site_url('/' . $page_obj->post_name . '/');

        //  Creates string of html for the slide content
        $post_html = '<h2>' . $main_data['content']['page' . $i]['call_to_action_titles'] . '</h2>' . 
           $main_data['content']['page' . $i]['call_to_action_content'] . '
           <br>
           [button link="' . $page_url . '" bg_color="#b324b3" border="#b53ab5"]Read More[/button]';

        //  Create slide post array for slide post
        $slide_array = array(
           'post_title'    => '',
           'post_content'  => $post_html,
           'post_status'   => 'publish',
           'post_type'     => 'slide',
           'post_author'   => 1,
        );

        //  Create attachment array for slide image
        $attachment = array(
           'guid'           => $upload_dir['url'] . '/slider' . $i . '.jpg', 
           'post_mime_type' => 'image/jpeg',
           'post_title'     => 'slider' . $i,
           'post_content'   => '',
           'post_status'    => 'inherit'
        );

        //  Insert slide post, and set post id to $slide_id variable
        $slide_id = wp_insert_post($slide_array);

        //  Insert attachment for image
        $attachment_id = wp_insert_attachment( $attachment, $upload_dir['path'] . '/slider' . $i . '.jpg', $slide_id );

        //  Include image.php for wp_generate_attachment_metadata
        require_once( ABSPATH . 'wp-admin/includes/image.php' );

        //  Create metadata for attachment
        $attach_data = wp_generate_attachment_metadata( $attachment_id, $filename );

        //  Append height and width to $attach_data array
        $attach_data['height'] = 479;
        $attach_data['width'] = 262;

        //  Update metadata for image attachment
        wp_update_attachment_metadata( $attachment_id, $attach_data );
        
        //  Set feature thumbnail
        set_post_thumbnail( $slide_id, $attachment_id );

        //  Uncomment to add alt text to images
        //add_post_meta($attachment_id, '_wp_attachment_image_alt', $main_data['alttext']['slides'][$i], true);

        //  Create feature post array
        $feature = array(
           'post_title'    => $main_data['content']['homepage']['title'][($i - 1)],
           'post_content'  => $main_data['content']['homepage']['box'][($i - 1)],
           'post_status'   => 'publish',
           'post_type'     => 'feature',
           'post_author'   => 1,
        );
        
        $feature_attachment = array(
           'guid'           => $upload_dir['url'] . '/icon' . $i . '.png', 
           'post_mime_type' => 'image/png',
           'post_title'     => 'icon' . $i,
           'post_content'   => '',
           'post_status'    => 'inherit'
        );

        //  Insert feature post
        $feature_id = wp_insert_post($feature);
        
        //  Insert attachment for feature
        $feature_attachment_id = wp_insert_attachment( $feature_attachment, $upload_dir['path'] . '/icon' . $i . '.png', $feature_id );
        
        //  Create metadata for feature attachment
        $feature_attach_data = wp_generate_attachment_metadata( $feature_attachment_id, $filename );

        //  Append height and width to $attach_data array
        $feature_attach_data['height'] = 479;
        $feature_attach_data['width'] = 262;

        //  Update metadata for image attachment
        wp_update_attachment_metadata( $feature_attachment_id, $feature_attach_data );
        
        //  Set feature thumbnail
        set_post_thumbnail( $feature_id, $feature_attachment_id );
        
        //  Uncomment to add alt text to images
        //add_post_meta($feature_attachment_id, '_wp_attachment_image_alt', $main_data['alttext']['icons'][$i], true);

	}

	
	// META DESCRIPTION
	update_option('frontpage_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option('frontpage_title', $title_tag);
	echo "Updated site title. <br>";
	
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

}

function wireframe19(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$homepage_title = ($main_data['content']['homepage']['homepage_title']);
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page
	
	
	// CREATE SLIDES

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	
	// set featured pages for slider
	$flex_array = maybe_unserialize(get_option('et_flexible'));
	$flex_array['flexible_feat_pages'] = $slide_pages;
	update_option('et_flexible', $flex_array);


	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	
	// UPDATE HOMEPAGE H1
	//Get sidebar configuration array and unserialize it
  	$sidebars_widgets = maybe_unserialize( get_option('sidebars_widgets') );

  	//Get text widget array and unserialize it
  	$text_widgets = maybe_unserialize( get_option('widget_text') );

  	//Append a new array item to the sidebar
	$sidebars_widgets['h1'][] = 'text-100';
	//Append a new text widget title
	$text_widgets[100]['title'] = $homepage_title;
	//Append a new text widget text
	$text_widgets[100]['text'] = '';

 	//Update the widget_text option. The array is serialized automatically in the update_option function
  	update_option('widget_text', $text_widgets);

  	//Update the sidebars_widgets option. The array is serialized automatically in the update_option function
  	update_option('sidebars_widgets', $sidebars_widgets);
	
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	
}	

function wireframe20(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();
	$slider_dir = $upload_dir['path'] . '/slider';

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);	// upload logo
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);	// upload favicon
	update_option('woo_custom_favicon', $upload_dir['url'].'/favicon.ico');	// set favicon
	echo "Favicon uploaded.  <br>";
	file_put_contents($slider_dir .'/slider1.jpg', $slider_1);	// upload slider1
	echo "slider 1 uploaded.  <br>";
	file_put_contents($slider_dir .'/slider2.jpg', $slider_2);	// upload slider2
	echo "slider 2 uploaded.  <br>";
	file_put_contents($slider_dir .'/slider3.jpg', $slider_3);	// upload slider3
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	// WOO FAVICON SOLUTION

	$favicon_parent = array(
		'post_type'   => 'wooframework',
		'post_title'  => 'Woo Custom Favicon',
		'post_name'   => 'woo-wf-woo_custom_favicon',
		'post_status' => 'draft',
		'post_author' => 1
	);

	$filename = $upload_dir['path'].'/favicon.ico';
	$fav_parent_id = wp_insert_post($favicon_parent);
	$fav_id = wp_insert_attachment( $favicon_maker, $filename, $fav_parent_id );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	$page_titles = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$page_titles[] = get_permalink($page_ids[$page]['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['post_title'] . ' menu item updated. <br>';
	}
	
	
	//ADD PAGE LINKS TO SLIDERS
	$home_obj = get_post($page_ids['home_page']['page']);	// create object of home page
	$home_post_content = $home_obj -> post_content;	// set home page content equal to a variable
	
	// replace hrefs on sliders with page links
	$link_array = array(
		'/\'.$page_titles[\'0\'].\'/' => $page_titles[0],
		'/\'.$page_titles[\'1\'].\'/' => $page_titles[1],
		'/\'.$page_titles[\'2\'].\'/' => $page_titles[2]
	);
	foreach( $link_array as $search => $replace ) {
		$home_post_content = str_replace( $search, $replace, $home_post_content );
	};
	///
	
	// update home page post with new content
	$update_array = array(
		'ID' => $page_ids['home_page']['page'],
		'post_content' => $home_post_content
	);
	wp_update_post($update_array);
	///
	
	
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page
	
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	
}

function wireframe21(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDER IMAGE
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
    
    // AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.png', $slider_1);
	echo "slider 1 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/icon' . ($i + 1) . '.png', $image);
		echo "icon" . ($i+1) . ".png uploaded. <br>";
		
	}

	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['post_title'] . ' menu item updated. <br>';
	}
	
	update_post_meta(219, '_menu_item_url', home_url()); // Resets the home URL
    
    $privacy_page = array(
        'post_type'   => 'page',
        'post_title'  => stripslashes($main_data['content']['privacy']['title']),
        'post_name'   => stripslashes($main_data['content']['privacy']['title']),
        'post_status' => 'publish',
        'post_content' => stripslashes($main_data['content']['privacy']['content']),
        'post_author' => 1,
        'post_parent' => ''
    );

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page
	
    
    //Get about page post id
	$about_obj = get_post($page_ids['about_page']['page']);

	//Create slide html for post
	$slide_html = $main_data['content']['homepage']['content']['slide_title'].
	'<br>[button link="' . site_url('/' . $about_obj->post_name . '/') . '"]Click here[/button]
	<img src="' . $upload_dir['url'] . '/slider1.png" alt="" />';

	//Create post array for wp_insert_post()
	$slide = array(
   		'post_title'    => $main_data['content']['homepage']['content']['homepage_title'],
   		'post_content'  => $slide_html,
   		'post_status'   => 'publish',
  	 	'post_author'   => 1,
  		'post_type'     => 'slide',
	);

	//Insert slide post
	wp_insert_post($slide);

	//Loop 3 times to create 3 features, and attach their icons
	for ($i = 0; $i < 3; $i++){
   
       //Create feature array for wp_insert_post
       $feature =  array(
           'post_title'    => $main_data['content']['homepage']['title'][$i],
           'post_content'  => $main_data['content']['homepage']['box'][$i],
           'post_status'   => 'publish',
           'post_author'   => 1,
           'post_type'     => 'feature',
       );

       //Create attachment array to insert the feature's icon
       $attachment = array(
           'guid'           => $upload_dir['url'] . '/icon' . ($i +1) . '.png', 
           'post_mime_type' => 'image/png',
           'post_title'     => 'icon' . ($i + 1),
           'post_content'   => '',
           'post_status'    => 'inherit'
       );


       //Insert feature post and set the post id to the $icon_id variable
       $icon_id = wp_insert_post($feature);

       //Insert attachment for image and store the attachment id in the $attachment_id variable
       $attachment_id = wp_insert_attachment( $attachment, $upload_dir['path'] . '/icon' . ($i +1) . '.png', $icon_id );

       //Include image.php for the wp_generate_attachment_metadata function
       require_once( ABSPATH . 'wp-admin/includes/image.php' );

       //Create metadata for attachment
       $attach_data = wp_generate_attachment_metadata( $attachment_id, $filename );

       //Append height and width to $attach_data array
       $attach_data['height'] = 50;
       $attach_data['width'] = 50;

       //Update metadata for image attachment
	   add_post_meta($icon_id, '_thumbnail_id', $attachment_id);
       wp_update_attachment_metadata( $attachment_id, $attach_data );

    }
	
	// META DESCRIPTION
	$seo_array = maybe_unserialize( get_option( 'wpseo_titles' ));
	$seo_array['metadesc-home-wpseo'] = $meta_description;
	update_option( 'wpseo_titles', $seo_array );
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	update_option("blogdescription", "");
	
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
    
}

function wireframe22(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);
	$homepage_title = ($main_data['content']['homepage']['content'][0]);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();


	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpeg', $image);
		echo "image" . ($i+1) . ".jpeg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit); //create widgekit slider
	$wk_widget_content = '[widgetkit id=' . $wk_id . ']'; //create shortcode to be used in text widget
	echo "Widgetkit created. <br>";
	
	
	// CREATE PAGES ARRAY
	$wp_insert = array(	
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);

	//INSERT HOMEPAGE FEATURES
	$features_array = array(
		'feature-1' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][0]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-2' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][1]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-3' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][2]),
			'post_author' => 1,
			'post_parent' => ''
		),
	);

	for ($i = 1; $i < 4; $i++) {
		${'feature' . $i . '_id'} = wp_insert_post($features_array['feature-' . $i]);
	}

	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";

	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['post_title'] . ' menu item updated. <br>';
	}
	update_post_meta(186, '_menu_item_url', home_url()); // Resets the home URL
	
	
	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content


	// ATTACH IMAGES TO FEATURES
	for ($i = 0; $i < 3; $i++) {
		$filename = 'image' . ($i + 1) . '.jpeg';
		$parent_post_id = ${'feature' . ($i + 1) . '_id'};
		$wp_upload_dir = wp_upload_dir();
		// array for image attachment
		$attachment = array(			
		    'guid'           => $wp_upload_dir['path'] . '/' . 'image' . ($i + 1) . '.jpeg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'image' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );	// insert image as attachment
		$attach_data = wp_generate_attachment_metadata( $attach_id, $wp_upload_dir['path'] . '/' . 'image' . ($i + 1) . '.jpeg' );	// create meta data for image
		$attach_data['sizes']['thumbnail'] = $attach_data['sizes']['et-portfolio-medium-page-thumb'];	// set thumbnail to largest image size
		wp_update_attachment_metadata( $attach_id, $attach_data );	// insert meta data for image
		set_post_thumbnail( $parent_post_id, $attach_id );	// set image as thumnail for feature
	}


	// UPDATE HOMEPAGE H1 & SLIDER
  	$text_widgets = maybe_unserialize( get_option('widget_text') );		//Get text widget array and unserialize it
	$text_widgets[5]['title'] = $homepage_title;	//Update title in H1 text widget
	$text_widgets[6]['text'] = $wk_widget_content;	//Update content in slider text widget
   	update_option('widget_text', $text_widgets);	//Update the widget_text option. The array is serialized automatically in the update_option function
	
	// META DESCRIPTION
	$seo_array = maybe_unserialize( get_option( 'wpseo_titles' ));
	$seo_array['metadesc-home-wpseo'] = $meta_description;
	update_option( 'wpseo_titles', $seo_array );
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe23(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);

	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);

	// TAGLINE
	$tagline = ($main_data['tagline']);
	
	// HOME
	$home_title = 'Home';
	$homepage_title = ($main_data['content']['homepage']['content'][0]);
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();
	
	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	$wp_insert = array(
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);

	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page

	
	//INSERT HOMEPAGE FEATURES
	$features_array = array(
		'feature-1' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][0]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-2' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][1]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-3' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][2]),
			'post_author' => 1,
			'post_parent' => ''
		),
	);

	for ($i = 1; $i < 4; $i++) {
		${'feature' . $i . '_id'} = wp_insert_post($features_array['feature-' . $i]);
	}
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	update_post_meta(243, '_menu_item_url', home_url()); // Resets the home URL
	
	
	// CREATE SLIDES

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	if (!update_option('nimble_feat_pages', $slide_pages)) {
		add_option('nimble_feat_pages', $slide_pages);
	}

	//ENABLE FEATURED PAGES FOR SLIDER
	$nimble_array = maybe_unserialize( get_option( 'et_nimble' ));
	$nimble_array['nimble_feat_pages'] = $slide_pages;

    update_option( 'et_nimble', $nimble_array );

	//ATTACH IMAGES TO FEATURES
	for ($i = 0; $i < 3; $i++) {
		$filename = 'image' . ($i + 1) . '.jpg';
		$parent_post_id = ${'feature' . ($i + 1) . '_id'};
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'image' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'image' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'image' . ($i +1) . '.jpg' );
		$attach_data['width'] = 250;
		$attach_data['height'] = 250;
		$attach_data['hwstring_small'] = 'height="250" width="250"'; 
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}

	/* HOME PAGE CREATION
	$text_widget = get_option('widget_text');
	$widget_array = maybe_unserialize( $text_widget );
	$counter = 1;
	foreach($widget_array as $k => $v) {		
          if($widget_array[$k]['title'] == 'title' . $counter) {
          	$widget_array[$k]['title'] = $main_data['content']['homepage']['title'][$counter - 1];
          	$widget_array[$k]['text'] = $main_data['content']['homepage']['box'][$counter - 1];
          	$counter++;
          }
	}
	update_option('widget_text', $widget_array);
	*/

	// UPDATE HOMEPAGE H1
	//Get sidebar configuration array and unserialize it
  	$sidebars_widgets = maybe_unserialize( get_option('sidebars_widgets') );

  	//Get text widget array and unserialize it
  	$text_widgets = maybe_unserialize( get_option('widget_text') );

  	//Append a new array item to the sidebar
	$sidebars_widgets['h1'][] = 'text-100';
	//Append a new text widget title
	$text_widgets[100]['title'] = $homepage_title;
	//Append a new text widget text
	$text_widgets[100]['text'] = '';

 	//Update the widget_text option. The array is serialized automatically in the update_option function
  	update_option('widget_text', $text_widgets);

  	//Update the sidebars_widgets option. The array is serialized automatically in the update_option function
  	update_option('sidebars_widgets', $sidebars_widgets);

	// META DESCRIPTION
	$seo_array = maybe_unserialize( get_option( 'wpseo_titles' ));
	$seo_array['metadesc-home-wpseo'] = $meta_description;
	update_option( 'wpseo_titles', $seo_array );
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

}

function wireframe24(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 'auto',
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['post_title'] . ' menu item updated. <br>';
	}
	
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	///
	
	
	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);
	///
	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	///
	
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	
	// update the widgetkit content
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);
	///
	
	
	// CONTENT & PRIVACY PAGE
	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page
	
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	
}

function wireframe25(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);

	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);

	// TAGLINE
	$tagline = ($main_data['tagline']);
	
	// HOME
	$home_title = 'Home';
	$homepage_title = ($main_data['content']['homepage']['content'][0]);
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	$wp_insert = array(
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);

	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page
	

	//INSERT HOMEPAGE FEATURES
	$features_array = array(
		'feature-1' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][0]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-2' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][1]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-3' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][2]),
			'post_author' => 1,
			'post_parent' => ''
		),
	);

	for ($i = 1; $i < 4; $i++) {
		${'feature' . $i . '_id'} = wp_insert_post($features_array['feature-' . $i]);
	}
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	update_post_meta(186, '_menu_item_url', home_url()); // Reset the home URL
	
	
	// CREATE SLIDES
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	if (!update_option('fusion_feat_pages', $slide_pages)) {
		add_option('fusion_feat_pages', $slide_pages);
	}

	//ENABLE FEATURED PAGES FOR SLIDER
	$fusion_array = maybe_unserialize( get_option( 'et_fusion' ));
	$fusion_array['fusion_feat_pages'] = $slide_pages;

    update_option( 'et_fusion', $fusion_array );

	//ATTACH IMAGES TO FEATURES
	for ($i = 0; $i < 3; $i++) {
		$filename = 'image' . ($i + 1) . '.jpg';
		$parent_post_id = ${'feature' . ($i + 1) . '_id'};
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'image' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'image' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'image' . ($i +1) . '.jpg' );
		$attach_data['width'] = 250;
		$attach_data['height'] = 250;
		$attach_data['hwstring_small'] = 'height="250" width="250"'; 
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}

	/* HOME PAGE CREATION
	$text_widget = get_option('widget_text');
	$widget_array = maybe_unserialize( $text_widget );
	$counter = 1;
	foreach($widget_array as $k => $v) {		
          if($widget_array[$k]['title'] == 'title' . $counter) {
          	$widget_array[$k]['title'] = $main_data['content']['homepage']['title'][$counter - 1];
          	$widget_array[$k]['text'] = $main_data['content']['homepage']['box'][$counter - 1];
          	$counter++;
          }
	}
	update_option('widget_text', $widget_array);
	*/

	// UPDATE HOMEPAGE H1
	//Get sidebar configuration array and unserialize it
  	$sidebars_widgets = maybe_unserialize( get_option('sidebars_widgets') );

  	//Get text widget array and unserialize it
  	$text_widgets = maybe_unserialize( get_option('widget_text') );

  	//Append a new array item to the sidebar
	$sidebars_widgets['h1'][] = 'text-100';
	//Append a new text widget title
	$text_widgets[100]['title'] = $homepage_title;
	//Append a new text widget text
	$text_widgets[100]['text'] = '';

 	//Update the widget_text option. The array is serialized automatically in the update_option function
  	update_option('widget_text', $text_widgets);

  	//Update the sidebars_widgets option. The array is serialized automatically in the update_option function
  	update_option('sidebars_widgets', $sidebars_widgets);



	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

}

function wireframe26(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.png', $image);
		echo "image" . ($i+1) . ".png uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	
	
	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);
	///
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	///
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	// update the widgetkit content
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);
	///
	
	
	// CONTENT & PRIVACY PAGE
	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);	 // insert privacy page and assign its post id to a variable

	$privacy_nav_id = $privacy_id + 1;
	wp_delete_post( $privacy_nav_id );	// remove privacy page from navigation
	
	$privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
	update_option('privacy_url', $privacy_url);	// create url for privacy page
	
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	
}

function wireframe27(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "template-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	update_option('woo_custom_favicon', $upload_dir['url'].'/favicon.ico');
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 'auto',
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'template-fullwidth.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	// WOO FAVICON SOLUTION

	$favicon_parent = array(
		'post_type'   => 'wooframework',
		'post_title'  => 'Woo Custom Favicon',
		'post_name'   => 'woo-wf-woo_custom_favicon',
		'post_status' => 'draft',
		'post_author' => 1
	);

	$filename = $upload_dir['path'].'/favicon.ico';
	$fav_parent_id = wp_insert_post($favicon_parent);
	$fav_id = wp_insert_attachment( $favicon_maker, $filename, $fav_parent_id );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
        'post_type'   => 'page',
        'post_title'  => stripslashes($main_data['content']['privacy']['title']),
        'post_name'   => stripslashes($main_data['content']['privacy']['title']),
        'post_status' => 'publish',
        'post_content' => stripslashes($main_data['content']['privacy']['content']),
        'post_author' => 1,
        'post_parent' => ''
    );

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}

function wireframe28(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	$slider_4 = base64_decode($main_data['content']['page4']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	$caption4 = ($main_data['content']['page4']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider4.jpg', $slider_4);
	echo "slider 4 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpeg', $image);
		echo "image" . ($i+1) . ".jpeg uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 216,
		'name' => 'sliders',
		'settings' => array(
			'style' => 'wall',
			'width' => 'auto',
			'height' => 'auto',
			'order' => 'default',
			'effect' => 'spotlight',
			'margin' => '',
			'corners' => '',
			'lightbox' => 0,
			'lightbox_caption' => 1,
			'spotlight_effect' => 'top'
		),
		'style' => 'wall',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
			'\/slider\/slider4.jpg' => stripslashes($caption4),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
			'\/slider\/slider4.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);

	//WIDGETKIT STYLE UPDATE
	//$wk_post = get_post($wk_id);
	//$wk_settings = json_decode($wk_post->post_content, true);
	//$wk_settings['settings']['lightbox_caption'] = 1;
	//$wk_settings['settings']['spotlight_effect'] = 'top';
	//$update_array = array(
	//	'ID'=>$wk_id,
	//	'post_content'=>json_encode($wk_settings)
	//	);
	//wp_update_post($update_array);

	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['about_page']['page']),
		'page2' => get_post($page_ids['page1']['page']),
		'page3' => get_post($page_ids['page2']['page']),
		'page4' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}

	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";
	
	 $privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page
}

function wireframe29(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);

	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);

	// TAGLINE
	$tagline = ($main_data['tagline']);
	
	// HOME
	$home_title = 'Home';
	$homepage_title = '<h1>' .  ($main_data['content']['homepage']['content'][0]) . '</h1>';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
    // HOMEPAGE BG
	$homepage_image = base64_decode($main_data['content']['homepage']['background']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();

	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/background.jpg', $homepage_image);
	echo "background image uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.jpg', $image);
		echo "image" . ($i+1) . ".jpg uploaded. <br>";
		
	}
	
	$wp_insert = array(
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);

	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($main_data['content']['privacy']['title']),
				'post_name'   => stripslashes($main_data['content']['privacy']['title']),
				'post_status' => 'publish',
				'post_content' => stripslashes($main_data['content']['privacy']['content']),
				'post_author' => 1,
				'post_parent' => ''
				);

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

	//INSERT HOMEPAGE FEATURES
	$features_array = array(
		'feature-1' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][0]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][0]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-2' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][1]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][1]),
			'post_author' => 1,
			'post_parent' => ''
		),
		'feature-3' => array(
			'post_type'   => 'feature',
			'post_title'  => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_name'   => stripslashes($main_data['content']['homepage']['title'][2]),
			'post_status' => 'publish',
			'post_content' => stripslashes($main_data['content']['homepage']['box'][2]),
			'post_author' => 1,
			'post_parent' => ''
		),
	);

	for ($i = 1; $i < 4; $i++) {
		${'feature' . $i . '_id'} = wp_insert_post($features_array['feature-' . $i]);
	}
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}
	
	update_post_meta(215, '_menu_item_url', home_url()); // Resets the home URL
	
	// INSERT HOMEPAGE BACKGROUND IMAGE
	$vertex_array = maybe_unserialize( get_option( 'et_vertex' ));
	$vertex_array['vertex_header_bg_image'] = home_url() . '/wp-content/uploads/background.jpg';

	// CREATE SLIDES

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$slide_pages = array();
	for ($i = 0; $i < 3; $i++) {
		$filename = 'slider' . ($i + 1) . '.jpg';
		$parent_post_id = $page_ids['page' . ($i +1)]['page'];
		$slide_pages[] = $parent_post_id;
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'slider' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'slide' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'slider' . ($i +1) . '.jpg' );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}
	if (!update_option('vertex_feat_pages', $slide_pages)) {
		add_option('vertex_feat_pages', $slide_pages);
	}
	
	$vertex_array['vertex_feat_pages'] = $slide_pages;
	update_option( 'et_vertex', $vertex_array );

	//ATTACH IMAGES TO FEATURES
	for ($i = 0; $i < 3; $i++) {
		$filename = 'image' . ($i + 1) . '.jpg';
		$parent_post_id = ${'feature' . ($i + 1) . '_id'};
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(			
		    'guid'           => $wp_upload_dir['url'] . '/' . 'image' . ($i + 1) . '.jpg', 
			'post_mime_type' => 'image/jpeg',
			'post_title'     => 'image' . ($i + 1),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, 'image' . ($i +1) . '.jpg' );
		$attach_data['width'] = 250;
		$attach_data['height'] = 250;
		$attach_data['hwstring_small'] = 'height="250" width="250"'; 
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );
	}

	/* HOME PAGE CREATION
	$text_widget = get_option('widget_text');
	$widget_array = maybe_unserialize( $text_widget );
	$counter = 1;
	foreach($widget_array as $k => $v) {		
          if($widget_array[$k]['title'] == 'title' . $counter) {
          	$widget_array[$k]['title'] = $main_data['content']['homepage']['title'][$counter - 1];
          	$widget_array[$k]['text'] = $main_data['content']['homepage']['box'][$counter - 1];
          	$counter++;
          }
	}
	update_option('widget_text', $widget_array);
	*/

	// UPDATE HOMEPAGE H1
	//Get sidebar configuration array and unserialize it
  	$sidebars_widgets = maybe_unserialize( get_option('sidebars_widgets') );

  	//Get text widget array and unserialize it
  	$text_widgets = maybe_unserialize( get_option('widget_text') );

  	//Append a new array item to the sidebar
	$sidebars_widgets['h1'][] = 'text-100';
	//Append a new text widget title
	$text_widgets[100]['title'] = '';
	//Append a new text widget text
	$text_widgets[100]['text'] = $homepage_title;

 	//Update the widget_text option. The array is serialized automatically in the update_option function
  	update_option('widget_text', $text_widgets);

  	//Update the sidebars_widgets option. The array is serialized automatically in the update_option function
  	update_option('sidebars_widgets', $sidebars_widgets);



	// META DESCRIPTION
	$seo_array = maybe_unserialize( get_option( 'et_vertex' ));
	$seo_array['vertex_seo_home_descriptiontext'] = $meta_description;
	update_option( 'et_vertex', $seo_array );
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	update_option("blogdescription", "");
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

}

function wireframe30(){

	$file = $_FILES['file']['tmp_name'];
	$json_url = $file;
	$json = file_get_contents($json_url);
	$main_data = json_decode($json, TRUE);
	
	// AUTHOR NICKNAME
	$author_nickname = ($main_data['author_nickname']);
	$user_id = 1;
	
	// META DESCRIPTION
	$meta_description = ($main_data['meta_description']);
	
	// TITLE TAG
	$title_tag = ($main_data['title_tag']);
	
	// HOME
	$home_title = 'Home';
	$home_content = ($main_data['content']['homepage']['content']);

	// ABOUT
	$about_title = ($main_data['content']['about']['title']);
	$about_nav = ($main_data['content']['about']['nav']);
	$about_content = ($main_data['content']['about']['content']);

	// PAGE 1
	$page1_title = ($main_data['content']['page1']['title']);
	$page1_nav = ($main_data['content']['page1']['nav']);
	$page1_content = ($main_data['content']['page1']['content']);

	// PAGE 2
	$page2_title = ($main_data['content']['page2']['title']);
	$page2_nav = ($main_data['content']['page2']['nav']);
	$page2_content = ($main_data['content']['page2']['content']);

	// PAGE 3
	$page3_title = ($main_data['content']['page3']['title']);
	$page3_nav = ($main_data['content']['page3']['nav']);
	$page3_content = ($main_data['content']['page3']['content']);
	
	// BLOG
	$blog_nav = ($main_data['content']['blog']['nav']);
	$blog_template = ($main_data['content']['blog']['template']);
	
	$blog_nav = "Blog";
	$blog_template = "page-blog.php";
	
	// FAVICON
	$favicon = base64_decode($main_data['favicon']);
	
	// LOGO
	$logo = base64_decode($main_data['logo']);
	
	// SLIDE IMAGES
	$slider_1 = base64_decode($main_data['content']['page1']['slider_image']);
	$slider_2 = base64_decode($main_data['content']['page2']['slider_image']);
	$slider_3 = base64_decode($main_data['content']['page3']['slider_image']);
	
	// SLIDER CONTENT
	$caption1 = ($main_data['content']['page1']['slider_content']);
	$caption2 = ($main_data['content']['page2']['slider_content']);
	$caption3 = ($main_data['content']['page3']['slider_content']);
	
	// AUTHOR NICKNAME
	update_user_meta($user_id, "nickname", $author_nickname);
	update_user_meta($user_id, "display_name", $author_nickname);
	wp_update_user(array('ID' => $user_id, 'display_name' => $author_nickname));
	echo "User nickname updated. <br>";
	
	// IMAGES INSERT
	$upload_dir = wp_upload_dir();
	
	// create slider folder if it doesn't exist
	if (!file_exists($upload_dir['path'].'/slider')) {
		mkdir($upload_dir['path'].'/slider', 0777, true);
		if (!file_exists($upload_dir['path'].'/slider')) {
			die('Failed to create directory');
		}
	}
	
	file_put_contents($upload_dir['path'].'/logo.png', $logo);
	echo "Logo uploaded. <br>";
	file_put_contents($upload_dir['path'].'/favicon.ico', $favicon);
	echo "Favicon uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider1.jpg', $slider_1);
	echo "slider 1 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider2.jpg', $slider_2);
	echo "slider 2 uploaded.  <br>";
	file_put_contents($upload_dir['path'].'/slider/slider3.jpg', $slider_3);
	echo "slider 3 uploaded.  <br>";
	
	$image_count = sizeof($main_data['content']['homepage']['images']);
	
	for ($i = 0; $i < $image_count; $i++) {
	
		$image = base64_decode($main_data['content']['homepage']['images'][$i]);
		file_put_contents($upload_dir['path'].'/image' . ($i + 1) . '.png', $image);
		echo "image" . ($i+1) . ".png uploaded. <br>";
		
	}
	
	// WIDGETKIT CREATION
	$widgetkit_settings = array(
		'type' => 'gallery',
		'id' => 0,
		'name' => 'slider',
		'settings' => array(
			'style' => 'default',
			'width' => 'auto',
			'height' => 350,
			'autoplay' => 1,
			'order' => 'default',
			'interval' => 5000,
			'duration' => 500,
			'index' => 0,
			'navigation' => 1,
			'buttons' => 1,
			'slices' => 20,
			'animated' => 'fade',
			'caption_animation_duration' => 500,
			'lightbox' => 0,
		),
		'style' => 'default',
		'paths' => array(
			'\/slider',
		),
		'captions' => array(
			'\/slider\/slider1.jpg' => stripslashes($caption1),
			'\/slider\/slider2.jpg' => stripslashes($caption2),
			'\/slider\/slider3.jpg' => stripslashes($caption3),
		),
		'links' => array(
			'\/slider\/slider1.jpg' => '',
			'\/slider\/slider2.jpg' => '',
			'\/slider\/slider3.jpg' => '',
		),
	);
	
	$wk_content = json_encode($widgetkit_settings, JSON_UNESCAPED_UNICODE);
	
	$create_widgetkit = array(
	    'post_title'     => 'slider',
		'post_status'    => 'publish', 
		'post_content'   => ($wk_content), 		
	    'post_type'      => 'widgetkit',
		'post_excerpt'   => 'default',
		'post_mime_type' => 'gallery',
	    'comment_status' => 'closed' 
	); 

	$wk_id = wp_insert_post($create_widgetkit);
	$home_content = str_replace("ab_slider_id", $wk_id, $home_content);
	echo "Widgetkit created. <br>";
	
	$wp_insert = array(	
		'home_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($home_content),
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => 'page-full.php'
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($home_title),
				'post_name'   => stripslashes($home_title),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 1
			),
		),
		'about_page' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($about_title),
				'post_name'   => stripslashes($about_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($about_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($about_nav),
				'post_name'   => stripslashes($about_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 2
			),
		),
		'page1' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page1_title),
				'post_name'   => stripslashes($page1_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page1_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page1_nav),
				'post_name'   => stripslashes($page1_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 3
			),
		),
		'page2' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page2_title),
				'post_name'   => stripslashes($page2_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page2_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page2_nav),
				'post_name'   => stripslashes($page2_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 4
			),
		),
		'page3' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($page3_title),
				'post_name'   => stripslashes($page3_title),
				'post_status' => 'publish',
				'post_content' => stripslashes($page3_content),
				'post_author' => 1,
				'post_parent' => ''
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($page3_nav),
				'post_name'   => stripslashes($page3_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 5
			),
		),		
		'blog' => array(
			'page' => array(
				'post_type'   => 'page',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'post_parent' => '',
				'page_template' => stripslashes($blog_template)
			),
			'nav' => array(
				'post_type'   => 'nav_menu_item',
				'post_title'  => stripslashes($blog_nav),
				'post_name'   => stripslashes($blog_nav),
				'post_status' => 'publish',
				'post_author' => 1,
				'menu_order' => 6
			),
		),
	);
	
	// SET FAVICON
	$favicon_maker = array(

		'guid' => $upload_dir['url'].'/favicon.ico',
		'post_mime_type' => 'image/x-icon',
		'post_title' => 'favicon',
		'post_content' => '',
		'post_status' => 'inherit'
		
	);
	
	$filename = $upload_dir['path'].'/favicon.ico';
	wp_insert_attachment( $favicon_maker, $filename, '0' );
	echo "Favicon image set in settings. <br>";
	
	// INSERT PAGES
	$page_ids = array();
	foreach( $wp_insert as $page => $type ) {
		$page_ids[$page]['page'] = wp_insert_post($type['page']);
		$type['nav']['ID'] = $page_ids[$page]['page'] + 1;
		$page_ids[$page]['nav'] = wp_update_post($type['nav']);
		update_post_meta($page_ids[$page]['nav'], '_menu_item_object_id', $page_ids[$page]['page']);
		echo $type['page']['post_title'] . ' was created. <br>';
		echo $type['page']['nav'] . ' menu item updated. <br>';
	}

	// ADD PAGE LINKS TO SLIDER CALLS TO ACTION
	$wk_post_obj = get_post($wk_id);
	$wk_post_content = json_decode($wk_post_obj->post_content, TRUE);	// Get widgetkit post content and decode the json array
	// page objects array
	$page_array = array(
		'page1' => get_post($page_ids['page1']['page']),
		'page2' => get_post($page_ids['page2']['page']),
		'page3' => get_post($page_ids['page3']['page'])
	);	
	// Add <h2> and <a> tags to each caption
	$counter = 1;
	foreach( $wk_post_content['captions'] as $key => $val ) {
		$wk_post_content['captions'][$key] = '<h2><a href=\"' . home_url() . '\/' . $page_array['page'.$counter]->post_name . '\/\">' . stripslashes(${'caption'.$counter}) . '<\/a><\/h2>';
		$counter ++;
	}
	$wk_post_content = json_encode($wk_post_content, JSON_UNESCAPED_UNICODE);	// Re-encode to json array
	$update_array = array(
		'ID' => $wk_id,
		'post_content' => $wk_post_content
	);
	wp_update_post($update_array);	// update the widgetkit content
	
	// SET HOME PAGE
	update_option('page_on_front', $page_ids['home_page']['page']);
	update_option('show_on_front', 'page');
	echo "Home page set as default <br>";
	
	// META DESCRIPTION
	update_post_meta($page_ids['home_page']['page'], '_yoast_wpseo_metadesc', $meta_description);
	echo "Updated meta description. <br>";
	
	// SITE TITLE
	update_option("blogname", $title_tag);
	echo "Updated site title. <br>";
	
	echo "<div style='margin-top: 10px; margin-left: 0px; margin-bottom: 40px; color: green; font-size: 18px; font-weight: bold;'>Auto build completed!</div>";

	// CONTENT & PRIVACY PAGE

	$privacy_page = array(
        'post_type'   => 'page',
        'post_title'  => stripslashes($main_data['content']['privacy']['title']),
        'post_name'   => stripslashes($main_data['content']['privacy']['title']),
        'post_status' => 'publish',
        'post_content' => stripslashes($main_data['content']['privacy']['content']),
        'post_author' => 1,
        'post_parent' => ''
    );

	$privacy_id = wp_insert_post ($privacy_page);     // insert privacy page and assign its post id to a variable

    $privacy_nav_id = $privacy_id + 1;
    wp_delete_post( $privacy_nav_id );    // remove privacy page from navigation
    
    $privacy_obj = get_post($privacy_id);
    $privacy_url = site_url('/' . $privacy_obj->post_name . '/');
    update_option('privacy_url', $privacy_url);    // create url for privacy page

}
?>