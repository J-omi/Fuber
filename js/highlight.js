var addclass = 'color';
var $cols = $('.items').click(function(e){
  $cols.removeClass(addclass);
  $(this).addClass(addclass);
});
