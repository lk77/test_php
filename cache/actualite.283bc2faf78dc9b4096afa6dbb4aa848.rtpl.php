<?php if(!class_exists('raintpl')){exit;}?><div id="actualite">
    <div class="content">
        <div class="subtitle">
            <h1>ACTUALITÉS</h1>
        </div>
        <hr class="hr-subtitle"/>
        <?php $counter1=-1; if( isset($articles) && is_array($articles) && sizeof($articles) ) foreach( $articles as $key1 => $value1 ){ $counter1++; ?>

        <?php if( $value1->getId() > 1 ){ ?>

        <div class="illustration">
            <img src='<?php echo $value1->getUrl();?>' width="560" height="420" alt="" />
            <div class="date"><?php echo $value1->getDate();?></div>
            <div class="tagname"><?php echo $value1->getCategory();?></div>
            <div class="title"><?php echo $value1->getTitle();?></div>
            <div class="text"><?php echo $value1->getText();?></div>
            <div class="more"><a href="">LIRE PLUS</a></div>
        </div>
        <?php } ?>

        <?php } ?>

    </div> 
</div>