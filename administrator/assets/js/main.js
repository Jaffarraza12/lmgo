var Main = {

    init:function()
    {
        //Initiate Datatables
        var oTable = $('.dataTables').dataTable({
            "aLengthMenu": [
                [20, 30, 40, -1],
                [20, 30, 40, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 20,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }
            ]
        });

        //Initialize Gallery Events
        GaL.init();

        //Form controls initialization
        $('.text-enable-disable').toggleButtons({
            width: 200,
            label: {
                enabled: "Enable",
                disabled: "Disable"
            }
        });

        //DatePickers Initialization
        $('.date-picker').datepicker();
    },

    //This is the generic method to delete record form all the views.
    deleteFromAjax:function(elem)
    {
        //TODO: Place a jquery alert here instead of confirm..

        var ask = confirm("Are you sure you want to delete this record ?");

        if (ask)
        {
            //Id value
            var id = $(elem).find("b")[0].innerHTML;
            //Get the URL for deletion
            var par = $(elem).parents(".tab-content");
            var url = par.find(".url")[0].value;

            Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    if ($(elem).hasClass("li"))
                    {
                        $(elem).parents("li").remove();
                    }
                    else
                    {
                        $(elem).parents("tr").remove();
                    }
                }
                else
                    alert(json.msg);
            });

        }
    },

    //This is the generic method to delete image form all the views.
    deleteImgFromAjax:function(elem, id, cont)
    {
        var ask = confirm("Are you sure you want to delete this record ?");

        if (ask)
        {
            var url = $("#url").val();

            Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    if (cont==null)
                        $(elem).parents("span").remove();
                    else
                        $(elem).parents(cont).remove();

                }
                else
                    alert(json.msg);
            });
        }
    },
	
	deleteAds:function(elem, id, cont)
    {
       
		var ask = confirm("Are you sure you want to delete this record ?");

        if (ask)
        {
            var url = $(".url").val();

            Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#row"+elem).fadeOut("fast");
                }
                else
                    alert(json.msg);
            });
        }
    },

    //This is the generic method to update status
    updateStatus:function(elem)
    {
        var id = $(elem).val();

        Utils.postWithCallback("Status" + "?id=" + id, null, function(resp){
            var json = $.parseJSON(resp);
            if (json.status == "success")
            {

            }
            else
                alert(json.msg);
        });
    },

    //This is the generic method to add the uplaoded file below the uploadig area and allow user to delete the uploaded work.
    fileUploaded:function(resp)
    {

        var obj = $.parseJSON(resp);
        if (obj.status=="success")
        {
            var w = "150";
            var h = "150";
            if ($("#hidWidth")[0])
            {
                w = $("#hidWidth").val();
                h = $("#hidHeight").val();
            }
            var arr = obj.msg.split(":");
            var str = '<span class="pic"><a class="glyphicons no-js circle_remove" href="javascript:void(0)" onclick="Main.deleteImgFromAjax(this, ' + arr[0] + ', null)" style="display: none;"><i></i></a><img width="' + w + '" height="' + h + '" alt="" src="' + Utils.baseUrl() + '/../../uploads/media/' + arr[1] + '"></span>';
            $(".imgGal").append(str);
            GaL.init();
        }
        else
        {
            alert(obj.msg);
        }
    },

    setActive:function(id)
    {
        $("#" + id).addClass("current open");
        try
        {
            $("#" + id).find(".arrow").addClass("open");
            $("#" + id).find(".sub-menu").show();
        }
        catch(e){}
    }
};


var EEditor = {

    init:function()
    {
        if ($("#emailBody")[0])
        {
            $("table.full, table.mobile").hover(function(){
                var hid = $(this).find(".hidControls");
                hid.show();
            },
            function() {
                var hid = $(this).find(".hidControls");
                hid.hide();
            });

            $('.jedit').editable({
            });

            $('.jeditarea').editable({
                rows:5
            });


            $(".uploadImage").each(function(){
                var img = $(this);
                var str = img.attr("data-info");
                var arr = str.split("_");
                var id = arr[0];
                this.id = arr[0];
                var w = arr[1];
                var h = arr[2];
                var scaling = arr[3];

                var scr = '<form id="form' + arr[0] + '" action="UploadImage" method="POST"><input type="file" size="20" id="inp' + arr[0] + '"></form>';
                $("#hidForms").append(scr);

                var par = img.parents(".rel");
                var btn = par.find(".btn");

                new AjaxUpload(btn, {
                    action: $('form#form' + arr[0]).attr('action'),
                    name: 'image',
                    data: {'w': w, 'h': h, 's': scaling},
                    onSubmit: function(file, extension) {
                        //$('div.preview').addClass('loading');
                    },
                    onComplete: function(file, response) {
                        var obj = $.parseJSON(response);
                        var img = $("#" + id);
                        if (img.hasClass("bgImage"))
                        {
                            console.info(img);
                            console.info(Utils.uploadUrl() + obj.msg);
                            img[0].style.backgroundImage = "url(" + Utils.uploadUrl() + obj.msg + ")";
                            img.parents("table").attr({"background": Utils.uploadUrl() + obj.msg});
                            console.info(img.parents("table"));
                        }
                        else
                            img[0].src = Utils.uploadUrl() + obj.msg;

                        /*thumb.load(function(){
                            $('div.preview').removeClass('loading');
                            thumb.unbind();
                        });
                        thumb.attr('src', response);*/
                    }
                });

            });



        }
    },

    toggle:function(elem)
    {
        var txt = elem.innerHTML;
        var par = null;

        if (txt == "Hide")
        {
            elem.innerHTML = "Show";
            par = $(elem).parents(".full, .mobile");
            par.addClass("hidTable");
            par.fadeTo("slow",0.5);
        }
        else
        {
            elem.innerHTML = "Hide";
            par = $(elem).parents(".full, .mobile");
            par.removeClass("hidTable");
            par.fadeTo("slow",1);
        }
    },

    send:function()
    {
        alert("Email Sent");
    },

    edit:function()
    {
        $("#previewTemplate").hide();
        $("#emailTemplate").show();
    },

    preview:function()
    {
        var cont = $("#previewContent");
        cont[0].innerHTML = $("#emailBody")[0].innerHTML;
        var tbl = cont.find(".hidTable");
        tbl.remove();
        var a = cont.find("a.btn");
        a.remove();
        cont.find(".editable-click").each(function(){
            $(this).removeClass("editable-click");
            $(this).removeClass("editable");
            $(this).removeClass("jedit");
            $(this).removeClass("jeditarea");
        });
        $("#previewTemplate").show();
        $("#emailTemplate").hide();
    },

    save:function()
    {
        var title = $("#templateName").val();
        if (title.length < 1)
        {
            if ((title = window.prompt("Please Enter Template Name","Template ")))
            {
                $("#templateName")[0].value = title;
            }
        }


        $("#templateData")[0].value = $("#templateStructure")[0].innerHTML;

        Utils.postWithCallback(Utils.baseUrl() + "Marketing/SaveTemplate", $("#hidForm").serialize(), function(resp) {
            $("#templateId")[0].value = resp;
            alert("Template Saved Successfully.");
        });
    },

    saveAs:function()
    {
        $("#templateName").val("");
        $("#templateId").val(-1);
        EEditor.save();
    }





};