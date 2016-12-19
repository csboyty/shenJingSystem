<?php
$this->title = $patient->fullname."病史信息";
?>
<script>
    var patientId="<?= $patient->id;  ?>";
</script>

<a class="btn btn-primary" style="margin-bottom: 10px;" href="javascript:history.go(-1);">
    <span class="glyphicon glyphicon-arrow-left"></span> 返回
</a>

<ul class="nav nav-tabs" id="myTabs">
    <li class="active"><a href="#effect" aria-controls="seizureType" data-toggle="tab">治疗效果</a></li>
    <li><a href="#records" aria-controls="type" data-toggle="tab">随访记录</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="effect">
        <?php
            echo $this->render("effect",[
                "returnInfo"=>$returnInfo
            ]);
        ?>
    </div>

    <!------------------------------病史-------------------------------->
    <div class="tab-pane" id="records">
        <?php
            echo $this->render("records",[
                "patient"=>$patient,
                "returnInfo"=>$returnInfo
            ]);
        ?>
    </div>
</div>

<?php
    $this->registerJsFile("@web/js/src/returnInfo.js", ['depends' => [frontend\assets\AppAsset::className()]]);
?>
