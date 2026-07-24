<?php get_header(); ?>


<div class="page-archive content-pd content-top-pd content-bottom-pd">
<div class="content-width">



<div class="cate"><h2>
        <?php 
        // 通常の投稿のカテゴリを表示
        $categories = get_the_category();
        if ($categories) {
            foreach ($categories as $category) {
                echo esc_html($category->name) . ' ';
            }
        }

        // カスタム投稿タイプのカテゴリ（タクソノミー）を表示
        $custom_categories = get_the_terms(get_the_ID(), 'custom1-cate'); // 'custom_category'をカスタムタクソノミー名に変更
        if ($custom_categories) {
            foreach ($custom_categories as $custom_category) {
                echo esc_html($custom_category->name) . ' ';
            }
        }

		     // カスタム投稿タイプのカテゴリ（タクソノミー）を表示
			 $custom_categories = get_the_terms(get_the_ID(), 'custom2-cate'); // 'custom_category'をカスタムタクソノミー名に変更
			 if ($custom_categories) {
				 foreach ($custom_categories as $custom_category) {
					 echo esc_html($custom_category->name) . ' ';
				 }
			 }
        ?>
        </h2>
    </div>





<?php if ( have_posts() ) : ?>
			
	<ul>	
		
<?php while ( have_posts() ) : the_post(); ?>
 
		<li> 
      <div class="date">  <?php echo get_the_date("Y.m.d"); ?></div>
 <a href="<?php echo get_the_permalink();?>">
<?php the_title();?>
</a>
	 </li>
		
<?php endwhile; ?>
		
	</ul> 		
<?php endif; ?>


<?php
$args = array(
    'mid_size' => 1,
    'prev_text' => '&lt;&lt;前へ',
    'next_text' => '次へ&gt;&gt;',
    'screen_reader_text' => ' ',
);
the_posts_pagination($args);
?>

<div class="c-btn-01 btn-home"><a href="<?php echo home_url( '/' ); ?>">  ホームへ ></a></div>
	


</div>
</div>


<?php get_footer(); ?>