
<?php
if(isset($_POST["btnBill"])){
    require_once __DIR__ . '../../../vendor/autoload.php';
    $amount = 0;
    $no_ = 0;
    $content = '';
    require '../../oop/obj.php';
$obj->bill_order(trim($_POST["id"]));
$row2 = mysqli_fetch_array($result_bill_order,MYSQLI_ASSOC);
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
            <div style="float: left; width: 65%;">
                <p>
                    <p style="font-size: 12px;">
                        ຮ້ານ Mix Sport<br>
                        ທີ່ຢູ່: ບ້ານ ຫ້ວຍຫົງ ເມືອງຈັນທະບຸລີ ນະຄອນຫຼວງວຽງຈັນ<br>
                        ເບີໂທລະສັບ: 020 7877 7784<br>
                        ຜູ້ສະໜອງສິນຄ້າ: '.$row2["company"].'

                    </p>
                </P>
            </div>
            <div style="float: left;text-align: right;">
                <br>
                <p style="font-size: 12px;">
                    ເລກທີໃບສັ່ງຊື້: '.$row2["order_id"].'<br>
                    ພະນັກງານສັ່ງຊື້: '.$row2["emp_name"].'<br>
                    ວັນທີ: '.date("d/m/Y",strtotime($row2["timestamp"])).'<br>
                </p>
            </div>
            <div align="center" style="font-size: 18px;">
                <u>
                    <b>
                        ໃບສັ່ງຊື້ສິນຄ້າ
                    </b>
                </u>
            </div>
            <table width="100%" style="font-size: 12px;" class="table">
                <tr>
                    <th align="center" style="width: 15px;">#</th>
                    <th align="center" style="width: 60px;">ສີນຄ້າ</th>
                    <th align="center" style="width: 120px;">ຊື່ສິນຄ້າ</th>
                    <th align="center" style="width: 30px;">ຈຳນວນ</th>
                    <th align="center" style="width: 40px;">ລາຄາ</th>
                    <th align="center" style="width: 50px;">ລວມ</th>
                </tr>
                ';
                mysqli_free_result($result_bill_order);  
                mysqli_next_result($conn);
                $obj->report_orderdetail(trim($_POST["id"]));
                while($row = mysqli_fetch_array($result_report_orderdetail,MYSQLI_ASSOC))
                {
               $amount = $amount + $row["total"];
               $no_ += 1;
                 $content .= '
                   <tr>
                       <td align="center">'.$no_.'</td>
                       ';
                       if($row["img"] == ""){
                          $row["img"] = "image.jpeg";
                       }
                       $content .='
                       <td style="text-align: center;">
                          <img src="../../image/'.$row["img"].'" class="img-circle elevation-2" alt="" width="55px" />
                       </td>
                       <td align="center">'.$row["cate_name"].' '.$row["brand_name"].' <br> '.$row["pro_name"].' '.$row["size_name"].'</td>
                       <td align="center">'.$row["qty"].'</td>
                       <td align="center">'.number_format($row["price"],2).'</td>
                       <td align="center">'.number_format($row["total"],2).'</td>
                   </tr>
                 ';
                }
                $content .='
                <tr>
                    <td colspan="4" align="right"><h2>ມູນຄ່າທັງໝົດ:</h2></td>
                    <td colspan="2" align="right"><h2 style="color: red;">'.number_format($amount,2).' ກີບ</h2></td>
                </tr>
            </table><br><br><br>
            <table style="width: 100%;font-size: 12px;background-color: white;">
                <tr>
                    <td align="left">
                        ເຈົ້າຂອງຮ້ານ<br><br><br><br><br><br>
                        ລາຍເຊັນ:......................................

                    </td>
                    <td align="right">
                        ພະນັກງານ<br><br><br><br><br><br>
                        ລາຍເຊັນ:......................................

                    </td>
                </tr>
            </table>

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
}
?>