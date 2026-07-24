<?php get_header(); ?>

		<div class="content-pd">
<div class="content-width">
<p>テンプレートページのサンプルです</p>

<div class="post">

<?php
        $query = new WP_Query(array(
          'post_type' => "post",
          'order' => 'DESC',
			'posts_per_page' => -1,
		//	'category_name'  => 'notice'
        ));
        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
        ?>
        <h1><?php the_title(); //記事タイトル表示 ?></h1>
        <p><?php the_content(); //記事内容表示 ?></p>   


	<?php $categories = get_the_category();
	if($categories):
	?>
	<?php foreach ($categories as $category): ?>
	<a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
	<?php endforeach; ?>
	<?php endif; ?>

<?php the_post_thumbnail(); ?> 

      <?php
            } //記事の繰り返しの終了
          }else{
            echo '随時更新中';
        } //記事の有無の分岐終了
        wp_reset_postdata();
?>

	
	</div>
			</div>
	</div>
	
	

        
<?php
        $query = new WP_Query(array(
          'post_type' => "custom1",
          'order' => 'DESC',
			'posts_per_page' => -1,
        ));
        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
        ?>

	

        <h1><?php the_title(); //記事タイトル表示 ?></h1>
        <p><?php the_content(); //記事内容表示 ?></p>   

	<?php
// シングルページでタクソノミーを表示
$terms = wp_get_post_terms(get_the_ID(), 'custom1-cate');if (!empty($terms) && !is_wp_error($terms)) {
echo '<ul>';
foreach ($terms as $term) {
echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
}
echo '</ul>';
}
?>
	



      <?php
            } //記事の繰り返しの終了
          }else{
            echo '随時更新中';
        } //記事の有無の分岐終了
        wp_reset_postdata();
?>




<?php
        $query = new WP_Query(array(
          'post_type' => "custom2",
          'order' => 'DESC',
			'posts_per_page' => -1,
        ));
        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();
        ?>
        <h1><?php the_title(); //記事タイトル表示 ?></h1>
        <p><?php the_content(); //記事内容表示 ?></p>   

	<?php
// シングルページでタクソノミーを表示
$terms = wp_get_post_terms(get_the_ID(), 'custom2-cate');if (!empty($terms) && !is_wp_error($terms)) {
echo '<ul>';
foreach ($terms as $term) {
echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
}
echo '</ul>';
}
?>

      <?php
            } //記事の繰り返しの終了
          }else{
            echo '随時更新中';
        } //記事の有無の分岐終了
        wp_reset_postdata();
?>









<div class="cate">
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
    </div>





	
<?php get_footer(); ?>