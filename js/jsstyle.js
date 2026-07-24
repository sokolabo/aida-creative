/*WORDPRESSテーマのデフォルト設定を解除*/
$('div').removeClass('is-layout-constrained');
$('div').removeClass('wp-block-latest-posts__featured-image');




//ページ外スムーズスクロール対応
window.addEventListener('load', () => {
  if (location.hash) {
    const target = document.querySelector(location.hash);
    if (!target) return;

    // ★ 少し遅らせる（GSAP初期化後）
    setTimeout(() => {
      const y = target.getBoundingClientRect().top + window.pageYOffset - 80;
      window.scrollTo({
        top: y,
        behavior: 'smooth'
      });
    }, 300);
  }
});














/*PCナビアコーディオン*/
$(function () {
$('.aco-menu-pc ul>li').find('ul').hide();

$('.aco-menu-pc ul>li').hover(function(){
  $(this).children('.sub-menu').stop().slideDown(300);
},function(){
  $(this).children('.sub-menu').stop().slideUp(150)
});
});






$(function(){

  $('.huwahuwa').on('click', function(e){
    e.stopPropagation();

    const $btn = $(this);
    const isOpen = $btn.hasClass('is-open');

    // 全部閉じる
    $('.huwahuwa').removeClass('is-open');
    $('.huwacover').removeClass('is-active');

    // 開く
    if(!isOpen){
      $btn.addClass('is-open');
      $('.huwacover').addClass('is-active');
    }
  });

  // 背景クリックで閉じる
  $('.huwacover').on('click', function(){
    $('.huwahuwa').removeClass('is-open');
    $(this).removeClass('is-active');
  });

});















//ヘッダースクロール
window.addEventListener('scroll', function() {
  const targets = document.querySelectorAll('.top_btn, .cta'); // header と .top_btn 両方
  targets.forEach(el => {
    if (window.scrollY > 550) {
      el.classList.add('scrolled');
    } else {
      el.classList.remove('scrolled');
    }
  });
});





const isInApp =
  /Line|Instagram|FBAN|FBAV|Twitter|with/i.test(navigator.userAgent);

if (isInApp) {
  document.documentElement.classList.add("is-inapp");
}


  

//spメニュー
$(function(){
 $('.sub-menu').hide();
 $('.menu-item').click(function(){
  $('ul.sub-menu').slideUp();
  $('.menu-item').removeClass('open');
  if($('+ul.sub-menu',this).css('display') == 'none'){
   $('+ul.sub-menu',this).slideDown();
   $(this).addClass('open');
  }
 });
});
    



//SPメニュー表示設定
$(function(){

//リンクを消す
	$('#sp__bg').hide();
	$('.sp-nav-hamburger').click(function(){

		//もし、ハンバーガーボタンに.activeクラスが付与されていた場合
		if($('.sp-nav-hamburger').hasClass('active')){
			$('#sp__bg').fadeOut(300);
			$(this).removeClass('active');
			$('nav').removeClass('open');
		}else{
			$('#sp__bg').fadeIn(300);
			$(this).addClass('active');
			$('nav').addClass('open');
		}

	});
	
	//リンクをクリックした際に表示が消えるようにする
	$('#sp__bg a').on('click', function(){
  $('#sp__bg').fadeOut(300);
  $('.sp-nav-hamburger').removeClass('active');
});

});





//慣性スクロール
/*
const lenis = new Lenis({
  duration: .1,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // イージング
  smooth: true,
  wheelMultiplier: .45
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

*/














//モーダル02
$(function(){
    var winScrollTop;

    // モーダルを開く
    $('.js-modal02-open').on('click', function(){
        // 現在のスクロール位置を保存
        winScrollTop = $(window).scrollTop();

        var target = $(this).data('target');
        var modal = document.getElementById(target);

        // モーダルを表示
        $(modal).fadeIn();

        // スクロールを無効化
        $("body").css({
            "position": "fixed",  // 背景を固定
            "top": -winScrollTop + "px",  // 現在のスクロール位置を反映
            "width": "100%"  // モバイルでのレイアウト崩れを防ぐ
        });

        // スクロール位置を保持
        $(window).scrollTop(winScrollTop);  // スクロール位置を元に戻す

        return false;
    });

    // モーダルを閉じる
    $('.js-modal02-close').on('click', function(){
        // モーダルを非表示
        $('.js-modal02').fadeOut();

        // 背景を元に戻す
        $("body").css({
            "position": "static",  // 背景の固定解除
            "top": 0,
            "overflow": "auto"  // スクロールを再度有効にする
        });

        // スクロール位置を復元
        window.scrollTo(0, winScrollTop);

        return false;
    });
});


















// gsap 横スクロール
window.addEventListener("load", () => {

  // ============================
  // ★ 初期状態を必ずリセット
  // ============================
  document.body.classList.remove("dark");

  gsap.registerPlugin(ScrollTrigger);

  const horiz = document.querySelector(".horiz");
  const cards = document.querySelectorAll(".card");
  const section = document.querySelector(".js-horizontal");

  // --- 最初のカードサイズ -------------------------
  const cardWidth = cards[0].offsetWidth;

  // =====================================================
  // ★ 1枚目を「画面の右端 + marginRight」に置く
  // =====================================================
const isSP = window.innerWidth < 769;

// PC / SP で開始オフセットを変える
const marginRight = isSP ? -100 : -300;
const startOffset = window.innerWidth - (-marginRight);



  // --- 最後のカードの中央揃え用 ------------------------
  const centerOffset = (window.innerWidth - cardWidth) / 2;

  // --- 横スクロール量 -------------------------------
  const totalWidth =
    horiz.scrollWidth - window.innerWidth + centerOffset * 2;

  // =====================================================
  // 横スクロール本体
  // =====================================================
  gsap.fromTo(
    horiz,
    { x: startOffset },
    {
      x: -(horiz.scrollWidth - cardWidth - centerOffset),
      ease: "none",
      scrollTrigger: {
        trigger: ".js-horizontal",
        pin: true,
        scrub: 1,
        start: "top top",
        end: "+=" + (totalWidth * 2)
      }
    }
  );

  // =====================================================
  // 背景切り替え
  // =====================================================
  ScrollTrigger.create({
    trigger: ".js-horizontal",
    start: "top-=500 top",
    end: "+=" + (totalWidth * 2 + 800),
	   anticipatePin: 3,   // ← 追加
    scrub: 1,

    /* onEnter: () => document.querySelector(".scroll-list").classList.add("dark"),
   onLeave: () => document.querySelector(".scroll-list").classList.remove("dark"),
    onEnterBack: () => document.querySelector(".scroll-list").classList.add("dark"),
    onLeaveBack: () => document.querySelector(".scroll-list").classList.remove("dark")*/

    onEnter: () => {
      document.body.classList.add("dark");
      section.classList.add("dark");
    },

    onLeave: () => {
      document.body.classList.remove("dark");
      section.classList.remove("dark");
    },

    onEnterBack: () => {
      document.body.classList.add("dark");
      section.classList.add("dark");
    },

    onLeaveBack: () => {
      document.body.classList.remove("dark");
      section.classList.remove("dark");
    }
  });

  

});














// gsap 横スクロール
window.addEventListener("load", () => {

  // ============================
  // ★ 初期状態を必ずリセット
  // ============================
  document.body.classList.remove("dark");

  gsap.registerPlugin(ScrollTrigger);

  const horiz = document.querySelector(".horiz-flow");
  const cards = document.querySelectorAll(".card-flow");
  const section = document.querySelector(".js-horizontal2");

  // --- 最初のカードサイズ -------------------------
  const cardWidth = cards[0].offsetWidth;

  // =====================================================
  // ★ 1枚目を「画面の右端 + marginRight」に置く
  // =====================================================
const isSP = window.innerWidth < 769;

// PC / SP で開始オフセットを変える
const marginRight = isSP ? -100 : -300;
const startOffset = window.innerWidth - (-marginRight);



  // --- 最後のカードの中央揃え用 ------------------------
  const centerOffset = (window.innerWidth - cardWidth) / 2;

  // --- 横スクロール量 -------------------------------
  const totalWidth =
    horiz.scrollWidth - window.innerWidth + centerOffset * 2;

  // =====================================================
  // 横スクロール本体
  // =====================================================
  gsap.fromTo(
    horiz,
    { x: startOffset },
    {
      x: -(horiz.scrollWidth - cardWidth - centerOffset),
      ease: "none",
      scrollTrigger: {
        trigger: ".js-horizontal2",
        pin: true,
        scrub: 1,
        start: "top top",
        end: "+=" + (totalWidth * 2)
      }
    }
  );



});














window.addEventListener("load", () => {
  const sections = document.querySelectorAll("[class*='sec-back-']");
  if (!sections.length) return;

  gsap.registerPlugin(ScrollTrigger);

  let activeCount = 0;
  let currentBodyClass = null;

  sections.forEach(section => {
    const bgClass = [...section.classList].find(cls =>
      cls.startsWith("sec-back-")
    );
    if (!bgClass) return;

    const bodyClass = bgClass.replace("sec-", "");

    ScrollTrigger.create({
      trigger: section,
      start: "top center",
      end: "bottom center",

      onEnter: () => {
        activeCount++;
        switchBodyClass(bodyClass);
      },

      onEnterBack: () => {
        activeCount++;
        switchBodyClass(bodyClass);
      },

      onLeave: () => {
        activeCount--;
        if (activeCount <= 0) clearBodyClass();
      },

      onLeaveBack: () => {
        activeCount--;
        if (activeCount <= 0) clearBodyClass();
      },
    });
  });

  function switchBodyClass(cls) {
    if (currentBodyClass === cls) return;
    removeBackClasses();
    document.body.classList.add(cls);
    currentBodyClass = cls;
  }

  function clearBodyClass() {
    removeBackClasses();
    currentBodyClass = null;
  }

  function removeBackClasses() {
    document.body.className =
      document.body.className.replace(/\bback-\w+\b/g, "").trim();
  }
});











//タブ
$(function() {
 
  // ①タブをクリックしたら発動
  $('.tab-wrp div').click(function() {
 
    // ②クリックされたタブの順番を変数に格納
    const navIdx = $('.tab-wrp div').index(this);

	  // 追記：追加classを作成。leftの値を切り替えるためのclassを生成
	  const leftValCls = (function(val) {
		  return `navIdx-${String(val)}`;
	  })(navIdx)

	  // .tab-wrpのclassを現在値を取得
	  let currentClasses = $(".tab-wrp").attr('class');

	  // 現在の.tab-wrpのclassから、「navIdx-」で始まるclassを削除
	  const updatedClasses = currentClasses.replace(/\bnavIdx-\S+\b/g, '').trim();
	  
	  // .tab-wrpのclassをupdatedClassesに変更
	  $(".tab-wrp").attr('class', updatedClasses);
	  
	  // .tab-wrpにleftValClsを追加
	  $('.tab-wrp').addClass(leftValCls);

    // ③クリック済みタブのデザインを設定したcssのクラスを一旦削除
    $('.tab-wrp div').removeClass('active');
 
    // ④クリックされたタブにクリック済みデザインを適用する
    $(this).addClass('active');
 
    // ⑤コンテンツを一旦非表示にし、クリックされた順番のコンテンツのみを表示
    $('.tabarea section').removeClass('show').eq(navIdx).addClass('show');
  });
});





////ニュースページで使うアコーディオンに関する箇所

$(function(){
	var num = 2; //何個づつ開くか指定
	var d_num = 2; //最初表示させたい個数を指定

	// ▼ここからは各カテゴリーのリストの初期表示を制御
	$('.accordion_box').each(function() { //.accordion_boxを検索
		const clsList =	Array.from(this.classList);
	    const cgCls = clsList.find(clsItem => clsItem.startsWith('cg-'));
		const category = cgCls ? cgCls.replace('cg-', '') : null ;
		 $('.accordion > li:gt('+ (d_num - 1) +')',this).addClass('none'); //d_numより後の要素は.none付与

		if ($('.accordion > li',this).length > d_num) { 
			$(`.js-btn-${category}`).show(); //d_numより要素の数が多ければ「もっとみる」ボタン表示
		}
	});
	// ▲ここまでは各カテゴリーのリストの初期表示を制御
	
	// ▼ここからはクリックの挙動の制御
	$(".btn-page-news").each(function(){
    	$(this).on('click', function() { 
	    	let h_tag = $(this).prev('.accordion_box').find('.accordion li.none'); //クリックしたボタンに関連する.accordionの非表示要素を取得
		    let h_tag_num = h_tag.length; //非表示要素の個数を変数に格納
		    h_tag.slice(0, num).slideDown("fast").removeClass('none'); //num個までの非表示要素を開いて.noneを外す
			if (num >= h_tag_num) { 
				$(this).hide(); //非表示要素の個数がnum以下になったら「もっとみる」ボタンを非表示
			}
		});
	});
	// ▲ここまではクリックの挙動の制御
});


//ニュースページで使うアコーディオンに関する箇所ここまで





//------------スライダー-------------------
jQuery(function($){
    $('.slider01').each(function(){
		$(this).slick({
			autoplay:true,
			autoplaySpeed:2500,
			dots:false,
			slidesToShow: 1, // スライドのエリアに画像がいくつ表示されるかを指定
			arrows:false,	
			
			   //レスポンシブでの動作を指定
    responsive: [{
      breakpoint: 767,  //ブレイクポイントを指定
      settings: {
       slidesToShow: 1,
      }}]
			
		});
	});	
});






jQuery(function($){
    $('.slider03').each(function(){
		$(this).slick({
			autoplay:true,
			autoplaySpeed:2500,
			dots:false,
			slidesToShow: 4, // スライドのエリアに画像がいくつ表示されるかを指定
			arrows: false,
            centerMode:true,
			
			   //レスポンシブでの動作を指定
    responsive: [{
      breakpoint: 767,  //ブレイクポイントを指定
      settings: {
       slidesToShow: 1,}}]
			
		});
	});	
});	



//------------パネルアコーディオン-------------------

$(function(){
let mediaQuery = window.matchMedia('(min-width: 768px)'); // ブレイクポイント
let clickElm = '';

document.querySelectorAll('.content-panel').forEach(function(item) {

    // Windowサイズに応じたクリック領域指定
    if (mediaQuery.matches) {
        clickElm = item; // BP以上はパネル全域
    } else {
        clickElm = item.firstElementChild; // BP未満はタイトル（年）だけ
    }

    $(clickElm).click(function(){
        $(item).children('.content-panel__body').slideToggle();
        $(item).toggleClass('is-active');

        if(item.getAttribute('aria-pressed') == 'true') {
            item.setAttribute('aria-pressed', 'false');
            item.blur();
        } else {
            item.setAttribute('aria-pressed', 'true');
            item.focus();
        }
    });
	
	});
    
});

















//ロード時のアニメーション

// $(window).on("load",function(){
//     var path = location.pathname;
//     if (path === "/"){
//         $('body').addClass('loadingfade');
//             // console.log("ローダー終り");
//     }else {
//         $('body').css('opacity','100');
//     }
// });


$('.cate>a').click(function() { return false; });
$('.cat>a').click(function() { return false; });



////タブ移動　c-tab-move
/*
$(function () {
    $('.c-tab-move-content>div>.wrp').hide();
    $('.c-tab-move-content>div>.wrp').first().slideDown();
    $('.c-tab-move-buttons span').click(function () {
        var thisclass = $(this).attr('class');
        $('#lamp').removeClass().addClass('#lamp').addClass(thisclass);
        $('.c-tab-move-content>div>.wrp').each(function () {
            if ($(this).hasClass(thisclass)) {
                $(this).fadeIn(800);
            }
            else {
                $(this).hide();
            }
        });
    });
});
*/

//SPの時の動き
$(function () {
    // ①タブをクリックしたら発動
    $('.c-tab-move-buttons div').click(function () {


        // ③クリック済みタブのデザインを設定したcssのクラスを一旦削除
        $('.c-tab-move-buttons div').removeClass('active');

        // ④クリックされたタブにクリック済みデザインを適用する
        $(this).addClass('active');
    });
});







//タブ通常
$(function () {
    // ①タブをクリックしたら発動
    $('.tab div').click(function () {

        // ②クリックされたタブの順番を変数に格納
        var index = $('.tab div').index(this);

        // ③クリック済みタブのデザインを設定したcssのクラスを一旦削除
        $('.tab div').removeClass('active');

        // ④クリックされたタブにクリック済みデザインを適用する
        $(this).addClass('active');

        // ⑤コンテンツを一旦非表示にし、クリックされた順番のコンテンツのみを表示
        $('.area section').removeClass('show').eq(index).addClass('show');

    });
});








////アコーディオン
$(function () {
    $(".js-title").on("click", function() {
      $(this).next().slideToggle(600);
      $(this).toggleClass("open",600);
    });
  });


$(function () {
    $('.close-click').on("click", function() {
      $(this).parent().slideToggle(600);
		var $dd = $(this).closest('dd');
		var $dt = $dd.prev('dt').removeClass("open",600);
    });
  });







//アコーディオン
$(function () {
    $(".js-title2").on("click", function() {
      $(this).next().slideToggle(600);
      $(this).removeClass("open",600);
    });
  });






$(function(){
    var target = $(".wp-block-query-pagination-next-arrow").text();
    var result = target.replace("→"," ");
    $(".wp-block-query-pagination-next-arrow").text(result);
});


$(function(){
    var target = $(".wp-block-query-pagination-previous-arrow").text();
    var result = target.replace("←"," ");
    $(".wp-block-query-pagination-previous-arrow").text(result);
});



//文字数制限

document.addEventListener('DOMContentLoaded', () => {
  const textLimit = document.querySelectorAll('.text-limit a');
  textLimit.forEach((text) => {
    const textContent = text.textContent;
    const textLength = textContent.length;
    if (textLength > 10) {
      text.textContent = text.textContent.slice(0, 40) + '...';
    }
  });
});









//ページネーション

$(document).ready(function () {

    // 現在のページ
    // 現在のページ数を格納する変数。初期値は１ページ目に設定しています。
    let current_page = 1;

    // 最大表示項目数。
    // ここの数字を弄ると、１ページに表示される項目数が変わります。
    let max_item = 5;

    // 最大ページ数
    // 何ページ分ページネーションを作成するか
    let max_page = 20;

    // 合計の項目数
    // ページネーションで
    let item_num = $(".c-page_list > li").length;

    // 現在の項目数を表示項目数で割り、何ページになるかを計算
    let all_page = Math.ceil(item_num / max_item);

    // 初期処理呼び出し
    initial(all_page);

    // 初期処理
    function initial(all_page) {
        // ページ数が２以上の時にページネーション作成
        if (all_page > 1) {
            // ナビゲーションを挿入する
            let pagination_html = ''
            pagination_html = '<li  class="prev"><a>前へ</a></li>';
            pagination_html += '<li class="number">';

            // 最大ページ数までページ番号を作成
            for (let i = 1; i <= max_page && i <= all_page; i++) {
                pagination_html += '<a class="js_page_switch" data-index="' + i + '">' + i + '</a>';
            }

            pagination_html += '</li>';
            pagination_html += '<li class="next"><a>次へ</a>';

            // ページネーションをDOMに挿入
            $(".pagination").html(pagination_html);

            // ページを切り替える関数
            switch_page(current_page);
        } else {
            $(".c-page_list > li").addClass("on");
        }
    }

    // 各ボタンのクリックイベントを定義する
    // クリックしたページネーションのページ番号を取得し、
    // ページを切り替える関数を呼び出す。
    $(document).on('click', '.js_page_switch', function () {
        current_page = $(this).data("index");
        switch_page(current_page);
    });

    // 前へボタンの処理　１ページより大きい場合ページを切り替える
    // 現在のページ数から１を引いて、ページを切り替える関数を呼び出す。
    $(document).on('click', '.prev', function () {
        if (current_page > 1) {
            current_page--;
            switch_page(current_page);
        }
    });

    // 次へボタンの処理　最大ページ数より小さい場合ページを切り替える
    // 現在のページ数から１を足して、ページを切り替える関数を呼び出す。
    $(document).on('click', '.next', function () {
        if (current_page < all_page) {
            current_page++;
            $(".js_page_switch[data-index=" + current_page + "]").trigger("click");
        }
    });

    // ぺージ切り替え処理
    function switch_page(current_page) {

        // 一旦表示を全て削除
        $(".js_page_switch").removeClass("on active");
        $(".c-page_list > li").removeClass("on");

        // 現在のページのボタンをアクティブにする
        $(".js_page_switch[data-index=" + current_page + "]").addClass("on active");

        // ぺージに表示する項目にクラスを付与
        const start = max_item * (current_page - 1);
        for (var i = start; i < start + max_item; i++) {
            $(".c-page_list > li").eq(i).addClass("on");
        }
    }
});





//ページネーション2

$(document).ready(function () {

    // 現在のページ
    // 現在のページ数を格納する変数。初期値は１ページ目に設定しています。
    let current_page = 1;

    // 最大表示項目数。
    // ここの数字を弄ると、１ページに表示される項目数が変わります。
    let max_item = 5;

    // 最大ページ数
    // 何ページ分ページネーションを作成するか
    let max_page = 20;

    // 合計の項目数
    // ページネーションで
    let item_num = $(".c-page_list2 > li").length;

    // 現在の項目数を表示項目数で割り、何ページになるかを計算
    let all_page = Math.ceil(item_num / max_item);

    // 初期処理呼び出し
    initial(all_page);

    // 初期処理
    function initial(all_page) {
        // ページ数が２以上の時にページネーション作成
        if (all_page > 1) {
            // ナビゲーションを挿入する
            let pagination_html = ''
            pagination_html = '<li  class="prev"><a>前へ</a></li>';
            pagination_html += '<li class="number">';

            // 最大ページ数までページ番号を作成
            for (let i = 1; i <= max_page && i <= all_page; i++) {
                pagination_html += '<a class="js_page_switch" data-index="' + i + '">' + i + '</a>';
            }

            pagination_html += '</li>';
            pagination_html += '<li class="next"><a>次へ</a>';

            // ページネーションをDOMに挿入
            $(".pagination2").html(pagination_html);

            // ページを切り替える関数
            switch_page(current_page);
        } else {
            $(".c-page_list2 > li").addClass("on");
        }
    }

    // 各ボタンのクリックイベントを定義する
    // クリックしたページネーションのページ番号を取得し、
    // ページを切り替える関数を呼び出す。
    $(document).on('click', '.js_page_switch', function () {
        current_page = $(this).data("index");
        switch_page(current_page);
    });

    // 前へボタンの処理　１ページより大きい場合ページを切り替える
    // 現在のページ数から１を引いて、ページを切り替える関数を呼び出す。
    $(document).on('click', '.prev', function () {
        if (current_page > 1) {
            current_page--;
            switch_page(current_page);
        }
    });

    // 次へボタンの処理　最大ページ数より小さい場合ページを切り替える
    // 現在のページ数から１を足して、ページを切り替える関数を呼び出す。
    $(document).on('click', '.next', function () {
        if (current_page < all_page) {
            current_page++;
            $(".js_page_switch[data-index=" + current_page + "]").trigger("click");
        }
    });

    // ぺージ切り替え処理
    function switch_page(current_page) {

        // 一旦表示を全て削除
        $(".js_page_switch").removeClass("on active");
        $(".c-page_list2 > li").removeClass("on");

        // 現在のページのボタンをアクティブにする
        $(".js_page_switch[data-index=" + current_page + "]").addClass("on active");

        // ぺージに表示する項目にクラスを付与
        const start = max_item * (current_page - 1);
        for (var i = start; i < start + max_item; i++) {
            $(".c-page_list2 > li").eq(i).addClass("on");
        }
    }
});













jQuery(function($){
  $('.slider-11').each(function(){

    const $slider = $(this);

    function applyZoom(){
      const $current = $slider.find('.slick-current');

      // 一旦ズーム解除
      $slider.find('.is-zoom').removeClass('is-zoom');

      // reflow（差分を強制的に作る）
      if ($current[0]) {
        $current[0].offsetHeight;
      }

      // 次tickでズーム開始
      setTimeout(function(){
        $current.addClass('is-zoom');
      }, 20);
    }

    // 初期表示
    $slider.on('init', function(){
      applyZoom();
    });

    // 切り替え直前でズーム解除
    $slider.on('beforeChange', function(){
      $slider.find('.is-zoom').removeClass('is-zoom');
    });

    // 切り替え後に再ズーム
    $slider.on('afterChange', function(){
      applyZoom();
    });

    // slick 本体
    $slider.slick({
      autoplay: true,
      autoplaySpeed: 3000,
      speed: 600,
      cssEase: 'ease',
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      centerMode: false,
      infinite: true,
      pauseOnHover: false,
      draggable: false,
      swipe: false,
      touchMove: false,

      // ★レスポンシブ（消してない）
      responsive: [{
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      }]
    });

  });
});











//タブ 
$(function() {
 
  // ①タブをクリックしたら発動
  $('.tab div').click(function() {
 
    // ②クリックされたタブの順番を変数に格納
    var index = $('.tab div').index(this);
 
    // ③クリック済みタブのデザインを設定したcssのクラスを一旦削除
    $('.tab div').removeClass('active');
 
    // ④クリックされたタブにクリック済みデザインを適用する
    $(this).addClass('active');
 
    // ⑤コンテンツを一旦非表示にし、クリックされた順番のコンテンツのみを表示
    $('.area section').removeClass('show').eq(index).addClass('show');
 
  });
});










/*フェードイン右から*/
$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).css('opacity','1');
                $(this).css('transform','translatey(0)');
            }
        });
    });
});





/*フェードイン右から*/
$(function(){
    $(window).scroll(function (){
        $('.fadein-y , .fadein-y-l').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).css('opacity','1');
                $(this).css('transform','translatex(0)');
            }
        });
    });
});


/*フェードイン右から*/
$(function(){
    $(window).scroll(function (){
        $('.fadqq').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).addClass('bluecircle01');
            }
        });
    });
});





/*フェードイン右から徐々に*/
$(function(){
    $(window).scroll(function (){
        $('.fadqq').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 300){
                $(this).addClass('bluecircle01');
                $(this).css('transform','translateX(0)');
            }
        });
    });
});








/*フェードイン右から徐々に*/
$(function(){
    $(window).scroll(function (){
        $('.a-fader-jojo').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).addClass('migikara');
                $(this).css('transform','translateX(0)');
            }
        });
    });
});

//フルワイド右
$(function(){
    $(window).scroll(function (){
        $('.fader-full').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).addClass('migikara');
                $(this).css('transform','translateX(-50%)');
            }
        });
    });
});



//フェードイン左から徐々に
$(function(){
    $(window).scroll(function (){
        $('.a-fader-jojo-l').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).addClass('hidarikara');
                $(this).css('transform','translateX(0)');
            }
        });
    });
});


//フルワイド左
$(function(){
    $(window).scroll(function (){
        $('.fader-l-full').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).addClass('hidarikara');
                $(this).css('transform','translateX(0%)');
            }
        });
    });
});







/*順々に表示*/
$(function(){
    $(window).scroll(function (){
        $('.jj').each(function(){
            var position = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > position - windowHeight + 200){
                $(function(){
                    $('.jj').each(function(i){
                        $(this).delay(i * 300).queue(function(){
                            $(this).addClass('active');
                        });
                    });
                });
            }
        });
    });
});




/*フェードインビフォー右から*/
$(function(){
    $(window).scroll(function (){
        $('.c-1c05').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).addClass('show');
            
            }
        });
    });
});
Object

/*フェードインビフォー右から*/
$(function(){
    $(window).scroll(function (){
        $('.c-1c05').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).addClass('show');
            
            }
        });
    });
});







$(function(){
	$(window).on('load scroll',function (){
		$('.animation').each(function(){
			//ターゲットの位置を取得
			var target = $(this).offset().top;
			//スクロール量を取得
			var scroll = $(window).scrollTop();
			//ウィンドウの高さを取得
			var height = $(window).height();
			//ターゲットまでスクロールするとフェードインする
			if (scroll > target - height){
				//クラスを付与
				$(this).addClass('active');
			}
		});
	});
});









// DOM生成完了時　ローディング
document.addEventListener("DOMContentLoaded", () => {

  // ← body に home クラスがある時だけ付与
  if (document.body.classList.contains("home")) {
    document.body.classList.add("loading");
  }
});

window.addEventListener("load", () => {

  const loader = document.getElementById("loader");

  // loader が無いページでは何もしない
  if (!loader) return;

  // 2.5秒後に解除
  setTimeout(() => {

    if (window.ScrollTrigger) {
      ScrollTrigger.refresh();
    }

    loader.classList.add("hide");
    document.body.classList.remove("loading");

  }, 2500);
});








//----------- 文字数制限バリデーター ------------------
document.addEventListener('DOMContentLoaded', function() {
    const cf7s = document.querySelectorAll('form.wpcf7-form');
    let isTargetCf7 = false;

    if (cf7s.length > 0) {

        cf7s.forEach(form => {

            const arrayTextareas = form.querySelectorAll('textarea');

            if (arrayTextareas.length > 0) {
                arrayTextareas.forEach(targetTextarea => {

                    if (targetTextarea.hasAttribute('maxlength')) {
                        isTargetCf7 = true; // maxlength 属性を持つtextareaの存在確認
                        
                        targetTextarea.addEventListener('keyup', function(event) {
                            const textarea      = event.target;
                            const maxLength     = parseInt(textarea.getAttribute('maxlength'), 10);
                            const currentLength = textarea.value.length;

                            const textareaName  = textarea.getAttribute('name');
                            const parentElement = textarea.closest('span');

                            const errorMessage  = document.createElement('span');
                            errorMessage.classList.add('cf7-errowmsg', 'wpcf7-not-valid-tip');
                            existingElement     = parentElement.querySelector('.cf7-errowmsg'); // エラーメッセージ存在確認

                            // 文字数オーバー且つエラーメッセージが無い場合
                            if (currentLength > maxLength && !existingElement) {
                                errorMessage.innerText = '入力できる文字数は' + maxLength + '字までです。';
                                parentElement.appendChild(errorMessage);

                            // 文字数以下且つエラーメッセージが有る場合
                            } else if(currentLength <= maxLength && existingElement) {
                                parentElement.querySelector('.cf7-errowmsg').remove(); // エラーメッセージを消す
                            }
                        })
                    } // if
                }); // forEach
            } // if
        });

        if(isTargetCf7) {
            const head       = document.head;
            const styleElem  = document.createElement('style');
            
            styleElem.setAttribute('type','text/css');
            styleElem.innerText = '/* 追加するCSS */.cf7-errowmsg { font-family: "Zen Old Mincho", serif; }';
            
            head.appendChild(styleElem);
        }
    }
});
//----------- ここまで / 文字数制限バリデーター ------------------








//フッターのモバイルナビメニューボタンの改修　背景色に合わせて色を変える

        // 新しい div 要素を作成
        var newDiv = document.createElement('div');

        // 新しい div 内に span 要素を追加
        var topSpan = document.createElement('span');
        topSpan.className = 'top';
        var middleSpan = document.createElement('span');
        middleSpan.className = 'middle';
        var bottomSpan = document.createElement('span');
        bottomSpan.className = 'bottom';

        // 新しい div に span 要素を追加
        newDiv.appendChild(topSpan);
        newDiv.appendChild(middleSpan);
        newDiv.appendChild(bottomSpan);

        // 既存の div 要素に新しい div を追加
        var targetDiv = document.getElementById('vk-mobile-nav-menu-btn');
        targetDiv.appendChild(newDiv);
  

  // 対象の div 要素を取得
        var targetDiv = document.getElementById('vk-mobile-nav-menu-btn');

        // テキストノードを取得
        var textNode = targetDiv.childNodes[0];

        // テキストノードが存在する場合は削除
        if (textNode && textNode.nodeType === Node.TEXT_NODE) {
            targetDiv.removeChild(textNode);
        }

//ここまで
