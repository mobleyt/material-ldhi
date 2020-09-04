<?php
$title = __('LDHI - Lowcountry Digital History Initiative');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<?php $randomFeatured =  material_exhibit_builder_display_random_featured_exhibit(); ?>

<!-- Parallax Area -->
<div id="index-banner" class="parallax-container valign-wrapper z-depth-2">
    <div class="section">
      <div class="container">
        <div class="row center">
        <div class="col m12 s12">
          <h2 class="white-text valign oswald-bold"><?php if($header_title = get_theme_option('Homepage Header')) {echo $header_title;} ?></h2>
          <h4 class="center white-text lightHeader"><?php if($header_text = get_theme_option('Homepage Text')) {echo $header_text;} ?></h4>
          </div>
        </div>

      </div>
    </div>
    <div class="parallax">
    <?php if ($headerSplash = get_theme_option('Header Background')): ?>
    	<img alt="LDHI Welcome Header Image" class="img" src="/files/theme_uploads/<?php echo $headerSplash; ?>" />
    <?php endif; ?>
	</div>

</div>
 <!-- End Parallax -->

<div class="row">

<div class="row cofcAccent z-depth-2 mid-featured">
<div class="col s12">
<div class="container">
<?php echo $randomFeatured; ?>
</div>
</div>
</div><!-- end featured row -->

<div class="row">

<div class="col s12">
<div class="container">
<h4 class="lightHeader">Recent Exhibits</h4>
</div>
</div>

<div class="col s12">
<div class="container">
<?php if (count($exhibits) > 0): ?>
<?php $exhibitCount = 0; ?>

<?php foreach (loop('exhibit') as $exhibit): ?>
<?php $exhibitCount++; ?>
<?php if ($exhibitCount == 7) {
        break;   
    }
 ?>   
<div class="col m4 s12">
<div class="card medium z-depth-2">

<div class="card-image waves-effect waves-block waves-light">
<?php if ($exhibitImage = record_image($exhibit, 'original', array('class' => 'activator'))): ?>
<?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
<?php endif; ?>
</div>
 
<div class="card-content">
<span class="card-title activator">
<?php echo exhibit_builder_link_to_exhibit($exhibit); ?>
<i class="material-icons right">more_vert</i>
</span>
</div>

<div class="card-reveal">
<span class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?>
<i class="material-icons right">close</i></span>
<p class="card-description"><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true)),150); ?></p>
</div>

</div>
</div>

<?php endforeach; ?>
<a class="right" href="/allexhibits">Browse All Exhibits</a>
<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>    

</div>
</div><!-- end col -->
</div><!-- end recent row -->

</div><!-- end featured and recent parent row -->

<?php echo foot(); ?>
