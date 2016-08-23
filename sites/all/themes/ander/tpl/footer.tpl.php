<?php 
global $base_url;

?>
<div id="footer" class="" data-animation-target="21">
    <div class="col_footer">
        <?php print render($page['footer_col_1']);?>
    </div>
    <div class="col_footer middle">
        <?php print render($page['footer_col_2']);?>
    </div>
    <div class="col_footer">
        <?php print render($page['footer_col_3']);?>
    </div>
    <div class="clear"></div>
</div>
<div id="subfooter">
    <div class="copyright"><?php print theme_get_setting('footer_copyright_message','ander'); ?></div> 
    <div class="by_author">Pixel & Code by <a href="#">Admin</a></div><div class="clear">
    </div>
</div>
