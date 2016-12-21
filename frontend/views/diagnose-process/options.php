<?php

$treatment_options=$diagnoseProcess?json_decode($diagnoseProcess->treatment_options):null;

$drugInfos=$treatment_options?json_decode($treatment_options->drugInfo):array();

?>

<h2 class="text-primary">用药情况</h2>

<form class="form-inline" id="optionsForm">
    <div class="form-group">
        <select class="form-control" id="drugInfoName">
            <option value="卡马西平">卡马西平</option>
            <option value="丙戊酸">丙戊酸</option>
            <option value="苯妥英">苯妥英</option>
            <option value="苯巴比妥">苯巴比妥</option>
            <option value="扑痫酮">扑痫酮</option>
            <option value="乙琥胺">乙琥胺</option>
            <option value="苯二氮卓类">苯二氮卓类</option>
            <option value="吡拉西坦">吡拉西坦</option>
            <option value="拉莫三嗪">拉莫三嗪</option>
            <option value="托吡酯">托吡酯</option>
            <option value="左乙拉西坦">左乙拉西坦</option>
            <option value="加巴喷丁">加巴喷丁</option>
            <option value="非氨酯">非氨酯</option>
            <option value="奥卡西平">奥卡西平</option>
            <option value="氨己烯酸">氨己烯酸</option>
            <option value="噻加宾">噻加宾</option>
            <option value="唑尼沙胺">唑尼沙胺</option>
            <option value="司替戊醇">司替戊醇</option>
        </select>
    </div>
    <div class="form-group">
        <input class="form-control" type="text"  placeholder="剂量"  id="drugInfoAmount">
    </div>
    <div class="form-group">
        <select class="form-control" id="drugInfoFrequency">
            <option>mg/次</option>
            <option>g/次</option>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" id="drugInfoFrequency1">
            <option>每日</option>
            <option>每小时</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="次" id="drugInfoUnit">
    </div>
    <br><br>
    <div class="form-group">
        <input type="date" class="form-control" placeholder="开始时间" id="drugInfoStartDate">
    </div>
    <div class="form-group">
        <input type="date" class="form-control"  placeholder="结束时间" id="drugInfoEndDate">
    </div>
    <button type="submit" class="btn btn-primary" id="drugInfoAdd">新增</button>
</form>
<table class="dataTable" id="drugInfoTable">
    <thead>
    <tr>
        <th>药物名称</th>
        <th>剂量</th>
        <th>频率</th>
        <th>开始时间</th>
        <th>结束时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach($drugInfos as $di){
        ?>
        <tr>
            <td><?= $di[0] ?></td>
            <td><?= $di[1] ?></td>
            <td><?= $di[2] ?></td>
            <td><?= $di[3] ?></td>
            <td><?= $di[4] ?></td>
            <td><a href="#" class="deleteDrugInfo">删除</a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<h2>其他用药</h2>
<textarea style="width:100%;height: 200px;" id="otherDrug"><?= isset($treatment_options->otherDrug)?json_decode($treatment_options->otherDrug):""; ?></textarea>
<button type="button" class="btn btn-primary" id="saveOtherDrug">保存</button>