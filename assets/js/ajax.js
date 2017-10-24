
//ajax for accodomation page
$('.acco_load').click(function()
{
	$('.ajax_content').load('accod.html');
	return false;
});


//ajax for schedule page
$('.sch_div').click(function()
{
	$('.ajax_content').load('sch.html');
	return false;
});


//ajax for sponsors page
$('.spons_div').click(function()
{
	var spons;
	// if(window.location="")
		spons = '/sponsors/';
	$('.ajax_content').load(spons);
	return false;
});


//ajax for loading of login page
$('.login a').click(function()
{
	$('.login_backgrnd').fadeIn(500);
	$('.login_div').fadeIn(1500);
});

//closing of login page
$('.login_backgrnd').click(function()
{
	$(this).fadeOut(1500);
	$('.login_div').fadeOut(1500);
});

$('.close_div').click(function()
{
	$('.login_backgrnd').fadeOut(1500);
	$('.login_div').fadeOut(1500);
});


//ajax for loading of register page
$('.register a').click(function()
{
	$('.login_backgrnd').fadeIn(500);
	$('.register_div').fadeIn(1500);
});

//closing of rgister page
$('.login_backgrnd').click(function()
{
	$(this).fadeOut(1500);
	$('.register_div').fadeOut(1500);
});

$('.close_div').click(function()
{
	$('.login_backgrnd').fadeOut(1500);
	$('.register_div').fadeOut(1500);
});
