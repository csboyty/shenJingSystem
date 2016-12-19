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
    <li class="active"><a href="#result" aria-controls="seizureType" data-toggle="tab">检查结果</a></li>
    <li><a href="#options" aria-controls="type" data-toggle="tab">治疗方案</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="result">
        <?php
            echo $this->render("result",[
                "diagnoseProcess"=>$diagnoseProcess
            ]);
        ?>
    </div>

    <!------------------------------病史-------------------------------->
    <div class="tab-pane" id="options">
        <?php
            echo $this->render("options",[
                "diagnoseProcess"=>$diagnoseProcess
            ]);
        ?>
    </div>
</div>


<?php
$this->registerJsFile("@web/js/src/diagnoseProcess.js", ['depends' => [frontend\assets\AppAsset::className()]]);
?>

