
$('.tab_box .tab_btn').click(function() {
	var index = $('.tab_box .tab_btn').index(this);
	$('.tab_box .tab_btn, .tab_box .tab_panel').removeClass('active');
	$(this).addClass('active');
	$('.tab_box .tab_panel').eq(index).addClass('active');
});





