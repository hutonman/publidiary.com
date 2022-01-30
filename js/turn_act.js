$(function(){
  $('#turn').turn(
      {
              // 自動でページをめくったときの高さ
              elevation: 100,

              // ページめくりのスピード(ms)
              duration: 600,

              // ページをめくるときの影->有効
              gradients: true,

              // 自動中央揃え->無効
              autoCenter: false,

              // 右開きか左開きかの設定->右開き
              direction: 'ltr',

              display: 'single',

              
      }
  );


});