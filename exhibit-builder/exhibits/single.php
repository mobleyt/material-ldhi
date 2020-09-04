<div class="row exhibit record ">
	<div class="col m3 s12">
    <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail', array('class' => 'circle waves-effect waves-block waves-light center-img max-width'))): ?>
<?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
<?php endif; ?>
    </div>
    <div class="col m9 s12">
    <h5><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h5>
    <p><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true)),50); ?></p>
    </div>
</div>
