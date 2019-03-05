var Myjava = {

    init:function()
    { 
      
 
    },

 	deleteJob:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = selecter ;
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#row"+elem).remove();
                }
                else
                    alert(json.msg);
            });

        }
    },deleteJobType:function(elem,selecter)
    {

        var ask = confirm("Are you sure you want to delete this record ?");

        if (ask)
        {
            var id = elem ;
            //Get the URL for deletion
            var url = $(".url").val();

            Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
                }
                else
                    alert(json.msg);
            });

        }
    },deleteCountryCity:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
	
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
					
                    
                }
                else
				{
            	    alert(json.msg);
				}
			});

        }
    },	
	deleteCategory:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
					
                    
                }
                else
				{
            	    alert(json.msg);
				}
			});

        }
    },deleteSocial:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
					
                    
                }
                else
                    alert(json.msg);
            });

        }
    },deleteAlbum:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
					
                    
                }
                else
                    alert(json.msg);
            });

        }
    },getCagtegories:function(elem)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
     
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
				     $("#parentid").html(json.html);
                    
                }
                else
                    alert(json.msg);
            });

      
    },moreCagtegories:function(elem)
    {
		
      
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
				$(".modelform").hide();
                if (json.status == "success")
                {
				     $("#category").html(json.html);
                    
                }
                else
                    alert(json.msg);
            });

      
    },ShowModelForm:function()
	{
		$(".modelform").show();
	},deleteModel:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
					
                    
                }
                else
                    alert(json.msg);
            });

        }
    },deleteAttribute:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
					
                    
                }
                else
                    alert(json.msg);
            });

        }
    },deleteAmenity:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $("#"+selecter).remove();
					
                    
                }
                else
                    alert(json.msg);
            });

        }
    },GetSlider:function(elem)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
            var id = elem
		   //Get the URL for deletion
            var url = $(".url").val();
			
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status == "success")
                {
                    $(".digger").html(json.html);
				  }
                else
                    alert(json.msg);
            });

       
    },ChngeStat:function(elem)
	{
		
		if(elem) { 
			var rot = new Array();
			var url = $(".urlforchangestatus").val();
		
			if($('[name="attributeid[]"]:checked')) {
			$('[name="attributeid[]"]:checked').each(function(){
				rot.push($(this).val())
			})
				$.ajax({ 
					type        : 'POST', 
					url         : url, //Your form processing file url
					data        : ({'id':rot,'status':elem}), 
					dataType    : 'json',
					success     : function(json) {
									if(json.success)
									{
										location.reload();							
													
									} else {
										alert(json.error);
									}
					}
				 });
			} else {
				alert("Select Attribute first that you need to change!");	
			}
		}
		
		
	},CheckAll:function(elem){
		
			if($('.adveridall').is(':checked') ){
				$(".adverid").prop('checked',true);
				$(".checker span").addClass("checked");
			} else {
				$(".adverid").prop('checked',false);
				$(".checker span").removeClass("checked");
			}
		
		
	},deleteUser:function(elem,selecter)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
      var ask = confirm("Are you sure you want to delete this record ?");
		
      if (ask)
        {
            var id = elem
            //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
                if (json.status)
                {
                    $("#"+selecter).fadeOut("slow");
					
                    
                }
                else
                    alert(json.msg);
            });

        }
    },GetCities:function(elem)
    {
		
        //TODO: Place a jquery alert here instead of confirm..
            var id = elem
           	
		    //Get the URL for deletion
            var url = $(".url").val();
			
			Utils.postWithCallback(url + "index.php/CountryCity/GetCities?id=" + id, null, function(resp){
                var json = $.parseJSON(resp);
				$("#city_id").find('option').remove().end().append(json.cities);
                
                
            });


    },
	
		
};

