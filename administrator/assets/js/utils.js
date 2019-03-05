var Utils = {

    baseUrl:function()
    {
        //return "http://www.arabisknetwork.com/cp_360/index.php/";
        return "http://jobs.jaffarraza.com/index.php";
    },

    uploadUrl:function()
    {
        return "http://bawadi.arabisk.co/uploads";
        //return "http://www.arabisknetwork.com/uploads/";
    },

    postWithCallback:function(url, data, callback)
    {
        $.ajax(url, {
            type: 'POST',
            data: data,
            success: function( resp ) {
                callback(resp);
            },
            error: function( req, status, err ) {
                alert('something went wrong', status, err );
            }
        });
    }

};