<div class="span6">
                <h3>Video Box</h3>
            </div> <div class="span6 r" style="padding-top:10px; text-align:right;">
                <a class="btn blue icn-only" href="<?php echo base_url()?>index.php/Media/AddVideo?mediaid=<?php echo $mediaid?>"><i class="icon-plus icon-white"></i> ADD NEW VIDEO</a>
            </div>
   
            <div class="row-fluid">
    <div class="span12">
      

    


        <h4>Dimension : 250 x 166</h4>
        <div class="imgGal">
            <input type="hidden" id="url" value="Delete" />
            
            <?php
		        foreach ($videos as $video)
                {
                   
				    echo '<span class="pic"><iframe width="280" height="220" src="'. str_replace(array("http:","watch?v="),array("","embed/"),$video['url']).'" frameborder="0" allowfullscreen></iframe>
<h4 onclick="Main.deleteImgFromAjax(this,' . $video['mdid'] . ', null)" href="javascript:void(0)" style="text-align:center;background:#9e142b;color:#FFF;margin-top:-3px;padding-top:10px;padding-bottom:10px;cursor:pointer;">Delete</h4>

</span>';
                }

            ?>
        </div>

    </div>
</div>
