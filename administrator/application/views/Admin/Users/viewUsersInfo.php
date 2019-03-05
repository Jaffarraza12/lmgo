<div class="row-fluid">
<div class="span12">
<h3>Webiste Setting</h3>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<!-- BEGIN FORM-->
<form action="EditUser" method="POST" class="form-horizontal"  enctype="multipart/form-data">


<?php
echo form_hidden('pageSubmit', 'true');

?>


<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
           User Info
        </div>
    </div>
    <div class="portlet-body">

        <div class="row-fluid">
        
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td>Name</td>
                <td><?php echo $users->firstname. ' ' .$users->lastname ?></td>
              </tr>
              <tr>
                <td>Gender</td>
                <td> <?php if($users->gender=='male'){ echo 'Male'; }?>
                    <?php if($users->gender=='female'){ echo 'female';}?>
                </td>
              </tr>
               <tr>
                <td>Email</td>
                <td><?php echo $users->email; ?></td>
              </tr>
               <tr>
                <td>Contact</td>
                <td><?php echo $users->cell; ?></td>
              </tr>
              <tr>
                    <td>Industry</td>
                    <td><?php echo $users->industry; ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td><?php echo $users->country ?></td>
              </tr>
                <tr>
                <td>Date Of Birth</td>
                <td><?php echo date('d m Y',$users->dob); ?></td>
              </tr>
                <?php if($user_pic) { ?>
              <tr>
                <td>Image</td>
                <td><img src="<?php echo '../../../uploads/users/'.$user_pic?>" width="100" height="100"/>      </td>
              </tr>
                <?php } ?>
                <?php if($user_cv) { ?>
                <tr>
                <td>CV</td>
                <td> <a href="<?php  echo '../../../uploads/cv/'.$user_cv?>">Resume</a>      </td>
              </tr>
                <?php } ?>
              <tr>
                <td>Date of Registration</td>
                <td><?php echo date(' m d Y',$users->sts); ?></td>
              </tr>
              <tr><input name="userid" type="hidden" value="<?php echo $users->user_id; ?>" />
                <td>User Group</td>
                <td><select name="group_id" id="group_id" >
                        <option value="0">No Group</option>
                        <?php foreach($groups as $group){
                            $select = ($users->group_id == $group->group_id ) ? 'selected="selected"' : '' ;
                            echo '<option '.$select.' value="'.$group->group_id.'">'.$group->group_name .' ('.$group->industry.')' .'</option>';

                        }?>

                </select> </td>
              </tr>
              
              
            </table>

        </div>

    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn blue" name="Submit" value="1" /><i class="icon-ok"></i> Save</button>
</div>


</form>
<!-- END FORM-->

</div>
</div>


