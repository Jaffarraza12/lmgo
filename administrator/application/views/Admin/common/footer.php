    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="span pull-right">
            <span class="go-top"><i class="icon-angle-up"></i></span>
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/plugins/excanvas.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/respond.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>
    <!-- IMPORTANT! jquery.slimscroll.min.js depends on jquery-ui-1.10.1.custom.min.js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery.cookie.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>../ckfinder/ckfinder_v1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.js"></script>

    <!-- END CORE PLUGINS -->
    <script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
    <!-- CUSTOM JS -->
    <script src="<?php echo base_url(); ?>assets/js/gallery.js"></script>
    <script src="<?php echo base_url(); ?>assets/scripts/form-validation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/myjava.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/utils.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/scripts/dialog.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.js"></script>
    <script src="<?php echo base_url(); ?>assets/scripts/ui-nestable.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ajaxupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-sortable-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
   <script src="<?php echo base_url(); ?>assets/scripts/ui-general.js"></script>
   <script src="<?php echo base_url(); ?>assets/scripts/ui-jqueryui.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/lad.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/attribute.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
   <script src="<?php echo base_url(); ?>assets/js/map.js" type="text/javascript"></script>





    
    <!-- END CUSTOM JS -->
    <script>

        $(function () {
           $('#URLChangeAR').change(function () {
               if($(this).val() == 'custom'){
                   $('.customAR').show();
               } else  {
                   $('.customAR').hide();
               }
           })


           $('#URLChangeEN').change(function () {
               if($(this).val() == 'custom'){
                   $('.customEN').show();
               } else  {
                   $('.customEN').hide();
               }
           })
        });






        $(function  () {
            var group = $("ol.nested_with_switch_AR").sortable({
                group: 'serialization_AR',
                delay: 500,
                onDrop: function ($item, container, _super) {
                    var data = group.sortable("serialize").get();
                    var jsonString = JSON.stringify(data, null, ' ');
                    lang = $item.context.dataset.lang
                    name = 'menu_'+lang
                    $('input[name="'+name+'"]').val(jsonString)
                    _super($item, container);
                }
            });

            var group2 = $("ol.nested_with_switch_EN").sortable({
                group: 'serialization_EN',
                delay: 500,
                onDrop: function ($item, container, _super) {
                    var data2 = group2.sortable("serialize").get();
                    var jsonString = JSON.stringify(data2, null, ' ');
                    lang = $item.context.dataset.lang
                    name = 'menu_'+lang

                    console.log(name);
                    $('input[name="'+name+'"]').val(jsonString)
                    _super($item, container);
                }
            });

            $('.btnSaveSortible').click(function () {
                lang = $(this).data('lang')
                elem = 'menu_'+lang
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Menu/Save",
                    data: {"menu":$('input[name="'+elem+'"]').val(),'lang':lang },
                    type: 'POST',
                    success: function(result){
                        $('#noti_110_'+lang).fadeIn();
                        $('#noti_110_'+lang).html('Your Menu has been saved!')

                    },
                });

            })
        });
        jQuery(document).ready(function() {
            // initiate layout and plugins
            App.init();
		    UIJQueryUI.init();
            Main.init();
			Myjava.init();
            Map.init();


            try {
                <?php if (isset($activeMenu)) { echo "Main.setActive('" . $activeMenu . "');"; } ?>
            }
            catch(e) {}

            try
            {
                var a = $(".ckeditor");
                a.each(function(){
                    CKEDITOR.replace(this.id,
                        {
                            filebrowserBrowseUrl: '<?php echo base_url(); ?>../ckfinder/ckfinder.html',
                            filebrowserImageBrowseUrl: '<?php echo base_url(); ?>../ckfinder/ckfinder.html?type=Images',
                            filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>../ckfinder/ckfinder.html?type=Flash',
                            filebrowserUploadUrl: '<?php echo base_url(); ?>../ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Files',
                            filebrowserImageUploadUrl: '<?php echo base_url(); ?>../ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl: '<?php echo base_url(); ?>../ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash'

                        }
                    );
                });

            }
            catch(e) {}

            UINestable.init();

            EEditor.init();

            $("#page-image").change(function() {
                readURL(this);
            });

            $("#btn-new-img").on('click', function () {
                $("#btn-new-img-hidden").click();
            });

            $("#btn-new-img-hidden").on('change', function () {
                $("#u-image-form").submit();
            });

            $(".remove_file").on("click", function () {
                $(this).parent().remove();
            });

            $(".remove_pdf_box").on("click", function () {
                $(this).parent().parent().remove();
            });
        });

        function selectImg(id) {
            $("#btn-rep-" + id + "-hidden").click();

            $("#btn-rep-" + id + "-hidden").on('change', function () {
                $("#r-" + id + "-form").submit();
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#pre-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function delBtn(id) {
            if (confirm("Are you sure?")){
                $("#bc-del-form-" + id).submit();
            }
        }

        function createPDF(lang_code) {
            // if (pdf_id < 3) {
            var html_pdf = '' +
            '<div class="control-group">' +
                '<label class="control-label">PDF</label>' +
                '<div class="controls">' +
                    '<input type="file" name="arr_pdf_' + lang_code + '[]" class="span6 m-wrap popovers" data-original-title="Pick PDF" data-content="Pick PDF for the Page" data-trigger="hover" />' +
                    '<button type="button" class="btn pull-right remove_pdf_box">X</button>' +
                '</div>' +
            '</div>';
            $('#multi_pdf_' + lang_code).append(html_pdf);
            // }
        }

        function createPDF2(lang_code) {
            // if (pdf_id < 3) {
            var html_pdf = '' +
                '<div class="control-group">' +
                '<label class="control-label">PDF 2</label>' +
                '<div class="controls">' +
                '<input type="file" name="arr_pdf_2' + lang_code + '[]" class="span6 m-wrap popovers" data-original-title="Pick PDF" data-content="Pick PDF for the Page" data-trigger="hover" />' +
                '<button type="button" class="btn pull-right remove_pdf_box">X</button>' +
                '</div>' +
                '</div>';
            $('#multi_pdf_2' + lang_code).append(html_pdf);
            // }
        }
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>