<?php

$check_result=isset($returnInfo->check_result)?json_decode($returnInfo->check_result):array();

?>

<a class="btn btn-primary" href="return-info/record?patientId=<?= $patient->id;  ?>">
    <span class="glyphicon glyphicon-plus"></span> 新建
</a>
<table class="dataTable">
    <thead>
    <tr>
        <th>记录时间</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($check_result as $cr){
            ?>

            <tr><td>
                <a href="return-info/record?patientId=<?= $patient->id;  ?>&recordIndex=<?= $cr->recordIndex; ?>"><?= $cr->date; ?></a>
            </td></tr>

            <?php
        }

    ?>

    </tbody>
</table>