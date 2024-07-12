
var consoleTest = myValues.temp_url + '/images/login-logo.png';
console.log('%c+', 'font-size: 0px; padding: 30px; color: transparent; background: url(' + consoleTest + '); background-size: 100% 100%;');

// ctrl + q キー入力でログインバーとデバッグツールの表示切替
document.body.addEventListener('keydown',
event => {
  if (event.key === 'q' && event.ctrlKey) {
    $('#wpadminbar, #configData').fadeToggle();
  }
});

// ログインバー分の余白をとる
$(function(){
  var adminbar_h = $('#wpadminbar').height();
  $('#configData').css('margin-top', adminbar_h);
  window.addEventListener("resize", function(event) {
    var adminbar_h = $('#wpadminbar').height();
    $('#configData').css('margin-top', adminbar_h);
  });
});

// エスケープ処理
function java_escape(str){
  return String(str).replace(/&/g,"&amp;")
  .replace(/"/g,"&quot;")
  .replace(/</g,"&lt;")
  .replace(/>/g,"&gt;")
}

// sidenav 設定
$(function(){
  $('.DataSideNav ul li').click(function() {
    $('.DataSideNav ul li').removeClass('active');
    $(this).addClass('active');
    var nav_index = $('.DataSideNav ul li').index(this);
    $('.DataMain .Dataclild').removeClass('active');
    $('.DataMain .Dataclild').eq(nav_index).addClass('active');
  })
});
// リンクチェッカー =======================================================================
$(function(){
  var host_uri = location.protocol + "//" + location.hostname;
  var ary_pdf = new Array();
  $('a').each(function(index, element){
    var element_href = $(element).attr('href');
    var element_class = $(element).attr('class');
    var element_text_html = $(element).prop('outerHTML');
    var element_target = $(element).attr('target');
    var element_extension = element_href.split('.').pop();

    //内部リンク・外部リンク判定
    var link_type = "exterLink";  //exterLinkで外部リンク
    if ( element_href.indexOf(host_uri) != -1) {
      link_type = "interLink";
    }
    if (element_href == "##") {
      link_type = "notSetLink";
    }
    // targetが_brankか確認
    if (link_type == "exterLink") {
      if (element_target != "_blank") {
        link_type = "exterLink notSetBlank dangerLink";
      }
    }
    // pdfがあれば配列に入れる。後で重複チェックに使用する。
    if (element_extension == "pdf" || element_extension == "PDF") {
      ary_pdf.push(element_href);
    }

    if (element_class != 'ab-item' && element_class != 'screen-reader-shortcut') {
      $('.dataLinkCheck ul.links').append('<li class="' + link_type + '">'+ index + ' : ' + element_href + '</li>');
      $('.dataLinkCheck ul.links').append('<li class="' + link_type + '">'+ java_escape(element_text_html) + '</li>');
    }
  });
  var counts = {};
  for(var i=0;i< ary_pdf.length;i++)
  {
    var key = ary_pdf[i];
    counts[key] = (counts[key])? counts[key] + 1 : 1 ;
  }
  for (var key in counts) {
    if (counts[key] == 1) {
      $('.dataLinkCheck ul.pdfs').append('<li class="oneFile">'+ key + '<span>' + counts[key] + '</span>' + '</li>');
    }else {
      $('.dataLinkCheck ul.pdfs').append('<li>'+ key + '<span>' + counts[key] + '</span>' + '</li>');
    }
  }
  // pdfがなければpdfcheckは非表示にする
  if (!ary_pdf.length) {
    $('.dataLinkCheck .pdfsWrap').hide();
  }
});

$(function() {
  // チェックボックスをチェックしたら発動
  $('input[name="notSetLink"]').change(function() {
    var prop_checked = $(this).prop('checked');
    if (prop_checked) {
      $('.notSetLink').show(200);
    }else {
      $('.notSetLink').hide(200);
    }
  });
  $('input[name="interLink"]').change(function() {
    var prop_checked = $(this).prop('checked');
    if (prop_checked) {
      $('.interLink').show(200);
    }else {
      $('.interLink').hide(200);
    }
  });
  $('input[name="exterLink"]').change(function() {
    var prop_checked = $(this).prop('checked');
    if (prop_checked) {
      $('.exterLink').show(200);
    }else {
      $('.exterLink').hide(200);
    }
  });
  $('input[name="dangerLink"]').change(function() {
    var prop_checked = $(this).prop('checked');
    if (prop_checked) {
      $('.dangerLink').show(200);
    }else {
      $('.dangerLink').hide(200);
    }
  });
  $('input[name="oneFile"]').change(function() {
    var prop_checked = $(this).prop('checked');
    if (prop_checked) {
      $('.oneFile').show(200);
      $('.oneFile').css('display', 'flex');
    }else {
      $('.oneFile').hide(200);
    }
  });
});
// リンクチェッカー ===================================================================

// SEOチェッカー ===================================================================
$(function() {
  $('.seoCheck .metasTable td.title').append($('title').text());
  $('.seoCheck .metasTable td.description').append($("meta[name=description]").attr("content"));
  $('.seoCheck .metasTable td.ogTitle').append($("meta[property='og:title']").attr("content"));
  $('.seoCheck .metasTable td.ogType').append($("meta[property='og:type']").attr("content"));
  $('.seoCheck .metasTable td.ogUrl').append($("meta[property='og:url']").attr("content"));
  $('.seoCheck .metasTable td.ogDescription').append($("meta[property='og:description']").attr("content"));
  $('.seoCheck .metasTable td.ogSitename').append($("meta[property='og:site_name']").attr("content"));
  $('.seoCheck .metasTable td.ogLocale').append($("meta[property='og:locale']").attr("content"));
  $('.seoCheck .metasTable td.twitterCard').append($("meta[name='twitter:card']").attr("content"));

  var result_title = $('title').text();
  if(result_title.length > 30){
    result_title = result_title.substr(0, 30) + '...';
  }
  var result_url = location.protocol + location.host + " >";
  var result_description = $("meta[name=description]").attr("content");
  if(result_description.length > 120){
    result_description = result_description.substr(0, 30) + '...';
  }
  $('.googleResult .title').append(result_title);
  $('.googleResult .hed').append(result_url);
  $('.googleResult .trl').append("▼");
  $('.googleResult .description').append(result_description);
});
// SEOチェッカー ===================================================================
