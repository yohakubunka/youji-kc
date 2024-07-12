console.log(GetQueryString());
console.log(GetBrowserName());

window.onload = function () {
    // ここに読み込み完了時に実行してほしい内容を書く。
    jQuery(document).ready(function () {

        $(".mainslide").slick({
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1500,
            arrows: true,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false
        });

    });
}
window.onload = function () {
    // ここに読み込み完了時に実行してほしい内容を書く。
    jQuery(document).ready(function () {
        //top_item_slide
        $(".mainslide").slick({
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1500,
            arrows: true,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false
        });
        //item_slide
        $(".slide").slick({
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1500,
            arrows: true,
            slidesToShow: 1,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false
        });
    });


    console.log(myValues.site_url); //get_site_url()の値

    console.dir(myValues);

};

/* ----------------------------------------------------------
** functions
** GetQueryString()
** GetPostValue(lavel)
** RemoveHtml(str)
---------------------------------------------------------- */

// urlパラメーターを連想配列に格納
function GetQueryString() {
    var result = {};
    if (1 < window.location.search.length) {
        // 最初の1文字 (?記号) を除いた文字列を取得する
        var query = window.location.search.substring(1);

        // クエリの区切り記号 (&) で文字列を配列に分割する
        var parameters = query.split('&');

        for (var i = 0; i < parameters.length; i++) {
            // パラメータ名とパラメータ値に分割する
            var element = parameters[i].split('=');

            var paramName = decodeURIComponent(element[0]);
            var paramValue = decodeURIComponent(element[1]);

            // パラメータ名をキーとして連想配列に追加する
            result[paramName] = paramValue;
        }
    }
    return result;
}



// $_POSTの中身を取得
// ※使用するとソースコードからPOSTの内容が見えてしまいます。
// フォーム送信等のPOSTデータには使用することは控えてください。
function GetPostValue(lavel) {
    // 許可するページを選択
    var permit_page = {
        index: true,
        date: true,
        archive: true,
        category: true,
        taxonomy: true,
        tag: true,
        single: true,
        admin: true,
        allPage: false //前項設定関係なく全てのページでの許可
    };

    // 許可するページ且つ、allPageで許可がある場合
    if (permit_page[myValues.page_type] && permit_page['allPage']) {
        // localize_script でコメントアウトしていたらnullを返す
        if (myValues.post_value) {
            // 引数が指定されている場合は指定のデータ名の値を返す
            if (lavel) {
                var postedData = myValues.post_value[lavel];
                return postedData;
            } else { // 引数が指定されていない場合$_POSTをそのまま返す
                var postedData = myValues.post_value;
                return postedData;
            }
        } else {
            return null;
        }
    } else {
        console.log("error: This page is not permitted.");
        return null;
    }
}



// HTMLタグをが含まれいてる文字列を渡すとHTMLタグを削除したものを返します。
function RemoveHtml(str) {
    return String(str).replace(/<("[^"]*"|'[^']*'|[^'">])*>/g, '');
}



// 使用中のブラウザを返します。
function GetBrowserName() {
    const ua = window.navigator.userAgent.toLowerCase();
    let name = "unknown";
    if (ua.indexOf("msie") !== -1) {
        const ver = window.navigator.appVersion.toLowerCase();
        if (ver.indexOf("msie 6.") !== -1) {
            name = 'ie6';
        } else if (ver.indexOf("msie 7.") !== -1) {
            name = 'ie7';
        } else if (ver.indexOf("msie 8.") !== -1) {
            name = 'ie8';
        } else if (ver.indexOf("msie 9.") !== -1) {
            name = 'ie9';
        } else if (ver.indexOf("msie 10.") !== -1) {
            name = 'ie10';
        } else {
            name = 'ie';
        }
    } else if (ua.indexOf('trident/7') !== -1) {
        name = 'ie11';
    } else if (ua.indexOf('edge') !== -1) {
        name = 'edge';
    } else if (ua.indexOf('chrome') !== -1 && ua.indexOf('edge') === -1) {
        name = 'chrome';
    } else if (ua.indexOf('safari') !== -1 && ua.indexOf('chrome') === -1) {
        name = 'safari';
    } else if (ua.indexOf('opera') !== -1) {
        name = 'opera';
    } else if (ua.indexOf('firefox') !== -1) {
        name = 'firefox';
    }
    return name;
}

//accordion
$(function () {
    $('.accordion .accordion__title').on('click', function () {
        /*クリックでコンテンツを開閉*/
        $(this).next().slideToggle(350);
        /*矢印の向きを変更*/
        $(this).toggleClass('open', 350);
    });
});


//ドロップダウン
$(function () {
    $('.category__box--title').click(function () {
        $('.arrow-category').removeClass('open', 350);
        $('.arrow-archive').removeClass('open', 350);
        $(this).toggleClass('open', 350);
        if ($(this).attr('class') == 'selected') {
            // メニュー非表示
            $(this).removeClass('selected').next('.category__box').slideUp('fast');

        } else {
            // 表示しているメニューを閉じる
            $('.category__box--title').removeClass('selected');
            $('.category__box').hide();
            // メニュー表示
            $(this).addClass('selected').next('.category__box ').slideDown('fast');
        }

    });

    // マウスカーソルがメニュー上/メニュー外
    $('.category__box--title,.category__box ').hover(function () {
        over_flg = true;
    }, function () {
        over_flg = false;
    });

    // メニュー領域外をクリックしたらメニューを閉じる
    $('body').click(function () {
        if (over_flg == false) {
            $('.category__box--title').removeClass('selected');
            $('.category__box ').slideUp('fast');
            $('.arrow-category').removeClass('open', 350);
            $('.arrow-archive').removeClass('open', 350);


        }
    });
});
//ハンバーガーメニュー
// $(function () {
//     // ハンバーガーメニュークリックイベント
//     $('.menu').click(function () {
//         if ($('.header__inner').hasClass('open')) {
//             // ナビゲーション非表示
//             $('.header__inner').removeClass('open');
//             // ハンバーガーメニューを元に戻す
//             $(this).removeClass('open');
//         } else {
//             // ナビゲーションを表示
//             $('.header__inner').addClass('open');
//             // ハンバーガーメニューを✖印に変更
//             $(this).addClass('open');
//         }
//     });
//     $('.inside__inner a[href]').on('click', function () {
//         if ($('.header__inner').hasClass('open')) {
//             $(this).removeClass('open');
//             $('.menu').click();
//         }
//     });
// });
//ハンバーガーメニュー
$(function () {
    // ハンバーガーメニュークリックイベント
    $('.menu').click(function () {
        if ($('.header__inner').hasClass('open')) {
            $('.header__inner').removeClass('open');// ナビゲーション非表示
            $(this).removeClass('open');// ハンバーガーメニューを元に戻す
        } else {
            $('.header__inner').addClass('open');// ナビゲーションを表示
            $(this).addClass('open');// ハンバーガーメニューを✖印に変更
        }
        $('.innerlink').on('click', function () {
            $('.menu,.header__inner').removeClass('open');
            if (!$('#head').hasClass('none')) {
                $('#head').addClass('none');
            }
        });
    });
});

$(function () {
    var pos = 0;
    var header = $('#head');
    $(window).on('scroll', function () {
        if ($(this).scrollTop() < pos) {
            //上にスクロールしたとき
            header.removeClass('none');
        } else {
            //下にスクロールしたとき
            header.addClass('none');
        }
        pos = $(this).scrollTop();
    });
});