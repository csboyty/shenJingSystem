var diagnoseInfo=(function(config,functions){

    return {
        saveData:function(callback){
            var buNengFenLei = functions.getInfo("buNengFenLei"),
                buFenFaZuo = functions.getInfo("buFenFaZuo"),
                nanZhiXing = functions.getInfo("nanZhiXing"),
                quanMianFaZuo = functions.getInfo("quanMianFaZuo");
            var buWei = functions.getInfo("buWei"),
                quanMian = functions.getInfo("quanMian"),
                buNeng = functions.getInfo("buNeng"),
                teShu = functions.getInfo("teShu");

            var me = this;

            var attachTypeJson = {

            };
            if(JSON.stringify(buNengFenLei) != "{}"){
                attachTypeJson.buNengFenLei = buNengFenLei;
            }
            if(JSON.stringify(buFenFaZuo) != "{}"){
                attachTypeJson.buFenFaZuo = buFenFaZuo;
            }
            if(JSON.stringify(nanZhiXing) != "{}"){
                attachTypeJson.nanZhiXing = nanZhiXing;
            }
            if(JSON.stringify(quanMianFaZuo) != "{}"){
                attachTypeJson.quanMianFaZuo = quanMianFaZuo;
            }

            functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
                patientId: patientId,
                attack_type: JSON.stringify(attachTypeJson),
                type:JSON.stringify({
                    buWei:buWei,
                    quanMian:quanMian,
                    buNeng:buNeng,
                    teShu:teShu
                }),
                status:JSON.stringify(functions.getInfo("status"))
            },function(data){
                if(callback){
                    callback(data);
                }
            });
        }
    }

})(config,functions);

$(document).ready(function(){
    setInterval(function(){
        diagnoseInfo.saveData();
    },300000);
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