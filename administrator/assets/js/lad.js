// JavaScript Document
url = $(".url").val();

	

new AjaxUpload('#imgThumb1', {
	action: url+'/index.php/Shops/upload?thumb=1&resize='+$(".strech").val(),
	name: 'file',
	autoSubmit:true,
	div :{"height":200},
	responseType:'json',
	onSubmit: function(file, extension) {
		$('#Thumbloading1').html('<img src="'+url+'assets/img/loading.gif" class="loading" style="padding-left: 5px;" />');

		this._settings.action = url+'/index.php/Shops/upload?thumb=1&resize='+$(".strech").val();
		
	},
	onComplete: function(file, json) {
		$('#button-upload').attr('disabled', false);
		
		if (json['success']) {
			$("#Thumb1").attr("src",url+"../uploads/shops/"+json['filename'])
			$('input[name=\'imgThumb1\']').val(json['filename'])
		}
		
		if (json['error']) {
			alert(json['error']);
		}
		
		$('#Thumbloading1').remove();	
	}
});




new AjaxUpload('#imgThumb2', {
	action: url+'/index.php/Shops/upload?thumb=2&resize='+$(".strech").val(),
	name: 'file',
	autoSubmit:true,
	responseType:'json',
	onSubmit: function(file, extension) {
		$('#Thumbloading2').html('<img src="'+url+'assets/img/loading.gif" class="loading" style="padding-left: 5px;" />');
			this._settings.action = url+'/index.php/Shops/upload?thumb=2&resize='+$(".strech").val();

	},
	onComplete: function(file, json) {
		$('#button-upload').attr('disabled', false);
		
		if (json['success']) {
			$("#Thumb2").attr("src",url+"../uploads/shops/"+json['filename'])
			$('input[name=\'imgThumb2\']').val(json['filename'])
		}
		
		if (json['error']) {
			alert(json['error']);
		}
		
		$('#Thumbloading2').remove();	
	}
});



new AjaxUpload('#imgThumb3', {
	action: url+'/index.php/Shops/upload?thumb=3&resize='+$(".strech").val(),
	name: 'file',
	autoSubmit:true,
	responseType:'json',
	onSubmit: function(file, extension) {
		$('#Thumbloading3').html('<img src="'+url+'assets/img/loading.gif" class="loading" style="padding-left: 5px;" />');
				this._settings.action = url+'/index.php/Shops/upload?thumb=3&resize='+$(".strech").val();

	},
	onComplete: function(file, json) {
		$('#button-upload').attr('disabled', false);
		
		if (json['success']) {
			$("#Thumb3").attr("src",url+"../uploads/shops/"+json['filename'])
			$('input[name=\'imgThumb3\']').val(json['filename'])
		}
		
		if (json['error']) {
			alert(json['error']);
		}
		
		$('#Thumbloading3').remove();	
	}
});



new AjaxUpload('#imgThumb4', {
	action: url+'/index.php/Shops/upload?thumb=4&resize='+$(".strech").val(),
	name: 'file',
	autoSubmit:true,
	responseType:'json',
	onSubmit: function(file, extension) {
		$('#Thumbloading4').html('<img src="'+url+'assets/img/loading.gif" class="loading" style="padding-left: 5px;" />');
			this._settings.action = url+'/index.php/Shops/upload?thumb=4&resize='+$(".strech").val();

	},
	onComplete: function(file, json) {
		$('#button-upload').attr('disabled', false);
		
		if (json['success']) {
			$("#Thumb4").attr("src",url+"../uploads/shops/"+json['filename'])
			$('input[name=\'imgThumb4\']').val(json['filename'])
		}
		
		if (json['error']) {
			alert(json['error']);
		}
		
		$('#Thumbloading4').remove();	
	}
});


new AjaxUpload('#additionalimage', {
	action: url+'index.php/Shops/additionalimage' ,
	name: 'file',
    autoSubmit:true,
	responseType:'json',
	onSubmit: function(file, extension) {
		$('#additionalloading').html('<img src="'+url+'assets/img/loading.gif" class="loading" style="padding-left: 5px;" />');
	},
	onComplete: function(file, json) {
		if (json['success']) {
			$(".addimages").append('<span class="pic"><img src="'+url+'../uploads/shops/'+json['file']+'" width="199" height="100"  alt="" /><input type="hidden" name="addimages[]" value="'+ json['file'] +'" /><input type="hidden" name="addlargeimages[]" value="'+ json['largefile'] +'" /><div class="delworkimg"  >Delete</div> </span>');
		}
	
		if (json['error']) {
			alert(json['error']);
		}
		
		$('#additionalloading').remove();	
	}
});

$(".pic").live("hover",function(){
		$(this).find(".delworkimg").animate({bottom:"5px"});
	});
$(".pic").live("mouseleave",function(){
		$(this).find(".delworkimg").animate({bottom:"-30px"});
	});	
	

$(".delworkimg").live("click",function(){
	$(this).parent().remove();	
});


$(".resizer").live("click",function(){
	$(".strech").val($(this).val());	
});
