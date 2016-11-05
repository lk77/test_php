<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Photo - index</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="Views/index/../../Resources/css/style.css" media="screen" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="Views/index/../../Resources/css/parallax.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="Views/index/../../Resources/css/hexagon.css" type="text/css" media="screen"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis+Light&v2' rel='stylesheet' type='text/css'/>

    </head>
    <body>
        <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "common/header" );?>

        <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "common/slider" );?>

        <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "common/une" );?>

        <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "common/passion" );?>

        <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "common/actualite" );?>

        <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "common/jeffries" );?>

        <?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "common/footer" );?>

    </body>
</html>

