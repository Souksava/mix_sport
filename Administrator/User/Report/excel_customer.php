<?php
    $output = "";
    $amount = 0;
    if(isset($_POST["btnExcel"]))
    {
        require '../../oop/obj.php';
        $obj->select_customer(trim("%".$_POST["excel_search"]."%"));
        $output .= '
        <table style="width: 1500px;font-size: 18px;font-family: '."Phetsarath OT".';" border="1">
        <tr style="font-size: 16px;" >
            <th style="width: 30px;">#</th>
            <th style="width: 200px;">ລະຫັດ</th>
            <th style="width: 200px;">ຊື່ລູກຄ້າ</th>
            <th style="width: 200px;">ນາມສະກຸນ</th>
            <th style="width: 200px;">ເພດ</th>
            <th style="width: 200px;">ທີ່ຢູ່ລູກຄ້າ</th>
            <th style="width: 200px;">ເບີໂທລະສັບ</th>
            <th style="width: 200px;">Whats App</th>
            <th style="width: 200px;">ອີເມວ</th>
            <th style="width: 200px;">ວັນທີສະໝັກ</th>
        </tr>
        ';
        $Bill = 0;
        while($row = mysqli_fetch_array($result_customer)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td>'.$Bill.'</td>
                    <td>'.$row["cus_id"].'</td>
                    <td>'.$row["cus_name"].'</td>
                    <td>'.$row["cus_surname"].'</td>
                    <td>'.$row["gender"].'</td>
                    <td>'.$row["address"].'</td>
                    <td>'.$row["tel"].'</td>
                    <td>'.$row["whatsapp"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.date("d/m/Y H:i:s",strtotime($row["timestamp"])).'</td>
                </tr>
            ';
        }   
            $output .='
            <tr>
                <td colspan="7" align="right"><h4>ຈຳນວນທັງໝົດ:</h4></td>
                <td colspan="3" align="right"><h4 style="color: red;">'.number_format($Bill).'</h4></td>
            </tr>
            </table><br>
        ';
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=customer.xls");
        echo $output;
    }
?>