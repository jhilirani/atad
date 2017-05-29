<?php echo $html_heading;?><?php echo $header;?>
<?php echo $bread_crumb;?>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3><?php echo $CmsData[0]->Title;?></h3>
                <div class="row"><?php echo $CmsData[0]->Body;?></div>
            </div>
        </div>
    </div>
    </section>
<?php echo $footer;?>