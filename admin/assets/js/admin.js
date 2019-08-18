var showed_sidebar = false;
function show_sidebar_mobile() {
  if (showed_sidebar) {
    $('#sidebar-admin').animate({width: 'toggle', opacity: 'toggle'},1500, function(){
      $('#sidebar-admin-icon').animate({height: 'toggle', opacity: 'toggle'},800);
    });
    $('#bg-black-admin').fadeOut(1500);
  } else{
    $('#sidebar-admin-icon').animate({height: 'toggle', opacity: 'toggle'},800, function(){
      $('#sidebar-admin').animate({width: 'toggle', opacity: 'toggle'},1500);
    });
    $('#bg-black-admin').fadeIn(1500);
  }
  showed_sidebar = !showed_sidebar
}

$(document).ready(function(){
  $('#sidebar-admin-icon a').mouseover(function(){
    var top = $(this).position().top;
    show_sidebar($(this).index(), top);
  });
  $('#sidebar-admin-icon a').mouseleave(function(){
    show_sidebar($(this).index(), top);
  $('#sidebar-admin').css('z-index', '0');
  });
});

function show_sidebar(i, position_top){
  $('#sidebar-admin').css('z-index', '1000');
  $('.icon-desc').eq(i).css("top", position_top);
  $('.icon-desc').eq(i).animate({opacity: 'toggle'},200);
}
