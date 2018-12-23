var patientCreateOrUpdate=(function(config,functions){
    return{
        submitForm:function(form,callback){
            var me=this;
            functions.showLoading();
            $(form).ajaxSubmit({
                dataType:"json",
                url:config.ajaxUrls.patientSubmit,
                type:"post",
                success:function(response){
                    if(response.success){
                        $().toastmessage("showSuccessToast",config.messages.optSuccess);

                        if(callback){
                            callback(response.id);
                        }
                        functions.hideLoading();
                    }else{
                        functions.ajaxReturnErrorHandler(response.error_code);
                    }
                },
                error:function(){
                    functions.ajaxErrorHandler();
                }
            });
        },
        autoSave:function(){
            this.submitForm($("#myForm"),function(id){
                if(!$("#editId")){
                    $('<div id="editId" name="id" data-value="'+id+'"></div>'+
                        '<input type="hidden" name="isEdit" value="true">').prependTo($("#myForm"));

                    $("#pageLinkList .item").attr("href",function(index,oldValue){
                        return oldValue+id;
                    });
                }
            });
        },
        formValidateSubmit : function(callback) {
            var me = this;
            $("#myForm").validate({
                rules : {
                    no : {
                        maxlength : 32
                    },
                    patient_no : {
                        maxlength : 32
                    },
                    ad : {
                        maxlength : 32
                    },
                    dna_no : {
                        maxlength : 32
                    },
                    other_no : {
                        maxlength : 32
                    },
                    fullname : {
                        maxlength : 32
                    },
                    age : {
                        number:true,
                        maxlength : 11
                    },
                    relatives_count : {
                        number:true,
                        maxlength : 11
                    },
                    address : {
                        maxlength : 64
                    },
                    contact : {
                        maxlength : 32
                    },
                    tel : {
                        maxlength : 15
                    },
                    qq : {
                        maxlength : 32
                    },
                    weixin : {
                        maxlength : 32
                    }
                },
                submitHandler : function(form) {
                    me.submitForm(form, callback);
                }
            })
        }
    }
})(config,functions);

$(document).ready(function(){

    patientCreateOrUpdate.formValidateSubmit(function(id){
        location.href="medical/"+id;
    });

    setInterval(function(){
        if($("#myForm").valid()){
            patientCreateOrUpdate.autoSave();
        }
    },300000);

    $("#pageLinkList .item").click(function(){
        var href = $(this).attr("href");

        if($("#editId").length == 0){
            if($("#myForm").valid()){
                patientCreateOrUpdate.submitForm($("#myForm"),function(id){
                    location.href = (href+id);
                });
            }else{
                $().toastmessage("showErrorToast",config.messages.fixedErrorFirst);
            }
            return false;
        }else{

            patientCreateOrUpdate.submitForm($("#myForm"),function(id){
                location.href = href;
            });

        }
    });
});
