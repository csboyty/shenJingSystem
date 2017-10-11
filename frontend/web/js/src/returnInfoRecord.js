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
        getNaoDianTuFiles:function(){
            var arr = [];
            $("input[name='naoDianTuFile']").each(function(index,val){
                arr.push($(this).val());
            });

            return arr;
        },
        saveData:function(callback){
            var info={};
            info.date= functions.formatDate("y-m-d");
            info.other=functions.getInfo("other");
            info.xueChangGui=this.geTableInfo($("#xueChangGuiTable tbody tr"));
            info.xueShengHua=this.getXueShengHuaTableInfo($("#xueShengHuaTable tbody tr"));

            info.other["naoDianTuFiles"] = this.getNaoDianTuFiles();

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
    },300000);

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
    $("#saveInfo").click(function(){
        returnInfoAdd.saveData(function(){
            location.href="return-info/"+patientId;
        });
    });

    $("#uploadNaoDianTuFile").change(function(){
        functions.uploadFile($(this), function (url) {
            $('<a target="_blank" style="margin-right: 5px" href="'+url+'">'+
                '文件'+($("#naoDianTuFiles a").length+1)+
                '<input type="hidden" value="'+url+'" name="naoDianTuFile">'+
                '</a>').appendTo($("#naoDianTuFiles"));
        });
    });

    $("#goBack").click(function(){
        if(confirm("数据还没有保存，确定离开吗？")){
            location.href="return-info/"+patientId;

            return false;
        }
    })

});