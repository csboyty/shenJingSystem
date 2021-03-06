var editPwd=(function(config,functions){
    return{
        submitForm:function(form){
            var me=this;
            functions.showLoading();
            $(form).ajaxSubmit({
                dataType:"json",
                success:function(response){
                    if(response.success){
                        $().toastmessage("showSuccessToast",config.messages.optSuccess);
                        setTimeout(function(){
                            window.location.href="site/logout";
                        },3000);
                    }else{
                        functions.ajaxReturnErrorHandler(response.error_code);
                    }
                },
                error:function(){
                    functions.ajaxErrorHandler();
                }
            });
        }
    }
})(config,functions);

$(document).ready(function(){
    $("#myForm").validate({
        ignore:[],
        rules:{
            password:{
                required:true,
                maxlength:32
            },
            newPwd:{
                required:true,
                maxlength:32,
                equalTo:"#password"
            }
        },
        messages:{
            password:{
                required:config.validErrors.required,
                maxlength:config.validErrors.maxLength.replace("${max}",32)
            },
            newPwd:{
                required:config.validErrors.required,
                maxlength:config.validErrors.maxLength.replace("${max}",32),
                equalTo:config.validErrors.pwdNotEqual
            }
        },
        submitHandler:function(form) {
            editPwd.submitForm(form);
        }
    });
});
