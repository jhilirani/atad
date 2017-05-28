<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $MetaTitle;?></title>
<?php
	$meta = array(
        array('name' => 'description', 'content' => $MetaDescription),
        array('name' => 'keywords', 'content' =>$MetaKeyWord),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
    );
echo meta($meta); ?>
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
<link href="<?php echo $SiteCSSURL?>bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo SiteResourcesURL;?>plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="<?php echo $SiteCSSURL?>cubeportfolio.min.css" rel="stylesheet" />
<link href="<?php echo $SiteCSSURL?>style.css" rel="stylesheet" />


<!-- Theme skin -->
<link id="t-colors" href="<?php echo SiteResourcesURL;?>skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="<?php echo SiteResourcesURL;?>bodybg/bg1.css" rel="stylesheet" type="text/css" />

</head>