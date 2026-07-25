<?php get_header(); ?>

	






<section class="sec-intro content-pd content-top-pd content-bottom-pd u-pos-relative">

<span class="txt-grad-c1">
    事業という旅を その先へ
</span>

</section>




<div class="sec-outline content-bottom-pd content-top-pd content-pd">

         <figure>
                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/img-back-outline.webp" />
            </figure>
    <div class="wrp">
        <div class="l-cont">
            <h2 class=""><span class="head">Concept</span>Webを売らないWeb制作者です。<span class="cap">事業という旅を進めるために、一緒に育てていく。</span></h2>
            <p>
            Web制作会社なのに、どういうこと？と思われるかもしれません。</p>
<p>
もちろん、作るのはホームページです。</br>
ですが本当に価値を置いているのは、ホームページそのものではなく、ホームページを通じて、事業を前に進めることです。

</p>
<p>
「会社やサービスの魅力を伝える」
「信頼を積み重ねる」
「問い合わせや採用につなげる」
</p>

<p>
ホームページは、公開して終わりではありません。
事業という旅を進めるための道具として、活用し続けることで価値を発揮します。
</p><p>
だからこそ大切にしているのは、作ることではなく、育て続けること。<br>
制作から保守運用、改善相談まで。
中小企業のWeb担当として、事業の旅に寄り添いながらサポートしています。</p>
        </div>

        <div class="r-cont">

        </div>
    </div>
</div>




<div class="sec-value content-bottom-pd content-top-pd content-pd">
    <div class="content-width">

      <h2 class="h2-center"><span class="head">Value</span>選ばれる理由<span class="cap">作る、守る、育てる。</span></h2>


    </div>
</div>



<section class="content-top-pd content-bottom-pd content-pd bg-lightgray-c">
	<div class="content-width">
	
	<h2>H2 TITLE</h2>
	<h3>H3 TITLE</h3>

	<div class="u-max960 u-m0auto">
	<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキテキストテキストテキストテキスト</p>
</div>
<img src="<?php echo wp_upload_dir()['baseurl']; ?>/profpic.jpg" />


</div>
</section>





<section id="web" class="sec-works-web sec-back-lightgray content-pd content-top-pd content-bottom-pd u-pos-relative fadein">
    <div class="content-width">

    <h2 id="work-web"><span class="txt-main-c">W</span>EB<span class="txt-main-c">.</span></h2>
      
          <span class="h2sub-txt">制作実績 - ウェブデザイン</span>
        <!--<h3>制作全般を経験し、<span class="txt-main-c">幅広い視点</span>からデザイン制作を行います</h3>

	<div class="u-max960 u-m0auto">
	<p>WEBデザインを軸に、グラフィック、DTP、プロダクトデザイン、コーディング、運用、ディレクション、ブログ運営など、幅広く業務を経験し、多角的な視点からWEB制作を行うことが可能です。</p>
</div>-->

    </div>

    <div class="wrp">


        <?php
        $query = new WP_Query(array(
            'post_type' => "custom1",
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'posts_per_page' => -1
        ));
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
        ?>


                <div class="content">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <img src="<?php the_field('comp'); ?>">
                        <!--<?php the_post_thumbnail(); ?>-->
                    </a>
                    <div class="info">
                        <p class="junle"><?php the_field('industry'); ?></p>
                        
                    </div>

                </div>



        <?php
            } //記事の繰り返しの終了
        } else {
            echo '随時更新中';
        } //記事の有無の分岐終了
        wp_reset_postdata();
        ?>



    </div>

</section>





<section id="graphics" class="sec-works-graphics sec-back-gray content-pd content-top-pd content-bottom-pd  u-pos-relative fadein">
    <div class="content-width">

        <h2 id="work-gra"><span class="txt-main-c">G</span>RAPHICS<span class="txt-main-c">.</span></h2>
         <span class="h2sub-txt">制作実績 - グラフィック</span>
        <!--	<h3>制作全般を経験し、<span class="txt-main-c">幅広い視点</span>からデザイン制作を行います</h3>

	<div class="u-max960 u-m0auto">
	<p>WEBデザインを軸に、グラフィック、DTP、プロダクトデザイン、コーディング、運用、ディレクション、ブログ運営など、幅広く業務を経験し、多角的な視点からWEB制作を行うことが可能です。</p>
</div>-->

    </div>

    
    <ul><li class="li_75"><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/tei.webp" /></li>
        <li class="li_75"><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/ws3.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b001.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b002.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b003.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b004.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b005.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b006.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b007.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b008.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b009.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b010.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b011.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b012.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b013.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b014.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b015.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b016.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b017.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b018.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b019.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b020.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b021.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b022.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b023.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b024.webp" /></li>
        <li><img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/b025.webp" /></li>
    </ul>
</section>




<section id="illust" class="sec-works-illust content-pd content-top-pd content-bottom-pd u-pos-relative fadein sec-back-dark">
    <div class="">

        <h2 id="work-ill"><span class="txt-main-c">I</span>LLUST<span class="txt-main-c">.</span></h2>
          <span class="h2sub-txt">制作実績 - イラストレーション</span>
        <!--<h3>制作全般を経験し、<span class="txt-main-c">幅広い視点</span>からデザイン制作を行います</h3>

	<div class="u-max960 u-m0auto">
	<p>WEBデザインを軸に、グラフィック、DTP、プロダクトデザイン、コーディング、運用、ディレクション、ブログ運営など、幅広く業務を経験し、多角的な視点からWEB制作を行うことが可能です。</p>
</div>-->


        <div class="c-gallary01">
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i001.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i002.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i003.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i004.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i005.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i006.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i007.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i008.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i009.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i010.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i011.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i012.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i013.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i014.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i016.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i017.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i019.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i020.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i021.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i023.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i024.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i026.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i027.webp" />
            <img class="item" src="<?php echo wp_upload_dir()['baseurl']; ?>/i028.webp" />


        </div>
    </div>
</section>


        <section class="sec-sc">
        <div class="u-pd-section-top c-fullwidth-wrp cp-loop-yoko1 fadein">
        <div class="cp-scroll-yoko1">
               <ul class="cont list">
                   <li><p class="font"><span>NATURALLY MAKE SMILE.</span></p></li>
                </ul>
                <ul class="cont list">
                   <li><p class="font"><span>NATURALLY MAKE SMILE.</span></p></li>
                </ul>
           </div>
        </div>

        </section>











<section id="price" class="sec-price content-pd content-top-pd content-bottom-pd">
    <div class="content-width">

        <div class="c-2c07">
           <h2><span class="txt-main-c">P</span>RICE<span class="txt-main-c">.</span></h2>
     <span class="h2sub-txt">料金例</span>


            <div class="graph">
                <div class="row-wrp1">
                    <div class="head">
                        <div class="l-cont">
                            <h3 class="u-wid-fit bg-main-c txt-white-c">例1.スタンダードプラン</h3>
                        </div>
                        <div class="r-cont">
                            <p class="bg-lightgray-c u-wid-fit">納期3か月</p>
                        </div>
                    </div>

                    <div>
                        <h4>オリジナルデザイン<br>運用も見据えて制作します</h4>
                    </div>
                    <div>
                        <p class="price">¥440,000~</p>
                    </div>
                    <div>
                        <p>5ページ：サイトデザイン + 実装 + WordPress構築</p>
                        <p>：オリジナルデザインで制作します</p>
                        <p>機能：お問い合わせ、ブログ、スライダーなど</p>
                         <span class="caption">※サーバー、独自ドメイン、文章、画像、ロゴ等、お客様支給</span>
                    </div>
                </div>

                <div class="row-wrp2">
                    <div class="head">
                        <div class="l-cont">
                            <h3 class="u-wid-fit bg-main-c txt-white-c">例2.テンプレートプラン</h3>
                        </div>
                        <div class="r-cont">
                            <p class="bg-lightgray-c u-wid-fit">納期2か月</p>
                        </div>
                    </div>

                    <div>
                        <h4>予算を抑えて作りたい<br>セミテンプレートプラン</h4>
                    </div>
                    <div>
                        <p class="price">¥280,000~</p>
                    </div>
                    <div>
                        <p>3ページ：サイトデザイン + 実装 + WordPress構築</p>
                        <p>弊社独自のテンプレートを用いて作成します</p>
                        <p>機能：お問い合わせ、ブログ、など</p>
                        <span class="caption">※サーバー、独自ドメイン、文章、画像、ロゴ等、お客様支給</span>
                    </div>
                </div>
            </div>


<div class="wrap_soudan">
        <div class="l-cont">
    <p class="u-pcbr">ご予算に合わせて柔軟なご提案をいたします。<br>
        まずはお気軽にお尋ねください！</p>
        </div>
    <div class="r-cont"><a href="<?php echo home_url( '/' )."contact/"; ?>">ご相談はこちら</a></div>
    </div>
</div>





        </div>
</section>>











<section class="sec-flow scroll-list content-bottom-pd js-horizontal2">


        <div class="horiz-wrapper">

    <div class="content-pd">
 <div class="content-width">
         <h2><span class="txt-main-c">F</span>LOW<span class="txt-main-c">.</span></h2>
     <span class="h2sub-txt">制作の流れ</span>
    </div></div>


        <div class="horiz-flow"> 
            
        <div class="card-flow">
            <p class="num">01</p>
            <div class="cont">
            <p class="ttl">ヒアリング</p>
            <p class="text">お問い合わせ後、まずはお客様のサービス・会社やWebサイトについて、一通りヒアリングをさせて頂きます。</p>
        </div></div>

                <div class="card-flow">
            <p class="num">02</p>
            <div class="cont">
            <p class="ttl">提案依頼書の作成</p>
            <p class="text">ヒアリングを元にお客様の業種や競合、可能であればアクセス解析等を活用し分析・リサーチします。 その結果を元に、提案依頼書(RFP)、サイトマップ、御見積書をご提案させていただきます。</p>
        </div></div>

                <div class="card-flow">
            <p class="num">03</p>
            <div class="cont">
            <p class="ttl">キックオフ</p>
            <p class="text">ご提案内容に概ね合意頂けましたら、キックオフミーティングをさせていただき仕様の詳細を詰めていきます。</p>
        </div></div>

                <div class="card-flow">
            <p class="num">04</p>
            <div class="cont">
            <p class="ttl">情報設計</p>
            <p class="text">作成した仕様書を元に、各ページの画面構造を作成します。エンドユーザーにとってどのような画面構造が最適かを考えなら作っています。案件に場合によってはペーパープロトタイプを作成することもあります。</p>
        </div></div>

                <div class="card-flow">
            <p class="num">05</p>
            <div class="cont">
            <p class="ttl">ビジュアルデザイン</p>
            <p class="text">作成した設計図を元に、各ページをデザインします。競合他社と比較したときに、エンドユーザーの印象に一番残るデザインを目指します。</p>
        </div></div>

                <div class="card-flow">
            <p class="num">06</p>
            <div class="cont">
            <p class="ttl">コーディング・開発</p>
            <p class="text">作成したデザインをコーディングします。ページスピードやSEOを考慮しながら、最高のパフォーマンスが出るよう開発を行います。またJavascriptアニメーションやCMSの組み込み等もこの工程で行います。</p>
        </div></div>

                <div class="card-flow">
            <p class="num">07</p>
            <div class="cont">
            <p class="ttl">最終確認・公開</p>
            <p class="text">実装されたものをテストサイトでご確認いただき、サイトをリリースします。(それぞれの工程で、チェック及び修正は別途行います)</p>
        </div></div>


                <div class="card-flow">
            <p class="num">08</p>
            <div class="cont">
            <p class="ttl">フォローアップ</p>
            <p class="text">公開から3ヵ月目に、リリース後の反響、アクセス解析やSEOの状況、CMSの利用状況等を確認し、さらに良いサイトにするための改善案ご提案させて頂きます。</p>
        </div></div>
    

  
  

        </div>
	</div>
</section>




<section id="profile" class="content-pd u-mb40">
    <div class="content-width">
          <h2><span class="txt-main-c">P</span>LOFILE<span class="txt-main-c">.</span></h2>
     <span class="h2sub-txt">制作者について</span>

        <div class="c-1c03 u-mb80">
            <div class="wrp">
                <div class="l-cont">
                    <img src="<?php echo wp_upload_dir()['baseurl']; ?>/pro.webp" />
                </div>

                <div class="r-cont">
                    <p class="job"><span>Web Designer</span></p>
                    <p class="name">SOKO</p>
                    <div class="u-border-bk100per"></div>
                    <p>日本デザイナー学院卒業<br>
                    業界大手の紙製品メーカーの企画部グラフィックデザイナーとしてキャリアをスタート。その後、Tシャツデザイン、腕時計デザイナーを経て2012年よりWEBに転向。数社でWEBデザイナー、大手電機メーカーのディレクターを経て、現在は報道局勤務とフリーランスで活動中。新人の教育も行っています。趣味は音楽漁りとフットサル</p>
                </div>
            </div>
        </div>

    </div>
</section>>


<section class="sec-favorite content-bottom-pd">

    <div class="slider03 u-img-w100">

        <div class="u-pos-relative mbsp24 u-centre ">
            <figure class="wp-block-image size-full"> <img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/hobby04_2.webp" /></figure>
            <p class="cp-bdg-square02 bg-black">アルゼンチンファンです</p>
            <!--p class="cp-bdg-comment01">aaa</p>-->
        </div>


        <div class="u-pos-relative mbsp24 u-centre ">
     <figure class="wp-block-image size-full"> <img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/hobby1.webp" /></figure>           
      <p class="cp-bdg-square02 bg-black">ロック好きです</p>
            <!--p class="cp-bdg-comment01">aaa</p>-->
        </div>



        <div class="u-pos-relative mbsp24 u-centre ">
       <figure class="wp-block-image size-full"> <img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/hobby03_2.webp" /></figure>          <p class="cp-bdg-square02 bg-black">マザーシリーズは不滅の名作</p>
            <!--p class="cp-bdg-comment01">aaa</p>-->
        </div>

        <div class="u-pos-relative mbsp24 u-centre ">
       <figure class="wp-block-image size-full"> <img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/hobby02-2.webp" /></figure>          <p class="cp-bdg-square02 bg-black">カクテル作ります</p>
            <!--p class="cp-bdg-comment01">aaa</p>-->
        </div>

        <div class="u-pos-relative mbsp24 u-centre ">
        <figure class="wp-block-image size-full"> <img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/hobby05-2.webp" /></figure>         <p class="cp-bdg-square02 bg-black">フットサル17年目突入！</p>
            <!--p class="cp-bdg-comment01">aaa</p>-->
        </div>



        <div class="u-pos-relative mbsp24 u-centre ">
        <figure class="wp-block-image size-full"> <img class="" src="<?php echo wp_upload_dir()['baseurl']; ?>/hobby06.webp" /></figure>         <p class="cp-bdg-square02 bg-black">月間100km走ってます</p>
            <!--p class="cp-bdg-comment01">aaa</p>-->
        </div>


    </div>

</section>







  <section class="sec-contact">
    
  <div class="wrp">

    <a class="bg-main-c" href="<?php echo home_url( '/' )."contact/"; ?>">
 
    <div class="content-pd">
    <div class="content-width">
        <div class="l-cont">
        <h2>CONTACT.</h2>
     <span class="h2sub-txt">お問い合わせ</span>
                
                        <p>小さな事でもお気軽にお尋ねください！</p>
                    
                </div>
                <div class="arrow">
                    <p>連絡する</p>
                    <span>▶︎</span>
                </div>
    </div>
  </div>
    </a> 
  </div>

			
 
    </section>












    








<!--



<section class="sec-news content-top-pd content-bottom-pd content-pd fadein-y">
    <div class="content-width">



        <?php
        $query = new WP_Query(array(
            'post_type' => array('custom1', 'custom2'), // 表示したい投稿タイプを配列で指定
            'order' => 'DESC',
            'posts_per_page' => 3,
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


                    <a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); // 記事タイトル表示 
                                                                    ?></a>

                    <div class="c-btn-01 u-sp-none"><a href="<?php echo get_the_permalink(); ?>"> 詳しく見る ></a></div>

                </div>

        <?php
            } // 記事の繰り返しの終了
        } else {
            echo '随時更新中';
        } // 記事の有無の分岐終了

        wp_reset_postdata();
        ?>

        <div class="c-btn-02 u-m0auto"><a href="<?php echo home_url('/') . "news_list/"; ?>">ニュース一覧を見る ></a></div>

    </div>
</section>




    -->















<?php get_footer(); ?>