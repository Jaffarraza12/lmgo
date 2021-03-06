<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3><?php echo $countryName?> Cities</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="AddCity?cid=<?php echo $cid?>"><i class="icon-plus icon-white"></i> ADD NEW CITY</a>
            </div>
        </div>

 <?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

	<div class="tabbable tabbable-custom">
    <div class="tab-content">
        <input type="hidden" value="<?php echo base_url(); ?>index.php/CountryCity/deleteCity" class="url" />
        <?php

        for($i=0; $i<1; $i++)
        {
        $row = $Languages[$i];
        $langId = $row->id;
        $langCode = $row->code;

        if ($row->id==$defaultLang)
            echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
        else
            echo '<div id="tab_' . $langCode . '" class="tab-pane">';
        ?>

        <table class="table table-striped table-hover table-bordered dataTables">
            <thead>
            <tr>
                <th>English Name</th>
                <th>Arabic Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
			$i = 1;
            foreach ($cities as $row)
            {
				$rows = 'row'.$i;?>
                <tr id="<?php echo $rows?>">
                <td><?php echo $row['en_title'] ?></td>
                <td><?php echo $row['ar_title'] ?></td>
               <td>
                <a class="glyphicons no-js edit" href="editCity?cid=<?php echo $row['serial']  ?>"><i></i></a>
				<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Myjava.deleteCountryCity('<?php echo $row['serial']?>','<?php echo $rows?>')">
                <i></i><b></b></a>
                </td>
               <?php ++$i;
           } ?>
            </tbody>
        </table>

    </div>
    <?php } ?>





</div>

</div>

    </div>


</div>
</div>
