var returnInfo = (function (config, functions) {
    return {
        getEffectInfo: function (index) {
            var arr = [];
            $("#effectInfoTable tbody tr").each(function (i,el) {
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
        createEffectInfoItem: function (list) {
            var arr = [
                "<tr>",
                "<td>", list[0], "</td>",
                "<td>", list[1], "</td>",
                "<td>", list[2], "</td>",
                "<td>", list[3], "</td>",
                "<td>", list[4], "</td>",
                "<td>", "<a href='#' class='deleteEffectInfo'>删除</a>", "</td>",
                "</tr>"
            ];

            return arr.join('');
        },
        saveData:function(callback){
            var info = this.getEffectInfo();
            functions.saveInfo(config.ajaxUrls.returnInfoUpdate, {
                patientId: patientId,
                col:"treatment_effect",
                value: JSON.stringify(info)
            }, function () {
                if(callback){
                    callback();
                }
            });
        }
    }
})(config, functions);
$(document).ready(function () {

    setInterval(function(){
        returnInfo.saveData();
    },50000);

    $("#save").click(function(){
        returnInfo.saveData();
    });

    $("#effectInfoAdd").click(function () {
        var invalidFlag=false,info;

        $("#effectForm .form-control").each(function(index,el){
            if(!$(el).val()){
                invalidFlag=true;

                return false;
            }
        });

        if (invalidFlag) {
            //提示信息

        } else {

            info=[
                $("#effectInfoField1").val(),
                $("#effectInfoField2").val(),
                $("#effectInfoField3").val(),
                $("#effectInfoField4").val(),
                $("#effectInfoField5").val()
            ];

            info = returnInfo.createEffectInfoItem(info);
            $("#effectInfoTable tbody").prepend(info);
        }

        return false;
    });

    $("#effectInfoTable").on("click", ".deleteEffectInfo", function () {
        if(confirm(config.messages.confirmDelete)){
            var tr=$(this).parents("tr");
            tr.remove();
        }

        return false;
    });
});