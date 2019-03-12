<div class="row-fluid">
    <div class="span12">
        <h3>Edit Member</h3>

        <!-- BEGIN FORM-->
        <form action="EditMember" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="tabbable tabbable-custom">
                <div class="tab-content">
                    <div clas="portlet box">
                        <div class="portlet ">

                            <input type="hidden"  name="id" value="<?php echo $record->id ?>"  />
                            <div class="portlet-body">
                                <div class="control-group <?php echo ($error['name']) ? 'error' : '' ?>">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <input type="text" name="name"  value="<?php echo  ($name) ? $name  :  $record->name ?>" placeholder="Please enter Title of the Video" class="span6 m-wrap popovers" data-original-title="Videos" data-content="Enter Videos of this page without space" data-trigger="hover" />
                                        <span class="help-inline">Name</span>
                                        <?php if($error['name']) {
                                            echo '<span class="alert alert-danger">'.$error['name'].'</span>';
                                        } ?>
                                    </div>
                                </div>
                                <div class="control-group <?php echo ($error['program']) ? 'error' : '' ?>">
                                    <label class="control-label">Program</label>
                                    <div class="controls">
                                        <input type="text" name="program"  value="<?php echo  ($program) ? $program  :  $record->program ?>" placeholder="Please enter Title of the Video" class="span6 m-wrap popovers" data-original-title="Videos" data-content="Enter Videos of this page without space" data-trigger="hover" />
                                        <span class="help-inline">Program</span>
                                        <?php if($error['name']) {
                                            echo '<span class="alert alert-danger">'.$error['name'].'</span>';
                                        } ?>
                                    </div>
                                </div>


                                <div class="control-group <?php echo ($error['card_number']) ? 'error' : '' ?>">
                                    <label class="control-label">Card Number</label>
                                    <div class="controls">
                                        <input type="int" name="card_number"  value="<?php echo  ($card_number) ? $card_number  :  $record->card_number ?>" placeholder="Please enter Title of the Video" class="span6 m-wrap popovers" data-original-title="Videos" data-content="Enter Videos of this page without space" data-trigger="hover" />
                                        <span class="help-inline">Program</span>
                                        <?php if($error['card_number']) {
                                            echo '<span class="alert alert-danger">'.$error['card_number'].'</span>';
                                        } ?>
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="img" class="span6 m-wrap popovers" data-original-title="Voice" data-content="Select Audio Format in mp3" data-trigger="hover" />
                                        <span class="help-inline">Upload Image format</span>
                                    </div>
                                </div>

                                <div class="control-group <?php echo ($error['month']) ? 'error' : '' ?>">
                                    <label class="control-label">Month</label>
                                    <div class="controls">
                                        <select  name="month" class="span6 m-wrap popovers" >
                                            <option <?php echo ($month == 'Jan' ||   $record->month == 'Jan') ? 'selected="selected"' :''  ?> value="Jan">Jan</option>
                                            <option <?php echo ($month == 'Feb' ||   $record->month == 'Feb') ? 'selected="selected"' :''  ?> value="Feb">Feb</option>
                                            <option <?php echo ($month == 'Mar' ||   $record->month == 'Mar') ? 'selected="selected"' :''  ?> value="Mar">Mar</option>
                                            <option <?php echo ($month == 'Api' ||   $record->month == 'Api') ? 'selected="selected"' :''  ?> value="Api">Api</option>
                                            <option <?php echo ($month == 'May' ||   $record->month == 'May') ? 'selected="selected"' :''  ?> value="May">May</option>
                                            <option <?php echo ($month == 'Jun' ||   $record->month == 'Jun') ? 'selected="selected"' :''  ?>  value="Jun">Jun</option>
                                            <option <?php echo ($month == 'Jul' ||   $record->month == 'Jul') ? 'selected="selected"' :''  ?>  value="Jul">Jul</option>
                                            <option <?php echo ($month == 'Aug' ||   $record->month == 'Aug') ? 'selected="selected"' :''  ?>  value="Aug">Aug</option>
                                            <option <?php echo ($month == 'Sep' ||   $record->month == 'Sep') ? 'selected="selected"' :''  ?>  value="Sep">Sep</option>
                                            <option <?php echo ($month == 'Oct' ||   $record->month == 'Oct') ? 'selected="selected"' :''  ?>  value="Oct">Oct</option>
                                            <option <?php echo ($month == 'Nov' ||   $record->month == 'Nov') ? 'selected="selected"' :''  ?>  value="Nov">Nov</option>
                                            <option <?php echo ($month == 'Dec' ||   $record->month == 'Dec') ? 'selected="selected"' :''  ?>  value="Dec">Dec</option>
                                        </select>

                                        <span class="help-inline">Program</span>
                                        <?php if($error['card_number']) {
                                            echo '<span class="alert alert-danger">'.$error['card_number'].'</span>';
                                        } ?>
                                    </div>
                                </div>


                                <div class="control-group <?php echo ($error['year']) ? 'error' : '' ?>">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <select  name="year" class="span6 m-wrap popovers" >
                                            <option <?php echo ($year == '1990' ||   $record->year  == 1990) ? 'selected="selected"' :''  ?>  value="1990">1990</option>
                                            <option <?php echo ($year == '1991' ||   $record->year  == 1991) ? 'selected="selected"' :''  ?> value="1991">1991</option>
                                            <option <?php echo ($year == '1992' ||   $record->year  == 1992) ? 'selected="selected"' :''  ?> value="1992">1992</option>
                                            <option <?php echo ($year == '1993' ||   $record->year  == 1993) ? 'selected="selected"' :''  ?> value="1993">1993</option>
                                            <option <?php echo ($year == '1994' ||   $record->year  == 1994) ? 'selected="selected"' :''  ?>value="1994">1994</option>
                                            <option <?php echo ($year == '1995' ||   $record->year  == 1995) ? 'selected="selected"' :''  ?> value="1995">1995</option>
                                            <option <?php echo ($year == '1996' ||   $record->year  == 1996) ? 'selected="selected"' :''  ?> value="1996">1996</option>
                                            <option <?php echo ($year == '1997' ||   $record->year  == 1997) ? 'selected="selected"' :''  ?> value="1997">1997</option>
                                            <option <?php echo ($year == '1998' ||   $record->year  == 1998) ? 'selected="selected"' :''  ?> value="1998">1998</option>
                                            <option <?php echo ($year == '1999' ||   $record->year  == 1999) ? 'selected="selected"' :''  ?> value="1999">1999</option>
                                            <option <?php echo ($year == '2000' ||   $record->year  == 2000) ? 'selected="selected"' :''  ?> value="2000">2000</option>
                                            <option <?php echo ($year == '2001' ||   $record->year  == 2001) ? 'selected="selected"' :''  ?>  value="2001">2001</option>
                                            <option <?php echo ($year == '2002' ||   $record->year  == 2002) ? 'selected="selected"' :''  ?>  value="2002">2002</option>
                                            <option <?php echo ($year == '2003' ||   $record->year  == 2003) ? 'selected="selected"' :''  ?>  value="2003">2003</option>
                                            <option <?php echo ($year == '2004' ||   $record->year  == 2004) ? 'selected="selected"' :''  ?>  value="2004">2004</option>
                                            <option <?php echo ($year == '2005' ||   $record->year  == 2005) ? 'selected="selected"' :''  ?>  value="2005">2005</option>
                                            <option <?php echo ($year == '2006' ||   $record->year  == 2006) ? 'selected="selected"' :''  ?>  value="2006">2006</option>
                                            <option <?php echo ($year == '2007' ||   $record->year  == 2007) ? 'selected="selected"' :''  ?>  value="2007">2007</option>
                                            <option <?php echo ($year == '2008' ||   $record->year  == 2008) ? 'selected="selected"' :''  ?>  value="2008">2008</option>
                                            <option <?php echo ($year == '2009' ||   $record->year  == 2009) ? 'selected="selected"' :''  ?>  value="2009">2009</option>
                                            <option <?php echo ($year == '2010' ||   $record->year  == 2010) ? 'selected="selected"' :''  ?>  value="2010">2010</option>
                                            <option <?php echo ($year == '2011' ||   $record->year  == 2011) ? 'selected="selected"' :''  ?>  value="2011">2011</option>
                                            <option <?php echo ($year == '2012' ||   $record->year  == 2012) ? 'selected="selected"' :''  ?>  value="2012">2012</option>
                                            <option <?php echo ($year == '2013' ||   $record->year  == 2013) ? 'selected="selected"' :''  ?>  value="2013">2013</option>
                                            <option <?php echo ($year == '2014' ||   $record->year  == 2014) ? 'selected="selected"' :''  ?>  value="2014">2014</option>
                                            <option <?php echo ($year == '2015' ||   $record->year  == 2015) ? 'selected="selected"' :''  ?>  value="2015">2015</option>
                                            <option <?php echo ($year == '2016' ||   $record->year  == 2016) ? 'selected="selected"' :''  ?>  value="2016">2016</option>
                                            <option <?php echo ($year == '2017' ||   $record->year  == 2017) ? 'selected="selected"' :''  ?>  value="2017">2017</option>
                                            <option <?php echo ($year == '2018' ||   $record->year  == 2018) ? 'selected="selected"' :''  ?>  value="2018">2018</option>
                                            <option <?php echo ($year == '2019' ||   $record->year  == 2019) ? 'selected="selected"' :''  ?>  value="2019">2019</option>
                                        </select>

                                        <span class="help-inline">Program</span>
                                        <?php if($error['card_number']) {
                                            echo '<span class="alert alert-danger">'.$error['card_number'].'</span>';
                                        } ?>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="button" class="btn blue" onclick="FormValidation.validate(this)"><i class="icon-ok"></i> Save</button>
                                    <a href="<?php echo base_url()."index.php/Voice" ?>" class="btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                document.getElementById("lblSmallImage").innerHTML = "Dimension for Small Image : 70 x 92";
                document.getElementById("secDate").style.display = "block";
            </script>


        </form>
        <!-- END FORM-->

    </div>
</div>
