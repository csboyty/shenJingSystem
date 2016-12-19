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


    <?php
    $this->registerJsFile("@web/js/src/medical.js", ['depends' => [frontend\assets\AppAsset::className()]]);
    ?>

