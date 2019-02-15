/**
 * Кнопка наверх на jQuery. 
 * 
 * Стили:
.scrollTop{
	background:url('ссылка_на_картинку') 0 0 no-repeat;
	width:50px;
	height:50px;
	bottom:10px;
	left:48%;
}
.scrollTop:hover{ background-position:0 -58px; }
 *
 */
jQuery( document ).ready(function($){
	var 
	speed = 500,
	$scrollTop = $("<a/>")
	  .addClass('scrollTop')
	  .attr({href:'#', style:'display:none; z-index:9999; position:fixed;'})
	  .appendTo('body');		

	$scrollTop.click(function(e){
		e.preventDefault();

		$( 'html:not(:animated),body:not(:animated)' ).animate({ scrollTop: 0}, speed );
	});

	//появление
	function show_scrollTop(){
		( $(window).scrollTop() > 500 ) ? $scrollTop.fadeIn(1200) : $scrollTop.fadeOut(1200);
	}
	$(window).scroll( function(){ show_scrollTop(); } );
	show_scrollTop();
});