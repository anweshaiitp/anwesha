//ajax for accodomation page
$('.acco_load,.accodside').click(function()
{
	$('.ajax_content').html("<iframe src='/accodomation/"+customhash+"' frameborder='0' style='width:100%;height:100%'></iframe>");
	return false;
});

$('.spons_div,.sponsside').click(function()
{
	$('.ajax_content').html("<iframe src='/sponsors/" + customhash+"' frameborder='0' style='width:100%;height:100%'></iframe>");
	return false;
});

$('.guest_div,.guestside').click(function () {
	$('.ajax_content').html("<img src='/images/guestlect.jpeg' style='position:absolute;top:50%;transform:translateY(-50%);width:100%;max-height:100% !important;max-width:100% !important;'>");
	return false;
});

$('.pro_div,.proside').click(function () {
	var width = window.screen.width;
	if(!width)
		width = '';
	$('.ajax_content').html("<iframe src='/pro-nites/" + width + "' frameborder='0' style='width:100%;height:100%'></iframe>");
	return false;
});

$('.register').click(function(){
	$('.ajax_content').html("<iframe src='/register_bare/' frameborder='0' style='width:100%;height:100%'></iframe>");
	return false;
});

$('.ajax_loading_bckgrnd').click(function()
{
	$('.ajax_loading_bckgrnd').fadeOut(800);
	$('.ajax_loading_div').fadeOut(800);
});