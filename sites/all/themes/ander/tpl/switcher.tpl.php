<div class="loading_icon"></div>
<div id="switch">
    <div class="content-switcher">
        <h6>Color</h6>
        <ul class="color">
            <li><a href="#"  onClick="setActiveStyleSheet('blue'); return false;" class="btn btn-primary" style="background-color:#00cae9">Blue</a></li>
            <li><a href="#"  onClick="setActiveStyleSheet('green'); return false;" class="btn btn-primary" style="background-color:#0DD36F">Green</a></li>
            <li><a href="#"  onClick="setActiveStyleSheet('orange'); return false;" class="btn btn-primary" style="background-color:#ff6029">Orange</a></li>
            <li><a href="#"  onClick="setActiveStyleSheet('yellow'); return false;" class="btn btn-primary" style="background-color:#ffba00">Yellow</a></li>
            <li><a href="#"  onClick="setActiveStyleSheet('red'); return false;" class="btn btn-primary" style="background-color:#ff2323">Red</a></li>
            <li><a href="#"  onClick="setActiveStyleSheet('gray'); return false;" class="btn btn-primary" style="background-color:#3a3a3a">Gray</a></li>
            <li><a href="#"  onClick="setActiveStyleSheet('purple'); return false;" class="btn btn-primary" style="background-color:#9B59B6">Purple</a></li>
            <li><a href="#"  onClick="setActiveStyleSheet('midnight'); return false;" class="btn btn-primary" style="background-color:#34495E">Midnight</a></li>
        </ul>
        <div class="clear"></div>
        <h5 id="hide">Hide Panel</h5>
    </div>
</div>
<div id="show" style="display: block;">
    <div id="setting"></div>
</div>

<script>
	$(document).ready(function() {
	    "use strict";
	    $("#hide, #show").click(function () {
	        if ($("#show").is(":visible")) {
	           
	            $("#show").animate({
	                "margin-left": "-200px"
	            }, 500, function () {
	                $(this).hide();
	            });
	            
	            $("#switch").animate({
	                "margin-left": "0px"
	            }, 500).show();
	        } else {
	            $("#switch").animate({
	                "margin-left": "-200px"
	            }, 500, function () {
	                $(this).hide();
	            });
	            $("#show").show().animate({
	                "margin-left": "0"
	            }, 500);
	        }
	    });                   
	});
</script>