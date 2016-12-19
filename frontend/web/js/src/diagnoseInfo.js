var diagnoseInfo=(function(config,functions){

})(config,functions);

$(document).ready(function(){
    $("#saveBuNengFenLei").click(function () {
        var info=functions.getInfo("buNengFenLei");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"buNengFenLei",
            col:"attack_type",
            buNengFenLei: JSON.stringify(info)
        });
        return false;
    });
    $("#saveBuFenFaZuo").click(function () {
        var info=functions.getInfo("buFenFaZuo");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"buFenFaZuo",
            col:"attack_type",
            buFenFaZuo: JSON.stringify(info)
        });
        return false;
    });
    $("#saveQuanMianFaZuo").click(function () {
        var info=functions.getInfo("quanMianFaZuo");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"quanMianFaZuo",
            col:"attack_type",
            quanMianFaZuo: JSON.stringify(info)
        });
        return false;
    });

    /***************************************************************************/
    $("#saveBuWei").click(function () {
        var info=functions.getInfo("buWei");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"buWei",
            col:"type",
            buWei: JSON.stringify(info)
        });
        return false;
    });
    $("#saveQuanMian").click(function () {
        var info=functions.getInfo("quanMian");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"quanMian",
            col:"type",
            quanMian: JSON.stringify(info)
        });
        return false;
    });
    $("#saveBuNeng").click(function () {
        var info=functions.getInfo("buNeng");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"buNeng",
            col:"type",
            buNeng: JSON.stringify(info)
        });
        return false;
    });
    $("#saveTeShu").click(function () {
        var info=functions.getInfo("teShu");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"teShu",
            col:"type",
            teShu: JSON.stringify(info)
        });
        return false;
    });

    /*******************************************************/
    $("#saveStatus").click(function () {
        var info=functions.getInfo("status");

        functions.saveInfo(config.ajaxUrls.diagnoseInfoUpdate, {
            patientId: patientId,
            type:"",
            col:"status",
            status: JSON.stringify(info)
        });
        return false;
    });
});