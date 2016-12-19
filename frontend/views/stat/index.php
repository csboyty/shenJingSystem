<?php


$this->title = '数据统计';
?>
    <div>今天新增病例：<b><?= $counts["today"]; ?></b>，本月新增病例：<b><?= $counts["month"]; ?></b>，总计病例：<b><?= $counts["all"]; ?></b></div>
    <hr>
    <div id="sex" style="width: 600px;height:400px;"></div>
    <hr>
    <div id="age" style="width: 600px;height:400px;"></div>

<?php

    $this->registerJsFile("@web/js/lib/echarts.common.min.js",['depends' => [frontend\assets\AppAsset::className()]]);
    $this->registerJsFile("@web/js/src/stat.js",['depends' => [frontend\assets\AppAsset::className()]]);
?>