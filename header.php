<!DOCTYPE html><!--htmlで書かれていることを宣言-->

<html lang="ja"><!--日本語のサイトであることを指定-->

<head>
	
<meta charset="utf-8"><!--エンコードがUTF-8であることを指定-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--viewportの設定-->

<!--CSS/JS-->

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/total.css">



<!--font-awesome-->
	<link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/mnx3dyc.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Old+Mincho&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@4.1.1/dist/css/yakuhanjp.css">
<!--jクエリ-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!--slick-->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/js/slick.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/js/slick-theme.css">	

<!--ディスクリプション取得-->
	<meta name="description" content="<?php my_meta_description_set(); ?>">

<!--OGPをページごとに取得--> 
<?php if ( is_single() && has_post_thumbnail() ) : ?>

<!-- 記事に設定されているアイキャッチ画像のOGP -->
	<meta property="og:image" content="<?php echo home_url() . delete_domain_from_url(wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbneil' )[0]); ?>">

<?php else : ?>
	
<!-- デフォルトOGP -->
	<meta property="og:image" content="<?php echo wp_upload_dir()['baseurl']; ?>/og_2026.webp" />
<?php endif; ?>
	

<!--font -->	
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>	
	


<!--慣性
<script src="https://unpkg.com/lenis@1.2.3/dist/lenis.min.js"></script> 

<link rel="stylesheet" href="https://unpkg.com/lenis@1.3.3/dist/lenis.css">
-->







<!-- gsap -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

	
	
<meta property="og:description" content="<?php my_meta_description_set(); ?>" />

<?php wp_head(); ?><!--システム・プラグイン用-->
</head>


<body <?php body_class(); ?>>


<header>
<div class="content-pd nav-wrp">
	
<h1><a href="<?php echo home_url( '/' ); ?>"><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/logomark2026.png" /></a></h1>


	
<nav class="aco-menu-pc u-sp-none <?php if ( is_home() ){
        echo 'top-list-color';
    } ?>">


<ul class="menu-wrp">
         <li><a href="<?php echo home_url( '/' ); ?>">TOP</a></li>
		<li><a href="<?php echo home_url( '/' )."#feat"; ?>">SKILL</a></li>	
		<li><a href="<?php echo home_url( '/' )."#service"; ?>">SERVICE</a></li>	
		<li><span class="menu-item">WORKS</span>
	<ul class="sub-menu">
		<li><a href="<?php echo home_url( '/' )."#web"; ?>">WEB</a></li>
		<li><a href="<?php echo home_url( '/' )."#graphics"; ?>">GRAPHIC</a></li>
		<li><a href="<?php echo home_url( '/' )."#illust"; ?>">ILLUST</a></li>
			</ul>
	</li>
	<li><a href="<?php echo home_url( '/' )."#price"; ?>">PRICE</a></li>	
	<li><a href="<?php echo home_url( '/' )."#profile"; ?>">PROFILE</a></li>	
	<li><a href="<?php echo home_url( '/' )."contact/"; ?>">CONTACT</a></li>	
		
    </ul>
	
<!--
<ul class="menu-wrp">
        <li><a href="<?php echo home_url( '/' ); ?>">TOP</a></li>		
		<li><span class="menu-item">KOTEI</span>
	<ul class="sub-menu">
		<li><a href="<?php echo home_url( '/' )."kotei01/"; ?>">KOTEI</a></li>
		<li><a href="<?php echo home_url( '/' )."kotei_temp01/"; ?>">kotei_temp01</a></li>
		<li><a href="<?php echo home_url( '/' )."tab_news/"; ?>">tab_news</a></li>
			</ul>
	</li>
	<li><span class="menu-item">POSTS</span>
	<ul class="sub-menu">
		<li><a href="<?php echo home_url( '/' )."posts/"; ?>">POSTS</a></li>
	<li><a href="<?php echo home_url( '/' )."custom1/"; ?>">CUSTOM1</a></li>
	    <li><a href="<?php echo home_url( '/' )."custom2/"; ?>">CUSTOM2</a></li>
			</ul>
	</li>
	<li><span class="menu-item">CUSTOMFIELD</span>
		<ul class="sub-menu">
	    <li><a href="<?php echo home_url( '/' )."customfield/"; ?>">CUSTOMFIELD</a></li>
	    <li><a href="<?php echo home_url( '/' )."privacypolicy/"; ?>">PRIVACYPOLICY</a></li>
		<li><a href="<?php echo home_url( '/' )."biography/"; ?>">BIOGRAPHY</a></li>
		</ul>
	</li>
		
        <li><a href="<?php echo home_url( '/' )."contact/"; ?>">CONTACT</a></li>
    </ul>
-->
</nav>


	</div>
</header>


<?php if ( is_front_page() || is_home() ) : ?>
<div id="loader" class="u-pc-none">
	<img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/loadlogo.png" />
</div>
<?php endif; ?>



	
  
	
<?php if ( is_home() ) : ?>
	<div class="mv-wrp u-img-w100">
	
<?php
        $query = new WP_Query(array(
          'post_type' => "kv",
          'order' => 'asc',
			'posts_per_page' => -1,
        ));
        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
        ?>


		<div class="u-pos-relative mbsp24">


<div class="mv-over-back"></div>
			

<div class="mv-box subcopy">
	<p class="main_mv_2 a-mv-fade4">クリエイティブ＋コミュニケーションで、<br>WEBを通じてビジョンを実現・課題を解決</p>
		<p class="main_mv_1 a-mv-fade3"><span class="txt-main-c">R</span>EALIZE &<br><span class="txt-main-c">S</span>OLVE<span class="txt-main-c">.</span></p>
</div>











	</div>












      <?php
            } //記事の繰り返しの終了
          }else{
            echo '随時更新中';
        } //記事の有無の分岐終了
        wp_reset_postdata();
?>

		
		
		
		<div class="scroll">
  <span>Scroll</span>
</div>

	

</div>





	<div class="mv-slide">

<div class="slider-11 sl-1 u-img-w100">

        <div class="u-pos-relative mbsp24 u-centre ">
            <figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/08-2.webp" /></figure> 
        </div>


        <div class="u-pos-relative mbsp24 u-centre ">
     		<figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/02.webp" /></figure>
        </div>


        <div class="u-pos-relative mbsp24 u-centre ">
            <figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/04-2.webp" /></figure>
        </div>

    </div>


	<div class="slider-11 sl-2 u-img-w100">

              <div class="u-pos-relative mbsp24 u-centre ">
            <figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/03.webp" /></figure> 
        </div>


        <div class="u-pos-relative mbsp24 u-centre ">
     		<figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/01.webp" /></figure>
        </div>


        <div class="u-pos-relative mbsp24 u-centre ">
            <figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/07.webp" /></figure>
        </div>

    </div>



	<div class="slider-11 sl-3 u-img-w100">

                <div class="u-pos-relative mbsp24 u-centre ">
            <figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/05.webp" /></figure> 
        </div>


        <div class="u-pos-relative mbsp24 u-centre ">
     		<figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/06.webp" /></figure>
        </div>


        <div class="u-pos-relative mbsp24 u-centre ">
            <figure><img src="<?php echo wp_upload_dir()['baseurl']; ?>/09.webp" /></figure>
        </div>

	</div>
</div>

		
		
		
		

<?php endif; ?>
	


