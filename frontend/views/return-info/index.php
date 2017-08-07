<?php
$this->title = $patient->fullname."病史信息";
?>
<script>
    var patientId="<?= $patient->id;  ?>";
</script>

<div class="row">
    <div class="col-md-10 col-left">
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



    </div>
    <div class="col-md-2">
        <div class="pageLinkList">
            <a href="patient/info/<?= $patient->id; ?>" class="item">基本信息</a>
            <a href="medical/<?= $patient->id; ?>" class="item">病史信息</a>
            <a href="diagnose-info/<?= $patient->id; ?>" class="item">拟诊信息</a>
            <a href="diagnose-process/<?= $patient->id; ?>" class="item">诊治诊断</a>
            <a href="return-info/<?= $patient->id; ?>" class="item active">随访信息</a>
        </div>
    </div>
</div>



<?php
    $this->registerJsFile("@web/js/src/returnInfo.js", ['depends' => [frontend\assets\AppAsset::className()]]);
?>
