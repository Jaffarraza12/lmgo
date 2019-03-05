var Dialogue = {
    curNode:null,
    init:function()
    {
        if (!$("#dlgOverlay")[0])
        {
            $("body").append("<div id='dlgOverlay'>&nbsp;</div><div id='dlgContainer'><div class='top'><a href='javascript:void(0)' class='close' onclick='Dialogue.hide()' title='Close'>X</a></div><div id='dlgContent'>&nbsp;</div></div>");
            /*$("#dlgContainer .close").click(function(e) {
                Dialogue.hide();
            });*/
            $("#dlgOverlay").css({opacity:0.75});
        }

        //$('#dlgContainer .top table')[0].style.width = "200px";
        //Utils.loader("dlgContent");

        $('#dlgContainer').center();

        $("#dlgContainer").show();
        $('#dlgOverlay').show();
    },

    confirm:function(opt, elem)
    {
        Dialogue.curNode = elem;

        Dialogue.init();

        var src = "";
        switch(opt)
        {
            case "delete":
                title = "Delete Record";
                src = "<div class='error'>Are you sure you want to delete this record ?</div><div class='btnContainer'><div class='fLeft'><a href='javascript:void(0)' onclick='Dialogue.hide()' class='resetBtn'>No</a></div> <div class='fLeft'><a href='javascript:void(0)' onclick='Dialogue.executeYes()' class='logBtn'>Yes</a></div> <div class='clear'>&nbsp;</div></div>";
                break;
        }

        //$('#dlgContainer .title')[0].innerHTML = title;
        $("#dlgContent")[0].innerHTML = src;
        $('#dlgContainer .top table')[0].style.width = ($('#dlgContainer').width()-14) + "px";
        $('#dlgContainer').center();
    },

    executeYes:function()
    {
        setTimeout(function() { document.location = $(Dialogue.curNode).find("i")[0].innerHTML; }, 50);
    },

    open:function(url)
    {

        Dialogue.init();

        $.post(url, function(resp){
            $("#dlgContent")[0].innerHTML = resp;
            //$('#dlgContainer .top table')[0].style.width = ($('#dlgContainer').width()-14) + "px";
            $('#dlgContainer').center();
            //Main.popupTime();
        });
    },

    openMsg:function(msg, title, elem)
    {
        Dialogue.init();
        var par = $(elem).parent();
        $("#dlgContent")[0].innerHTML = $(par).find("div")[0].innerHTML;
        $('#dlgContainer').center();
        //$('#dlgContainer .top table')[0].style.width = ($('#dlgContainer').width()-14) + "px";
        par.parents("tr").removeClass("UNREAD");
        Utils.postWithCallback(Utils.baseUrl() + "/Contact/Update?id=" + par.find(".hidId")[0].value, null, function(resp) {});
    },

    unread:function(id,elem)
    {
        var par = $(elem).parents("tr");
        Utils.postWithCallback(Utils.baseUrl() + "/Contact/Unread?id=" + id, null, function(resp) {});
        par.addClass("UNREAD");
    },

    hide:function()
    {
        
        $("#dlgContainer").hide();
        $('#dlgOverlay').hide();
    }

};

jQuery.fn.center = function () {
    this.css("position","absolute");
    var top = (($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop();
    if (top < 10)
        top = 10;
    this.css("top", top + "px");
    this.css("left", (($(window).width() - this.outerWidth()) / 2) + $(window).scrollLeft() + "px");
    return this;
};

