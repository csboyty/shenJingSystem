/**
 * Created with JetBrains WebStorm.
 * User: ty
 * Date: 14-10-5
 * Time: 下午5:34
 * To change this template use File | Settings | File Templates.
 */
var config={
    baseUrl:"",
    ajaxUrls:{
        patientSubmit:"patient/submit",
        patientDelete:"patient/delete/:id",
        uploadFile:"upload",
        patientGetAll:"patient/list",
        medicalInfoUpdate:"medical/info-update",
        diagnoseInfoUpdate:"diagnose-info/info-update",
        diagnoseProcessInfoUpdate:"diagnose-process/info-update",
        returnInfoUpdate:"return-info/info-update",
        returnInfoRecordSubmit:"return-info/record-submit",
        statGetSexData:"stat/get-sex-data",
        statGetAgeData:"stat/get-age-data"
    },
    dataTable:{
        langUrl:"lang/de_DE.txt"
    },
    perLoadCounts:{
        table:10
    },
    status:{
        service:{
            "0":"未处理",
            "1":"处理中",
            "2":"处理完成"
        }
    },
    seizureType:{
        "yunDongZhengZhuang":"运动性发作",
        "feiYunDongZhengZhuang":"非运动性发作",
        "ceMianQiangZhi":"双侧全面强直",
        "qmYunDong":"运动性发作",
        "qmFeiYunDong":"非运动性发作",
        "wzYunDong":"运动性发作",
        "wzFeiYunDong":"非运动性发作",
        "wzBuNengGuiLei":"不能归类",
        "nanZhiXingValue":"药物难治性癫痫"
    },
    uploader:{
        url:"#",
        swfUrl:"js/plupload/plupload.flash.swf",
        sizes:{
            all:"5120m",
            img:"2m"
        },
        filters:{
            all:"*",
            zip:"zip,rar",
            img:"jpg,JPG,jpeg,JPEG,png,PNG"
        }
    },
    validErrors:{
        required:"请输入此字段！",
        email:"请输入正确的邮箱格式！",
        emailExist:"邮箱已经存在！",
        uploadImg:"请上传图片！",
        number:"请输入数字",
        maxLength:"此字段最多输入${max}个字！",
        minLength:"此字段最少输入${min}个字！",
        rangLength:"此字段只能输入${min}-${max}个字！",
        rang:"此字段只能输入${min}-${max}之间的整数！",
        pwdNotEqual:"两次输入的密码不一样！"
    },
    messages:{
        fixedErrorFirst:"您提交的数据中有错误，请先更正",
        successTitle:"成功提示",
        errorTitle:"错误提示",
        optSuccess:"操作成功！",
        noData:"没有数据",
        progress:"处理中...",
        uploaded:"上传完成！",
        confirmDelete:"确定删除吗？",
        confirm:"确定执行此操作吗？",
        noSelected:"没有选中任何记录！",
        notFound:"资源丢失！",
        loadDataError:"请求数据失败！",
        networkError:"网络异常，请稍后重试！",
        systemError:"系统错误，请稍后重试或者联系mail@lotusprize.com！",
        optSuccRedirect:"操作成功,3秒后跳转到管理页！",
        timeout:"登录超时，3秒后自动跳到登陆页！",
        optError:"服务器端异常，请稍后重试！",
        uploadSizeError:"最大文件大小500M！",
        uploadError:"上传出错，请稍后重试！",
        imageSizeError:"图片大小不符合！"
    }
};
jQuery.extend(jQuery.validator.messages, {
    required: "必填字段",
    remote: "请修正该字段",
    email: "请输入正确格式的电子邮件",
    url: "请输入合法的网址",
    date: "请输入合法的日期",
    dateISO: "请输入合法的日期 (ISO).",
    number: "请输入合法的数字",
    digits: "只能输入整数",
    creditcard: "请输入合法的信用卡号",
    equalTo: "请再次输入相同的值",
    accept: "请输入拥有合法后缀名的字符串",
    maxlength: jQuery.validator.format("请输入一个长度最多是 {0} 的字符串"),
    minlength: jQuery.validator.format("请输入一个长度最少是 {0} 的字符串"),
    rangelength: jQuery.validator.format("请输入一个长度介于 {0} 和 {1} 之间的字符串"),
    range: jQuery.validator.format("请输入一个介于 {0} 和 {1} 之间的值"),
    max: jQuery.validator.format("请输入一个最大为{0} 的值"),
    min: jQuery.validator.format("请输入一个最小为{0} 的值")
});
$(document).ready(function(){

    $("input[type='text'],input[type='email']").blur(function(){
        $(this).val($(this).val().trim());
    });

    //火狐里面阻止form提交
    $("input[type='text'],input[type='password']").keydown(function(e){
        if(e.keyCode==13){
            return false;
        }
    });
});
