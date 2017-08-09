var medical = (function (config, functions) {
    return {
        getDrugInfo: function (index) {
            var arr = [];
            $("#drugInfoTable tbody tr").each(function (i,el) {
                el=$(el);
                if(index!=i){
                    arr.push([
                        el.find("td:eq(0)").text(),
                        el.find("td:eq(1)").text(),
                        el.find("td:eq(2)").text()
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
                "<td>", "<a href='#' class='deleteDrugInfo'>删除</a>", "</td>",
                "</tr>"
            ];

            return arr.join('');
        },
        saveBaseInfo:function(callback){
            var firstInfo = functions.getInfo("firstInfo"),
                performance = functions.getInfo("performance"),
                drugInfos = this.getDrugInfo();
            var me = this;

            functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
                patientId: patientId,
                col:"performance_info",
                value: JSON.stringify({
                    firstInfo:firstInfo,
                    performance:performance,
                    drugInfos:drugInfos
                })
            },function(){
                me.saveCheckInfo(callback);
            });
        },
        saveCheckInfo:function(callback){
            var normal = functions.getInfo("normal"),
                profession = functions.getInfo("profession");
            var me = this;

            functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
                patientId: patientId,
                col:"examine_info",
                value: JSON.stringify({
                    normal:normal,
                    profession:profession
                })
            },function(){
                me.saveHistoryInfo(callback);
            });
        },
        saveHistoryInfo:function(callback){
            var historyPast = functions.getInfo("historyPast"),
                historyPersonal = functions.getInfo("historyPersonal"),
                historyFamily = functions.getInfo("historyFamily");

            functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
                patientId: patientId,
                col:"history_info",
                value: JSON.stringify({
                    historyPast:historyPast,
                    historyPersonal:historyPersonal,
                    historyFamily:historyFamily
                })
            },function(){
                callback();
            });
        },
        saveMedical:function(callback){
            this.saveBaseInfo(callback);
        }
    }
})(config, functions);
$(document).ready(function () {

    $("#toDiagnoseInfo").click(function(){
        medical.saveMedical(function(){
            location.href="diagnose-info/"+patientId;
        });
    });
    $("#pageLinkList .item").click(function(){
        var href = $(this).attr("href");
        medical.saveMedical(function(){
            location.href = href;
        });
    });
    $("#myTabs a").click(function(){
        medical.saveMedical();
    });

    $("#drugInfoAdd").click(function () {
        var info;

        info=[
            $("#drugInfoName").val(),
            $("#drugInfoAmount").val() + $("#drugInfoFrequency").val(),
            $("#drugInfoUnit").val() + $("#drugInfoFrequency1").val()
        ];

        info = medical.createDrugInfoItem(info);
        $("#drugInfoTable tbody").append(info);

        return false;
    });

    $("#drugInfoTable").on("click", ".deleteDrugInfo", function () {
        if(confirm(config.messages.confirmDelete)){
            var tr=$(this).parents("tr");
            tr.remove();
        }


        return false;
    });
    $("[name='stopMeasure']").click(function () {
        $("[name='stopMeasureValue']").val("");
    });


    /**************************************************************************************************/
    $("#uploadFile").change(function () {
        functions.uploadFile($(this), function (url) {
            var fileInfo = functions.getFileInfo(url);
            $("#file").attr("href", url).text(fileInfo.filename + "." + fileInfo.ext);
            $("#fileUrl").val(url);
        });
    });
});