//ajax for accodomation page
$('.acco_load').click(function()
{
	$('.ajax_content').html("<iframe src='/accodomation/"+customhash+"' frameborder='0' style='width:100%;height:100%'></iframe>");
	return false;
});

$('.spons_div').click(function()
{
	$('.ajax_content').html("<iframe src='/sponsors/" + customhash+"' frameborder='0' style='width:100%;height:100%'></iframe>");
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