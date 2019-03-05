var UINestable = function () {

    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        var obj = list.nestable('serialize');
        var ids = "";
        for (var i=0; i<obj.length; i++)
        {
            ids += obj[i].id + ",";
        }
        ids = ids.substr(0, ids.length-1);
        var data = {
            'data':ids
        };
        Utils.postWithCallback($("#sortUrl").val(), data, function(){});
        /*if (window.JSON) {
            console.info(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        } else {
            console.info('JSON browser support required for this demo.');
        }*/
    };


    return {
        //main function to initiate the module
        init: function () {

            // activate Nestable for list 1
            $('#nestable_list_1').nestable({
                group: 1
            })
                .on('change', updateOutput);


            $('#nestable_list_menu').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#nestable_list_3').nestable();

        }

    };

}();