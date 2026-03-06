<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once('lib.php');
include_once('mini/cms.php');

$cms->js[] = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js';
$cms->js[] = "https://code.jquery.com/ui/1.12.1/jquery-ui.js";
$cms->js[] = "js/kfl.js";

$cms->css[] = "//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css";
$cms->css[] = "https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap";
$cms->css[] = "css/layout.css";
$cms->css[] = "css/menu.css";

$content = $cms->content();
$menu = $cms->content('menu');
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<?php echo $cms->head(); ?> 
</head>
<body>
<div id="wrapper">

	<div id="topWrapper">
	  <div id="site-header">
	    <span class="wordmark">UC Berkeley</span>
	    <span class="site-title">Folklore Archive</span>
	  </div>
	  <img src="images/folklorelogo2.png" id="header-logo" alt="Berkeley Folklore Archive logo" />
	</div>

	<table id="mainArea">
	<tr>
		<td class="leftcolumn">
			<?php echo $menu; ?>
		</td>
		<td class="rightcolumn">
			<div id="contentArea">
				<?php echo $content; ?>
			</div>
		</td>
	</tr>
	</table>

	<div id="footer">
		<a href="https://www.universityofcalifornia.edu/">University of California</a> Copyright &copy; <?php echo date("Y"); ?> UC Regents&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="https://folklore.berkeley.edu" target="_blank">UC Berkeley Folklore</a>&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="https://github.com/jayana-cpc/ucla-kfl-map-search" target="_blank">Open Source Code</a>
	</div>

</div>


</body>
</html>
