<?php if(!class_exists('raintpl')){exit;}?><div id="slider">
    <div id="top-menu">
        <div class="content">
            <nav class="navbar-collapse collapse" role="navigation">
                <ul class="navbar-nav nav">
                    <?php $counter1=-1; if( isset($menu) && is_array($menu) && sizeof($menu) ) foreach( $menu as $key1 => $value1 ){ $counter1++; ?>

                    <li><a href="/<?php echo $key1;?>"><p><?php echo $value1;?></p></a></li>
                    <?php } ?>

                </ul>
                <div id="search">
                    <div class="input-group stylish-input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-addon">
                            <button type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>  
                        </span>
                    </div>
                </div>
            </nav>
            <div id="hangs">
                <h1><?php echo $sitetitle;?><span style = "display: block;"><?php echo $sitesubtitle;?></span></h1>
            </div>
        </div>
    </div>
</div>
