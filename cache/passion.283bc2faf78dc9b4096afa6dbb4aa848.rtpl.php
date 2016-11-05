<?php if(!class_exists('raintpl')){exit;}?><div id="passion">
    <div class="parallax-viewport" id="parallax">
        <div class="parallax-layer">
            <img class="parallax-layer" src="Views/common/../../Resources/images/new-york-city_v4.jpg" style="width:3000px; height:568px;"/>
        </div>
        <div class="parallax-layer">
            <img class="parallax-layer" src="Views/common/../../Resources/images/blur_v2.png" style="width:3232px; height:877px;opacity: 0.8;"/>
        </div>
        <div class="parallax-layer">
            <img class="parallax-layer" src="Views/common/../../Resources/images/passionne.png" style="width:609px; height:109px;"/>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
    <script type="text/javascript" src="Views/common/../../Resources/js/jparallax-master/js/jquery.parallax.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            // Declare parallax on layers
            jQuery('.parallax-layer').parallax({mouseport: jQuery("#parallax")});//, {xparallax: "false"}, {yparallax: "false"},{xorigin:"center"},{yorigin:"center"}--
        });
    </script>
</div>