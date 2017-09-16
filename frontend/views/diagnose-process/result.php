<?php

$check_result=$diagnoseProcess?json_decode($diagnoseProcess->check_result):null;

$xueChangGui=isset($check_result->xueChangGui)?$check_result->xueChangGui:array();
$xueShengHua=isset($check_result->xueShengHua)?$check_result->xueShengHua:array();
$xueNongDu=isset($check_result->xueNongDu)?$check_result->xueNongDu:array();
$other=isset($check_result->other)?$check_result->other:array();

?>

<div class="panel-group" id="accordionResult" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" id="headingOneResult">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseOneResult" data-parent="#accordionResult"
                   aria-expanded="true" aria-controls="collapseOneResult">
                    血常规检查
                </a>
            </h4>
        </div>
        <div id="collapseOneResult" class="panel-collapse collapse in" aria-labelledby="headingOneResult">
            <div class="panel-body">
                <table class="dataTable" id="xueChangGuiTable">
                    <thead>
                        <tr>
                            <th>测定项目</th>
                            <th>测定值</th>
                            <th>单位</th>
                            <th>是否正常</th>
                            <th>如异常有无临床意义</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>RBC</td>
                            <td><input type="text" class="form-control value" name="value"
                                       value="<?= isset($xueChangGui[0][0])?$xueChangGui[0][0]:""; ?>"></td>
                            <td>10<sup>12</sup>/L</td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                        <?=isset($xueChangGui[0][1])&&$xueChangGui[0][1]=="是"?" checked ":""  ?> class="isNormal" name="RBCNormal">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                        <?=isset($xueChangGui[0][1])&&$xueChangGui[0][1]=="否"?" checked ":"" ?>   class="isNormal"  name="RBCNormal">否
                                </label>
                            </td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                           <?=isset($xueChangGui[0][2])&&$xueChangGui[0][2]=="是"?" checked ":""  ?> class="hasSense" name="RBCSense">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                        <?=isset($xueChangGui[0][2])&&$xueChangGui[0][2]=="否"?" checked ":"" ?> class="hasSense" name="RBCSense">否
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>HB</td>
                            <td><input type="text" class="form-control value"
                                       value="<?= isset($xueChangGui[1][0])?$xueChangGui[1][0]:""; ?>"></td>
                            <td>G/L</td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                           <?=isset($xueChangGui[1][1])&&$xueChangGui[1][1]=="是"?" checked ":""  ?> class="isNormal"  name="HBNormal">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                           <?=isset($xueChangGui[1][1])&&$xueChangGui[1][1]=="否"?" checked ":"" ?> class="isNormal"  name="HBNormal">否
                                </label>
                            </td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                           <?=isset($xueChangGui[1][2])&&$xueChangGui[1][2]=="是"?" checked ":""  ?> class="hasSense"  name="HBSense">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                           <?=isset($xueChangGui[1][2])&&$xueChangGui[1][2]=="否"?" checked ":"" ?> class="hasSense" name="HBSense">否
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>WBC</td>
                            <td><input type="text" class="form-control value"
                                       value="<?= isset($xueChangGui[2][0])?$xueChangGui[2][0]:""; ?>"></td>
                            <td>10<sup>9</sup>/L</td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                        <?=isset($xueChangGui[2][1])&&$xueChangGui[2][1]=="是"?" checked ":""  ?> class="isNormal"  name="WBCNormal">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                        <?=isset($xueChangGui[2][1])&&$xueChangGui[2][1]=="否"?" checked ":"" ?> class="isNormal"  name="WBCNormal">否
                                </label>
                            </td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                        <?=isset($xueChangGui[2][2])&&$xueChangGui[2][2]=="是"?" checked ":""  ?> class="hasSense"  name="WBCSense">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                        <?=isset($xueChangGui[2][2])&&$xueChangGui[2][2]=="否"?" checked ":""  ?> class="hasSense"  name="WBCSense">否
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>PLT</td>
                            <td><input type="text" class="form-control value"
                                       value="<?= isset($xueChangGui[3][0])?$xueChangGui[3][0]:""; ?>"></td>
                            <td>10<sup>9</sup>/L</td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                        <?=isset($xueChangGui[3][1])&&$xueChangGui[3][1]=="是"?" checked ":""  ?> class="isNormal"  name="PLTNormal">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                        <?=isset($xueChangGui[3][1])&&$xueChangGui[3][1]=="否"?" checked ":"" ?> class="isNormal"  name="PLTNormal">否
                                </label>
                            </td>
                            <td>
                                <label class="radio-inline">
                                    <input type="radio" value="是"
                                        <?=isset($xueChangGui[3][2])&&$xueChangGui[3][2]=="是"?" checked ":""  ?>  class="hasSense"  name="PLTSense">是
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="否"
                                        <?=isset($xueChangGui[3][2])&&$xueChangGui[3][2]=="否"?" checked ":""  ?> class="hasSense"  name="PLTSense">否
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingTwoResult">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseTwoResult" data-parent="#accordionResult"
                   aria-expanded="false" aria-controls="collapseTwoResult">
                    血液生化检验
                </a>
            </h4>
        </div>
        <div id="collapseTwoResult" class="panel-collapse collapse in" aria-labelledby="headingTwoResult">
            <div class="panel-body">
                <table class="dataTable" id="xueShengHuaTable">
                    <thead>
                    <tr>
                        <th>测定项目</th>
                        <th>测定值</th>
                        <th>单位</th>
                        <th>是否正常</th>
                        <th>如异常有无临床意义</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                        foreach($xueShengHua as $value){

                            ?>
                            <tr>
                                <td><input type="text" class="form-control name" name="name"
                                           value="<?= isset($value[0])?$value[0]:""; ?>"></td>
                                <td><input type="text" class="form-control value" name="value"
                                           value="<?= isset($value[1])?$value[1]:""; ?>"></td>
                                <td><input type="text" class="form-control unit" name="unit"
                                           value="<?= isset($value[2])?$value[2]:""; ?>"></td>
                                <td>
                                    <label class="radio-inline">
                                        <input type="radio" class="isNormal" name="ALTNormal"
                                            <?=isset($value[3])&&$value[3]=="是"?" checked ":""  ?> value="是">是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="isNormal"  name="ALTNormal"
                                            <?=isset($value[3])&&$value[3]=="否"?" checked ":""  ?> value="否">否
                                    </label>
                                </td>
                                <td>
                                    <label class="radio-inline">
                                        <input type="radio" class="hasSense" name="ALTSense"
                                            <?=isset($value[4])&&$value[4]=="是"?" checked ":""?> value="是">是
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="hasSense" name="ALTSense"
                                            <?=isset($value[4])&&$value[4]=="否"?" checked ":""?> value="否">否
                                    </label>
                                </td>
                            </tr>
                        <?php
                        }

                    ?>


                    </tbody>
                </table>
                <br>
                <div class="form-group">
                    <button type="button" class="btn btn-primary form-control glyphicon glyphicon-plus" id="addXueShengHua">新增项目</button>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingThreeResult">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseThreeResult" data-parent="#accordionResult"
                   aria-expanded="false" aria-controls="collapseThreeResult">
                    抗癫痫药物血药浓度测定
                </a>
            </h4>
        </div>
        <div id="collapseThreeResult" class="panel-collapse collapse in" aria-labelledby="headingThreeResult">
            <div class="panel-body">
                <table class="dataTable" id="xueNongDuTable">
                    <thead>
                    <tr>
                        <th>测定项目</th>
                        <th>测定值</th>
                        <th>单位</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>卡马西平</td>
                        <td><input type="text" class="form-control"
                                   value="<?= isset($xueNongDu[0])?$xueNongDu[0]:""; ?>"></td>
                        <td>umol/l</td>
                    </tr>
                    <tr>
                        <td>丙戊酸</td>
                        <td><input type="text" class="form-control"
                                   value="<?= isset($xueNongDu[1])?$xueNongDu[1]:""; ?>"></td>
                        <td>umol/l</td>
                    </tr>
                    <tr>
                        <td>苯妥英</td>
                        <td><input type="text" class="form-control"
                                   value="<?= isset($xueNongDu[2])?$xueNongDu[2]:""; ?>"></td>
                        <td>umol/l</td>
                    </tr>
                    <tr>
                        <td>苯巴比妥</td>
                        <td><input type="text" class="form-control"
                                   value="<?= isset($xueNongDu[3])?$xueNongDu[3]:""; ?>"></td>
                        <td>umol/l</td>
                    </tr>
                    <tr>
                        <td>扑痫酮</td>
                        <td><input type="text" class="form-control"
                                   value="<?= isset($xueNongDu[4])?$xueNongDu[4]:""; ?>"></td>
                        <td>umol/l</td>
                    </tr>
                    <tr>
                        <td>乙琥胺</td>
                        <td><input type="text" class="form-control"
                                   value="<?= isset($xueNongDu[5])?$xueNongDu[5]:""; ?>"></td>
                        <td>umol/l</td>
                    </tr>
                    <tr>
                        <td>苯二氮卓类</td>
                        <td><input type="text" class="form-control"
                                   value="<?= isset($xueNongDu[6])?$xueNongDu[6]:""; ?>"></td>
                        <td>umol/l</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" id="headingFourResult">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapseFourResult" data-parent="#accordionResult"
                   aria-expanded="false" aria-controls="collapseFourResult">
                    其他检查
                </a>
            </h4>
        </div>
        <div id="collapseFourResult" class="panel-collapse collapse in" aria-labelledby="headingFourResult">
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-2">头颅 MRI 或 CT</label>
                        <div class="col-md-8">
                            <?php
                            $touLuArray=array("无异常","有异常");
                            $touLu="";
                            $touLuPanelClass="";
                            $touLuDataValue=false;
                            if($other&&isset($other->touLu)){
                                $touLu=$other->touLu;
                            }
                            foreach($touLuArray as $tl){
                                $touLuChecked="";
                                $touLuDataValue=false;

                                if($tl==$touLu){
                                    $touLuChecked=" checked ";
                                }
                                if($tl=="有异常"){
                                    $touLuDataValue=true;
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $touLuChecked; ?> value="<?= $tl; ?>" class="ctrl"
                                           data-value="<?= $touLuDataValue; ?>"
                                           data-name-parent="other" name="touLu" data-control-panel="CTCtrlPanel"><?= $tl; ?>
                                </label>
                            <?php
                            }
                            if($touLu=="有异常"){
                                $touLuPanelClass="";
                            }else{
                                $touLuPanelClass="hidden";
                            }
                            ?>
                            <div class="innerPanel <?= $touLuPanelClass; ?>" id="CTCtrlPanel">
                                <br>
                                <span>异常方位</span>
                                <div>
                                    <?php

                                    $touLuYiChangeFangWeiArray=array("左","右","双侧");
                                    $touLuYiChangeFangWei="";
                                    if($other&&isset($other->touLuYiChangeFangWei)){
                                        $touLuYiChangeFangWei=$other->touLuYiChangeFangWei;
                                    }
                                    foreach($touLuYiChangeFangWeiArray as $tlycfw){
                                        $touLuYiChangeFangWeiChecked="";
                                        if($tlycfw==$touLuYiChangeFangWei){
                                            $touLuYiChangeFangWeiChecked=" checked ";
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input type="radio" <?= $touLuYiChangeFangWeiChecked; ?> value="<?= $tlycfw; ?>"
                                                   data-name-parent="other" name="touLuYiChangeFangWei"><?= $tlycfw; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <br>
                                <span>异常位置</span>
                                <div>
                                    <?php
                                    $touLuYiChangWeiZhiArray=array("额叶","颞叶","顶叶","枕叶",
                                        "小脑","脑干","海马","基底节");
                                    $touLuYiChangWeiZhiSel=array();
                                    if($other&&isset($other->touLuYiChangWeiZhi)){
                                        $touLuYiChangWeiZhiSel=$other->touLuYiChangWeiZhi;
                                    }
                                    foreach($touLuYiChangWeiZhiArray as $tlycwz){
                                        $touLuYiChangWeiZhiChecked="";
                                        if(in_array($tlycwz, $touLuYiChangWeiZhiSel)){
                                            $touLuYiChangWeiZhiChecked=" checked ";
                                        }
                                        ?>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" <?= $touLuYiChangWeiZhiChecked; ?>  value="<?= $tlycwz; ?>"
                                                   data-name-parent="other" name="touLuYiChangWeiZhi"><?= $tlycwz; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">头颅 MRI 或 CT文件</label>
                        <div class="col-md-8" id="uploadTouLuContainer">
                            <input type="file" id="uploadTouLuFile">
                            <br>

                            <div id="touLuFiles">
                                <?php
                                $touLuFiles = array();
                                if ($other && isset($other->touLuFiles)) {
                                    $touLuFiles = $other->touLuFiles;
                                }
                                foreach ($touLuFiles as $key => $value) {

                                    ?>
                                    <a target="_blank" href="<?= $value; ?>" style="margin-right: 5px">
                                        视频<?= $key; ?>

                                        <input type="hidden" value="<?= $value; ?>"
                                               name="touLuFile">
                                    </a>
                                <?php
                                }
                                ?>
                            </div>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">EEG/AEEG/VEEG</label>
                        <div class="col-md-8">
                            <?php
                            $EEGArray=array("无异常","有异常");
                            $EEG="";
                            $EEGPanelClass="";
                            $EEGDataValue=false;
                            if($other&&isset($other->EEG)){
                                $EEG=$other->EEG;
                            }
                            foreach($EEGArray as $tl){
                                $EEGChecked="";
                                $EEGDataValue=false;

                                if($tl==$EEG){
                                    $EEGChecked=" checked ";
                                }
                                if($tl=="有异常"){
                                    $EEGDataValue=true;
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $EEGChecked; ?> value="<?= $tl; ?>" class="ctrl"
                                           data-value="<?= $EEGDataValue; ?>"
                                           data-name-parent="other" name="EEG" data-control-panel="EEGCtrlPanel"><?= $tl; ?>
                                </label>
                            <?php
                            }
                            if($EEG=="有异常"){
                                $EEGPanelClass="";
                            }else{
                                $EEGPanelClass="hidden";
                            }
                            ?>
                            <div class="innerPanel <?=$EEGPanelClass; ?>" id="EEGCtrlPanel">
                                <br>
                                <span>异常方位</span>
                                <div>
                                    <?php

                                    $EEGYiChangeFangWeiArray=array("左","右","双侧");
                                    $EEGYiChangeFangWei="";
                                    if($other&&isset($other->EEGYiChangeFangWei)){
                                        $EEGYiChangeFangWei=$other->EEGYiChangeFangWei;
                                    }
                                    foreach($EEGYiChangeFangWeiArray as $eegycfw){
                                        $EEGYiChangeFangWeiChecked="";
                                        if($eegycfw==$EEGYiChangeFangWei){
                                            $EEGYiChangeFangWeiChecked=" checked ";
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input type="radio" <?= $EEGYiChangeFangWeiChecked; ?> value="<?= $eegycfw; ?>"
                                                   data-name-parent="other" name="EEGYiChangeFangWei"><?= $eegycfw; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <br>
                                <span>异常位置</span>
                                <div>
                                    <?php
                                    $EEGYiChangWeiZhiArray=array("额叶","颞叶","顶叶","枕叶");
                                    $EEGYiChangWeiZhiSel=array();
                                    if($other&&isset($other->EEGYiChangWeiZhi)){
                                        $EEGYiChangWeiZhiSel=$other->EEGYiChangWeiZhi;
                                    }
                                    foreach($EEGYiChangWeiZhiArray as $eegycwz){
                                        $EEGYiChangWeiZhiChecked="";
                                        if(in_array($eegycwz, $EEGYiChangWeiZhiSel)){
                                            $EEGYiChangWeiZhiChecked=" checked ";
                                        }
                                        ?>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" <?= $EEGYiChangWeiZhiChecked; ?>  value="<?= $eegycwz; ?>"
                                                   data-name-parent="other" name="EEGYiChangWeiZhi"><?= $eegycwz; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <br>
                                <span>类型</span>
                                <div>
                                    <?php
                                    $EEGTypeArray=array("慢波","棘－慢波","多棘－慢波","其他");
                                    $EEGType="";
                                    if(isset($other->EEGType)){
                                        $EEGType=$other->EEGType;
                                    }
                                    foreach($EEGTypeArray as $eegt){
                                        $EEGTypeChecked="";
                                        if($EEGType==$eegt){
                                            $EEGTypeChecked=" checked ";
                                        }
                                        ?>
                                        <label class="checkbox-inline">
                                            <input type="radio" <?= $EEGTypeChecked; ?>  value="<?= $eegt; ?>"
                                                   data-name-parent="other" name="EEGType"><?= $eegt; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <p style="margin-top: 10px;">频率：
                                    <input class="width50" type="text"
                                       data-name-parent="other" name="EEGFrequency"
                                       value="<?= isset($other->EEGFrequency)?$other->EEGFrequency:""; ?>">&nbsp;Hz</p>
                            </div>



                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">EEG/AEEG/VEEG文件</label>
                        <div class="col-md-8" id="uploadEEGContainer">
                            <input type="file" id="uploadEEGFile">
                            <br>

                            <div id="EEGFiles">
                                <?php
                                $EEGFiles = array();
                                if ($other && isset($other->EEGFiles)) {
                                    $EEGFiles = $other->EEGFiles;
                                }
                                foreach ($EEGFiles as $key => $value) {

                                    ?>
                                    <a target="_blank" href="<?= $value; ?>" style="margin-right: 5px">
                                        视频<?= $key; ?>

                                        <input type="hidden" value="<?= $value; ?>"
                                               name="EEGFile">
                                    </a>
                                <?php
                                }
                                ?>
                            </div>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">脑脊液</label>
                        <div class="col-md-8">
                            <?php
                            $naoJiYeArray=array("无异常","有异常");
                            $naoJiYe="";
                            $naoJiYePanelClass="";
                            $naoJiYeDataValue=false;
                            if($other&&isset($other->naoJiYe)){
                                $naoJiYe=$other->naoJiYe;
                            }
                            foreach($naoJiYeArray as $tl){
                                $naoJiYeChecked="";
                                $naoJiYeDataValue=false;

                                if($tl==$naoJiYe){
                                    $naoJiYeChecked=" checked ";
                                }
                                if($tl=="有异常"){
                                    $naoJiYeDataValue=true;
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $naoJiYeChecked; ?> value="<?= $tl; ?>" class="ctrl"
                                           data-value="<?= $naoJiYeDataValue; ?>"
                                           data-name-parent="other" name="naoJiYe" data-control-panel="CSFCtrlPanel"><?= $tl; ?>
                                </label>
                            <?php
                            }
                            if($naoJiYe=="有异常"){
                                $naoJiYePanelClass="";
                            }else{
                                $naoJiYePanelClass="hidden";
                            }
                            ?>
                            <div id="CSFCtrlPanel" class="innerPanel <?= $naoJiYePanelClass ;?>">
                                <br>
                                <span>异常情况</span>
                                <p style="margin-top: 10px;">压力：
                                    <input class="width50" type="text"
                                           data-name-parent="other" name="naoJiYeYaLi"
                                           value="<?= isset($other->naoJiYeYaLi)?$other->naoJiYeYaLi:""; ?>">&nbsp;mmH2o</p>
                                <div>
                                    <?php
                                    $naoJiYeYanSeArray=array("无色","黄色","草绿色");
                                    $naoJiYeYanSe="";
                                    if(isset($other->naoJiYeYanSe)){
                                        $naoJiYeYanSe=$other->naoJiYeYanSe;
                                    }
                                    foreach($naoJiYeYanSeArray as $njyys){
                                        $naoJiYeYanSeChecked="";
                                        if($naoJiYeYanSe==$njyys){
                                            $naoJiYeYanSeChecked=" checked ";
                                        }
                                        ?>
                                        <label class="checkbox-inline">
                                            <input type="radio" <?= $naoJiYeYanSeChecked; ?>  value="<?= $njyys; ?>"
                                                   data-name-parent="other" name="naoJiYeYanSe"><?= $njyys; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div>
                                    <?php
                                    $naoJiYeChunDuArray=array("清亮","浑浊");
                                    $naoJiYeChunDu="";
                                    if(isset($other->naoJiYeChunDu)){
                                        $naoJiYeChunDu=$other->naoJiYeChunDu;
                                    }
                                    foreach($naoJiYeChunDuArray as $njycd){
                                        $naoJiYeChunDuChecked="";
                                        if($naoJiYeChunDu==$njycd){
                                            $naoJiYeChunDuChecked=" checked ";
                                        }
                                        ?>
                                        <label class="checkbox-inline">
                                            <input type="radio" <?= $naoJiYeChunDuChecked; ?>  value="<?= $njycd; ?>"
                                                   data-name-parent="other" name="naoJiYeChunDu"><?= $njycd; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <p style="margin-top: 10px;">
                                    蛋白：<input class="width50" type="text"
                                              data-name-parent="other" name="naoJiYeDanBai"
                                              value="<?= isset($other->naoJiYeDanBai)?$other->naoJiYeDanBai:""; ?>">
                                        &nbsp;g/l&nbsp;&nbsp;
                                    细胞学：<input class="width50" type="text"
                                               data-name-parent="other" name="naoJiYeXiBaoXue"
                                               value="<?= isset($other->naoJiYeXiBaoXue)?$other->naoJiYeXiBaoXue:""; ?>">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    糖：<input class="width50" type="text"
                                             data-name-parent="other" name="naoJiYeTang"
                                             value="<?= isset($other->naoJiYeTang)?$other->naoJiYeTang:""; ?>">
                                        &nbsp;mmol/l&nbsp;&nbsp;
                                    氯化物：<input class="width50" type="text"
                                               data-name-parent="other" name="naoJiYeLvHuaWu"
                                               value="<?= isset($other->naoJiYeLvHuaWu)?$other->naoJiYeLvHuaWu:""; ?>">
                                        &nbsp;mmol/l&nbsp;&nbsp;

                                        <br><br>

                                    单核：<input class="width50" type="text"
                                              data-name-parent="other" name="naoJiYeDanHe"
                                              value="<?= isset($other->naoJiYeDanHe)?$other->naoJiYeDanHe:""; ?>">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    白细胞：<input class="width50" type="text"
                                               data-name-parent="other" name="naoJiYeBaiXiBao"
                                               value="<?= isset($other->naoJiYeBaiXiBao)?$other->naoJiYeBaiXiBao:""; ?>">
                                        &nbsp;&nbsp;
                                    多核：<input class="width50" type="text"
                                              data-name-parent="other" name="naoJiYeDuoHe"
                                              value="<?= isset($other->naoJiYeDuoHe)?$other->naoJiYeDuoHe:""; ?>">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    细胞总数：<input class="width50" type="text"
                                                data-name-parent="other" name="naoJiYeXiBao"
                                                value="<?= isset($other->naoJiYeXiBao)?$other->naoJiYeXiBao:""; ?>">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">TCD</label>
                        <div class="col-md-8">
                            <?php
                            $TCDArray=array("无异常","有异常");
                            $TCD="";
                            if($other&&isset($other->TCD)){
                                $TCD=$other->TCD;
                            }
                            foreach($TCDArray as $tcda){
                                $TCDChecked="";

                                if($tcda==$TCD){
                                    $TCDChecked=" checked ";
                                }
                            ?>
                            <label class="radio-inline">
                                <input type="radio" <?= $TCDChecked; ?> value="<?= $tcda; ?>"
                                       data-name-parent="other" name="TCD" ><?= $tcda; ?>
                            </label>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">其他</label>
                        <div class="col-md-8">
                            <textarea class="form-control"
                                      data-name-parent="other" name="other"><?= isset($other->other)?$other->other:""; ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>