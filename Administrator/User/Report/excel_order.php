<?php
    $output = "";
    $amount = 0;
    if(isset($_POST["btnExcel"]))
    {
        require '../../oop/obj.php';
        $obj->report_order(trim($_POST["excel_date1"]),trim($_POST["excel_date2"]));
        $output .= '
        <table style="width: 1500px;font-size: 18px;font-family: '."Phetsarath OT".';" border="1">
        <tr style="font-size: 16px;" >
            <th>ລຳດັບ</th>
            <th>ເລກທີໃບສັ່ງຊື້</th>
            <th>ພະນັກງານ</th>
            <th>ຜູ້ສະໜອງ</th>
            <th>ມູນຄ່າລວມ</th>
            <th>ເວລາ</th>
        </tr>
        ';
        $Bill = 0;
        while($row = mysqli_fetch_array($result_report_order)){
            $amount = $amount + $row["amount"];
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td>'.$Bill.'</td>
                    <td>'."'".''.$row["order_id"].'</td>
                    <td>'.$row["emp_name"].'</td>
                    <td>'.$row["company"].'</td>
                    <td>'.number_format($row["amount"],2).'</td>
                    <td>'.date("d/m/Y H:i:s",strtotime($row["timestamp"])).'</td>
                </tr>
            ';
        }   
            $output .='
            <tr>
                <td colspan=4" align="right"><h4>ມູນຄ່າທັງໝົດ:</h4></td>
                <td colspan="2" align="right"><h4 style="color: red;">'.number_format($amount,2).' ກີບ</h4></td>
            </tr>
            </table><br>
        ';
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=order.xls");
        echo $output;
    }
?>