<?php //pre($rs);die;?>
<div class="row text-center">
    <h3> Search Result with "<?php echo $searchData;?>"</h3>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-hover table-striped">
            <thead>
                <tr>
                    <th>SL No</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Belt</th>
                    <th>Belt Promotion Year</th>
                    <th>Father Name</th>
                    <th>Class Name</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;foreach($rs as $k => $v):?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $v->name?></td>
                    <td><?php echo  $v->age?></td>
                    <td><?php echo $v->belt?></td>
                    <td><?php echo $v->belt_year?></td>
                    <td><?php echo $v->father?></td>
                    <td><?php echo $v->class?></td>
                    <td>
                        <?php if(file_exists(ResourcesPath.'student/'.$v->photo)){?>
                        <img src="<?php echo SiteResourcesURL.'student/'.$v->photo?>" width="70px" alt="<?php echo $v->name?>" title="<?php echo $v->name?>">
                        <?php }else{?>
                        <img src="<?php echo SiteResourcesURL.'student/demo.png'?>" width="70px" alt="<?php echo $v->name?>" title="<?php echo $v->name?>">
                        <?php }?>
                    </td>
                </tr>
                <?php $i++;endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
