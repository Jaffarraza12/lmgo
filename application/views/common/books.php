<div class="col-sm-12">
    <div class="row" id="content-boxes" style="word-wrap: break-word;">

        <div class="col-md-12">
            <div class="col-md-12" style="padding: 15px;">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th style="width:22%">Book</th>
                            <th style="width:48%">Description</th>
                            <th style="width:20%">Name</th>
                        </thead>
                        <tbody>

                        <?php foreach ($page_content as $content) { ?>

                            <tr>
                                <td>
                                    <?php if ($content->pdf) { ?>
                                        <a class="btn" href="<?php echo base_url()."uploads/pages/pdf/".$content->pdf ?>" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                                        <a class="btn" href="<?php echo base_url()."uploads/pages/pdf/".$content->pdf ?>" download="<?php echo base_url()."uploads/pages/pdf/".$content->pdf ?>"><i class="fa fa-download"></i></a>
                                    <?php } ?>
                                    <button onclick="modalVal(<?php echo $content->cid ?>)" class="btn" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-caret-square-down"></i> More</button>
                                </td>
                                <td><?php echo $content->short_desc ?></td>
                                <td><?php echo $content->title ?></td>
                            </tr>
                        
                        <?php } ?>
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" style="width: calc(100% - 100px)">

                <!-- Modal content-->
                <div class="modal-content">
                    <div id="iframe-here" class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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
    th {
        text-align: right;
    }
    
</style>

<script>
    function modalVal(_qid) {
        document
            .getElementById('iframe-here')
            .innerHTML = "<iframe src='<?php echo base_url() ?>only/" + _qid + "' height='480' width='100%' style='border:none'></iframe>";
    }
</script>