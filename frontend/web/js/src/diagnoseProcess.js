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
        getXueShengHuaTableInfo:function(trs){
            var arr=[];
            trs.each(function(index,el){
                el=$(el);
                arr.push([
                    el.find(".name").val(),
                    el.find(".value").val(),
                    el.find(".unit").val(),
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
        getTouLuFiles:function(){
            var arr = [];
            $("input[name='touLuFile']").each(function(index,val){
                arr.push($(this).val());
            });

            return arr;
        },
        getEEGFiles:function(){
            var arr = [];
            $("input[name='EEGFile']").each(function(index,val){
                arr.push($(this).val());
            });

            return arr;
        },
        saveData:function(callback){
            var xueNongDu=this.getXueNongDuInfo(),
                xueChangGui=this.getTableInfo($("#xueChangGuiTable tbody tr")),
                xueShengHua=this.getXueShengHuaTableInfo($("#xueShengHuaTable tbody tr")),
                other=functions.getInfo("other");
            var drugInfo = this.getDrugInfo(),
                otherDrug = $("#otherDrug").val();
            var me = this;

            other["touLuFiles"] = this.getTouLuFiles();
            other["EEGFiles"] = this.getEEGFiles();

            functions.saveInfo(config.ajaxUrls.diagnoseProcessInfoUpdate, {
                patientId: patientId,
                check_result: JSON.stringify({
                    xueNongDu:xueNongDu,
                    xueChangGui:xueChangGui,
                    xueShengHua:xueShengHua,
                    other:other
                }),
                treatment_options:JSON.stringify({
                    drugInfo:drugInfo,
                    otherDrug:otherDrug
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
        diagnoseProcess.saveData();
    },300000);
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

    $("#addXueShengHua").click(function(){
        var arrString = [
            '<tr>',
            '<td><input type="text" class="form-control name" name="name"></td>',
            '<td><input type="text" class="form-control value" name="value"></td>',
            '<td><input type="text" class="form-control unit" name="unit"></td>',
            '<td>',
                '<label class="radio-inline"><input type="radio" class="isNormal" name="ALTNormal"  value="是">是</label>',
                '<label class="radio-inline"><input type="radio" class="isNormal"  name="ALTNormal" checked value="否">否</label>',
            '</td>',
            '<td>',
                '<label class="radio-inline"><input type="radio" class="hasSense" name="ALTSense"  value="是">是</label>',
                '<label class="radio-inline"><input type="radio" class="hasSense"  name="ALTSense" checked value="否">否</label>',
            '</td>',
            '</tr>'
        ];

        $("#xueShengHuaTable tbody").append(arrString.join(''));

    });

    $("#uploadTouLuFile").change(function(){
        functions.uploadFile($(this), function (url) {
            $('<a target="_blank" style="margin-right: 5px" href="'+url+'">'+
                '文件'+($("#touLuFiles a").length+1)+
                '<input type="hidden" value="'+url+'" name="touLuFile">'+
                '</a>').appendTo($("#touLuFiles"));
        });
    });
    $("#uploadEEGFile").change(function(){
        functions.uploadFile($(this), function (url) {
            $('<a target="_blank" style="margin-right: 5px" href="'+url+'">'+
                '文件'+($("#EEGFiles a").length+1)+
                '<input type="hidden" value="'+url+'" name="EEGFile">'+
                '</a>').appendTo($("#EEGFiles"));
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
                $("#drugInfoUnit").val() +"/"+ $("#drugInfoFrequency1").val(),
                $("#drugInfoStartDate").val(),
                $("#drugInfoEndDate").val()
            ];

            info = diagnoseProcess.createDrugInfoItem(info);
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