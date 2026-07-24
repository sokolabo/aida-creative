/*WORDPRESSテーマのデフォルト設定を解除*/
$('div').removeClass('is-layout-constrained');
$('div').removeClass('wp-block-latest-posts__featured-image');

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





////ニュースページで使うアコーディオンに関する箇所

$(function(){
	var num = 10; //何個づつ開くか指定
	var d_num = 10; //最初表示させたい個数を指定

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

//タブ2
$(function() {
 
  // ①タブをクリックしたら発動
  $('.tab2 div').click(function() {
 
    // ②クリックされたタブの順番を変数に格納
    const navIdx = $('.tab2 div').index(this);

	  // 追記：追加classを作成。leftの値を切り替えるためのclassを生成
	  const leftValCls = (function(val) {
		  return `navIdx-${String(val)}`;
	  })(navIdx)

	  // .tab2のclassを現在値を取得
	  let currentClasses = $(".tab2").attr('class');

	  // 現在の.tab2のclassから、「navIdx-」で始まるclassを削除
	  const updatedClasses = currentClasses.replace(/\bnavIdx-\S+\b/g, '').trim();
	  
	  // .tab2のclassをupdatedClassesに変更
	  $(".tab2").attr('class', updatedClasses);
	  
	  // .tab2にleftValClsを追加
	  $('.tab2').addClass(leftValCls);

    // ③クリック済みタブのデザインを設定したcssのクラスを一旦削除
    $('.tab2 div').removeClass('active');
 
    // ④クリックされたタブにクリック済みデザインを適用する
    $(this).addClass('active');
 
    // ⑤コンテンツを一旦非表示にし、クリックされた順番のコンテンツのみを表示
    $('.tabarea section').removeClass('show').eq(navIdx).addClass('show');
  });
});
















/*フェードイン下から*/
$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var targetElement = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > targetElement - windowHeight + 100){
                $(this).css('opacity','1');
                $(this).css('transform','translateY(0)');
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






<!--フェードイン右から徐々に-->
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







<!--順々に表示-->
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




<!--フェードインビフォー右から-->
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

<!--フェードインビフォー右から-->
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















//------------スライダーたち-------------------
jQuery(function($){
    $('.slider01').each(function(){
		$(this).slick({
			autoplay:true,
			autoplaySpeed:2500,
			dots:false,
			slidesToShow: 2, // スライドのエリアに画像がいくつ表示されるかを指定
			
			   //レスポンシブでの動作を指定
    responsive: [{
      breakpoint: 767,  //ブレイクポイントを指定
      settings: {
       slidesToShow: 1,
      }}]
			
		});
	});	
});


//------------スライダーたち-------------------
jQuery(function($){
    $('.slider02').each(function(){
		$(this).slick({
			autoplay:true,
			autoplaySpeed:2500,
			dots:false,
			slidesToShow: 1, // スライドのエリアに画像がいくつ表示されるかを指定
			
			   //レスポンシブでの動作を指定
    responsive: [{
      breakpoint: 767,  //ブレイクポイントを指定
      settings: {
       slidesToShow: 1,
      }}]
			
		});
	});	
});








//------------スライダーたち-------------------


jQuery(function($){
    $('.slider03').each(function(){
		$(this).slick({
			autoplay:true,
			autoplaySpeed:2500,
			dots:false,
			slidesToShow: 5, // スライドのエリアに画像がいくつ表示されるかを指定
			
			   //レスポンシブでの動作を指定
    responsive: [{
      breakpoint: 767,  //ブレイクポイントを指定
      settings: {
       slidesToShow: 1,
      }}]
			
		});
	});	
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


