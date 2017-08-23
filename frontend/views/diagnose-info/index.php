<?php
$this->title =  $patient->fullname."拟诊信息";
?>
<script>
    var patientId="<?= $patient->id;  ?>";
</script>


<div class="row">
    <div class="col-md-10 col-left">
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

        <div class="form-group">
            <div class="col-md-offset-2 col-md-3">
                <button type="button" class="btn btn-primary form-control" id="toDiagnoseProcess">》诊治诊断</button>
            </div>
            <div class="col-md-offset-2 col-md-3">
                <button type="button" class="btn btn-primary form-control" id="save">保存</button>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <div class="pageLinkList">
            <a href="patient/info/<?= $patient->id; ?>" class="item">基本信息</a>
            <a href="medical/<?= $patient->id; ?>" class="item">病史信息</a>
            <a href="diagnose-info/<?= $patient->id; ?>" class="item active">拟诊信息</a>
            <a href="diagnose-process/<?= $patient->id; ?>" class="item">诊治诊断</a>
            <a href="return-info/<?= $patient->id; ?>" class="item">随访信息</a>
        </div>
    </div>
</div>



<?php
    $this->registerJsFile("@web/js/src/diagnoseInfo.js", ['depends' => [frontend\assets\AppAsset::className()]]);
?>

