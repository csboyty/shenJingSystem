var diagnoseProcess = (function (config, functions) {
    return {
        getXueNongDuInfo:function(){
            var arr=[];
            $("#xueNongDuTable tbody input").each(function(index,el){
                arr.push($(el).val());
            });

            return arr;
        },
        getTableInfo:function(trs){
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
        getDrugInfo: function (index) {
            var arr = [];
            $("#drugInfoTable tbody tr").each(function (i,el) {
                el=$(el);
                if(index!=i){
                    arr.push([
                        el.find("td:eq(0)").text(),
                        el.find("td:eq(1)").text(),
                        el.find("td:eq(2)").text(),
                        el.find("td:eq(3)").text(),
                        el.find("td:eq(4)").text()
                    ]);
                }
            });

            return arr;
        },
        createDrugInfoItem: function (list) {
            var arr = [
                "<tr>",
                "<td>", list[0], "</td>",
                "<td>", list[1], "</td>",
                "<td>", list[2], "</td>",
                "<td>", list[3], "</td>",
                "<td>", list[4], "</td>",
                "<td>", "<a href='#' class='deleteDrugInfo'>删除</a>", "</td>",
                "</tr>"
            ];

            return arr.join('');
        },
        saveResult:function(callback){
            var xueNongDu=this.getXueNongDuInfo(),
                xueChangGui=this.getTableInfo($("#xueChangGuiTable tbody tr")),
                xueShengHua=this.getTableInfo($("#xueShengHuaTable tbody tr")),
                other=functions.getInfo("other");
            var me = this;

            functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
                patientId: patientId,
                col:"check_result",
                value: JSON.stringify({
                    xueNongDu:xueNongDu,
                    xueChangGui:xueChangGui,
                    xueShengHua:xueShengHua,
                    other:other
                })
            },function(){
                me.saveOptions(callback);
            });
        },
        saveOptions:function(callback){
            var drugInfo = this.getDrugInfo(),
                otherDrug = $("#otherDrug").val();
            functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
                patientId: patientId,
                col:"treatment_options",
                value:JSON.stringify({
                    drugInfo:drugInfo,
                    otherDrug:otherDrug
                })
            }, function () {
                callback();
            });
        },
        saveData:function(callback){
            this.saveResult(callback);
        }
    }
})(config, functions);
$(document).ready(function () {
    setInterval(function(){
        diagnoseProcess.saveData();
    },50000);
    $("#toReturnInfo,#save").click(function(){
        diagnoseProcess.saveData(function(){
            location.href="return-info/"+patientId;
        });
    });
    $("#pageLinkList .item").click(function(){
        var href = $(this).attr("href");
        diagnoseProcess.saveData(function(){
            location.href = href;
        });
    });


    /**************************************************************/
    $("#drugInfoAdd").click(function () {
        var invalidFlag=false,info;

        $("#optionsForm .form-control").each(function(index,el){
            if(!$(el).val()){
                invalidFlag=true;

                return false;
            }
        });

        if (invalidFlag) {
            //提示信息

        } else {

            info=[
                $("#drugInfoName").val(),
                $("#drugInfoAmount").val() + $("#drugInfoFrequency").val(),
                $("#drugInfoUnit").val() + $("#drugInfoFrequency1").val(),
                $("#drugInfoStartDate").val(),
                $("#drugInfoEndDate").val()
            ];

            info = diagnoseProcess.createDrugInfoItem(info.pop());
            $("#drugInfoTable tbody").append(info);
        }

        return false;
    });

    $("#drugInfoTable").on("click", ".deleteDrugInfo", function () {
        var tr=$(this).parents("tr");
        tr.remove();

        return false;
    });
});