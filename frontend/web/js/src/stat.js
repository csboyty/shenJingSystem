var stat = (function (config, functions) {

    return {
        getData: function (url, callback) {
            functions.showLoading();

            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                success: function (data) {
                    if (data.success) {
                        functions.hideLoading();
                        callback(data);
                    } else {
                        functions.ajaxReturnErrorHandler(data.error_code);
                    }
                },
                error: function (data) {
                    functions.ajaxErrorHandler();
                }
            })
        }
    }
})(config, functions);
$(document).ready(function () {
    stat.getData(config.ajaxUrls.statGetSexData, function (data) {
        var mySexChart = echarts.init(document.getElementById('sex'));
        var sexOption = {
            title: {
                text: '性别',
                subtext: '',
                x: 'center'
            },
            color: ['#66a4f9', '#eb6100', '#EC577B', '#32d6c5', '#4ac246'],
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                x: 'right',
                data: ['男', '女']
            },
            series: [
                {
                    name: '性别',
                    type: 'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data: data.data
                }
            ]
        };
        mySexChart.setOption(sexOption);
    });

    stat.getData(config.ajaxUrls.statGetAgeData, function (data) {
        var myAgeChart = echarts.init(document.getElementById('age'));
        var ageOption = {
            title: {
                text: '年龄',
                subtext: '',
                x: 'center'
            },
            color: ['#66a4f9', '#eb6100', '#EC577B', '#32d6c5', '#4ac246'],
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'right',
                data: ['30-40', '40-50', '50-60', '60-70', '70-80']
            },
            series: [
                {
                    name: '年龄',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '60%'],
                    data: data.data,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };
        myAgeChart.setOption(ageOption);
    });


});
