<div class="col-sm-12">
    <div class="row" id="content-boxes" style="word-wrap: break-word;">

        <div class="col-md-12">
            <div class="col-md-12" style="padding: 15px;">

                <?php if($lang == 1) { ?>

                <h4 style="text-align:center">إصدارات مجلة عجمان للدراسات والبحوث</h4>

                <?php } else { ?>
                
                <h4 style="text-align:center">Abstracts Of Ajman Journal Of Studies and Research</h4>
                
                <?php } ?>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>

                        <?php foreach($page_content as $content) { ?>
                        <?php if ($lang == 1) { ?>

                        <tr>
                            <td><?php if(isset($content->year)) { echo 'م'.$content->year; } ?></td>
                            <td>
                                <ul style="margin:0;">
                                    <?php foreach(json_decode($content->pdf_ids) as $key => $value) { ?>
                                    <li>
                                        <a class="btn btn-link" href="<?php echo base_url()."uploads/pdf/".$value ?>" target="_blank" style="padding:0;text-decoration:underline;">
                                            <?php echo $value ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td>
                                <ul style="margin:0;">
                                    <?php foreach(json_decode($content->pdf_ids2) as $key => $value) { ?>
                                    <li>
                                        <a class="btn btn-link" href="<?php echo base_url()."uploads/pdf/".$value ?>" target="_blank" style="padding:0;text-decoration:underline;">
                                            <?php echo $value ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td><?php echo $content->title ?></td>
                        </tr>

                        <?php } else { ?>

                        <tr>
                            <td><?php echo $content->title ?></td>
                            <td>
                                <ul style="margin:0;">
                                    <?php foreach(json_decode($content->pdf_ids) as $key => $value) { ?>
                                    <li>
                                        <a class="btn btn-link" href="<?php echo base_url()."uploads/pdf/".$value ?>" target="_blank" style="padding:0;text-decoration:underline;">
                                            <?php echo $value ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td>
                                <ul style="margin:0;">
                                    <?php foreach(json_decode($content->pdf_ids2) as $key => $value) { ?>
                                        <li>
                                            <a class="btn btn-link" href="<?php echo base_url()."uploads/pdf/".$value ?>" target="_blank" style="padding:0;text-decoration:underline;">
                                                <?php echo $value ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td><?php if(isset($content->year)) { echo $content->year; } ?></td>
                        </tr>

                        <?php } ?>
                        <?php } ?>
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    #content-boxes div.col-md-12 div.col-md-12 {
        background-color: #FFFFFF;
        min-height: 100px;
    }
</style>