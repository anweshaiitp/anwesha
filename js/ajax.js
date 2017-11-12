
//ajax for accodomation page
$('.acco_load').click(function()
{
	$('.ajax_content').load('/accodomation/');
	return false;
});


// //ajax for schedule page
// $('.sch_div').click(function()
// {
// 	$('.ajax_content').load('/schedule_raw/');
// 	return false;
// });


// //ajax for sponsors page
// $('.spons_div').click(function()
// {
// 	$('.ajax_content').load('/sponsors/');
// 	return false;
// });


// //ajax for loading of login page
// $('.login a').click(function()
// {
// 	$('.login_backgrnd').fadeIn(500);
// 	$('.login_div').fadeIn(1500);
// });

// //closing of login page
// $('.login_backgrnd').click(function()
// {
// 	$(this).fadeOut(1500);
// 	$('.login_div').fadeOut(1500);
// });

// $('.close_div').click(function()
// {
// 	$('.login_backgrnd').fadeOut(1500);
// 	$('.login_div').fadeOut(1500);
// });


$('.register').click(function(){
	$('.ajax_content').html("<iframe src='/register_bare/' frameborder='0' style='height:94%;width:100%'></iframe>");
	return false;
});

$('.close_div').click(function()
{
	$('.login_backgrnd').fadeOut(1500);
	$('.register_div').fadeOut(1500);
});
