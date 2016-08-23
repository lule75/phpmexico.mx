<?php 
global $base_url;

$class_header = 'transparent_menu';
if(arg(0) == 'node') {
    $node = node_load(arg(1));
    if($node->type == 'homepages' && $node->field_style_header['und'][0]['value'] == 1 ) {
        $class_header = 'white_menu';
    }
}
?>

<header class="<?php print $class_header; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="logo">
                    <a href="#top"><img src="<?php print $logo; ?>" alt="logo"></a>
                </div>
                <div id="logo_dark">
                    <?php print render($page['logo_dark']);?>
                </div>
                <ul class="mobile_nav_trigger">
                    <li><a href="#responsive_nav" class="menu_trigger"><i class="fa fa-bars fa-2x"></i></a></li>
                </ul>
                <?php print render($page['header_social']);?>
                <?php print render($page['main_menu']);?>
            </div>
        </div>
    </div>
    <div class="responsive_nav">
        <div class="mobileAreaMenu">
            <?php print render($page['mobile_menu']);?>
        </div>
    </div>
</header>
