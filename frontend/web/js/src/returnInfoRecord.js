var returnInfoAdd = (function (config, functions) {
    return {
        geTableInfo:function(trs){
            var arr=[];
            trs.each(function(index,el){
                el=$(el);
                arr.push([
                    el.find(".value").val(),
                    el.find(".isNormal:checked").val(),
                    el.find(".hasSense:checked").val()
                ]);
            });

            return arr;
        },
        saveData:function(callback){
            var info={};
            info.date= functions.formatDate("y-m-d");
            info.other=functions.getInfo("other");
            info.xueChangGui=returnInfoAdd.geTableInfo($("#xueChangGuiTable tbody tr"));
            info.xueShengHua=returnInfoAdd.geTableInfo($("#xueShengHuaTable tbody tr"));

            functions.saveInfo(config.ajaxUrls.returnInfoRecordSubmit, {
                patientId: patientId,
                col:"check_result",
                recordIndex:recordIndex,
                value: JSON.stringify(info)
            },function(){
                if(callback){
                    callback();
                }

            });
        }
    }
})(config, functions);
$(document).ready(function () {
    setInterval(function(){
        returnInfoAdd.saveData(function(data){
            recordIndex = data.recordIndex
        });
    },50000);
    $("#saveInfo").click(function(){
        returnInfoAdd.saveData(function(){
            location.href="return-info/"+patientId;
        });
    });

    $("#goBack").click(function(){
        if(confirm("数据还没有保存，确定离开吗？")){
            location.href="return-info/"+patientId;
        }
    })

});