var diagnoseProcess = (function (config, functions) {
    return {
        getXueNongDuInfo:function(){
            var arr=[];
            $("#xueNongDuTable tbody input").each(function(index,el){
                arr.push($(el).val());
            });

            return arr;
        },
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
        /***************************************************/
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
        }
    }
})(config, functions);
$(document).ready(function () {
    $("#saveXueNongDu").click(function(){
        var info=diagnoseProcess.getXueNongDuInfo();
        functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
            patientId: patientId,
            type:"xueNongDu",
            col:"check_result",
            xueNongDu: JSON.stringify(info)
        });

        return false;
    });
    $("#saveXueChangGui").click(function(){
        var info=diagnoseProcess.geTableInfo($("#xueChangGuiTable tbody tr"));
        functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
            patientId: patientId,
            type:"xueChangGui",
            col:"check_result",
            xueChangGui: JSON.stringify(info)
        });

        return false;
    });
    $("#saveXueShengHua").click(function(){
        var info=diagnoseProcess.geTableInfo($("#xueShengHuaTable tbody tr"));
        functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
            patientId: patientId,
            type:"xueShengHua",
            col:"check_result",
            xueShengHua: JSON.stringify(info)
        });

        return false;
    });
    $("#saveOther").click(function(){
        var info=functions.getInfo("other");
        functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
            patientId: patientId,
            type:"other",
            col:"check_result",
            other: JSON.stringify(info)
        });

        return false;
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
            info = diagnoseProcess.getDrugInfo();

            info.push([
                $("#drugInfoName").val(),
                $("#drugInfoAmount").val() + $("#drugInfoFrequency").val(),
                $("#drugInfoUnit").val() + $("#drugInfoFrequency1").val(),
                $("#drugInfoStartDate").val(),
                $("#drugInfoEndDate").val()
            ]);

            functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
                patientId: patientId,
                type:"drugInfo",
                col:"treatment_options",
                drugInfo: JSON.stringify(info)
            }, function () {
                info = diagnoseProcess.createDrugInfoItem(info.pop());
                $("#drugInfoTable tbody").append(info);
            });
        }

        return false;
    });

    $("#drugInfoTable").on("click", ".deleteDrugInfo", function () {
        var tr=$(this).parents("tr");
        var info = diagnoseProcess.getDrugInfo(tr.index());

        functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
            patientId: patientId,
            type:"drugInfo",
            col:"treatment_options",
            drugInfo: JSON.stringify(info)
        }, function () {
            tr.remove();
        });

        return false;
    });
    $("#saveOtherDrug").click(function(){
        var info=$("#otherDrug").val();

        functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
            patientId: patientId,
            type:"otherDrug",
            col:"treatment_options",
            otherDrug: info
        });
        return false;
    });
});