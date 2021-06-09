<?php
    $output = "";
    $amount = 0;
    if(isset($_POST["btnExcel"]))
    {
        require '../../oop/obj.php';
        $obj->select_supplier(trim("%".$_POST["excel_search"]."%"));
        $output .= '
        <table style="width: 1500px;font-size: 18px;font-family: '."Phetsarath OT".';" border="1">
        <tr style="font-size: 16px;">
            <th style="width: 80px;">#</th>
            <th style="width: 200px;">ລະຫັດ</th>
            <th style="width: 750px;">ຊື່ບໍລິສັດ</th>
            <th style="width: 400px;">ເບີໂທລະສັບ</th>
            <th style="width: 400px;">ເບີແຟັກ</th>
            <th style="width: 400px;">ທີ່ຢູ່</th>
            <th style="width: 400px;">ອີເມວ</th>
        </tr>
        ';
        $Bill = 0;
        while($row = mysqli_fetch_array($result_supplier)){
            $Bill = $Bill + 1 ;
            $output .='
                <tr align="center">
                    <td>'.$Bill.'</td>
                    <td>'.$row["sup_id"].'</td>
                    <td>'.$row["company"].'</td>
                    <td>'.$row["tel"].'</td>
                    <td>'.$row["fax"].'</td>
                    <td>'.$row["address"].'</td>
                    <td>'.$row["email"].'</td>
                </tr>
            ';
        }   
            $output .='
            <tr>
                <td colspan="4" align="right"><h4>ຈຳນວນທັງໝົດ:</h4></td>
                <td colspan="3" align="right"><h4 style="color: red;">'.number_format($Bill).'</h4></td>
            </tr>
            </table><br>
        ';
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=supplier.xls");
        echo $output;
    }
?>