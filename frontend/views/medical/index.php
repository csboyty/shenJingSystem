<?php
$this->title = $patient->fullname."病史信息";
?>
<script>
    var patientId="<?= $patient->id;  ?>";
</script>

<div class="row">
    <div class="col-md-10 col-left">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="active"><a href="#info" aria-controls="info" data-toggle="tab">发作情况</a></li>
            <li><a href="#history" aria-controls="history" data-toggle="tab">病史</a></li>
            <li><a href="#check" aria-controls="check" data-toggle="tab">体格检查</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="info">
                <?php
                echo $this->render("info",[
                    "medical"=>$medical
                ]);
                ?>
            </div>

            <!------------------------------病史-------------------------------->
            <div class="tab-pane" id="history">
                <?php
                echo $this->render("history",[
                    "medical"=>$medical
                ]);
                ?>
            </div>

            <!------------------------------体格检查-------------------------------->
            <div class="tab-pane" id="check">
                <?php
                echo $this->render("check",[
                    "medical"=>$medical
                ]);
                ?>
            </div>

        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-3">
                <button type="button" class="btn btn-primary form-control" id="toDiagnoseInfo">》拟诊信息</button>
            </div>
            <div class="col-md-offset-2 col-md-3">
                <button type="button" class="btn btn-primary form-control" id="save">保存</button>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pageLinkList" id="pageLinkList">
            <a href="patient/info/<?= $patient->id; ?>" class="item">基本信息</a>
            <a href="medical/<?= $patient->id; ?>" class="item active">病史信息</a>
            <a href="diagnose-info/<?= $patient->id; ?>" class="item">拟诊信息</a>
            <a href="diagnose-process/<?= $patient->id; ?>" class="item">诊治诊断</a>
            <a href="return-info/<?= $patient->id; ?>" class="item">随访信息</a>
        </div>
    </div>
</div>



    <?php
    $this->registerJsFile("@web/js/src/medical.js", ['depends' => [frontend\assets\AppAsset::className()]]);
    ?>

