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
        }
    }
})(config, functions);
$(document).ready(function () {
    $("#saveInfo").click(function(){
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
            location.href="return-info/"+patientId;
        });
        return false;
    })

});