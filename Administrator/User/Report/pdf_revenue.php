
<?php
require_once __DIR__ . '../../../vendor/autoload.php';
$amount = 0;
    $content = '';
    require '../../oop/obj.php';
    if(isset($_POST["btnPDF"]))
    {
       $obj->report_revenue(trim($_POST["pdf_date1"]),trim($_POST["pdf_date2"]));
    }
     else
     {
        $obj->report_revenue("","");
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
            <div align="center" style="font-size: 16px;">
                <u>
                    <b>
                        ລາຍງານລາຍຮັບ
                    </b>
                </u>
            </div>
            <table width="100%;">
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
                if(mysqli_num_rows($result_revenue) > 0){
                    $Bill = 0;
                  
                    while($row = mysqli_fetch_array($result_revenue)){
                        $amount = $amount + $row["total"];
                        $Bill = $Bill + 1 ;
                        $content .='
                            <tr align="center">
                                <td>'.$Bill.'</td>
                                <td>'.$row["sell_id"].'</td>
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
                }   
                $content .='
                <tr>
                    <td colspan="9" align="right"><h4>ມູນຄ່າທັງໝົດ:</h4></td>
                    <td colspan="3" align="right"><h4 style="color: red;">'.number_format($amount,2).' ກີບ</h4></td>
                </tr>
                </table><br>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4-L',
    'mode'              => 'utf-8',      
    'tempDir'           => '/tmp',
    'default_font_size' => 14,
    'margin_bottom' => 18, 
    'margin_footer' => 5, 
	'default_font' => 'saysettha_ot'
]);
$mpdf->defaultfooterline = 0;
$footer = '<p align="center" style="font-size: 8px;">ໜ້າທີ່ {PAGENO} ຂອງ {nb}<br> </p>';
$mpdf->SetFooter($footer);

$mpdf->WriteHTML($content);
$mpdf->Output('ລາຍງານລາຍຮັບ.pdf','I');
?>