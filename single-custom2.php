<?php get_header(); ?>


<!------------ループ開始------------>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!------------ポストのクラスを追記------------>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	
<!------------ヘッド------------>



<!------------カテゴリを条件分岐------------>


	<div class="content-pd content-top-pd content-bottom-pd">
	<div class="content-width">

	
	<div class="date"><?php echo get_the_date("Y.m.d");?></div>
	<div class="cate-news">
	
	<?php 
	if (  is_singular('custom1')) : ?>
	
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
	elseif  (  is_singular('custom2')) : ?>
		<?php
// シングルページでタクソノミーを表示
$terms = wp_get_post_terms(get_the_ID(), 'custom2-cate');if (!empty($terms) && !is_wp_error($terms)) {

foreach ($terms as $term) {
echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
}

}
?>
	
<?php else : ?>
		
	<?php $categories = get_the_category();
	if($categories):
	?>
	<?php foreach ($categories as $category): ?>
	<a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
	<?php endforeach; ?>
	<?php endif; ?>
	
	
<?php endif; ?>
	</div>
	
	<div class="title title-border"><?php the_title(); ?></div>


	<div class="thumbneil-box-news"> <?php the_post_thumbnail(); ?> </div>


	<?php the_content();?>

	<div class="btn02-back u-m0auto"><a href="<?php echo home_url('/') ; ?>">HOME</a></div>



<!------------前後の記事ボタン------------>
	
	<div class="prev-next-wrp">	
		<?php
	$previous_post = get_previous_post();
	if ($previous_post):
		?>
	
	<div class="prev">
		
		
			<div class="l-cont">			
				<a href="<?php the_permalink($previous_post); ?>"> <?php echo get_the_post_thumbnail($previous_post->ID, 'thumbnail'); ?></a></div>	
			<div class="r-cont"><p><a href="<?php the_permalink($previous_post); ?>"><?php echo get_the_title($previous_post); ?></a></p></div>
	</div>
<?php endif; ?>	
	
	
<?php
	$next_post = get_next_post();
	if ($next_post):
		?>
		
	<div class="next">
		
		<div class="l-cont"><a href="<?php the_permalink($next_post); ?>"> <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?></a></div>
			<div class="r-cont"><p><a href="<?php the_permalink($next_post); ?>"><?php echo get_the_title($next_post); ?></a></p></div>
		</div>
<?php endif; ?>	

</div>

		
		
		</div>
</div>
	
</article>

<?php endwhile; endif; ?>

	
		
	
<?php get_footer(); ?>