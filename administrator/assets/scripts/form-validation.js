var FormValidation = {

    validate:function(elem)
    {
		   var form = $($(elem).parents("form")[0]);

        var flds = form.find(".required");
        var submit = true;
        for (var i=0; i<flds.length; i++)
        {
            var cont = flds[i];
            var type = $(cont).attr("data-type");
            var fld = $(cont).find("input,select");
            var val = $(fld).val();
            $(cont).removeClass("error");
            switch(type)
            {
                case "String":
                    if (!this.isString(val))
                    {
                        submit = false;
                        $(cont).addClass("error");
                    }
                    break;
                case "Email":
                    if (!this.isEmail(val))
                    {
                        submit = false;
                        $(cont).addClass("error");
                    }
                    break;
                case "File":
                    if (val == "")
                    {
                        submit=false;
                        $(cont).addClass("error");
                    }

                    break;
                case "Select":
                    if (val == -1)
                    {
                        submit=false;
                        $(cont).addClass("error");
                    }

                    break;
            }
        }
	

        if (submit)
            form.submit();
        else
        {
            $('html, body').animate({
                scrollTop: $(fld).offset().top - 50
            }, 300);
        }
    },

    isString:function(val)
    {
        return ($.trim(val).length > 1);
    },

    isEmail:function(val)
    {
        var regx = /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/;
        regx.test(val);
    },

    changePassword:function(elem)
    {
        if ($("#new_password").val() == $("#new_password2").val() && $("#new_password").val().length > 2)
        {
            FormValidation.validate(elem);
        }
        else
        {
            alert("New Password and Renter new password doesn't match");
        }

    }



};