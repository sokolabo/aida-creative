<?php get_header(); ?>

<article class="page-tab-news">
	
<div class="content-pd">
<div class="content-width">
	
	
	
<section class="menu">
<div class="content-width u-pdtpc80 u-pdbpc80 u-gap0">
<div class="tab-wrp">
	
<div class="tab32box txtcenter active">
<p>ALL</p>
</div>

<div class="tab2box txtcenter">
<p>NEWS</p>
</div>

</div></div>
</section>
	
	
	</div>
	</div>	
	
	

	
	
	
<div class="tabarea">	
<section class="show">
	
	
<div class="content-pd">
<div class="content-width">
	
	
	
<p>TAB_NOTICE</p>

<div class="accordion_box cg-notice">
<ul class="accordion">
	
		
	
<?php
        $query = new WP_Query(array(
          'post_type' => "post",
          'order' => 'DESC',
			'posts_per_page' => -1,
			'category_name'  => 'notice'
        ));
        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
        ?>
     <li>     <h1><?php the_title(); //記事タイトル表示 ?></h1>
      


	<?php $categories = get_the_category();
	if($categories):
	?>
	<?php foreach ($categories as $category): ?>
	<a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
	<?php endforeach; ?>
	<?php endif; ?>
	</li>
      <?php
            } //記事の繰り返しの終了
          }else{
            echo '随時更新中';
        } //記事の有無の分岐終了
        wp_reset_postdata();
?>
	</ul>
	
</div>	
	
	<p class="js-btn-notice btn-page-news" style="display: block;">もっとみる</p>
	</div>
	</div>
	</section>

	
	
	
<section class="">

<div class="content-pd">
<div class="content-width">
<p>TAB_OTHER</p>


<div class="accordion_box cg-other">
	<ul class="accordion">
		
<?php
        $query = new WP_Query(array(
          'post_type' => "post",
          'order' => 'DESC',
			'posts_per_page' => -1,
			'category_name'  => 'other'
        ));
        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
        ?>
       <li> <h1><?php the_title(); //記事タイトル表示 ?></h1>


	<?php $categories = get_the_category();
	if($categories):
	?>
	<?php foreach ($categories as $category): ?>
	<a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
	<?php endforeach; ?>
	<?php endif; ?>
		   
		   </li>

      <?php
            } //記事の繰り返しの終了
          }else{
            echo '随時更新中';
        } //記事の有無の分岐終了
        wp_reset_postdata();
?>

	</ul>
	</div>
	
	<p class="js-btn-other btn-page-news" style="display: block;">もっとみる</p>
	
	</div>
			</div>
	</section>
	
	
	
	
	</div>
		

</article>
<?php get_footer(); ?>