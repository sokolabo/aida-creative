<?php

/**
 * WP-SCSS：ページをロードするたびにscssファイルを強制的にコンパイル.
 */
define( 'WP_SCSS_ALWAYS_RECOMPILE', true );
/* ================================================================================ */

//----------------JSを読み込む----------------
function my_theme_enqueue_scripts() {
    wp_enqueue_script('my-custom-js', get_stylesheet_directory_uri() . '/js/jsstyle.js', array(), null, false);
	wp_enqueue_script('my-custom-js2', get_stylesheet_directory_uri() . '/js/slick.min.js', array(), null, false);
  wp_enqueue_script('wave-module', get_stylesheet_directory_uri() . '/js/wave1.js', array(), null, false);
  wp_enqueue_script('my-custom-js4', get_stylesheet_directory_uri() . '/js/perlin.js', array(), null, false);
  
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');


function add_type_module_to_wave1( $tag, $handle, $src ) {
  if ( $handle === 'wave-module' ) {
    return '<script type="module" src="' . esc_url( $src ) . '"></script>';
  }
  return $tag;
}
add_filter( 'script_loader_tag', 'add_type_module_to_wave1', 10, 3 );



//---------//ブロックエディタ用スタイル読み込み機能をON--------
add_action( 'after_setup_theme', function(){
  //ブロックエディタ用スタイル読み込み機能をON
  add_theme_support( 'editor-styles' );

// ブロックエディタ用CSSの指定・読み込み
  add_editor_style('css/style-editor.css'); 


 });

   

//----------------ページごとにタイトルを表示させる----------------//
add_action('init', function() {
  add_theme_support('title-tag');
});

add_filter('document_title_parts', 'title_tagline');
function title_tagline($title) {
  if(is_home() || is_front_page()) {
    $title['tagline'] = '';
  }
  return $title;
}

add_filter('document_title_separator', 'title_separator');
function title_separator($separator) {
  $separator = '|';
  return $separator;
}





//----------------メタディスクリプション取得----------------//
/**
 * カスタムフィールド
*/
 
// カスタムフィールド追加
add_action('admin_menu', 'my_add_custom_fields');
add_action('save_post', 'my_save_custom_fields');
function my_add_custom_fields() {
  add_meta_box( 'my_f01', 'メタキーワード(検索キーワード)', 'my_keywords', 'post');
  add_meta_box( 'my_f01', 'メタキーワード(検索キーワード)', 'my_keywords', 'page');
  add_meta_box( 'my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'post');
  add_meta_box( 'my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'page');
}
 
// カスタムフィールドの入力欄表示
function my_keywords() {
  global $post;
  $f_data = get_post_meta($post->ID,'meta_keywords',true);
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'ul_nonce' );
  echo '<p>キーワードは半角カンマ「,」で区切ります。</p>';
  echo '<input style="width:100%" type="text" name="meta_keywords" value="'.htmlspecialchars($f_data).'" />';
}
function my_description() {
  global $post;
  $f_data = get_post_meta($post->ID,'meta_description',true);
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'ul_nonce' );
  echo '<p>全角120字以内が望ましいです。</p>';
  echo '<textarea style="width:100%" rows="4" type="text" name="meta_description">'.htmlspecialchars($f_data).'</textarea>';
}
 
// カスタムフィールドの値を保存
function my_save_custom_fields( $post_id ) {
 
  //nonceによるセキュリティ対策
  $ul_nonce = isset( $_POST['ul_nonce'] ) ? $_POST['ul_nonce'] : null;
  if ( !wp_verify_nonce( $ul_nonce, wp_create_nonce( __FILE__ ) ) ) {
      return $post_id;
  }
 
  //例外処理
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { 
    return $post_id;
  }
  if ( !current_user_can( 'edit_post', $post_id ) ) {
    return $post_id;
  }
 
  //カスタムフィールドのキー一覧
  $keys = array(
    'meta_keywords',
    'meta_description',
  );
  
  //カスタムフィールドの更新
  foreach( $keys as $key ){
    $data = $_POST[$key];
    if ( get_post_meta( $post_id, $key ) == "" ) {
        add_post_meta( $post_id, $key, $data, true );
    } elseif ( $data != get_post_meta( $post_id, $key, true ) ) {
        update_post_meta( $post_id, $key, $data );
    } elseif ( $data == "" ) {
        delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
    }
  }
}

function my_meta_description_set(){
    //記事ページ
    if( get_post_meta(get_the_ID(), 'meta_description', true) ){
        echo htmlspecialchars(get_post_meta(get_the_ID(), 'meta_description', true));
    //その他・共通
    }else{
        echo htmlspecialchars('2026年のポートフォリオです');
    }
}



//----------------URLからドメイン部分を削除したURLを返す OGPをページごとに表示----------------//
function delete_domain_from_url( $url ) {
    if ( preg_match( '/^http(s)?:\/\/[^\/\s]+(.*)$/', $url, $match ) ) {
        $url = $match[2];
    }
    return $url;
}
								


//----------------php wp_body_open();の直度にソースコードを記述する----------------
/**
 * bodyタグ開始に挿入
 */

add_action( 'wp_body_open', function() {
	?>
	<!-- ここから挿入したいソースコードなどスタート -->
	・・・・・
	<!-- ここまで -->
	<?php
});





//----------------画像縮小防止----------------//
add_filter('big_image_size_threshold', '__return_false');





//----------------アーカイブページと投稿を統一する パーマリンクを更新する----------------//

add_filter('register_post_type_args', function($args, $post_type) {
    if ('post' == $post_type) {
        global $wp_rewrite;
        $archive_slug = 'posts'; //URLスラッグ
        $args['label'] = '投稿'; //管理画面左ナビに「投稿」の代わりに表示される
        $args['has_archive'] = $archive_slug;
        $archive_slug = $wp_rewrite->root.$archive_slug;
        $feeds = '(' . trim( implode('|', $wp_rewrite->feeds) ) . ')';
        add_rewrite_rule("{$archive_slug}/?$", "index.php?post_type={$post_type}", 'top');
        add_rewrite_rule("{$archive_slug}/feed/{$feeds}/?$", "index.php?post_type={$post_type}".'&feed=$matches[1]', 'top');
        add_rewrite_rule("{$archive_slug}/{$feeds}/?$", "index.php?post_type={$post_type}".'&feed=$matches[1]', 'top');
        add_rewrite_rule("{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type={$post_type}".'&paged=$matches[1]', 'top');
    }
    return $args;
}, 10, 2);



// ----------------投稿ページのパーマリンクをカスタマイズ----------------
function add_article_post_permalink( $permalink ) {
    $permalink = '/posts/detail' . $permalink;
    return $permalink;
}
add_filter( 'pre_post_link', 'add_article_post_permalink' );
 
function add_article_post_rewrite_rules( $post_rewrite ) {
    $return_rule = array();
    foreach ( $post_rewrite as $regex => $rewrite ) {
        $return_rule['posts/detail/' . $regex] = $rewrite;
    }
    return $return_rule;
}
add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );





//----------------リライトルールが作成された時に、数字4桁のURLが年のアーカイブページ扱いになることを無効化する（スラッシュ）----------------
function mycus_year_rewrite_rules_invalid($rules) {
  unset($rules['news/detail/([0-9]{4})/?$']); 
  return $rules;
}
add_filter('rewrite_rules_array','mycus_year_rewrite_rules_invalid');



/**
* ----------------スラッグの日本語を自動変換----------------
*/

function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    // URLスラッグに特定のパターンが含まれている場合
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        // 投稿のタイプ（post_type）をURIエンコードし、投稿IDをつなげて新しいスラッグに設定
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    // 新しいスラッグを返す
    return $slug;
}

// wp_unique_post_slugフィルターに自動生成関数を追加
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );



//----------------アイキャッチを使用可能にする----------------
add_theme_support('post-thumbnails');




//----------------カスタム投稿タイプを作る----------------
function add_custom_post() {
  register_post_type(// カスタム投稿タイプの追加関数
    'custom1',// カスタム投稿タイプ名
    array(
      'label' => '作品',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
		   'rewrite' => array(
        'with_front' => false,
			 'slug' => 'works', // カスタム投稿タイプのベーススラッグ
			   'hierarchical' => true
			 
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
        'excerpt',
        'custom-fields',
		'page-attributes',
      )
    )
  );	
	
	  register_post_type(// カスタム投稿タイプの追加関数
    'custom2',// カスタム投稿タイプ名
    array(
      'label' => 'お知らせ',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
		   'rewrite' => array(
        'with_front' => false,
			 'slug' => 'news', // カスタム投稿タイプのベーススラッグ
			   'hierarchical' => true
			 
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
        'excerpt',
        'custom-fields',
      )
    )
  );	
	
	
		  register_post_type(// カスタム投稿タイプの追加関数
    'pri',// カスタム投稿タイプ名
    array(
      'label' => 'プライバシーポリシー',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
		   'rewrite' => array(
        'with_front' => false,
			 'slug' => 'pri', // カスタム投稿タイプのベーススラッグ
			   'hierarchical' => true
			 
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
        'excerpt',
        'custom-fields',
      )
    )
  );	
	

	
		  register_post_type(// カスタム投稿タイプの追加関数
    'kv',// カスタム投稿タイプ名
    array(
      'label' => 'キービジュアル',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
		   'rewrite' => array(
        'with_front' => false,
			 'slug' => 'key_visal', // カスタム投稿タイプのベーススラッグ
			   'hierarchical' => true
			 
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
        'excerpt',
        'custom-fields',
      )
    )
  );		
	

	
		  register_post_type(// カスタム投稿タイプの追加関数
    'bio',// カスタム投稿タイプ名
    array(
      'label' => 'バイオグラフィ投稿',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
		   'rewrite' => array(
        'with_front' => false,
			 'slug' => 'bio', // カスタム投稿タイプのベーススラッグ
			   'hierarchical' => true
			 
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
        'excerpt',
        'custom-fields',
      )
    )
  );	
	
	
	
	
}
add_action('init', 'add_custom_post');


	
function add_taxonomy() {
  //お知らせカテゴリ
  register_taxonomy(
    'custom1-cate',
    'custom1',
    array(
      'label' => 'カスタムカテゴリ01',
		'rewrite' => array('slug' => 'custom1-cate'),
            'hierarchical' => true,
      'singular_label' => 'カスタムカテゴリ01',
      'labels' => array(
        'add_new_item' => 'カスタムカテゴリ01を追加'
      ),
      'public' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'show_in_rest' => true,
      'hierarchical' => true
    )
  );
	
	
  register_taxonomy(
    'custom2-cate',
    'custom2',
    array(
      'label' => 'カスタムカテゴリ02',
		'rewrite' => array('slug' => 'custom2-cate'),
            'hierarchical' => true,
      'singular_label' => 'カスタムカテゴリ02',
      'labels' => array(
        'add_new_item' => 'カスタムカテゴリ02を追加'
      ),
      'public' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'show_in_rest' => true,
      'hierarchical' => true
    )
  );
	

 
  //お知らせタグ
  register_taxonomy(
    'custom1-tag',
    'custom1',
    array(
      'label' => 'カスタムタグ01',
      'singular_label' => 'カスタムタグ01',
      'labels' => array(
        'add_new_item' => 'カスタムタグ01を追加'
      ),
      'public' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'show_in_rest' => true,
      'hierarchical' => false
    )
  );
	
	
  register_taxonomy(
    'custom2-tag',
    'custom2',
    array(
      'label' => 'カスタムタグ02',
      'singular_label' => 'カスタムタグ02',
      'labels' => array(
        'add_new_item' => 'カスタムタグ02を追加'
      ),
      'public' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'show_in_rest' => true,
      'hierarchical' => false
    )
  );
}
add_action('init', 'add_taxonomy');




//----------------アーカイブページの表示件数設定----------------
function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
 
    if ( $query->is_archive() ) { /* アーカイブページの時に表示件数を5件にセット */
        $query->set( 'posts_per_page', '5' );
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );



//----------------管理画面でメニューを作成----------------
//add_theme_support('menus');

//----------------404のタイトルを設定----------------
function my_function($title){
    if(is_404()){
		$title['title'] = '404 NOT FOUND';
    }
    return $title;
}
add_filter( 'document_title_parts', 'my_function');










/* 最新記事リスト */
function getNewItems($atts) {
    extract(shortcode_atts(array(
        "num" => '', //最新記事リストの取得数
        "cat" => '' //表示する記事のカテゴリー指定
    ), $atts));
    global $post;
    $oldpost = $post;
    $myposts = get_posts('numberposts='.$num.'&order=DESC&orderby=post_date&category='.$cat);
    $retHtml='<ul class="news_list">';
        foreach($myposts as $post) :
            $cat = get_the_category();
            $catname = $cat[0]->cat_name;
            $catslug = $cat[0]->slug;
            setup_postdata($post);
            $retHtml.='<li>';
	 $retHtml.='<span class="cat '.$catslug.'">'.$catname.'</span>';
            $retHtml.='<span class="news_date">'.get_post_time( get_option( 'date_format' )).'</span>';
            $retHtml.='<a href="'.get_permalink().'" class="news_title">'.the_title("","",false).'</a>';
            $retHtml.='</li>';
        endforeach;
    $retHtml.='</ul>';
    $post = $oldpost;
    wp_reset_postdata();
    return $retHtml;
}
add_shortcode("newslist", "getNewItems");






//メール確認用
function wpcf7_custom_email_validation_filter( $result, $tag ) {
  if ( 'your-email-confirm' == $tag->name ) {
    $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
    $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
    if ( $your_email != $your_email_confirm ) {
      $result->invalidate( $tag, "メールアドレスが一致しません" );
    }
  }
  return $result;
}
add_filter( 'wpcf7_validate_email', 'wpcf7_custom_email_validation_filter', 20, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_custom_email_validation_filter', 20, 2 );











