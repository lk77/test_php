<?php if(!class_exists('raintpl')){exit;}?><div id="jeffries">
    <div class="content">
        <div class="subtitle">
            <h1><?php echo $imagestitle;?></h1>
        </div>
        <hr class="hr-subtitle"/>
        <ul id="hexGrid">
            <?php $counter1=-1; if( isset($images) && is_array($images) && sizeof($images) ) foreach( $images as $key1 => $value1 ){ $counter1++; ?>

            <li class="hex">
                <a class="hexIn" href="">
                    <img src='<?php echo $value1->getUrl();?>' alt="">
                    <h1><?php echo $value1->getTitle();?></h1>
                    <p><?php echo $value1->getText();?></p>
                </a>
            </li>
            <?php } ?>

        </ul>
    </div>
</div>