<?php

$treatment_effect=isset($returnInfo->treatment_effect)?json_decode($returnInfo->treatment_effect):array();

?>

<form class="form-inline" id="effectForm">
    <div class="form-group">
        <input type="date" class="form-control" placeholder="记录时间" id="effectInfoField1">
    </div>
    <div class="form-group">
        <input class="form-control" type="text"  placeholder="已用药时间" id="effectInfoField2">
    </div>
    <div class="form-group">
        <input class="form-control" type="text"  placeholder="发作类型" id="effectInfoField3">
    </div>
    <div class="form-group">
        <input class="form-control" type="text"  placeholder="发作频率" id="effectInfoField4">
    </div>
    <br><br>
    <div class="form-group">
        <input class="form-control" type="text"  placeholder="发作持续时间" id="effectInfoField5">
    </div>
    <button type="submit" class="btn btn-primary" id="effectInfoAdd">新增</button>
</form>
<table class="dataTable" id="effectInfoTable">
    <thead>
    <tr>
        <th>记录时间</th>
        <th>已用药时间</th>
        <th>发作类型</th>
        <th>发作频率</th>
        <th>发作持续时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach($treatment_effect as $di){
        ?>
        <tr><td><?= $di[0] ?></td><td><?= $di[1] ?></td><td><?= $di[2] ?></td>
            <td><?= $di[3] ?></td>
            <td><?= $di[4] ?></td><td><a href="#" class="deleteEffectInfo">删除</a></td></tr>
    <?php
    }
    ?>
    </tbody>
</table>
<h4 class="text-own">说明</h4>
<p>
    1）已用药时间精确到天<br>
    2）发作类型请填写编号，同前。<br>
    3）发作频率，写至最精确，如2次/天，3次/月<br>
    4）发作时间写至最精确，如30s，1min<br>
</p>