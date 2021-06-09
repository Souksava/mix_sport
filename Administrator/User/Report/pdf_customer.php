
<?php
require_once __DIR__ . '../../../vendor/autoload.php';
$amount = 0;
$Bill = 0;
    $content = '';
    require '../../oop/obj.php';
    if(isset($_POST["btnPDF"]))
    {
       $obj->select_customer(trim("%".$_POST["pdf_search"]."%"));
    }
     else
     {
        $obj->select_customer("");
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
                        ລາຍງານຂໍ້ມູນລູກຄ້າ
                    </b>
                </u>
            </div>
            <table width="100%;">
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
                if(mysqli_num_rows($result_customer) > 0){
                  
                    while($row = mysqli_fetch_array($result_customer)){
                        $amount = $amount + $row["amount"];
                        $Bill = $Bill + 1 ;
                        $content .='
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
                }   
                $content .='
                <tr>
                    <td colspan="7" align="right"><h4>ຈຳນວນທັງໝົດ:</h4></td>
                    <td colspan="3" align="right"><h4 style="color: red;">'.number_format($Bill).'</h4></td>
                </tr>
                </table><br>
            ';
$mpdf = new \Mpdf\Mpdf([
    'format'            => 'A4',
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
$mpdf->Output('ລາຍງານຂໍ້ມູນລູກຄ້າ.pdf','I');
?>