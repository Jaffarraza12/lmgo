<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>Media Album</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="AddAlbum"><i class="icon-plus icon-white"></i> ADD NEW ALBUM</a>
            </div>
        </div>

 <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<div class="tabbable tabbable-custom">

  <ul class="nav nav-tabs">
  	<li class="active"><a data-toggle="tab" href="#tab1">Image Album</a></li>
    <li><a data-toggle="tab" href="#tab2">Video Album</a></li>
  </ul> 
   <div class="tab-content">
  	<div class="tab-pane active" id="tab1"> 
          <input type="hidden" value="<?php echo base_url(); ?>index.php/Media/deleteAlbum" class="url" />

        <table class="table table-striped table-hover table-bordered dataTables">
            <thead>
            <tr>
                <th>Title</th>
                <th>Total Images</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
			$i = 1;
            foreach ($arrMedia as $row)
            {
				$rows = 'row'.$i;?>
                <tr id="<?php echo $rows?>">
                <td><?php echo $row->eng_title ?></td>
                <td><?php echo $row->totalimages ?></td>
               <td>
                 <a class="glyphicons no-js circle_plus" href="Add?id=<?php echo $row->mediaid  ?>"><i></i></a>
                <a class="glyphicons no-js edit" href="EditAlbum?id=<?php echo $row->mediaid  ?>"><i></i></a>
				<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Myjava.deleteAlbum('<?php echo $row->mediaid  ?>','<?php echo $rows?>')">
                <i></i><b></b></a>
                </td>
               <?php ++$i;
           } ?>
            </tbody>
        </table>

    </div>
    
    <div class="tab-pane" id="tab2"> 
              

   

        <input type="hidden" value="<?php echo base_url(); ?>index.php/Owners/delete" class="url" />

       

        <table class="table table-striped table-hover table-bordered dataTables">
            <thead>
            <tr>
                <th>Title</th>
                <th>Total Videos</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
			$i = 1;
            foreach ($arrVideo as $row)
            {
				$ros = 'row'.$i;?>
                <tr id="<?php echo $ros?>">
                <td><?php echo $row->eng_title ?></td>
                <td><?php echo $row->totalimages ?></td>
               <td>
                 <a class="glyphicons no-js circle_plus" href="VideoBox?id=<?php echo $row->mediaid  ?>"><i></i></a>
                <a class="glyphicons no-js edit" href="EditAlbum?id=<?php echo $row->mediaid  ?>"><i></i></a>
				<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Myjava.deleteAlbum('<?php echo $row->mediaid  ?>','<?php echo $ros?>')">
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
</div>
