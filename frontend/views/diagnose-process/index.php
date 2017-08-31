<?php
$this->title = $patient->fullname."病史信息";
?>
<script>
    var patientId="<?= $patient->id;  ?>";
</script>


<div class="row">
    <div class="col-md-10 col-left">
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

        <div class="form-group">
            <div class="col-md-offset-2 col-md-3">
                <button type="button" class="btn btn-primary form-control" id="toReturnInfo">》随访信息</button>
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
            <a href="diagnose-info/<?= $patient->id; ?>" class="item">拟诊信息</a>
            <a href="diagnose-process/<?= $patient->id; ?>" class="item active">诊治诊断</a>
            <a href="return-info/<?= $patient->id; ?>" class="item">随访信息</a>
        </div>
    </div>
</div>




<?php
$this->registerJsFile("@web/js/src/diagnoseProcess.js", ['depends' => [frontend\assets\AppAsset::className()]]);
?>

