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
                        el.find("td:eq(2)").text(),
                        el.find("td:eq(3)").text(),
                        el.find("td:eq(4)").text()
                    ]);
                }
            });

            return arr;
        },
        getChiXuDrugInfo: function (index) {
            var arr = [];
            $("#chiXuDrugInfoTable tbody tr").each(function (i,el) {
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
        createChiXuDrugInfoItem: function (list) {
            var arr = [
                "<tr>",
                "<td>", list[0], "</td>",
                "<td>", list[1], "</td>",
                "<td>", list[2], "</td>",
                "<td>", "<a href='#' class='deleteChiXuDrugInfo'>删除</a>", "</td>",
                "</tr>"
            ];

            return arr.join('');
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
        getFaZuoFiles:function(){
            var arr = [];
            $("input[name='faZuoFile']").each(function(index,val){
                arr.push($(this).val());
            });

            return arr;
        },
        saveData:function(callback){
            var firstInfo = functions.getInfo("firstInfo"),
                performance = functions.getInfo("performance"),
                cengFuYao = functions.getInfo("cengFuYao"),
                drugInfos = this.getDrugInfo(),
                chiXuDrugInfos = this.getChiXuDrugInfo();
            var normal = functions.getInfo("normal"),
                profession = functions.getInfo("profession");
            var historyPast = functions.getInfo("historyPast"),
                historyPersonal = functions.getInfo("historyPersonal"),
                historyFamily = functions.getInfo("historyFamily");
            var me = this;


            performance["faZuoFiles"] = this.getFaZuoFiles();

            functions.saveInfo(config.ajaxUrls.medicalInfoUpdate, {
                patientId: patientId,
                col:"performance_info",
                performance_info: JSON.stringify({
                    firstInfo:firstInfo,
                    performance:performance,
                    cengFuYao:cengFuYao,
                    drugInfos:drugInfos,
                    chiXuDrugInfos:chiXuDrugInfos
                }),
                examine_info:JSON.stringify({
                    normal:normal,
                    profession:profession
                }),
                history_info:JSON.stringify({
                    historyPast:historyPast,
                    historyPersonal:historyPersonal,
                    historyFamily:historyFamily
                })
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
        medical.saveData();
    },300000);

    $("#toDiagnoseInfo,#save").click(function(){
        medical.saveData(function(){
            location.href="diagnose-info/"+patientId;
        });
    });
    $("#pageLinkList .item").click(function(){
        var href = $(this).attr("href");
        medical.saveData(function(){
            location.href = href;
        });
    });

    $("#drugInfoAdd").click(function () {
        var info;

        info=[
            $("#drugInfoName").val(),
            $("#drugInfoAmount").val() + $("#drugInfoFrequency").val(),
            $("#drugInfoUnit").val() + "/" +$("#drugInfoFrequency1").val(),
            $("#drugInfoStartDate").val(),
            $("#drugInfoEndDate").val()
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

    $("#chiXuDrugInfoAdd").click(function () {
        var info;

        info=[
            $("#chiXuDrugInfoName").val(),
            $("#chiXuDrugInfoAmount").val() + $("#chiXuDrugInfoFrequency").val(),
            $("#chiXuDrugInfoUnit").val()
        ];

        info = medical.createChiXuDrugInfoItem(info);
        $("#chiXuDrugInfoTable tbody").append(info);

        return false;
    });

    $("#chiXuDrugInfoTable").on("click", ".deleteChiXuDDrugInfo", function () {
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
    $("#uploadFaZuoFile").change(function(){
        functions.uploadFile($(this), function (url) {
            $('<a target="_blank" style="margin-right: 5px" href="'+url+'">'+
                '视频'+($("#faZuoFiles a").length+1)+
                '<input type="hidden" value="'+url+'" name="faZuoFile">'+
            '</a>').appendTo($("#faZuoFiles"));
        });
    });
});