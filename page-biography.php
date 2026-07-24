<?php get_header(); ?>


<?php 

// カスタムポストの投稿を取得 
$args = array(
    'post_type'      => 'bio',   // Biographyのスラッグを指定
    'order'          => 'ASC',             // 表示順（DESCもしくはASC）
    'posts_per_page' => -1                  // 表示件数（-1で全ての記事を表示）
);
$the_query = get_posts( $args );
if ( $the_query ) :
?>




<?php
// 投稿を取得表示するループ
foreach ( $the_query as $post ) : setup_postdata( $post );
?>
<section class="content-panel<?php 
    if ( $post === reset( $the_query ) ) {
        echo ' is-active';
    }
?>" tabindex="0" role="button" aria-pressed="<?php
    if ( $post === reset( $the_query ) ) {
        echo 'true'; // ひとつめの投稿はtrue（開いている）
    } else {
        echo 'false'; // 以降はfalse（閉じている）
    }
?>">
    <h3 class="content-panel__head"><?php echo get_the_title(); ?></h3>
    <div class="content-panel__body"<?php 
    if ( $post !== reset( $the_query ) ) {
        echo ' style="display:none;"'; // 2つ目以降を非表示にする処理
    }
?>>
        <?php the_content(); ?>
    </div><!-- /.body -->
</section><!-- /.content-panel -->

<?php
endforeach;
// ここまで / 投稿を取得表示するループ

wp_reset_postdata(); // ここで取得した投稿データをリセットする


// 投稿が0件の場合の表示
else:
    echo 'ただいま準備中です。';
endif;

?>






<?php get_footer(); ?>