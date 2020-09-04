<?php echo head(); ?>
<div class="row cofcAccent z-depth-2">
<div class="container">
<div class="col s12">
        <p id="simple-pages-breadcrumbs"><a href="/">Home</a> &gt; Contact Us</p>
    </div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col s12">
    <h1><?php echo html_escape(get_option('simple_contact_form_contact_page_title')); ?></h1>
<div id="simple-contact">
    <div id="form-instructions">
        <?php echo get_option('simple_contact_form_contact_page_instructions'); // HTML ?>
    </div>
    <?php echo flash(); ?>
    <form name="contact_form" id="contact-form"  method="post" enctype="multipart/form-data" accept-charset="utf-8">

        <fieldset>
        <div class="field">
        <?php echo $this->formLabel('name', 'Your Name: '); ?>
            <div class='inputs'>
            <?php echo $this->formText('name', $name, array('class'=>'textinput')); ?>
            </div>
        </div>
        
        <div class="field">
            <?php echo $this->formLabel('email', 'Your Email: '); ?>
            <div class='inputs'>
                <?php echo $this->formText('email', $email, array('class'=>'textinput'));  ?>
            </div>
        </div>
        
        <div class="field">
          <?php echo $this->formLabel('message', 'Your Message: '); ?>
          <div class='inputs'>
          <?php echo $this->formTextarea('message', $message, array('class'=>'textinput', 'rows' => '10')); ?>
          </div>
        </div>
        
        </fieldset>


        <fieldset>

        <?php if ($captcha): ?>
        <div class="field">
            <?php echo $captcha; ?>
        </div>
        <?php endif; ?>

        <div class="field">
          <?php echo $this->formSubmit('send', 'Send Message'); ?>
        </div>
        
        </fieldset>
    </form>

</div>

</div>
</div>
</div>
<?php echo foot();
