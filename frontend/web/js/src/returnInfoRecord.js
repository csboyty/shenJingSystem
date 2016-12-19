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
        info.other=functions.getInfo("other");
        info.xueChangGui=returnInfoAdd.geTableInfo($("#xueChangGuiTable tbody tr"));
        info.xueShengHua=returnInfoAdd.geTableInfo($("#xueShengHuaTable tbody tr"));

        functions.saveInfo(config.ajaxUrls.returnInfoRecordSubmit, {
            patientId: patientId,
            check_result: JSON.stringify(info)
        });
        return false;
    })

});