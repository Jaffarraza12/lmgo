<h1 class="mainhead"><?php echo $text_main_heading ?></h1>
<?php $config->render(array('widget/featuredbox')) ?>
<?php //$config->render(array('common/slideshow')) ?>

<div class="content">
<?php $config->render(array('common/left')) ?>

<div class="rightcon">
        <?php $config->render(array('common/slideshow2')) ?>
    
    	<?php $config->render(array('widget/quadproductgrid')) ?>
        
    	<div class="sepattach" ></div>
   
        <div class="container-sep"></div>
       
       <?php $config->render(array('widget/classifiedlinks')) ?>
        <div class="clear"></div>
    </div>

</div>
</div>
<div class="clear"></div>
      
