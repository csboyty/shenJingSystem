var userMgr=(function(config,functions){

    /**
     * 创建datatable
     * @returns {*|jQuery}
     */
    function createTable(){

        var ownTable=$("#myTable").dataTable({
            "bServerSide": true,
            "sAjaxSource": config.ajaxUrls.patientGetAll,
            "bInfo":true,
            "bProcessing":true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort":false,
            "bAutoWidth": false,
            "iDisplayLength":config.perLoadCounts.table,
            "sPaginationType":"full_numbers",
            "oLanguage": {
                "sUrl":config.dataTable.langUrl
            },
            "aoColumns": [
                { "mDataProp": "no"},
                { "mDataProp": "fullname"},
                { "mDataProp": "age"},
                { "mDataProp": "tel"},
                { "mDataProp": "create_at"},
                { "mDataProp": "memo",
                    "fnRender":function(oObj){
                        var string = "",
                            memo = JSON.parse(oObj.aData.memo),
                            attackType, attackTypeArr =[];
                       if(memo[0] == 1){
                            string += "！";
                        }
                        if(memo[1] == 1){
                            string += "△";
                        }

                        string = "<span style='color:red;font-size: 32px;vertical-align: bottom;'>"+string+"</span>";

                        if(oObj.aData.diagnoseInfo){
                            attackType = JSON.parse(oObj.aData.diagnoseInfo.attack_type);
                            for(var o in attackType[$("#filterType").val()]){
                                attackTypeArr.push(config.seizureType[o]);
                            }

                            string += "&nbsp;&nbsp;&nbsp;&nbsp;["+attackTypeArr.join(",")+"]";
                        }

                        return string;
                    }
                },
                { "mDataProp": "opt",
                    "fnRender":function(oObj){
                        return '<a href="patient/info/'+oObj.aData.id+'">详情</a> &nbsp;<a class="delete" href="'+oObj.aData.id+'">删除</a>';
                    }
                }
            ] ,
            "fnServerParams": function ( aoData ) {
                aoData.push({
                    name:"filter",
                    value:$("#filter").val()
                },{
                    name:"filterType",
                    value:$("#filterType").val()
                },{
                    name:"orderByName",
                    value:$(".orderBySel.text-primary").data("name")
                },{
                    name:"order",
                    value:$(".orderBySel.text-primary").data("sort")
                })
            },
            "fnServerData": function(sSource, aoData, fnCallback) {

                //回调函数
                $.ajax({
                    "dataType":'json',
                    "type":"get",
                    "url":sSource,
                    "data":aoData,
                    "success": function (response) {
                        if(response.success===false){
                            functions.ajaxReturnErrorHandler(response.error_code);
                        }else{
                            var json = {
                                "sEcho" : response.sEcho
                            };

                            for (var i = 0, iLen = response.aaData.length; i < iLen; i++) {
                                response.aaData[i].opt="opt";
                            }

                            json.aaData=response.aaData;
                            json.iTotalRecords = response.iTotalRecords;
                            json.iTotalDisplayRecords = response.iTotalDisplayRecords;
                            fnCallback(json);
                        }

                    }
                });
            },
            "fnFormatNumber":function(iIn){
                return iIn;
            }
        });

        return ownTable;
    }

    return {
        ownTable:null,
        createTable:function(){
            this.ownTable=createTable();
        },
        tableRedraw:function(){
            this.ownTable.fnSettings()._iDisplayStart=0;
            this.ownTable.fnDraw();
        },
        delete:function(id){
            functions.showLoading();
            var me=this;
            $.ajax({
                url:config.ajaxUrls.patientDelete.replace(":id",id),
                type:"post",
                dataType:"json",
                success:function(response){
                    if(response.success){
                        functions.hideLoading();
                        $().toastmessage("showSuccessToast",config.messages.optSuccess);
                        me.ownTable.fnDraw();
                    }else{
                        functions.ajaxReturnErrorHandler(response.error_code);
                    }

                },
                error:function(){
                    functions.ajaxErrorHandler();
                }
            });
        }
    }
})(config,functions);

$(document).ready(function(){

    userMgr.createTable();
    $("#searchBtn").click(function(){
        userMgr.tableRedraw();
    });
    $("#myTable").on("click","a.delete",function(){
        if(confirm(config.messages.confirmDelete)){
            userMgr.delete($(this).attr("href"));
        }
        return false;
    });
    $(".orderBySel").click(function(){
        if($(this).hasClass("text-primary")){
            var sort = $(this).data("sort");
            if(sort == "asc"){
                $(this).data("sort","desc");
                $(this).find(".glyphicon-arrow-up").addClass("glyphicon-arrow-down").removeClass("glyphicon-arrow-up");
            }else{
                $(this).data("sort","asc");
                $(this).find(".glyphicon-arrow-down").addClass("glyphicon-arrow-up").removeClass("glyphicon-arrow-down");
            }
        }else{
            $(".orderBySel").removeClass("text-primary");
            $(this).addClass("text-primary");
        }

        userMgr.tableRedraw();
    });
});

