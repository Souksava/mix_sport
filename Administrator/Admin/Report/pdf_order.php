
<?php
require_once __DIR__ . '../../../vendor/autoload.php';
$amount = 0;
    $content = '';
    require '../../oop/obj.php';
    if(isset($_POST["btnPDF"]))
    {
       $obj->report_order(trim($_POST["pdf_date1"]),trim($_POST["pdf_date2"]));
    }
     else
     {
        $obj->report_order("","");
     } 
$content .= '
        <style>
            table {
            border-collapse: collapse;
            width: 100%;
            }

            th, td {
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
            background-color: #04AA6D;
            color: white;
            }
            div img{
                border-radius: 50%;
            }
        </style>
            <div align="center" style="font-size: 10px;">
                ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
                ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ<br>
                =========oooo=========
            </div>
                <div align="left" style="z-index: 1;position: absolute;margin-top: -80px;">
                    <img src="../../icon/logo.jpg" width="100px">
                </div>
            <div style="float: left; width: 75%;">
                <p>
                    <p style="font-size: 10px;">
                        ຮ້ານ Mix Sport<br>
                        ທີ່ຢູ່: ບ້ານ ຫ້ວຍຫົງ ເມືອງຈັນທະບຸລີ ນະຄອນຫຼວງວຽງຈັນ<br>
                        ເບີໂທລະສັບ: 020 7877 7784
                    </p>
                </P>
            </div>
            <div style="float: left;text-align: right;">
                <br><br><br>

                </div>
            <div align="center" style="font-size: 18px;">
                <u>
                    <b>
                        ລາຍງານການສັ່ງຊື້ສິນຄ້າ
                    </b>
                </u>
            </div>
            <table width="100%;" style="font-size: 10px;">
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ເລກທີໃບສັ່ງຊື້</th>
                    <th>ພະນັກງານ</th>
                    <th>ຜູ້ສະໜອງ</th>
                    <th>ມູນຄ່າລວມ</th>
                    <th>ເວລາ</th>
                </tr>
                ';
                if(mysqli_num_rows($result_report_order) > 0){
                    $Bill = 0;
                  
                    while($row = mysqli_fetch_array($result_report_order)){
                        $amount = $amount + $row["amount"];
                        $Bill = $Bill + 1 ;
                        $content .='
                            <tr align="center">
                                <td>'.$Bill.'</td>
                                <td>'.$row["order_id"].'</td>
                                <td>'.$row["emp_name"].'</td>
                                <td>'.$row["company"].'</td>
                                <td>'.number_format($row["amount"],2).'</td>
                                <td>'.date("d/m/Y H:i:s",strtotime($row["timestamp"])).'</td>
                            </tr>
                        ';
                    }
                }   
                $content .='
                <tr>
                    <td colspan="5" align="right"><h2>ມູນຄ່າທັງໝົດ:</h2></td>
                    <td colspan="2" align="right"><h2 style="color: red;">'.number_format($amount,2).' ກີບ</h2></td>
                </tr>
                </table><br>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4',
    'mode'              => 'utf-8',      
    'tempDir'           => '/tmp',
    'default_font_size' => 14,
    'margin_bottom' => 8, 
    'margin_footer' => 5, 
	'default_font' => 'saysettha_ot'
]);
$mpdf->defaultfooterline = 0;
$footer = '<p align="center" style="font-size: 8px;">ໜ້າທີ່ {PAGENO} ຂອງ {nb}<br> </p>';
$mpdf->SetFooter($footer);

$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍງານການຂາຍ.pdf','I');
?>