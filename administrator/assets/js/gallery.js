var GaL = {

    init:function()
    {
        var links = $(".imgGal .pic");
        links.hover(function() {
            $(this).find("a").show();
        }, function() {
            $(this).find("a").hide();
        });
    }

};