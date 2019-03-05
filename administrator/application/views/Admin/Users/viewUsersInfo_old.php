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
                <td><?php echo '<input type="text" name="firstname" class="txtbox" value="'. $users->firstname.'">' . '   ' .'<input type="text" name="lastname" class="txtbox" value="'.$users->lastname.'">' ?></td>
              </tr>
              <tr>
                <td>Gender</td>
                <td><select name="gender">
                                        <option value="male" <?php if($users->gender=='male'){?> selected="selected" <?php }?>>Male</option>
                                        <option value="female" <?php if($users->gender=='female'){?> selected="selected" <?php }?>>Female</option>
                                    </select></td>
              </tr>
               <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="email" size="5" value="<?php echo $users->email; ?>"  /></td>
              </tr>
               <tr>
                <td>Contact</td>
                <td><input type="text" name="contact" id="contact" size="5" value="<?php echo $users->contact; ?>"  /></td>
              </tr>
              <tr>
                <td>Countries</td>
                <td><select name="country">
                                    <?php foreach($countries as $val):
										$select = ($val->serial == $users->country) ? 'selected="selected"' :'';
                                        echo  '<option '.$select .' value="'.$val->serial.'" >'.$val->en_title.'</option> ';		                endforeach;?>
                                      </select></td>
              </tr>
                <tr>
                <td>Date Of Birth</td>
                <td><input type="text" name="dob" id="dob" size="5" value="<?php echo $users->dob; ?>"  /></td>
              </tr>
              <tr>
                <td>Image</td>
                <td><?php if($users->image) { ?><img src="<?php echo 'http://dubazaaro.com/uploads/users/'.$users->image?>" width="auto" height="auto"/><?php } ?>           </td>
              </tr>
              <tr>
                <td>CV</td>
                <td> <a href="<?php echo 'http://dubazaaro.com/uploads/cv/'.$users->resume?>"><?php echo $users->CV; ?></a>      </td>
              </tr>
              <tr>
                <td>Cover Letter</td>
                <td><textarea rows="10" name="cover" id="cover"><?php echo $users->cover?></textarea></td>
              </tr>
              <tr>
                <td>Date of Registration</td>
                <td><?php echo date('M Y D',$users->sts); ?></td>
              </tr>
              <tr><input name="userid" type="hidden" value="<?php echo $users->userid; ?>" />
                <td>User Advertise Limit</td>
                <td><input type="text" name="limit" id="limit" size="5" value="<?php echo $users->limit; ?>" style="width:25px;" /></td>
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


