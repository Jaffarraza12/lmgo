<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
                <h3>Jobs</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="Add"><i class="icon-plus icon-white"></i> ADD NEW JOB</a>
            </div>
        </div>
     

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

<div class="tabbable tabbable-custom">
    <div class="tab-content">

        <input type="hidden" value="<?php echo base_url().'index.php/Jobs/JobDelete'; ?>" class="url"  />
        <input type="hidden" value="<?php echo base_url().'index.php/Ads/status/'; ?>" class="urlforchangestatus"  />
        

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

        <table class="table">
            <thead>
            <tr >
               <th width="5%"><span style="text-align:right;" > <select name="statuschng" id="statuschng" style="width:100px;" onchange="Myjava.ChngeStat(this.value);">
                	<option >Change Status</option>
                    <option value="1">Active</option>
                    <option value="0">Disabled</option>
                    
                    
                </select></span><span class="selectall"><input  name="" type="checkbox" value="" class="adveridall" onchange="Myjava.CheckAll(this)" /></span></th>
                <th width="40%">Title </th>
                <th width="20%">Ads Posted By </th>
                <th width="20%">Ads Posted On </th>
                <th width="20%">Actions</th>
                
            </tr >
            </thead>
            <tbody>
            <?php
			
			$d = 0;
            foreach ($view as $row)
            {
				
				echo '<tr id="row'.$d.'" >';
                echo '<td><input name="attributeid[]" type="checkbox" value="'.$row->job_id.'" class="adverid" /></td>';
                echo '<td>' . $row->title. '</td>';
                echo '<td>' . $row->account_name.'</td>';
                echo '<td>' . date('d M Y',$row->sts). '</td>';
                echo '<td>';
                echo '<a  class="glyphicons no-js edit" href="'.base_url().'index.php/Jobs/Edit?id='. $row->job_id;
                echo '"><i></i></a>';
                echo '<a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Myjava.deleteJob('.$row.$d.','.$row->job_id.')"><i></i><b>' . $row->cid . '</b></a>';
				echo '<a title="send notification" class="glyphicons no-js envelope" href="javascript:void(0)" onclick="Main.deleteAds('.$row.$d.','.$row->advertiseid.')"><i></i><b>' . $row->cid . '</b></a>';
			    echo '</td>';
                echo '</tr>';
                ++$d;
            }
            ?>
            <tr>
            	<td colspan="5">  <?php if($paging){  echo '<div class="paging">'.$paging.'</div>'; } ?>  </td>
            
            </tr>
            </tbody>
        </table>

    </div>
    <?php } ?>





</div>

</div>

    </div>


</div>
