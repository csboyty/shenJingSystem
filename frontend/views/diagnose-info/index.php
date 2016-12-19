<?php
$this->title =  $patient->fullname."拟诊信息";
?>
<script>
    var patientId="<?= $patient->id;  ?>";
</script>

<a class="btn btn-primary" style="margin-bottom: 10px;" href="javascript:history.go(-1);">
    <span class="glyphicon glyphicon-arrow-left"></span> 返回
</a>

<ul class="nav nav-tabs" id="myTabs">
    <li class="active"><a href="#seizureType" aria-controls="seizureType" data-toggle="tab">癫痫发作类型</a></li>
    <li><a href="#type" aria-controls="type" data-toggle="tab">癫痫综合征类型</a></li>
    <li><a href="#persistentState" aria-controls="persistentState" data-toggle="tab">癫痫持续状态</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="seizureType">
        <?php
            echo $this->render("seizureType",[
                "diagnoseInfo"=>$diagnoseInfo
            ]);
        ?>
    </div>

    <!------------------------------病史-------------------------------->
    <div class="tab-pane" id="type">
        <?php
            echo $this->render("type",[
                "diagnoseInfo"=>$diagnoseInfo
            ]);
        ?>
    </div>

    <!------------------------------体格检查-------------------------------->
    <div class="tab-pane" id="persistentState">
        <?php
            echo $this->render("persistentState",[
                "diagnoseInfo"=>$diagnoseInfo
            ]);
        ?>
    </div>
</div>



<?php
    $this->registerJsFile("@web/js/src/diagnoseInfo.js", ['depends' => [frontend\assets\AppAsset::className()]]);
?>

