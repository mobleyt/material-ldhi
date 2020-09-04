<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

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

<h5 class="lightHeader black-text">Current Page: <?php echo metadata('exhibit', 'title'); ?></h5>

</div>
</div>
</div>
-->

<!--
<div class="row cofcAccent z-depth-2">
<div class="col s12">
<div class="container">

<div class="col s12">
<ul class="collapsible cofcAccent" data-collapsible="accordion">
<li>
<div class="collapsible-header active cofcAccent menuHeader lightHeader"><i class="material-icons">menu</i>Exhibit Menu</div>
<div class="collapsible-body z-depth-2 ">
<h3 class="lightHeader"><?php echo __('Exhibit Menu'); ?></h3>

<?php $currentPage = get_current_record('exhibit_page'); ?>
<?php $pageID = $currentPage->id; ?>
<?php if ($exhibit->getPagesCount() > 0): ?>

<ul class="show-pages-list">
<?php set_exhibit_pages_for_loop_by_exhibit(); ?>
<?php foreach (loop('exhibit_page') as $exhibitPage): ?>
<?php echo exhibit_builder_current_page_summary($exhibitPage, $pageID); ?>
<?php endforeach; ?>
</ul>

<?php endif; ?>

</div>
</li>
</ul>
</div>

</div>
</div>
</div>
-->

<div class="row">
<div class="col s12">
<div class="container">

<div class="col m3 s12">

<ul class="show-pages-list">
<h3 class="lightHeader">Menu</h3>

<?php echo exhibit_builder_link_to_exhibit($exhibit = null, $text = 'Exhibit Home', $props = array(), $exhibitPage = null); ?>
<?php set_exhibit_pages_for_loop_by_exhibit(); ?>
<?php foreach (loop('exhibit_page') as $exhibitPage): ?>
<?php echo exhibit_builder_current_page_summary($exhibitPage, $pageID); ?>
<?php endforeach; ?>
</ul>

<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>

</div>

<div class="col m9 s12">
<?php $currentPage = get_current_record('exhibit_page'); ?>
<?php $pageID = $currentPage->id; ?>
<?php set_current_record('exhibit_page', $exhibit_page); ?>
<h3 class="lightHeader"><?php echo metadata('exhibit_page', 'title'); ?></h3>
<div id="exhibit-blocks">
    <?php exhibit_builder_render_exhibit_page(); ?>
</div>
</div>

<div id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?>
</div>
</div>
</div>
</div>


<?php echo foot(); ?>
