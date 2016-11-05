<?php if(!class_exists('raintpl')){exit;}?><div id="une">
    <div class="content">
        <div class="subtitle">
            <h1>A LA UNE</h1>
        </div>
        <hr class="hr-subtitle"/>
        <div class="illustration">
            <div class="date"><?php echo $articles["0"]->getDate();?></div>
            <img src="Views/common/<?php echo $articles["0"]->getUrl();?>" width="580" height="500" alt="" />
        </div>
        <div class="text">
            <?php echo $articles["0"]->getText();?>

        </div>

    </div>
</div>