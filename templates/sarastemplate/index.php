<?php  
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright © 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// parameters (template)
$modernizr = $this->params->get('modernizr');
$bootstrap = $this->params->get('bootstrap');
$pie = $this->params->get('pie');

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/template.css.php?b='.$bootstrap.'&amp;v=1'); 
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js'); // <- this script must be in the head

// unset scripts, put them into /js/template.js.php to minify http requests
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
?>
<!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <script type="text/javascript" src="<?php echo $tpath.'/js/template.js.php?b='.$bootstrap.'&amp;v=1'; ?>"></script>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> <!-- mobile viewport -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png"> <!-- iphone, ipod, android -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72.png"> <!-- ipad -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png"> <!-- iphone retina -->
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/sarastemplate/css/template.css" type="text/css" />
  <?php if ($pie==1) : ?>
    <!--[if lte IE 8]>
      <style> 
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
    <![endif]-->
  <?php endif; ?>
 
</head>
  
<body class="page_bg">

 
  
    <div class="container"><div class="row">
    <div class="navbar span12"><div class="navbar-inner">
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
   <a class="brand" href="<?php echo $this->baseurl; ?>/"><?php echo $app->getCfg('sitename'); ?></a>
   <div class="nav-collapse row"><jdoc:include type="modules" name="menu" /><jdoc:include type="modules" name="search" /> 
   </div>
   </div>
   </div>
   </div>
   </div>
    <jdoc:include type="modules" name="debug" />
  <script type="text/javascript">
 (function($){
	 $(document).ready(function(){
		// dropdown
		$('.menu > .parent').addClass('dropdown');
		$('.menu > .parent > a').addClass('dropdown-toggle');
		$('.menu > .parent > a').attr('data-toggle', 'dropdown');
		$('.menu > .parent > a').append('<b class="caret"></b>');
		$('.menu > .parent > ul').addClass('dropdown-menu');
	 });
 })(jQuery);
 </script>
</body>

</html>

