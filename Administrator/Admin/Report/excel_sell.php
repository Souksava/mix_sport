<?php
    $output = "";
    $amount = 0;
    if(isset($_POST["btnExcel"]))
    {
        require '../../oop/obj.php';
        $obj->report_sell(trim($_POST["excel_date1"]),trim($_POST["excel_date2"]));
        $output .= '
        <table style="width: 1500px;font-size: 18px;font-family: '."Phetsarath OT".';" border="1">
        <tr style="font-size: 16px;" >
            <th style="width: 45px;">#</th>
            <th style="width: 200px;">ເລກທີບິນ</th>
            <th style="width: 200px;">ພະນັກງານ</th>
            <th style="width: 200px;">ລູກຄ້າ</th>
            <th style="width: 200px;">ມູນຄ່າລວມ</th>
            <th style="width: 200px;">ສະຖານະ</th>
            <th style="width: 200px;">ການຈ່າຍ</th>
            <th style="width: 200px;">ປະເພດການຂາຍ</th>
            <th style="width: 200px;">ວັນທີ</th>
        </tr>
        ';
        $Bill = 0;
        while($row = mysqli_fetch_array($result_report_sell)){
            $amount = $amount + $row["amount"];
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td>'.$Bill.'</td>
                    <td>'."'".''.$row["sell_id"].'</td>
                    <td>'.$row["emp_name"].'</td>
                    <td>'.$row["cus_name"].'</td>
                    <td>'.number_format($row["amount"],2).'</td>
                    <td>'.$row["stt_name"].'</td>
                    <td>'.$row["type_pay"].'</td>
                    <td>'.$row["sell_type"].'</td>
                    <td>'.date("d/m/Y H:i:s",strtotime($row["timestamp"])).'</td>
                </tr>
            ';
        }   
            $output .='
            <tr>
                <td colspan="5" align="right"><h4>ມູນຄ່າທັງໝົດ:</h4></td>
                <td colspan="3" align="right"><h4 style="color: red;">'.number_format($amount,2).' ກີບ</h4></td>
            </tr>
            </table><br>
        ';
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=sell.xls");
        echo $output;
    }
?>