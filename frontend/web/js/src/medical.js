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
        }
    }
})(config, functions);
$(document).ready(function () {
    $("#drugInfoAdd").click(function () {
        var info;
        if ($("#drugInfoFrequency1").val() == "" || $("#drugInfoAmount").val() == "") {
            //提示信息

        } else {
            info = medical.getDrugInfo();

            info.push([
                $("#drugInfoName").val(),
                $("#drugInfoAmount").val() + $("#drugInfoFrequency").val(),
                $("#drugInfoUnit").val() + $("#drugInfoFrequency1").val()
            ]);

            functions.saveInfo(config.ajaxUrls.medicalDrugInfoUpdate, {
                patientId: patientId,
                type:"drugInfo",
                col:"performance_info",
                drugInfo: JSON.stringify(info)
            }, function () {
                info = medical.createDrugInfoItem(info.pop());
                $("#drugInfoTable tbody").append(info);
            });
        }

        return false;
    });

    $("#drugInfoTable").on("click", ".deleteDrugInfo", function () {
        if(confirm(config.messages.confirmDelete)){
            var tr=$(this).parents("tr");
            var info = medical.getDrugInfo(tr.index());

            functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
                patientId: patientId,
                type:"drugInfo",
                col:"performance_info",
                drugInfo: JSON.stringify(info)
            }, function () {
                tr.remove();
            });
        }


        return false;
    });

    $("#saveFirstInfo").click(function () {
        var info=functions.getInfo("firstInfo");

        functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
            patientId: patientId,
            type:"firstInfo",
            col:"performance_info",
            firstInfo: JSON.stringify(info)
        });
        return false;
    });
    $("#savePerformance").click(function () {

        var info=functions.getInfo("performance");

        functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
            patientId: patientId,
            type:"performance",
            col:"performance_info",
            performance: JSON.stringify(info)
        });

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
    $("#saveHistoryPast").click(function () {
        var info=functions.getInfo("historyPast");

        functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
            patientId: patientId,
            type:"historyPast",
            col:"history_info",
            historyPast: JSON.stringify(info)
        });

        return false;
    });
    $("#saveHistoryPersonal").click(function () {
        var info=functions.getInfo("historyPersonal");

        functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
            patientId: patientId,
            type:"historyPersonal",
            col:"history_info",
            historyPersonal: JSON.stringify(info)
        });

        return false;
    });
    $("#saveHistoryFamily").click(function () {
        var info=functions.getInfo("historyFamily");

        functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
            patientId: patientId,
            type:"historyFamily",
            col:"history_info",
            historyFamily: JSON.stringify(info)
        });

        return false;
    });

    /*******************************************************************************/
    $("#saveNormal").click(function(){
        var info=functions.getInfo("normal");

        functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
            patientId: patientId,
            type:"profession",
            col:"examine_info",
            normal: JSON.stringify(info)
        });

        return false;
    });
    $("#saveProfession").click(function(){
        var info=functions.getInfo("profession");

        functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
            patientId: patientId,
            type:"profession",
            col:"examine_info",
            profession: info
        });

        return false;
    });
});