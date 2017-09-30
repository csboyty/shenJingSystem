<?php

$this->title = '病患管理';
?>

<div class="row">
    <div class="col-md-4 row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="patient/create">
                <span class="glyphicon glyphicon-plus"></span> 新建
            </a>
        </div>

        <div class="col-md-4" style="line-height: 34px;">
            排序：<span style="cursor: pointer" class="text-primary" id="sortByAge" data-sort="asc">
                年龄<span class="glyphicon glyphicon-arrow-up"></span>
            </span>
        </div>
    </div>
    <div class="col-md-8 row">
        <div class="col-md-3">
            <input type="text" id="filter" class="form-control" placeholder="编号/姓名">
        </div>
        <div class="col-md-3">
            <select type="text" id="filterType" class="form-control">
                <option value="">全部</option>
                <option value="buFenFaZuo">局灶性发作</option>
                <option value="quanMianFaZuo">全面性发作</option>
                <option value="buNengFenLei">未知起源</option>
                <option value="nanZhiXing">药物难治性癫痫</option>
            </select>
        </div>

        <button id="searchBtn" class="btn btn-primary col-md-2" type="button">搜索</button>
    </div>

</div>

<table id="myTable" class="dataTable">
    <thead>
    <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>电话</th>
        <th>备注</th>
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