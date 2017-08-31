var diagnoseInfo=(function(config,functions){

    return {
        saveType:function(callback){
            var buNengFenLei = functions.getInfo("buNengFenLei"),
                buFenFaZuo = functions.getInfo("buFenFaZuo"),
                quanMianFaZuo = functions.getInfo("quanMianFaZuo");

            var me = this;

            functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
                patientId: patientId,
                col:"attack_type",
                value: JSON.stringify({
                    buNengFenLei:buNengFenLei,
                    buFenFaZuo:buFenFaZuo,
                    quanMianFaZuo:quanMianFaZuo
                })
            },function(data){
                me.saveSeizureType(callback);
            });
        },
        saveSeizureType:function(callback){
            var buWei = functions.getInfo("buWei"),
                quanMian = functions.getInfo("quanMian"),
                buNeng = functions.getInfo("buNeng"),
                teShu = functions.getInfo("teShu");

            var me = this;

            functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
                patientId: patientId,
                col:"type",
                value:JSON.stringify({
                    buWei:buWei,
                    quanMian:quanMian,
                    buNeng:buNeng,
                    teShu:teShu
                })
            },function(data){
                me.savePersistentSate(callback);
            });
        },
        savePersistentSate:function(callback){
            functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
                patientId: patientId,
                col:"status",
                value: JSON.stringify(functions.getInfo("status"))
            },function(data){
                callback();
            });
        },
        saveData:function(callback){
            this.saveType(callback);
        }
    }

})(config,functions);

$(document).ready(function(){
    setInterval(function(){
        diagnoseInfo.saveData();
    },50000);
    $("#toDiagnoseProcess,#save").click(function(){
        diagnoseInfo.saveData(function(){
            location.href="diagnose-process/"+patientId;
        });
    });
    $("#pageLinkList .item").click(function(){
        var href = $(this).attr("href");
        diagnoseInfo.saveData(function(){
            location.href = href;
        });
    });

});