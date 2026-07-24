<?php get_header(); ?>




<section class="sec-news content-top-pd content-bottom-pd content-pd">
	<div class="content-width">

    <h2><span class="txt-main-c">N</span>EWS<span class="txt-main-c">.</span></h2>


<?php
$query = new WP_Query(array(
    'post_type' => array('custom1', 'custom2'), // 表示したい投稿タイプを配列で指定
    'order' => 'DESC',
    'posts_per_page' => -1,
));

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
?>

<div class="content">

<div class="date"><?php echo get_the_date("Y.m.d"); ?></div>



<div class="cate">
    <?php 
    // 通常の投稿のカテゴリを表示
    $categories = get_the_category();
    if ($categories) {
        foreach ($categories as $category) {
            // カテゴリのアーカイブページへのリンクを取得
            $category_link = get_category_link($category->term_id);
            if ($category_link) {
                echo '<a href="' . esc_url($category_link) . '" title="' . esc_attr($category->name) . '">' . esc_html($category->name) . '</a> ';
            }
        }
    }

    // カスタム投稿タイプのカテゴリ（タクソノミー 'custom1-cate'）を表示
    $custom_categories = get_the_terms(get_the_ID(), 'custom1-cate'); // 'custom1-cate'はタクソノミー名
    if ($custom_categories) {
        foreach ($custom_categories as $custom_category) {
            // カテゴリのアーカイブページへのリンクを取得
            $category_link = get_term_link($custom_category);
            if (!is_wp_error($category_link)) {
                echo '<a href="' . esc_url($category_link) . '" title="' . esc_attr($custom_category->name) . '">' . esc_html($custom_category->name) . '</a> ';
            }
        }
    }

    // カスタム投稿タイプのカテゴリ（タクソノミー 'custom2-cate'）を表示
    $custom_categories = get_the_terms(get_the_ID(), 'custom2-cate'); // 'custom2-cate'はタクソノミー名
    if ($custom_categories) {
        foreach ($custom_categories as $custom_category) {
            // カテゴリのアーカイブページへのリンクを取得
            $category_link = get_term_link($custom_category);
            if (!is_wp_error($category_link)) {
                echo '<a href="' . esc_url($category_link) . '" title="' . esc_attr($custom_category->name) . '">' . esc_html($custom_category->name) . '</a> ';
            }
        }
    }
    ?>
</div>


	<a href="<?php echo get_the_permalink();?>">  <?php the_title(); // 記事タイトル表示 ?></a>
	
	<div class="c-btn-01 u-sp-none"><a href="<?php echo get_the_permalink();?>">  詳しく見る ></a></div>
	
</div>

<?php
    } // 記事の繰り返しの終了
} else {
    echo '随時更新中';
} // 記事の有無の分岐終了

wp_reset_postdata();
?>



<div class="c-btn-01 u-sp-none btn-home"><a href="<?php echo home_url( '/' ); ?>">  ホームへ ></a></div>
	

    </div>
</section>

<?php get_footer(); ?>