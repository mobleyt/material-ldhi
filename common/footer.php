<!-- End Main Content Wrap -->
</div>
  
  <footer class="page-footer red darken-5">
  <div class="row">
  <div class="col s12">
  
    <div class="row container">
    <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
    </div>
    
    <div class="row container center-align">
      <p><?php echo get_theme_option("Footer Text"); ?></p>
    </div>

  </div>
  </div>
  </footer>

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a1ed9aa38a778e0"></script> 
<script>
jQuery(document).ready(function(){
      jQuery('.parallax').parallax();
      jQuery('.button-collapse').sideNav();
      jQuery('.collapsible').collapsible();
      jQuery('.modal').modal();
});
</script>
<!--
<script>
$.featherlight.prototype.afterContent = function() {
  var caption = this.$currentTarget.find('img').attr('alt');
  this.$instance.find('.caption').remove();
  $('<div class="feather-caption">').text(caption).appendTo(this.$instance.find('.featherlight-content'));
};
</script>
-->
  </body>
</html>



