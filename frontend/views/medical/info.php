<?php

$performance_info = $medical ? json_decode($medical->performance_info) : null;

$firstInfo = $performance_info && isset($performance_info->firstInfo) ? $performance_info->firstInfo : null;

$performance = $performance_info && isset($performance_info->performance) ? $performance_info->performance : null;

$cengFuYao =  $performance_info && isset($performance_info->cengFuYao) ? $performance_info->cengFuYao : null;

$drugInfos = $performance_info && isset($performance_info->drugInfos) ? $performance_info->drugInfos : array();

$chiXuDrugInfos = $performance_info && isset($performance_info->chiXuDrugInfos) ? $performance_info->chiXuDrugInfos : array();
?>
<div class="panel-group" id="accordionInfo" aria-multiselectable="true">
<div class="panel panel-default">
    <div class="panel-heading" id="headingOneInfo">
        <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapseOneInfo" data-parent="#accordionInfo"
               aria-expanded="true" aria-controls="collapseOneInfo">
                首次发作
            </a>
        </h4>
    </div>
    <div id="collapseOneInfo" class="panel-collapse collapse in" aria-labelledby="headingOneInfo">
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-2">年龄</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control"
                               value="<?= isset($firstInfo->age) ? $firstInfo->age : ""; ?>"
                               data-name-parent="firstInfo" name="age">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">首次发作日期</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder="请手动输入"
                               value="<?= isset($firstInfo->date) ? $firstInfo->date : ""; ?>"
                               data-name-parent="firstInfo" name="date">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="panel panel-default">
<div class="panel-heading" id="headingTwoInfo">
    <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" href="#collapseTwoInfo" data-parent="#accordionInfo"
           aria-expanded="false" aria-controls="collapseTwoInfo">
            发作表现
        </a>
    </h4>
</div>
<div id="collapseTwoInfo" class="panel-collapse collapse in" aria-labelledby="headingTwoInfo">
<div class="panel-body">
<form class="form-horizontal">
<div class="form-group">
    <label class="control-label col-md-2">诱发因素*</label>

    <div class="col-md-8">
        <span>不易改变的因素</span>

        <div>
            <?php
            $elementUnChangeArray = array("性别", "年龄", "遗传因素", "月经", "妊娠", "觉醒与睡眠");
            $elementUnChangeSel = array();
            if ($performance && isset($performance->elementUnChange)) {
                $elementUnChangeSel = $performance->elementUnChange;
            }
            foreach ($elementUnChangeArray as $euc) {
                $elementUnChangeChecked = "";
                if (in_array($euc, $elementUnChangeSel)) {
                    $elementUnChangeChecked = " checked ";
                }
                ?>
                <label class="checkbox-inline">
                    <input type="checkbox" <?= $elementUnChangeChecked ?> value="<?= $euc ?>"
                           data-name-parent="performance" name="elementUnChange"><?= $euc ?>
                </label>
            <?php
            }
            ?>


            <?php
            if (in_array("其他", $elementUnChangeSel)) {
                $elementUnChangeQiTaChecked = " checked ";
                $elementUnChangeQiTaPanelClass = "";
            } else {
                $elementUnChangeQiTaChecked = "";
                $elementUnChangeQiTaPanelClass = "hidden";
            }

            ?>
            <br>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $elementUnChangeQiTaChecked; ?> value="其他"
                       data-name-parent="performance" name="elementUnChange" class="ctrl"
                       data-control-panel="elementUnChangeQiTa">其他
            </label>

            <div class="ctrlPanel <?= $elementUnChangeQiTaPanelClass; ?>" id="elementUnChangeQiTa">
                其他：<input type="text" value="<?= isset($performance->elementUnChangeQiTa) ? $performance->elementUnChangeQiTa : ""; ?>"
                          data-name-parent="performance" name="elementUnChangeQiTa">
            </div>
        </div>
        <br>
        <span>可改变的因素</span>

        <div>

            <?php
            $elementChangeArray = array("发热", "饮酒", "疲劳", "缺睡", "药物", "停药", "精神因素");
            $elementChangeSel = array();
            if ($performance && isset($performance->elementChange)) {
                $elementChangeSel = $performance->elementChange;
            }
            foreach ($elementChangeArray as $ec) {
                $elementChangeChecked = "";
                if (in_array($ec, $elementChangeSel)) {
                    $elementChangeChecked = " checked ";
                }
                ?>
                <label class="checkbox-inline">
                    <input type="checkbox" <?= $elementChangeChecked ?> value="<?= $ec ?>"
                           data-name-parent="performance" name="elementChange"><?= $ec ?>
                </label>
            <?php
            }
            ?>

            <?php
            if (in_array("其他", $elementChangeSel)) {
                $elementChangeQiTaChecked = " checked ";
                $elementChangeQiTaPanelClass = "";
            } else {
                $elementChangeQiTaChecked = "";
                $elementChangeQiTaPanelClass = "hidden";
            }

            ?>
            <br>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $elementChangeQiTaChecked; ?> value="其他"
                       data-name-parent="performance" name="elementChange" class="ctrl"
                       data-control-panel="elementChangeQiTa">其他
            </label>

            <div class="ctrlPanel <?= $elementChangeQiTaPanelClass; ?>" id="elementChangeQiTa">
                其他：<input type="text" value="<?= isset($performance->elementChangeQiTa) ? $performance->elementChangeQiTa : ""; ?>"
                          data-name-parent="performance" name="elementChangeQiTa">
            </div>

            <?php

            if (in_array("感觉因素", $elementChangeSel)) {
                $elementFeelChecked = " checked ";
                $elementFeelPanelClass = "";
            } else {
                $elementFeelChecked = "";
                $elementFeelPanelClass = "hidden";
            }

            ?>
            <br>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $elementFeelChecked; ?> value="感觉因素" data-name-parent="performance"
                       name="elementChange"
                       class="ctrl" data-control-panel="elementCtrlPanel">感觉因素
            </label>

            <div class="ctrlPanel <?= $elementFeelPanelClass; ?>" id="elementCtrlPanel">
                <span>感觉因素</span>

                <div>

                    <?php
                    $elementFeelArray = array("视", "听");
                    $elementFeelSel = array();
                    if ($performance && isset($performance->elementFeel)) {
                        $elementFeelSel = $performance->elementFeel;
                    }
                    foreach ($elementFeelArray as $ef) {
                        $elementFeelChecked = "";
                        if (in_array($ef, $elementFeelSel)) {
                            $elementFeelChecked = " checked ";
                        }
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" <?= $elementFeelChecked; ?> value="<?= $ef; ?>"
                                   data-name-parent="performance" name="elementFeel"><?= $ef ?>
                        </label>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-2">发作前先兆</label>

    <div class="col-md-8">
        <?php
        $forebodingArray = array("无", "有");
        $foreboding = "";
        $forebodingPanelClass = "";
        $forebodingDataValue = false;
        if ($performance && isset($performance->foreboding)) {
            $foreboding = $performance->foreboding;
        }
        foreach ($forebodingArray as $f) {
            $forebodingChecked = "";
            $forebodingDataValue = false;
            if ($f == $foreboding) {
                $forebodingChecked = " checked ";
            }
            if ($f == "有") {
                $forebodingDataValue = true;
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $forebodingChecked; ?> value="<?= $f; ?>" class="ctrl"
                       data-name-parent="performance"
                       data-value="<?= $forebodingDataValue; ?>" data-control-panel="forebodingCtrlPanel"
                       name="foreboding"><?= $f; ?>
            </label>
        <?php
        }

        if ($foreboding == "有") {
            $forebodingPanelClass = "";
        } else {
            $forebodingPanelClass = "hidden";
        }
        ?>

        <div id="forebodingCtrlPanel" class="ctrlPanel <?= $forebodingPanelClass; ?>">
            <span style="vertical-align: bottom">先兆：</span>

            <?php
            $forebodingValuesArray = array("幻嗅", "幻视", "幻听", "胃气上升", "头晕");
            $forebodingValuesSel = array();
            if ($performance && isset($performance->forebodingValues)) {
                $forebodingValuesSel = $performance->forebodingValues;
            }
            foreach ($forebodingValuesArray as $fv) {
                $forebodingValuesChecked = "";
                if (in_array($fv, $forebodingValuesSel)) {
                    $forebodingValuesChecked = " checked ";
                }
                ?>
                <label class="checkbox-inline">
                    <input type="checkbox" <?= $forebodingValuesChecked; ?>  value="<?= $fv; ?>"
                           data-name-parent="performance" name="forebodingValues"><?= $fv; ?>
                </label>
            <?php
            }
            ?>

            <?php
            if (in_array("其他", $forebodingValuesSel)) {
                $forebodingQiTaChecked = " checked ";
                $forebodingQiTaPanelClass = "";
            } else {
                $forebodingQiTaChecked = "";
                $forebodingQiTaPanelClass = "hidden";
            }

            ?>
            <br>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $forebodingQiTaChecked; ?> value="其他"
                       data-name-parent="performance" name="forebodingValues" class="ctrl"
                       data-control-panel="forebodingQiTa">其他
            </label>

            <div class="ctrlPanel <?= $forebodingQiTaPanelClass; ?>" id="forebodingQiTa">
                其他：<input type="text" value="<?= isset($performance->forebodingQiTa) ? $performance->forebodingQiTa : ""; ?>"
                          data-name-parent="performance" name="forebodingQiTa">
            </div>

        </div>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-2">发作时间</label>

    <div class="col-md-8">
        <?php
        $dateArray = array("白天", "睡前", "睡眠");
        $dateSel = array();
        if ($performance && isset($performance->date)) {
            $dateSel = $performance->date;
        }
        foreach ($dateArray as $da) {
            $dateChecked = "";
            if (in_array($da, $dateSel)) {
                $dateChecked = " checked ";
            }
            ?>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $dateChecked; ?>  value="<?= $da; ?>"
                       data-name-parent="performance" name="date"><?= $da; ?>
            </label>

        <?php
        }
        ?>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">神志</label>

    <div class="col-md-8">
        <?php
        $performanceShenZhiArray = array("清醒", "意识障碍");
        $performanceShenZhiSel = array();
        if ($performance && isset($performance->shenZhi)) {
            $performanceShenZhiSel = $performance->shenZhi;
        }
        foreach ($performanceShenZhiArray as $psv) {
            $performanceShenZhiChecked = "";
            if (in_array($psv, $performanceShenZhiSel)) {
                $performanceShenZhiChecked = " checked ";
            }
            ?>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $performanceShenZhiChecked; ?>  value="<?= $psv; ?>"
                       data-name-parent="performance" name="shenZhi"><?= $psv; ?>
            </label>

        <?php
        }
        ?>

    </div>
</div>


<div class="form-group">

    <label class="control-label col-md-2">跌倒或摔倒</label>

    <div class="col-md-8">
        <?php
        $xianZhaoArray = array("无", "有");
        $xianZhao = "";
        if ($performance && isset($performance->xianZhao)) {
            $xianZhao = $performance->xianZhao;
        }
        foreach ($xianZhaoArray as $xz) {
            $xianZhaoChecked = "";
            if ($xz == $xianZhao) {
                $xianZhaoChecked = " checked ";
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $xianZhaoChecked; ?> value="<?= $xz; ?>" data-name-parent="performance"
                       name="xianZhao"><?= $xz; ?>
            </label>
        <?php
        }
        ?>

    </div>
</div>


<div class="form-group">

    <label class="control-label col-md-2">大小便失禁</label>

    <div class="col-md-8">
        <?php
        $daXiaoBianArray = array("无", "有");
        $daXiaoBian = "";
        if ($performance && isset($performance->daXiaoBian)) {
            $daXiaoBian = $performance->daXiaoBian;
        }
        foreach ($daXiaoBianArray as $dxb) {
            $daXiaoBianChecked = "";
            if ($dxb == $daXiaoBian) {
                $daXiaoBianChecked = " checked ";
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $daXiaoBianChecked; ?> value="<?= $dxb; ?>" data-name-parent="performance"
                       name="daXiaoBian"><?= $dxb; ?>
            </label>
        <?php
        }
        ?>

    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-2">舌咬伤</label>

    <div class="col-md-8">
        <?php
        $sheYaoShangArray = array("无", "有");
        $sheYaoShang = "";
        if ($performance && isset($performance->sheYaoShang)) {
            $sheYaoShang = $performance->sheYaoShang;
        }
        foreach ($sheYaoShangArray as $sys) {
            $sheYaoShangChecked = "";
            if ($sys == $sheYaoShang) {
                $sheYaoShangChecked = " checked ";
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $sheYaoShangChecked; ?> value="<?= $sys; ?>" data-name-parent="performance"
                       name="sheYaoShang"><?= $sys; ?>
            </label>
        <?php
        }
        ?>

    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-2">典型发作表现</label>

    <div class="col-md-8">
        <?php
        $performanceValuesArray = array("强直-阵挛", "强直", "阵挛", "失张力", "自动症", "感觉异常", "精神异常", "失神");
        $performanceValuesSel = array();
        if ($performance && isset($performance->performanceValues)) {
            $performanceValuesSel = $performance->performanceValues;
        }
        foreach ($performanceValuesArray as $pv) {
            $performanceValuesChecked = "";
            if (in_array($pv, $performanceValuesSel)) {
                $performanceValuesChecked = " checked ";
            }
            ?>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $performanceValuesChecked; ?>  value="<?= $pv; ?>"
                       data-name-parent="performance" name="performanceValues"><?= $pv; ?>
            </label>

        <?php
        }
        ?>

        <?php
        if (in_array("其他", $performanceValuesSel)) {
            $fzQiTaChecked = " checked ";
            $fzQiTaPanelClass = "";
        } else {
            $fzQiTaChecked = "";
            $fzQiTaPanelClass = "hidden";
        }

        ?>
        <label class="checkbox-inline">
            <input type="checkbox" <?= $fzQiTaChecked; ?> value="其他"
                   data-name-parent="performance" name="performanceValues" class="ctrl"
                   data-control-panel="performanceFaZuoQiTa">其他
        </label>

        <div class="ctrlPanel <?= $fzQiTaPanelClass; ?>" id="performanceFaZuoQiTa">
            其他：<input type="text" value="<?= isset($performance->faZuoBiaoXianQiTa) ? $performance->faZuoBiaoXianQiTa : ""; ?>"
                      data-name-parent="performance" name="faZuoBiaoXianQiTa">
        </div>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-2">发作部位</label>

    <div class="col-md-8">
        <?php
        $buWeiArray = array("左侧", "右侧", "双侧", "面部", "上肢", "下肢");
        $buWeiSel = array();
        if ($performance && isset($performance->buWei)) {
            $buWeiSel = $performance->buWei;
        }
        foreach ($buWeiArray as $bw) {
            $buWeiChecked = "";
            if (in_array($bw, $dateSel)) {
                $buWeiChecked = " checked ";
            }
            ?>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $buWeiChecked; ?>  value="<?= $bw; ?>"
                       data-name-parent="performance" name="buWei"><?= $bw; ?>
            </label>

        <?php
        }
        ?>

        <?php
        if (in_array("其他", $buWeiSel)) {
            $bwQiTaChecked = " checked ";
            $bwQiTaPanelClass = "";
        } else {
            $bwQiTaChecked = "";
            $bwQiTaPanelClass = "hidden";
        }

        ?>
        <label class="checkbox-inline">
            <input type="checkbox" <?= $bwQiTaChecked; ?> value="其他"
                   data-name-parent="performance" name="buWei" class="ctrl"
                   data-control-panel="performanceBuWeiQiTa">其他
        </label>

        <div class="ctrlPanel <?= $bwQiTaPanelClass; ?>" id="performanceBuWeiQiTa">
            其他：<input type="text" value="<?= isset($performance->faZuoBuWeiQiTa) ? $performance->faZuoBuWeiQiTa : ""; ?>"
                      data-name-parent="performance" name="faZuoBuWeiQiTa">
        </div>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-2">每次发作持续时间</label>

    <div class="col-md-3">
        <input type="text" class="form-control"
               value="<?= isset($performance->duration) ? $performance->duration : ""; ?>" name="duration"
               data-name-parent="performance">
    </div>
    <div class="col-md-2">
        <select class="form-control" data-name-parent="performance" name="durationUnit">
            <?php
            $durationUnitArray = array("秒", "分", "小时", "天");
            $duSel = "";
            if ($performance && isset($performance->durationUnit)) {
                $duSel = $performance->durationUnit;
            }
            foreach ($durationUnitArray as $du) {
                $duOptionSel = "";
                if ($duSel == $du) {
                    $duOptionSel = " selected ";
                }
                ?>

                <option <?= $duOptionSel; ?> value="<?= $du; ?>"><?= $du; ?></option>

            <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="name" class="control-label col-md-2">发作频率</label>

    <div class="col-md-1">
        <input type="text" class="form-control"
               value="<?= isset($performance->frequency) ? $performance->frequency : ""; ?>"
               data-name-parent="performance" name="frequency">
    </div>
    <div class="col-md-2">
        <select class="form-control" data-name-parent="performance" name="frequencyUnit">
            <?php
            $frequencyUnitArray = array("次/年", "次/月", "次/周", "次/日");
            $fuSel = "";
            if ($performance && isset($performance->frequencyUnit)) {
                $fuSel = $performance->frequencyUnit;
            }
            foreach ($frequencyUnitArray as $fu) {
                $fuOptionSel = "";
                if ($fuSel == $fu) {
                    $fuOptionSel = " selected ";
                }
                ?>

                <option <?= $fuOptionSel; ?> value="<?= $fu; ?>"><?= $fu; ?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="col-md-3">
        <input type="text" placeholder="其他" class="form-control" value="<?= isset($performance->frequencyQiTa) ? $performance->frequencyQiTa : ""; ?>"
                  data-name-parent="performance" name="frequencyQiTa">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">首次发作后发作症状是否有改变</label>

    <div class="col-md-8">
        <?php
        $shouCiFaZuoGaiBianArray = array("无", "有");
        $shouCiFaZuoGaiBian = "";
        $shouCiFaZuoGaiBianPanelClass = "";
        $shouCiFaZuoGaiBianDataValue = false;
        if ($performance && isset($performance->shouCiFaZuoGaiBian)) {
            $shouCiFaZuoGaiBian = $performance->shouCiFaZuoGaiBian;
        }
        foreach ($shouCiFaZuoGaiBianArray as $f) {
            $shouCiFaZuoGaiBianChecked = "";
            $shouCiFaZuoGaiBianDataValue = false;
            if ($f == $shouCiFaZuoGaiBian) {
                $shouCiFaZuoGaiBianChecked = " checked ";
            }
            if ($f == "有") {
                $shouCiFaZuoGaiBianDataValue = true;
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $shouCiFaZuoGaiBianChecked; ?> value="<?= $f; ?>" class="ctrl" data-name-parent="performance"
                       data-value="<?= $shouCiFaZuoGaiBianDataValue; ?>"
                       data-control-panel="shouCiFaZuoGaiBianCtrlPanel" name="shouCiFaZuoGaiBian"><?= $f; ?>
            </label>
        <?php
        }
        ?>

    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">癫痫持续状态</label>

    <div class="col-md-8">
        <?php
        $chiXuArray = array("无", "有");
        $chiXu = "";
        $chiXuPanelClass = "";
        $chiXuDataValue = false;
        if ($performance && isset($performance->chiXu)) {
            $chiXu = $performance->chiXu;
        }
        foreach ($chiXuArray as $f) {
            $chiXuChecked = "";
            $chiXuDataValue = false;
            if ($f == $chiXu) {
                $chiXuChecked = " checked ";
            }
            if ($f == "有") {
                $chiXuDataValue = true;
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $chiXuChecked; ?> value="<?= $f; ?>" class="ctrl" data-name-parent="performance"
                       data-value="<?= $chiXuDataValue; ?>" data-control-panel="chiXuCtrlPanel" name="chiXu"><?= $f; ?>
            </label>
        <?php
        }

        if ($chiXu == "有") {
            $chiXuPanelClass = "";
        } else {
            $chiXuPanelClass = "hidden";
        }
        ?>

        <div id="chiXuCtrlPanel" class="ctrlPanel <?= $chiXuPanelClass; ?>">

            <span style="vertical-align: bottom">发作次数：</span>
            <input style="text" data-name-parent="performance" name="chiXuCiShu"
                   value="<?= isset($performance->chiXuCiShu) ? $performance->chiXuCiShu : ""; ?>">
            <br>
            <span style="vertical-align: bottom">类型：</span>

            <?php
            $chiXuValuesArray = array("幻嗅", "幻视", "幻听", "胃气上升", "头晕", "其他");
            $chiXuValuesSel = array();
            if ($performance && isset($performance->chiXuValues)) {
                $chiXuValuesSel = $performance->chiXuValues;
            }
            foreach ($chiXuValuesArray as $fv) {
                $chiXuValuesChecked = "";
                if (in_array($fv, $chiXuValuesSel)) {
                    $chiXuValuesChecked = " checked ";
                }
                ?>
                <label class="checkbox-inline">
                    <input type="checkbox" <?= $chiXuValuesChecked; ?>  value="<?= $fv; ?>"
                           data-name-parent="performance" name="chiXuValues"><?= $fv; ?>
                </label>
            <?php
            }
            ?>

            <?php
            if (in_array("其他", $chiXuValuesSel)) {
                $chiXuQiTaChecked = " checked ";
                $chiXuQiTaPanelClass = "";
            } else {
                $chiXuQiTaChecked = "";
                $chiXuQiTaPanelClass = "hidden";
            }

            ?>
            <br>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $chiXuQiTaChecked; ?> value="其他"
                       data-name-parent="performance" name="chiXuValues" class="ctrl"
                       data-control-panel="chiXuQiTa">其他
            </label>

            <div class="ctrlPanel <?= $chiXuQiTaPanelClass; ?>" id="chiXuQiTa">
                其他：<input type="text" value="<?= isset($performance->chiXuQiTa) ? $performance->chiXuQiTa : ""; ?>"
                          data-name-parent="performance" name="chiXuQiTa">
            </div>

        </div>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-2">发作视频(<500m)</label>

    <div class="col-md-8" id="uploadContainer">
        <input type="file" id="uploadFaZuoFile">
        <br>

        <div id="faZuoFiles">
            <?php
            $faZuoFiles = array();
            if ($performance && isset($performance->faZuoFiles)) {
                $faZuoFiles = $performance->faZuoFiles;
            }
            foreach ($faZuoFiles as $key => $value) {

                ?>
                <a target="_blank" href="<?= $value; ?>" style="margin-right: 5px">
                    视频<?= $key+1; ?>

                    <input type="hidden" value="<?= $value; ?>"
                           name="faZuoFile">
                </a>
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

<!-----------------------------------曾服药---------------------------------------->
<div class="panel panel-default">
<div class="panel-heading" id="headingThreeInfo">
    <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapseThreeInfo" data-parent="#accordionInfo"
           aria-expanded="false" aria-controls="collapseThreeInfo">
            曾服药情况
        </a>
    </h4>
</div>
<div id="collapseThreeInfo" class="panel-collapse collapse in" aria-labelledby="headingThreeInfo">
<div class="panel-body">
<form class="form-horizontal">
<div class="form-group">
    <label for="name" class="control-label col-md-2">曾服药</label>

    <div class="col-md-10">
        <?php
        $cengFuYaoArray = array("无", "有");
        $cengFuYaoValue = "";
        $cengFuYaoPanelClass = "";
        $cengFuYaoDataValue = false;
        if ($cengFuYao && isset($cengFuYao->cengFuYaoValue)) {
            $cengFuYaoValue = $cengFuYao->cengFuYaoValue;
        }
        foreach ($cengFuYaoArray as $cfy) {
            $cengFuYaoChecked = "";
            $cengFuYaoDataValue = false;
            if ($cfy == $cengFuYaoValue) {
                $cengFuYaoChecked = " checked ";
            }
            if ($cfy == "有") {
                $cengFuYaoDataValue = true;
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $cengFuYaoChecked; ?> value="<?= $cfy; ?>" class="ctrl"
                       data-name-parent="cengFuYao"
                       data-value="<?= $cengFuYaoDataValue; ?>" data-control-panel="cengFuYaoCtrlPanel"
                       name="cengFuYaoValue"><?= $cfy; ?>
            </label>
        <?php
        }

        if ($cengFuYaoValue == "有") {
            $cengFuYaoPanelClass = "";
        } else {
            $cengFuYaoPanelClass = "hidden";
        }
        ?>
        <div id="cengFuYaoCtrlPanel" class="<?= $cengFuYaoPanelClass; ?>" style="margin-top: 10px;">
            <div class="row" id="drugInfoForm">

                <div class="col-md-2">
                    <div class="inputSel">
                        <input type="text" class="form-control" id="drugInfoName">
                        <select class="form-control inputSelSel">
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
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="剂量" id="drugInfoAmount">
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="drugInfoFrequency">
                        <option>mg/次</option>
                        <option>g/次</option>
                    </select>
                </div>


                <div class="col-md-2">
                    <select class="form-control" id="drugInfoUnit">
                        <option>每日</option>
                        <option>每小时</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="次" id="drugInfoFrequency1">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="起" id="drugInfoStartDate">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="止" id="drugInfoEndDate">
                </div>
                <div class="col-md-2">
                    <button type="submit" id="drugInfoAdd" class="btn btn-primary">新增</button>
                </div>
            </div>
            <table class="dataTable" id="drugInfoTable">
                <thead>
                <tr>
                    <th>药物名称</th>
                    <th>剂量</th>
                    <th>频率</th>
                    <th>开始日期</th>
                    <th>结束日期</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($drugInfos as $di) {
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
        </div>
    </div>
</div>
<div class="form-group">
    <label for="name" class="control-label col-md-2">副作用</label>

    <div class="col-md-8">
        <?php
        $sideEffectArray = array("无", "有");
        $sideEffect = "";
        $sideEffectPanelClass = "";
        $sideEffectDataValue = false;
        if ($cengFuYao && isset($cengFuYao->sideEffect)) {
            $sideEffect = $cengFuYao->sideEffect;
        }
        foreach ($sideEffectArray as $se) {
            $sideEffectChecked = "";
            $sideEffectDataValue = false;
            if ($se == $sideEffect) {
                $sideEffectChecked = " checked ";
            }
            if ($se == "有") {
                $sideEffectDataValue = true;
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $sideEffectChecked; ?> value="<?= $se; ?>" class="ctrl"
                       data-name-parent="cengFuYao"
                       data-value="<?= $sideEffectDataValue; ?>" data-control-panel="sideEffectCtrlPanel"
                       name="sideEffect"><?= $se; ?>
            </label>
        <?php
        }

        if ($sideEffect == "有") {
            $sideEffectPanelClass = "";
        } else {
            $sideEffectPanelClass = "hidden";
        }
        ?>
        <div id="sideEffectCtrlPanel" class="<?= $sideEffectPanelClass; ?> ">
            <span style="vertical-align: bottom">能否忍受：</span>
            <?php
            $sideEffectTypeArray = array("能", "不能");
            $sideEffectType = "";
            $sideEffectTypePanelClass = "";
            $sideEffectTypeDataValue = false;
            if ($cengFuYao && isset($cengFuYao->sideEffectType)) {
                $sideEffectType = $cengFuYao->sideEffectType;
            }
            foreach ($sideEffectTypeArray as $set) {
                $sideEffectTypeChecked = "";
                $sideEffectTypeDataValue = false;
                if ($set == $sideEffectType) {
                    $sideEffectTypeChecked = " checked ";
                }
                if ($set == "不能") {
                    $sideEffectTypeDataValue = true;
                }
                ?>
                <label class="radio-inline">
                    <input type="radio" <?= $sideEffectTypeChecked; ?> value="<?= $set; ?>" class="ctrl"
                           data-name-parent="cengFuYao"
                           data-value="<?= $sideEffectTypeDataValue; ?>" data-control-panel="sideEffectCtrl1Panel"
                           name="sideEffectType"><?= $set; ?>
                </label>
            <?php
            }

            if ($sideEffectType == "不能") {
                $sideEffectTypePanelClass = "";
            } else {
                $sideEffectTypePanelClass = "hidden";
            }
            ?>
        </div>
        <div id="sideEffectCtrl1Panel" class="<?= $sideEffectTypePanelClass; ?>">
            <span style="vertical-align: bottom">表现：</span>
            <?php
            $sideEffectTypeValuesArray = array("胃肠道紊乱", "神经精神反应", "肝毒性", "体重增加或减轻",
                "血液紊乱", "引起发作加重", "心血管反应", "皮疹");
            $sideEffectTypeValuesSel = array();
            if ($cengFuYao && isset($cengFuYao->sideEffectTypeValues)) {
                $sideEffectTypeValuesSel = $cengFuYao->sideEffectTypeValues;
            }
            foreach ($sideEffectTypeValuesArray as $setv) {
                $sideEffectTypeValuesChecked = "";
                if (in_array($setv, $sideEffectTypeValuesSel)) {
                    $sideEffectTypeValuesChecked = " checked ";
                }
                ?>
                <label class="checkbox-inline">
                    <input type="checkbox" <?= $sideEffectTypeValuesChecked; ?>  value="<?= $setv; ?>"
                           data-name-parent="cengFuYao" name="sideEffectTypeValues"><?= $setv; ?>
                </label>
            <?php
            }
            ?>


            <?php
            if (in_array("其他", $sideEffectTypeValuesSel)) {
                $sideEffectTypeQiTaChecked = " checked ";
                $sideEffectTypeQiTaPanelClass = "";
            } else {
                $sideEffectTypeQiTaChecked = "";
                $sideEffectTypeQiTaPanelClass = "hidden";
            }

            ?>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $sideEffectTypeQiTaChecked; ?> value="其他"
                       data-name-parent="cengFuYao" name="sideEffectTypeValues" class="ctrl"
                       data-control-panel="sideEffectTypeQiTa">其他
            </label>

            <div class="ctrlPanel <?= $sideEffectTypeQiTaPanelClass; ?>" id="sideEffectTypeQiTa">
                其他：<input type="text" value="<?= isset($cengFuYao->sideEffectTypeQiTa) ? $cengFuYao->sideEffectTypeQiTa : ""; ?>"
                          data-name-parent="cengFuYao" name="sideEffectTypeQiTa">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="name" class="control-label col-md-2">患者依存性</label>

    <div class="col-md-8">
        <?php
        $dependencyArray = array("好", "不好");
        $dependency = "";
        $dependencyPanelClass = "";
        $dependencyDataValue = false;
        if ($cengFuYao && isset($cengFuYao->dependency)) {
            $dependency = $cengFuYao->dependency;
        }
        foreach ($dependencyArray as $dv) {
            $dependencyChecked = "";
            $dependencyDataValue = false;
            if ($dv == $dependency) {
                $dependencyChecked = " checked ";
            }
            if ($dv == "不好") {
                $dependencyDataValue = true;
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $dependencyChecked; ?> value="<?= $dv; ?>" class="ctrl"
                       data-name-parent="cengFuYao"
                       data-value="<?= $dependencyDataValue; ?>" data-control-panel="dependencyCtrlPanel"
                       name="dependency"><?= $dv; ?>
            </label>
        <?php
        }

        if ($dependency == "不好") {
            $dependencyPanelClass = "";
        } else {
            $dependencyPanelClass = "hidden";
        }
        ?>

        <div id="dependencyCtrlPanel" class="<?= $dependencyPanelClass; ?>">
            <?php
            $yiCunXingArray = array("药物副作用严重影响患者的工作学习", "药物贵，经济压力大", "患者主观随意性用药", "自行频繁更换药物或改偏方/中药治疗",
                "自行停药、撤药");
            $yiCunXingSel = array();
            if ($cengFuYao && isset($cengFuYao->yiCunXing)) {
                $yiCunXingSel = $cengFuYao->yiCunXing;
            }
            foreach ($yiCunXingArray as $setv) {
                $yiCunXingChecked = "";
                if (in_array($setv, $yiCunXingSel)) {
                    $yiCunXingChecked = " checked ";
                }
                ?>
                <label class="checkbox-inline">
                    <input type="checkbox" <?= $yiCunXingChecked; ?>  value="<?= $setv; ?>"
                           data-name-parent="cengFuYao" name="yiCunXing"><?= $setv; ?>
                </label>
            <?php
            }
            ?>


            <?php
            if (in_array("其他", $yiCunXingSel)) {
                $yiCunXingQiTaChecked = " checked ";
                $yiCunXingQiTaPanelClass = "";
            } else {
                $yiCunXingQiTaChecked = "";
                $yiCunXingQiTaPanelClass = "hidden";
            }

            ?>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $yiCunXingQiTaChecked; ?> value="其他"
                       data-name-parent="cengFuYao" name="yiCunXing" class="ctrl"
                       data-control-panel="yiCunXingQiTa">其他
            </label>

            <div class="ctrlPanel <?= $yiCunXingQiTaPanelClass; ?>" id="yiCunXingQiTa">
                其他：<input type="text" value="<?= isset($cengFuYao->yiCunXingQiTa) ? $cengFuYao->yiCunXingQiTa : ""; ?>"
                          data-name-parent="cengFuYao" name="yiCunXingQiTa">
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="name" class="control-label col-md-2">终止治疗</label>

    <div class="col-md-8">
        <?php
        $stopArray = array("否", "是");
        $stop = "";
        $stopPanelClass = "";
        $stopDataValue = false;
        if ($cengFuYao && isset($cengFuYao->stop)) {
            $stop = $cengFuYao->stop;
        }
        foreach ($stopArray as $ta) {
            $stopChecked = "";
            $stopDataValue = false;

            if ($ta == $stop) {
                $stopChecked = " checked ";
            }
            if ($ta == "是") {
                $stopDataValue = true;
            }
            ?>
            <label class="radio-inline">
                <input type="radio" <?= $stopChecked; ?> value="<?= $ta; ?>" class="ctrl"
                       data-value="<?= $stopDataValue; ?>"
                       data-name-parent="cengFuYao" name="stop" data-control-panel="stopCtrlPanel"><?= $ta; ?>
            </label>
        <?php
        }
        if ($stop == "是") {
            $stopPanelClass = "";
        } else {
            $stopPanelClass = "hidden";
        }
        ?>

        <div id="stopCtrlPanel" class="<?= $stopPanelClass; ?>">
            <div>
                <span style="vertical-align: bottom">原因 ：</span>
                <?php
                $stopElementArray = array("疗效差", "不能耐受的副作用", "认为西医治疗药物副作用大，迷信祖传秘方",
                    "打算结婚或生子", "经济困难");
                $stopElement = "";
                if ($cengFuYao && isset($cengFuYao->stopElement)) {
                    $stopElement = $cengFuYao->stopElement;
                }
                foreach ($stopElementArray as $sea) {
                    $stopElementChecked = "";
                    if ($sea == $stopElement) {
                        $stopElementChecked = " checked ";
                    }
                    ?>
                    <label class="radio-inline">
                        <input type="radio" <?= $stopElementChecked; ?> value="<?= $sea; ?>"
                               data-name-parent="cengFuYao" name="stopElement"><?= $sea; ?>
                    </label>
                <?php
                }
                ?>
                <label class="radio-inline">
                    其他：<input type="text" value="<?= isset($cengFuYao->stopElementQiTa) ? $cengFuYao->stopElementQiTa : ""; ?>"
                              data-name-parent="cengFuYao" name="stopElementQiTa">
                </label>

            </div>
            <div style="margin: 5px 0px;">
                终止时间：<input type="text" name="stopDate"
                            value="<?= isset($cengFuYao->stopDate) ? $cengFuYao->stopDate : ""; ?>"
                            data-name-parent="cengFuYao" name="stopDate">
            </div>
            <div style="margin: 5px 0px;">
                终止后措施：
                <ul style="margin: 5px 0px;" class="list">
                    <?php
                    $stopMeasure = isset($cengFuYao->stopMeasure)?$cengFuYao->stopMeasure:"";
                    $stopMeasureValue = isset($cengFuYao->stopMeasureValue)?$cengFuYao->stopMeasureValue:"";
                    ?>
                    <li>
                        <?php
                        if ($stopMeasure == "换药或加药") {
                            ?>
                            <input type="radio" checked name="stopMeasure" data-name-parent="cengFuYao"
                                   value="换药或加药"><label class="name">换药或加药</label>
                            <input type="text" name="stopMeasureValue"
                                   value="<?= $stopMeasureValue; ?>" data-name-parent="cengFuYao">
                        <?php
                        } else {
                            ?>
                            <input type="radio" name="stopMeasure" data-name-parent="cengFuYao"
                                   value="换药或加药"><label class="name">换药或加药</label>
                            <input type="text" name="stopMeasureValue" data-name-parent="cengFuYao">
                        <?php
                        }
                        ?>

                    </li>
                    <li>
                        <?php
                        if ($stopMeasure == "其他疗法") {
                            ?>
                            <input type="radio" checked name="stopMeasure" data-name-parent="cengFuYao" value="其他疗法">
                            <label class="name">其他疗法</label>
                            <select name="stopMeasureValue" data-name-parent="cengFuYao">
                                <?php
                                $stopMeasureValueArray = array("中药", "祖传秘方", "偏方");
                                foreach ($stopMeasureValueArray as $smv) {
                                    $smOptionSel = "";
                                    if ($smv == $stopMeasureValue) {
                                        $smOptionSel = " selected ";
                                    }
                                    ?>

                                    <option <?= $smOptionSel; ?> value="<?= $smv; ?>"><?= $smv; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                            ?>
                            <input type="radio" name="stopMeasure" data-name-parent="cengFuYao" value="其他疗法"><label
                                class="name">其他疗法</label>
                            <select name="stopMeasureValue" data-name-parent="cengFuYao">
                                <option value="中药">中药</option>
                                <option value="祖传秘方">祖传秘方</option>
                                <option value="偏方">偏方</option>
                            </select>
                        <?php
                        }

                        ?>

                    </li>
                    <li>
                        其他：<input type="text" value="<?= isset($cengFuYao->stopMeasureQiTa) ? $cengFuYao->stopMeasureQiTa : ""; ?>"
                                  data-name-parent="cengFuYao" name="stopMeasureQiTa">
                    </li>
                </ul>
            </div>

            <div>
                <span style="vertical-align: bottom">终止治疗后癫痫发作 ：</span>
                <?php
                $zhongZhiHouFaZuoArray = array("增加", "减少", "消失");
                $zhongZhiHouFaZuo = "";
                if ($cengFuYao && isset($cengFuYao->zhongZhiHouFaZuo)) {
                    $zhongZhiHouFaZuo = $cengFuYao->zhongZhiHouFaZuo;
                }
                foreach ($zhongZhiHouFaZuoArray as $sea) {
                    $zhongZhiHouFaZuoChecked = "";
                    if ($sea == $zhongZhiHouFaZuo) {
                        $zhongZhiHouFaZuoChecked = " checked ";
                    }
                    ?>
                    <label class="radio-inline">
                        <input type="radio" <?= $zhongZhiHouFaZuoChecked; ?> value="<?= $sea; ?>"
                               data-name-parent="cengFuYao" name="zhongZhiHouFaZuo"><?= $sea; ?>
                    </label>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">外科干预</label>

    <div class="col-md-8">
        <?php
        $waiKeGanYuArray = array("病灶切除", "迷走神经磁刺激", "三叉神经刺激", "DBS");
        $waiKeGanYuSel = array();
        if ($cengFuYao && isset($cengFuYao->waiKeGanYuValues)) {
            $waiKeGanYuValuesSel = $cengFuYao->waiKeGanYuValues;
        }
        foreach ($waiKeGanYuArray as $pv) {
            $waiKeGanYuChecked = "";
            if (in_array($pv, $waiKeGanYuSel)) {
                $waiKeGanYuChecked = " checked ";
            }
            ?>
            <label class="checkbox-inline">
                <input type="checkbox" <?= $waiKeGanYuChecked; ?>  value="<?= $pv; ?>"
                       data-name-parent="cengFuYao" name="waiKeGanYuValues"><?= $pv; ?>
            </label>

        <?php
        }
        ?>

        <?php
        if (in_array("其他", $waiKeGanYuSel)) {
            $waiKeGanYuQiTaChecked = " checked ";
            $waiKeGanYuQiTaPanelClass = "";
        } else {
            $waiKeGanYuQiTaChecked = "";
            $waiKeGanYuQiTaPanelClass = "hidden";
        }

        ?>
        <div style="margin-top:5px;">
            时间：<input type="text" value="<?= isset($cengFuYao->waiKeGanYuShiJian) ? $cengFuYao->waiKeGanYuShiJian : ""; ?>"
                      data-name-parent="cengFuYao" name="waiKeGanYuShiJian">
        </div>
        <label class="checkbox-inline">
            <input type="checkbox" <?= $waiKeGanYuQiTaChecked; ?> value="其他"
                   data-name-parent="cengFuYao" name="waiKeGanYuValues" class="ctrl"
                   data-control-panel="waiKeGanYuQiTa">其他
        </label>

        <div class="ctrlPanel <?= $waiKeGanYuQiTaPanelClass; ?>" id="waiKeGanYuQiTa">
            其他：<input type="text" value="<?= isset($cengFuYao->waiKeGanYuQiTa) ? $cengFuYao->waiKeGanYuQiTa : ""; ?>"
                      data-name-parent="cengFuYao" name="waiKeGanYuQiTa">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="name" class="control-label col-md-2">癫痫持续状态的药物治疗</label>

    <div class="col-md-10">
            <div class="row" id="chiXuDrugInfoForm">

                <div class="col-md-2">
                    <div class="inputSel">
                        <input type="text" class="form-control" id="chiXuDrugInfoName">
                        <select class="form-control inputSelSel">
                            <option value="地西泮">地西泮</option>
                            <option value="丙戊酸注射液">丙戊酸注射液</option>
                            <option value="苯巴比妥注射液">苯巴比妥注射液</option>
                            <option value="咪达唑仑">咪达唑仑</option>
                            <option value="丙泊酚">丙泊酚</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" placeholder="剂量" id="chiXuDrugInfoAmount">
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="chiXuDrugInfoFrequency">
                        <option>mg/次</option>
                        <option>g/次</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="次/日" id="chiXuDrugInfoUnit">
                </div>
                <div class="col-md-2">
                    <button type="submit" id="chiXuDrugInfoAdd" class="btn btn-primary">新增</button>
                </div>
            </div>
            <table class="dataTable" id="chiXuDrugInfoTable">
                <thead>
                <tr>
                    <th>药物名称</th>
                    <th>剂量</th>
                    <th>频率（次/日）</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($chiXuDrugInfos as $di) {
                    ?>
                    <tr>
                        <td><?= $di[0] ?></td>
                        <td><?= $di[1] ?></td>
                        <td><?= $di[2] ?></td>
                        <td><a href="#" class="deleteChiXuDrugInfo">删除</a></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
    </div>
</div>

</form>

</div>
</div>
</div>
</div>