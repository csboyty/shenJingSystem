<?php
$this->title = $patient->fullname."病史信息";

$xueChangGui=isset($record->xueChangGui)?$record->xueChangGui:array();
$xueShengHua=isset($record->xueShengHua)?$record->xueShengHua:array();
$other=isset($record->other)?$record->other:null;
?>
<script>
    var patientId="<?= $patient->id;  ?>";
</script>

<a class="btn btn-primary" style="margin-bottom: 10px;" href="javascript:history.go(-1);">
    <span class="glyphicon glyphicon-arrow-left"></span> 返回
</a>
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
                    <tr>
                        <td>ALT</td>
                        <td><input type="text" class="form-control value" name="value"
                                   value="<?= isset($xueShengHua[0][0])?$xueShengHua[0][0]:""; ?>"></td>
                        <td>U/L</td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal" name="ALTNormal"
                                    <?=isset($xueShengHua[0][1])&&$xueShengHua[0][1]=="是"?" checked ":""  ?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal"  name="ALTNormal"
                                    <?=isset($xueShengHua[0][1])&&$xueShengHua[0][1]=="否"?" checked ":""  ?> value="否">否
                            </label>
                        </td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="ALTSense"
                                    <?=isset($xueShengHua[0][2])&&$xueShengHua[0][2]=="是"?" checked ":""?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="ALTSense"
                                    <?=isset($xueShengHua[0][2])&&$xueShengHua[0][2]=="否"?" checked ":""?> value="否">否
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>AST</td>
                        <td><input type="text" class="form-control value"
                                   value="<?= isset($xueShengHua[1][0])?$xueShengHua[1][0]:""; ?>"></td>
                        <td>U/L</td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal" name="ASTNormal"
                                    <?=isset($xueShengHua[1][1])&&$xueShengHua[1][1]=="是"?" checked ":""  ?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal"  name="ASTNormal"
                                    <?=isset($xueShengHua[1][1])&&$xueShengHua[1][1]=="否"?" checked ":""  ?> value="否">否
                            </label>
                        </td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="ASTSense"
                                    <?=isset($xueShengHua[1][2])&&$xueShengHua[1][2]=="是"?" checked ":""?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="ASTSense"
                                    <?=isset($xueShengHua[1][2])&&$xueShengHua[1][2]=="否"?" checked ":""?> value="否">否
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>白蛋白</td>
                        <td><input type="text" class="form-control value" name="value"
                                   value="<?= isset($xueShengHua[2][0])?$xueShengHua[2][0]:""; ?>"></td>
                        <td>g/L</td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal" name="baiDanBaiNormal"
                                    <?=isset($xueShengHua[2][1])&&$xueShengHua[2][1]=="是"?" checked ":""  ?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal"  name="baiDanBaiNormal"
                                    <?=isset($xueShengHua[2][1])&&$xueShengHua[2][1]=="否"?" checked ":""  ?> value="否">否
                            </label>
                        </td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="baiDanBaiSense"
                                    <?=isset($xueShengHua[2][2])&&$xueShengHua[2][2]=="是"?" checked ":""?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="baiDanBaiSense"
                                    <?=isset($xueShengHua[2][2])&&$xueShengHua[2][2]=="否"?" checked ":""?> value="否">否
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>球蛋白</td>
                        <td><input type="text" class="form-control value" name="value"
                                   value="<?= isset($xueShengHua[3][0])?$xueShengHua[3][0]:""; ?>"></td>
                        <td>g/L</td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal" name="qiuDanBaiNormal"
                                    <?=isset($xueShengHua[3][1])&&$xueShengHua[3][1]=="是"?" checked ":""  ?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="isNormal"  name="qiuDanBaiNormal"
                                    <?=isset($xueShengHua[3][1])&&$xueShengHua[3][1]=="否"?" checked ":""  ?> value="否">否
                            </label>
                        </td>
                        <td>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="qiuDanBaiSense"
                                    <?=isset($xueShengHua[3][2])&&$xueShengHua[3][2]=="是"?" checked ":""?> value="是">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="hasSense" name="qiuDanBaiSense"
                                    <?=isset($xueShengHua[3][2])&&$xueShengHua[3][2]=="否"?" checked ":""?> value="否">否
                            </label>
                        </td>
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
                        <label class="control-label col-md-2">脑电图</label>
                        <div class="col-md-8">
                            <?php

                            $naoDianTuArray=array("常规","动态","视频");
                            $naoDianTu="";
                            if($other&&isset($other->naoDianTu)){
                                $naoDianTu=$other->naoDianTu;
                            }
                            foreach($naoDianTuArray as $ndt){
                                $naoDianTuChecked="";
                                if($ndt==$naoDianTu){
                                    $naoDianTuChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $naoDianTuChecked; ?> value="<?= $ndt; ?>"
                                           data-name-parent="other" name="naoDianTu"><?= $ndt; ?>
                                </label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">检查日期</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" data-name-parent="other" name="jianChaRiQi"
                                value="<?= isset($other->jianChaRiQi)?$other->jianChaRiQi:""; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">检查号</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" data-name-parent="other" name="jianChaHao"
                                   value="<?= isset($other->jianChaHao)?$other->jianChaHao:""; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">检查结果</label>
                        <div class="col-md-8">
                            <?php

                            $jianChaJieGuoArray=array("无异常","有异常");
                            $jianChaJieGuo="";
                            if($other&&isset($other->jianChaJieGuo)){
                                $jianChaJieGuo=$other->jianChaJieGuo;
                            }
                            foreach($jianChaJieGuoArray as $jcjg){
                                $jianChaJieGuoChecked="";
                                if($jcjg==$jianChaJieGuo){
                                    $jianChaJieGuoChecked=" checked ";
                                }
                                ?>
                                <label class="radio-inline">
                                    <input type="radio" <?= $jianChaJieGuoChecked; ?> value="<?= $jcjg; ?>"
                                           data-name-parent="other" name="jianChaJieGuo"><?= $jcjg; ?>
                                </label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">检查结果描述</label>
                        <div class="col-md-8">
                            <textarea class="form-control"
                                      data-name-parent="other" name="jianChaJieGuoMiaoShu"><?= isset($other->jianChaJieGuoMiaoShu)?$other->jianChaJieGuoMiaoShu:""; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">其他有意义的检查</label>
                        <div class="col-md-8">
                            <textarea class="form-control"
                                      data-name-parent="other" name="qiTaJianCha"><?= isset($other->qiTaJianCha)?$other->qiTaJianCha:""; ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
    <button class="btn btn-primary col-md-offset-5 col-md-2" id="saveInfo">保存</button>
</div>

<?php
    $this->registerJsFile("@web/js/src/returnInfoRecord.js", ['depends' => [frontend\assets\AppAsset::className()]]);
?>