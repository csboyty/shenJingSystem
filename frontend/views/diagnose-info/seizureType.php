<?php
$attack_type=$diagnoseInfo?json_decode($diagnoseInfo->attack_type):null;

$buFenFaZuo=$attack_type&&isset($attack_type->buFenFaZuo)?$attack_type->buFenFaZuo:null;

$quanMianFaZuo=$attack_type&&isset($attack_type->quanMianFaZuo)?$attack_type->quanMianFaZuo:null;

$buNengFenLei=$attack_type&&isset($attack_type->buNengFenLei)?$attack_type->buNengFenLei:null;

$nanZhiXing=$attack_type&&isset($attack_type->nanZhiXing)?$attack_type->nanZhiXing:null;

?>

<div class="panel-group" id="accordionSeizureType" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" id="headingOneSeizureType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseOneSeizureType" data-parent="#accordionSeizureType"
                   aria-expanded="true" aria-controls="collapseOneSeizureType">
                    局灶性起源
                </a>
            </h4>
        </div>
        <div id="collapseOneSeizureType" class="panel-collapse collapse in" aria-labelledby="headingOneSeizureType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">运动性发作</label>
                        <div class="col-md-8">
                            <?php
                            $yunDongZhengZhuangArray=array("自动症","失张力发作",
                                "阵挛发作","癫痫样痉挛发作","过度运动发作","肌阵挛发作","强直发作");
                            $yunDongZhengZhuangSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->yunDongZhengZhuang)){
                                $yunDongZhengZhuangSel=$buFenFaZuo->yunDongZhengZhuang;
                            }
                            foreach($yunDongZhengZhuangArray as $ydzz){
                                $yunDongZhengZhuangChecked="";
                                if(in_array($ydzz, $yunDongZhengZhuangSel)){
                                    $yunDongZhengZhuangChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $yunDongZhengZhuangChecked ?> value="<?= $ydzz ?>"
                                           data-name-parent="buFenFaZuo" name="yunDongZhengZhuang"><?= $ydzz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-2">非运动性发作</label>
                        <div class="col-md-8">
                            <?php
                            $feiYunDongZhengZhuangArray=array("自主神经性发作","行为终止",
                                "认知性发作","情绪性发作","感觉性发作");
                            $feiYunDongZhengZhuangSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->feiYunDongZhengZhuang)){
                                $feiYunDongZhengZhuangSel=$buFenFaZuo->feiYunDongZhengZhuang;
                            }
                            foreach($feiYunDongZhengZhuangArray as $ydzz){
                                $feiYunDongZhengZhuangChecked="";
                                if(in_array($ydzz, $feiYunDongZhengZhuangSel)){
                                    $feiYunDongZhengZhuangChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $feiYunDongZhengZhuangChecked ?> value="<?= $ydzz ?>"
                                           data-name-parent="buFenFaZuo" name="feiYunDongZhengZhuang"><?= $ydzz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">意识</label>
                        <div class="col-md-8">
                            <?php
                            $yiShiArray=array("意识清楚","意识障碍");
                            $yiShiSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->yiShi)){
                                $yiShiSel=$buFenFaZuo->yiShi;
                            }
                            foreach($yiShiArray as $ysitem){
                                $yiShiChecked="";
                                if(in_array($ysitem, $yiShiSel)){
                                    $yiShiChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $yiShiChecked ?> value="<?= $ysitem ?>"
                                           data-name-parent="buFenFaZuo" name="yiShi"><?= $ysitem ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">双侧全面强直</label>
                        <div class="col-md-8">
                            <?php
                            $ceMianQiangZhiArray=array("局灶性发作继发双侧全面强直-阵挛发作");
                            $ceMianQiangZhiSel=array();
                            if($buFenFaZuo&&isset($buFenFaZuo->ceMianQiangZhi)){
                                $ceMianQiangZhiSel=$buFenFaZuo->ceMianQiangZhi;
                            }
                            foreach($ceMianQiangZhiArray as $ydzz){
                                $ceMianQiangZhiChecked="";
                                if(in_array($ydzz, $ceMianQiangZhiSel)){
                                    $ceMianQiangZhiChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $ceMianQiangZhiChecked ?> value="<?= $ydzz ?>"
                                           data-name-parent="buFenFaZuo" name="ceMianQiangZhi"><?= $ydzz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingTwoSeizureType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseTwoSeizureType" data-parent="#accordionSeizureType"
                   aria-expanded="false" aria-controls="collapseTwoSeizureType">
                    全面性起源
                </a>
            </h4>
        </div>
        <div id="collapseTwoSeizureType" class="panel-collapse collapse in" aria-labelledby="headingTwoSeizureType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">运动性发作</label>
                        <div class="col-md-8">
                            <?php
                            $qmYunDongArray=array("强直-阵挛发作","阵挛发作","强直发作","肌阵挛发作","失张力发作","肌阵挛-强直-阵挛发作",
                                "肌阵挛-失张力发作","癫痫样痉挛发作");
                            $qmYunDongSel=array();
                            if($quanMianFaZuo&&isset($quanMianFaZuo->qmYunDong)){
                                $qmYunDongSel=$quanMianFaZuo->qmYunDong;
                            }
                            foreach($qmYunDongArray as $ssfz){
                                $qmYunDongChecked="";
                                if(in_array($ssfz, $qmYunDongSel)){
                                    $qmYunDongChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $qmYunDongChecked ?> value="<?= $ssfz ?>"
                                           data-name-parent="quanMianFaZuo" name="qmYunDong"><?= $ssfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">非运动性发作</label>
                        <div class="col-md-8">
                            <?php
                            $qmFeiYunDongArray=array("典型失神发作","不典型失神发作","肌阵挛发作","眼睑肌阵挛发作");
                            $qmFeiYunDongSel=array();
                            if($quanMianFaZuo&&isset($quanMianFaZuo->qmFeiYunDong)){
                                $qmFeiYunDongSel=$quanMianFaZuo->qmFeiYunDong;
                            }
                            foreach($qmFeiYunDongArray as $ssfz){
                                $qmFeiYunDongChecked="";
                                if(in_array($ssfz, $qmFeiYunDongSel)){
                                    $qmFeiYunDongChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $qmFeiYunDongChecked ?> value="<?= $ssfz ?>"
                                           data-name-parent="quanMianFaZuo" name="qmFeiYunDong"><?= $ssfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingThreeSeizureType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseThreeSeizureType" data-parent="#accordionSeizureType"
                   aria-expanded="false" aria-controls="collapseThreeSeizureType">
                    未知起源
                </a>
            </h4>
        </div>
        <div id="collapseThreeSeizureType" class="panel-collapse collapse in" aria-labelledby="headingThreeSeizureType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">运动性发作</label>
                        <div class="col-md-8">
                            <?php
                            $wzYunDongArray=array("强直-阵挛发作","癫痫样痉挛发作");
                            $wzYunDongSel=array();
                            if($buNengFenLei&&isset($buNengFenLei->wzYunDong)){
                                $wzYunDongSel=$buNengFenLei->wzYunDong;
                            }
                            foreach($wzYunDongArray as $ssfz){
                                $wzYunDongChecked="";
                                if(in_array($ssfz, $wzYunDongSel)){
                                    $wzYunDongChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $wzYunDongChecked ?> value="<?= $ssfz ?>"
                                           data-name-parent="buNengFenLei" name="wzYunDong"><?= $ssfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">非运动性发作</label>
                        <div class="col-md-8">
                            <?php
                            $wzFeiYunDongArray=array("行为终止");
                            $wzFeiYunDongSel=array();
                            if($buNengFenLei&&isset($buNengFenLei->wzFeiYunDong)){
                                $wzFeiYunDongSel=$buNengFenLei->wzFeiYunDong;
                            }
                            foreach($wzFeiYunDongArray as $ssfz){
                                $wzFeiYunDongChecked="";
                                if(in_array($ssfz, $wzFeiYunDongSel)){
                                    $wzFeiYunDongChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $wzFeiYunDongChecked ?> value="<?= $ssfz ?>"
                                           data-name-parent="buNengFenLei" name="wzFeiYunDong"><?= $ssfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">不能归类</label>
                        <div class="col-md-8">
                            <?php
                            $wzBuNengGuiLeiArray=array("不能归类");
                            $wzBuNengGuiLeiSel=array();
                            if($buNengFenLei&&isset($buNengFenLei->wzBuNengGuiLei)){
                                $wzBuNengGuiLeiSel=$buNengFenLei->wzBuNengGuiLei;
                            }
                            foreach($wzBuNengGuiLeiArray as $ssfz){
                                $wzBuNengGuiLeiChecked="";
                                if(in_array($ssfz, $wzBuNengGuiLeiSel)){
                                    $wzBuNengGuiLeiChecked=" checked ";
                                }
                                ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $wzBuNengGuiLeiChecked ?> value="<?= $ssfz ?>"
                                           data-name-parent="buNengFenLei" name="wzBuNengGuiLei"><?= $ssfz ?>
                                </label>
                            <?php
                            }

                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" id="headingFourSeizureType">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseFourSeizureType" data-parent="#accordionSeizureType"
                   aria-expanded="false" aria-controls="collapseFourSeizureType">
                    药物难治性癫痫
                </a>
            </h4>
        </div>
        <div id="collapseFourSeizureType" class="panel-collapse collapse in" aria-labelledby="headingFourSeizureType">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">药物难治性癫痫</label>

                        <div class="col-md-8">
                            <?php
                            $nanZhiXingArray = array("无", "有");
                            $nanZhiXingValue = "";
                            $nanZhiXingPanelClass = "";
                            $nanZhiXingDataValue = false;
                            if ($nanZhiXing && isset($nanZhiXing->nanZhiXingValue)) {
                                $nanZhiXingValue = $nanZhiXing->nanZhiXingValue;
                            }
                            foreach ($nanZhiXingArray as $f) {
                                $nanZhiXingChecked = "";
                                $nanZhiXingDataValue = false;
                                if ($f == $nanZhiXingValue) {
                                    $nanZhiXingChecked = " checked ";
                                }
                                if ($f == "有") {
                                    $nanZhiXingDataValue = true;
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $nanZhiXingChecked; ?> value="<?= $f; ?>" class="ctrl"
                                           data-name-parent="nanZhiXing"
                                           data-value="<?= $nanZhiXingDataValue; ?>" data-control-panel="nanZhiXingCtrlPanel"
                                           name="nanZhiXingValue"><?= $f; ?>
                                </label>
                            <?php
                            }

                            if ($nanZhiXingValue == "有") {
                                $nanZhiXingPanelClass = "";
                            } else {
                                $nanZhiXingPanelClass = "hidden";
                            }
                            ?>

                            <div id="nanZhiXingCtrlPanel" class="ctrlPanel <?= $nanZhiXingPanelClass; ?>">
                                <span style="vertical-align: bottom">原因：</span>

                                <?php
                                $nanZhiXingValuesArray = array("初始治疗失败", "未规律服药/自行停药", "其他");
                                $nanZhiXingValuesSel = array();
                                if ($nanZhiXing && isset($nanZhiXing->nanZhiXingValues)) {
                                    $nanZhiXingValuesSel = $nanZhiXing->nanZhiXingValues;
                                }
                                foreach ($nanZhiXingValuesArray as $fv) {
                                    $nanZhiXingValuesChecked = "";
                                    if (in_array($fv, $nanZhiXingValuesSel)) {
                                        $nanZhiXingValuesChecked = " checked ";
                                    }
                                    ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" <?= $nanZhiXingValuesChecked; ?>  value="<?= $fv; ?>"
                                               data-name-parent="nanZhiXing" name="nanZhiXingValues"><?= $fv; ?>
                                    </label>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>