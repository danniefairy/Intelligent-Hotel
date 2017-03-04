$('tr').on('click', function(el){
  $(el.currentTarget).toggleClass('inprogress');
});