<?php

$this->title = '病患管理';
?>

<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary" href="patient/create">
            <span class="glyphicon glyphicon-plus"></span> 新建
        </a>
    </div>
    <div class="col-md-8">
        <div class="input-group col-md-5" style="margin-left: auto">
            <input type="text" id="filter" class="form-control" placeholder="编号/姓名">
            <span class="input-group-btn">
                <button id="searchBtn" class="btn btn-primary" type="button">搜索</button>
            </span>
        </div>
    </div>

</div>

<table id="myTable" class="dataTable">
    <thead>
    <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>联系电话</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <!--<tr>
            <td><a href="patient/detail">00001</a></td>
            <td>小李</td>
            <td><a href="patient/detail">详情</a></td>
        </tr>-->
    </tbody>
</table>

<?php
    $this->registerJsFile("@web/js/src/patientMgr.js",['depends' => [frontend\assets\AppAsset::className()]]);
?>