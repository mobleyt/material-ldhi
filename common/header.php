<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-48168330-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-48168330-1');
</script>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <?php
    queue_css_url('//fonts.googleapis.com/icon?family=Material+Icons');    
	queue_css_url('//fonts.googleapis.com/css?family=Open+Sans|Raleway:300,400,600|Oswald:300,400');    
	queue_css_url('//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css');    
    queue_css_file('style');
    echo head_css();
    ?>
   
    <!-- JavaScripts -->
    <?php 
    queue_js_url('//code.jquery.com/jquery-3.3.1.min.js');
    queue_js_url('//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js');
    echo head_js(); 
    ?>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass . ' body')); ?>

<!-- Main Content Wrap -->
<div class="wrap">

<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

<?php fire_plugin_hook('public_header', array('view'=>$this)); ?>


<nav class="grad-red z-depth-2 oswald " role="navigation">
    <div class="nav-wrapper container">
    <?php
		// If the URL to this page is '/', this is the main page.
		// Every other URL will be something like '/items/show/23'
		//       or '/collections/browse'
		if (is_current_url('/exhibits')) {
	?>
	<?php
		 }
	?>
    <?php echo link_to_home_page(theme_logo(), $props = array('class'=>'')); ?>

		<ul id="slide-out" class="side-nav">
		<h5 class="mobile-menu-header">LDHI Menu</h5>
    		<?php echo public_nav_main(); ?>
			<li><a href="/search">Search</a></li>
  		</ul>

		<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons white-text">menu</i></a>
      
      <?php 
      echo material_public_nav_main(); 
      ?>
    </div>
</nav>

<!-- Modal Structure -->
<div id="searchModal" class="modal">
	<div class="modal-content">
    	<h4>Search LDHI</h4>
    	<?php echo search_form(array('form_attributes' => array('role' => 'search', 'class' => 'form'))); ?>
	</div>
</div>        

