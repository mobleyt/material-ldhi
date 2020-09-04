<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>
        
<!-- Parallax Area -->
<div id="index-banner" class="parallax-container valign-wrapper z-depth-2">
    <div class="section">
      <div class="container">
        <div class="row center">
        <div class="col m12 s12">
			<h2 class="center white-text oswald-bold"><?php echo metadata('exhibit', 'title'); ?></h2>
        </div>
        </div>
      </div>
    </div>
    <div class="parallax">
	<?php if ($exhibitSplash = get_theme_option('Header Background')): ?>
    	<img alt="Exhibit Splash Image" class="img" src="/files/theme_uploads/<?php echo $exhibitSplash; ?>" />
    <?php endif; ?>
	</div>
</div>
 <!-- End Parallax -->

<!--
<div class="row cofcAccent z-depth-2">
<div class="col s12">
<div class="container">


</div>
</div>
</div>
-->

<div class="row">
<div class="container">


<div class="col m3 s12">

<ul class="show-pages-list">
<h3 class="lightHeader">Menu</h3>
<?php $currentPage = get_current_record('exhibit'); ?>
<?php $pageID = $currentPage->id; ?>
<?php set_exhibit_pages_for_loop_by_exhibit(); ?>
<?php foreach (loop('exhibit_page') as $exhibitPage): ?>
<?php echo exhibit_builder_current_page_summary($exhibitPage, $pageID); ?>
<?php endforeach; ?>
</ul>

<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>

</div>

<div class="col m9 s12">
<h3 class="lightHeader"><?php echo __('About the Exhibit'); ?></h3>
<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
<div class="exhibit-description">
    <?php echo $exhibitDescription; ?>
</div>
<?php endif; ?>
<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
<div class="exhibit-credits">
    <h3 class="lightHeader"><?php echo __('Credits'); ?></h3>
    <p><?php echo $exhibitCredits; ?></p>
</div>
<?php endif; ?>
</div>

</div>
</div>


<?php echo foot(); ?>
