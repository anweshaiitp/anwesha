<?php
require ('resources/minify/src/Minify.php');
require ('resources/minify/src/CSS.php');
require ('resources/minify/src/JS.php');
require ('resources/minify/src/Exception.php');
require ('resources/path-converter/src/Converter.php');
// var_dump(get_declared_classes());
$minifier = new MatthiasMullie\Minify\CSS('assets/css/all.css');

// we can even add another file, they'll then be
// joined in 1 output file

// $sourcePath2 = '/path/to/second/source/css/file.css';

$minifier->add("assets/css/team.css");
$minifier->add("assets/css/style.css");
$minifier->add("assets/css/eventsmain.css");
$minifier->add("assets/css/intro.css");
$minifier->add("assets/css/jquery-ui.structure.min.css");
$minifier->add("assets/css/jquery-ui.min.css");
$minifier->add("assets/css/jquery-ui.theme.min.css");

// or we can just add plain CSS
// $css = 'body { color: #000000; }';
// $minifier->add($css);

// save minified file to disk
// $minifiedPath = '/path/to/minified/css/file.css';
// $minifier->minify($minifiedPath);
header("Content-type: text/css");
echo $minifier->minify();
?>