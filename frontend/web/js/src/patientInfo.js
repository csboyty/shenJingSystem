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

                        callback(response.id);
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

    setInterval(function(){
        patientCreateOrUpdate.submitForm($("#myForm"),function(id){
            if(!$("#editId")){
                $('<div id="editId" data-value="'+id+'"></div>'+
                    '<input type="hidden" name="isEdit" value="true">').prependTo($("#myForm"));

                $("#pageLinkList .item").attr("href",function(index,oldValue){
                    return oldValue+id;
                });
            }
        });
    },50000);

    $("#toMedicalInfo").click(function(){
        patientCreateOrUpdate.submitForm($("#myForm"),function(id){
            location.href="medical/"+id;
        });
    });

    $("#pageLinkList .item").click(function(){
        var href = $(this).attr("href");

        if(!$("#editId")){
            patientCreateOrUpdate.submitForm($("#myForm"),function(id){
                location.href = (href+"id");
            });
            return false;
        }
    });
});
