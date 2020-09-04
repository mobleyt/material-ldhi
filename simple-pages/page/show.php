<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;
echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>

<div class="row cofcAccent z-depth-2">
<div class="container">
<div class="col s12">
    <?php if (!$is_home_page): ?>
    <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p>
    <?php endif; ?>
</div>
</div>
</div>

<div class="container primary-content">
<div class="row">
<div class="col s12">
<div id="primary">
    <h2><?php echo metadata('simple_pages_page', 'title'); ?></h2>
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
    ?>
</div>
</div>
</div>
</div>

<?php echo foot(); ?>