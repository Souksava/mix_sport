<?php
    $output = "";
    $amount = 0;
    if(isset($_POST["btnExcel"]))
    {
        require '../../oop/obj.php';
        $obj->report_revenue(trim($_POST["excel_date1"]),trim($_POST["excel_date2"]));
        $output .= '
        <table style="width: 1500px;font-size: 18px;font-family: '."Phetsarath OT".';" border="1">
        <tr style="font-size: 16px;" >
            <th style="width: 75px;">#</th>
            <th style="width: 100px;">ເລກທີບິນ</th>
            <th style="width: 175px;">ພະນັກງານ</th>
            <th style="width: 150px;">ລູກຄ້າ</th>
            <th style="width: 180px;">ລະຫັດສິນຄ້າ</th>
            <th style="width: 200px;">ສິນຄ້າ</th>
            <th style="width: 80px;">ຈຳນວນ</th>
            <th style="width: 120px;">ລາຄາ</th>
            <th style="width: 120px;">ລວມ</th>
            <th style="width: 130px;">ສະຖານະ</th>
            <th style="width: 150px;">ໝາຍເຫດ </th>
            <th style="width: 180px;">ວັນທີ</th>
        </tr>
        ';
        $Bill = 0;
        while($row = mysqli_fetch_array($result_revenue)){
            $amount = $amount + $row["total"];
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td>'.$Bill.'</td>
                    <td>'."'".''.$row["sell_id"].'</td>
                    <td>'.$row["emp_name"].'</td>
                    <td>'.$row["cus_name"].'</td>
                    <td>'.$row["pro_id"].'</td>
                    <td>'.$row["cate_name"].' '.$row["brand_name"].' '.$row["pro_name"].' '.$row["size_name"].'</td>
                    <td>'.$row["qty"].' '.$row["unit_name"].'</td>
                    <td>'.number_format($row["price"],2).'</td>
                    <td>'.number_format($row["total"],2).'</td>
                    <td>'.$row["stt_name"].'</td>
                    <td>'.$row["remark"].'</td>
                    <td>'.date("d/m/Y H:i:s",strtotime($row["timestamp"])).'</td>
                </tr>
            ';
        }   
            $output .='
            <tr>
                <td colspan="9" align="right"><h4>ມູນຄ່າທັງໝົດ:</h4></td>
                <td colspan="3" align="right"><h4 style="color: red;">'.number_format($amount,2).' ກີບ</h4></td>
            </tr>
            </table><br>
        ';
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=revenue.xls");
        echo $output;
    }
?>