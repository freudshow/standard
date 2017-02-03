jQuery.fn.extend({favorite:(function(){var a=location.href;var b=document.title;return function(){if(window.sidebar&&window.sidebar.addPanel){window.sidebar.addPanel(b,a,"")}else{try{window.external.AddToFavoritesBar(a,b)}catch(c){try{window.external.AddToFavoritesBar(a,b)}catch(c){alert("您的浏览器不支持一键收藏，请按Ctrl+D来收藏！")}}}}})()});

