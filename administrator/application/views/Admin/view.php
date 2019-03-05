<link href="<?php echo base_url(); ?>assets/css/application.css" rel="stylesheet"/>

<style>body.dragging, body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        opacity: 0.5;
        z-index: 2000;
    }

    ol.example li.placeholder {
        position: relative;
        /** More li styles **/
    }
    ol.example li.placeholder:before {
        position: absolute;
        /** Define arrowhead **/
    }</style>

<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
           <div class="span6">
                <h3>Menu View</h3>
            </div>
            <div class="span6 r" style="padding-top:10px;">
                <a class="btn blue icn-only" href="Add"> ADD NEW MENU</a>
            </div>
        </div>

<?php $this->load->view("Admin/common/breadcrumb.php"); ?>
<?php $this->load->view("Admin/common/status.php"); ?>

        <div class="tabbable tabbable-custom">
    <?php $this->load->view("Admin/common/language_bar.php");?>

    <div class="tab-content">

        <?php
        foreach ($Languages as $row) {
            $langId = $row->id;
            $langCode = $row->code;
            if ($row->id == $defaultLang) {
                echo '<div id="tab_' . $langCode . '" class="tab-pane active">';
            } else {
                echo '<div id="tab_' . $langCode . '" class="tab-pane">';
            }
            echo '<div id="noti_110_'.$langCode.'" class="alert alert-success" style="display:none;"></div>';
            echo '<div class="clearfix"></div>';
            echo  '<div class="span8">';
            echo  '<ol class="nested_with_switch_'.$langCode.' serialize_'.$langCode.' vertical">';
            foreach($menu[$langCode][0][0] as $row) {
               echo  '<li data-lang="'.$langCode.'" data-name="'.$row->name.'" data-id = "'.$row->id.'" >'.$row->id.') '.$row->name;
               echo '<ul>';
               if(sizeof($row->children[0]) > 0) {
                  foreach($row->children[0] as $child){
                      echo '<li data-lang="'.$langCode.'" data-name="'.$child->name.'" data-id = "'.$child->id.'">'.$child->id.') '.$child->name;

                  }
              }
               echo '</ul>';
               echo '</li >';
            }
                echo '</ol>';
                echo '<input type="hidden" name="menu_'.$langCode.'" class="menu_'.$langCode.'"/>';
                echo '<button  class="btn btn-primary btnSaveSortible" data-lang="'.$langCode.'">SAVE</button>';

            echo '</div>';
            echo  '<div class="span3"><h5>ITEMS WHICH NOT IN THE MENU LIST</h5>';

                    echo  '<ol class="nested_with_switch_'.$langCode.' vertical">';
                    foreach($menu_new[$langCode] as $row) {
                        echo  '<li  data-name="'.$row['title'].'" data-id = "'.$row['id'].'" data-lang = "'.$langCode.'" >'.$row['id'].') '.$row['title'].'</li >';
                    }
                echo '</ol>';
            echo '</div>';
            echo '</div>';

        }
        ?>
    <!--    <div id="asdas21"></div>
        <div class="span4">
            <ol class="serialization vertical">
                <li data-id="0" data-name="Item 1">
                    Item 1
                </li>
                <li data-id="1" data-name="Item 2">
                    Item 2
                </li>
                <li data-id="2" data-name="Item 3">
                    Item 3
                </li>
                <li data-id="3" data-name="Item 4">
                    Item 4
                    <ol>
                        <li data-id="3-0" data-name="Item 3.1">Item 3.1</li>
                        <li data-id="3-1" data-name="Item 3.2">Item 3.2</li>
                        <li data-id="3-2" data-name="Item 3.3">Item 3.3</li>
                        <li data-id="3-3" data-name="Item 3.4">Item 3.4</li>
                        <li data-id="3-4" data-name="Item 3.5">Item 3.5</li>
                        <li data-id="3-5" data-name="Item 3.6">Item 3.6</li>
                    </ol>
                </li>
                <li data-id="4" data-name="Item 5">
                    Item 5
                </li>
                <li data-id="5" data-name="Item 6">
                    Item 6
                </li>
            </ol>
        </div>
        <div class="span4">
            <ol class="serialization vertical">
                <li data-id="0" data-name="Item 1">Item 1</li>
                <li data-id="1" data-name="Item 2">Item 2</li>
                <li data-id="2" data-name="Item 3">Item 3</li>
                <li data-id="3" data-name="Item 4">Item 4</li>
                <li data-id="4" data-name="Item 5">Item 5</li>
                <li data-id="5" data-name="Item 6">Item 6</li>
            </ol>
        </div>-->

    </div>
          <input type="hidden" value="<?php echo base_url(); ?>index.php/Media/deleteAlbum" class="url" />
</div>
</div>
</div>
</div>
</div>
