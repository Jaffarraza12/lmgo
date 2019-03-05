<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>Users</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;display: none">
                <a class="btn blue icn-only" href="Add"><i class="icon-plus icon-white"></i> ADD NEW APPLICANT</a>
            </div>
            
        </div>

 <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<div class="tabbable tabbable-custom">
    <div class="tab-content">
        <input type="hidden" value="<?php echo base_url(); ?>index.php/Users/deleteUser" class="url" />
        <table class="table table-striped table-hover table-bordered dataTables">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Industry</th>
                    <th>Group</th>
                    <th> Date Join</th>
                    <th>Action</th>
                </tr>
            </thead> 
            <tbody>
            <?php
			$i = 1;
            foreach ($users as $row)
            {
				$rows = 'row'.$i;?>
                <tr id="<?php echo $rows?>">
                <td><?php echo $row['firstname'] .' '. $row['lastname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['industry'] ?></td>
                <td><?php echo ($row['group'] ) ?  $row['group'] : 'No group assign' ?></td>
                <td><?php //echo date('d M  Y',$row['sts']); ?></td>
                <td><a href="<?php echo base_url().'index.php/Users/viewUsersInfo?id='.$row['user_id']?>" class="glyphicons no-js edit"><i></i></a>
                 <a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Myjava.deleteUser('<?php echo $row['user_id'] ?>','<?php echo $rows?>')"><i></i><b><?php echo $row['name'] . $row['lastname'] ?></b></a>
                </td>
               <?php ++$i;
           } ?>
            </tbody>
        </table> 

    </div>
</div>

</div>

    </div>


</div>
</div>
