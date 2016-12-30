<?php


$this->title = '数据统计';
?>
    <div class="row statCounts">
        <div class="col-md-4"><b class="count text-primary"><?= $counts["today"]; ?></b><label class="label">今天新增</label></div>
        <div class="col-md-4"><b class="count text-primary"><?= $counts["month"]; ?></b><label class="label">本月新增</label></div>
        <div class="col-md-4"><b class="count text-primary"><?= $counts["all"]; ?></b><label class="label">总计病例</label></div>
    </div>


    <hr>
    <div id="sex" style="width: 600px;height:400px;"></div>
    <hr>
    <div id="age" style="width: 600px;height:400px;"></div>

<?php

    $this->registerJsFile("@web/js/lib/echarts.common.min.js",['depends' => [frontend\assets\AppAsset::className()]]);
    $this->registerJsFile("@web/js/src/stat.js",['depends' => [frontend\assets\AppAsset::className()]]);
?>