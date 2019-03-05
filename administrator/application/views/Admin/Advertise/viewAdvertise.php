<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>Advertisement by <?php echo $username?></h3>
            </div>
        </div>
 <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<div class="tabbable tabbable-custom">
    <div class="tab-content">
        <input type="hidden" value="<?php echo base_url(); ?>index.php/Advertise/deleteAds" class="url" />
        <table class="table table-striped table-hover table-bordered dataTables">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Country - City</th>
                    <th>Phone</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead> 
            <tbody>
            <?php
			$i = 1;
            foreach ($advertise as $row)
            {
				$rows = 'row'.$i;?>
                <tr id="<?php echo $rows?>">
                <td><?php echo $row['title']?> </td>
                <td><?php echo $row['countryName'] ?> - <?php echo $row['cityName'] ?></td>
                <td><?php echo $row['contact']?> </td>
                <td>08/02/2014</td>
                <td>
                <a class="glyphicons no-js edit" href="editUsers?userid=<?php echo $row['userid']  ?>"><i></i></a>
				<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Myjava.deleteUsers('<?php echo $row['userid']?>','<?php echo $rows?>')">
                <i></i><b></b></a>
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
