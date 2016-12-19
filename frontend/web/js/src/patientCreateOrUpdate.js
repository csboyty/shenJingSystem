var patientCreateOrUpdate=(function(config,functions){
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
                            window.location.href="patient/index";
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
        rules: {
            id: {
                required:true,
                maxlength:32
            },
            create_at: {
                required:true
            },
            fullname:{
                required:true,
                maxlength:32
            },
            sex: {
                required:true
            },
            age:{
                required:true,
                number:true,
                maxlength:3
            },
            relatives_count:{
                required:true,
                number:true,
                maxlength:2
            },
            address:{
                required:true,
                maxlength:64
            },
            contact:{
                required:true,
                maxlength:32
            },
            tel:{
                required:true,
                maxlength:15
            }
        },
        messages: {
            id: {
                required:config.validErrors.required,
                maxlength:config.validErrors.maxLength.replace("${max}",32)
            },
            create_at: {
                required:config.validErrors.required
            },
            fullname:{
                required:config.validErrors.required,
                maxlength:config.validErrors.maxLength.replace("${max}",32)
            },
            sex: {
                required:config.validErrors.required
            },
            age:{
                required:config.validErrors.required,
                number:config.validErrors.number,
                maxlength:config.validErrors.maxLength.replace("${max}",3)
            },
            relatives_count:{
                required:config.validErrors.required,
                number:config.validErrors.number,
                maxlength:config.validErrors.maxLength.replace("${max}",2)
            },
            address:{
                required:config.validErrors.required,
                maxlength:config.validErrors.maxLength.replace("${max}",64)
            },
            contact:{
                required:config.validErrors.required,
                maxlength:config.validErrors.maxLength.replace("${max}",32)
            },
            tel:{
                required:config.validErrors.required,
                maxlength:config.validErrors.maxLength.replace("${max}",15)
            }
        },
        submitHandler:function(form) {
            patientCreateOrUpdate.submitForm(form);
        }
    });
});
