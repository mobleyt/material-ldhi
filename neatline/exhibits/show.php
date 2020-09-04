<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<?php echo head(array(
  'title' => nl_getExhibitField('title'),
  'bodyclass' => 'neatline show'
)); ?>

<div class="container">
<div class="row">
<div class=" col s12">
<!-- Exhibit title: -->
<h2><?php echo nl_getExhibitField('title'); ?></h2>

<?php echo nl_getNarrativeMarkup(); ?>

<!-- "View Fullscreen" link: -->
<?php echo nl_getExhibitLink(
  null, 'fullscreen', __('View Fullscreen'), array('class' => 'nl-fullscreen')
); ?>

</div>
</div>
</div>

<div class="row">
<div class="col s12">
<!-- Exhibit and description : -->
<?php echo nl_getExhibitMarkup(); ?>
</div>
</div>

<?php echo foot(); ?>
