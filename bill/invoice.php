<?php 
include ("../include/makeSession.php"); 
$upquery = mysqli_query($con,"select * from `billing` where id = '".$_REQUEST['upid']."'");
$upstatus_fetch = mysqli_fetch_array($upquery);
$resultq = mysqli_query($con,"select * from `order` where id = '".$upstatus_fetch['o_id']."'");
$rowq= mysqli_fetch_array($resultq);
$resultc = mysqli_query($con,"select * from `customer` where id = '".$rowq['cust_id']."'");
$rowc= mysqli_fetch_array($resultc);
$sql_bd = "select * from `billing_details` where `billing_id` = '".$upstatus_fetch['id']."' order by id asc";
$user = mysqli_query($con, $sql_bd);
$htm.='
<style>
* { margin: 0; padding: 0; }
body { font: 14px/1.4 Times New Roman, serif; }
#page-wrap { width: 800px; margin: 0 auto; }
textarea { border: 0; font: 14px Times New Roman, Serif; overflow: hidden; resize: none; }
.header1 { border: 0; font: 14px Times New Roman, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table td, table th { border: 1px solid black; padding: 5px; }
#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }
#address { width: 250px; height: 150px;  }
#customer { overflow: hidden; width: 100%; }
#logo { text-align: right; float: right; position: relative; margin-top: -38px; border: 1px solid #fff; max-width: 540px; max-height: 100px; }
#logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
#logoctr { display: none; }
#logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
#logohelp input { margin-bottom: 5px; }
.edit #logohelp { display: block; }
.edit #save-logo, .edit #cancel-logo { display: inline; }
.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
#customer-title { font-size: 20px; font-weight: bold; float: left; }
#meta { width: 300px;   }
#meta td { }
#meta td.meta-head { background: #eee; }
#meta td .textarea { width: 100%; height: 20px; }
#items { clear: both; width: 100%; margin: 1px 0 0 0; border: 1px solid black; }
#items th { background: #eee; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 0; vertical-align: top; }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }
#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}
textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }</style>
<div id="page-wrap"><div id="header" class="header1">INVOICE</div><div id="identity"><br /> <img id="image" src="images/logo.jpg" width="200px" height="140px" alt="logo" style="margin: 0px 0px 0px 450px;" />    <p id="address" style="margin-top: -16px;"><b>Harsh Video Lab</b><br />
Rajkamal Chowk,<br />
Opp. Municipal Office,<br />
Station Road,Amreli,Gujarat.<br />
Phone: (+91) 94264 48268</p>
           
		</div>
		<div style="clear:both"></div>
		<div id="customer"><b>BILL TO,</b> <br />
            <p id="address">M/s.&nbsp;'.$rowc['name'].'<br />'.$rowc['address'].'<br />Phone: (+91) '.$rowc['mobile'].'</p>

            <table id="meta" class="meta"  style="margin: -119px 0px 0px 450px;">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td class="textarea">Harsh-'.$upstatus_fetch['id'].'</td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td class="textarea">'.$rowq['o_date'].'</td>
                </tr>
                <tr>
                    <td class="meta-head">Bill Amount</td>
                    <td><div class="due">'.$upstatus_fetch['amonunt_due'].'</div></td>
                </tr>
            </table>	
		</div>
		<table id="items"><tr>     
		      <th colspan="2" >Particulars</th>
		      <th>Quantity</th>
		      <th>Rate</th>
		      <th>Amount</th>
		  </tr>';
while($user_row = mysqli_fetch_array($user)){ 
$htm.='<tr class="item-row" style="border:1px solid;">
		      <td class="description" colspan="2" style="border:1px solid;"><p>'.$user_row['title'].'</p></td>
		      <td align="center" style="border:1px solid;"><p class="qty">'.$user_row['qty'].'</textarea></td>
		      <td align="center" style="border:1px solid;"><p class="qty">'.$user_row['rate'].'</textarea></td>
		      <td align="center" style="border:1px solid;"><span class="price">'.$user_row['amount'].'</span></td>
		  </tr>'; }
$htm.='<tr>
		    <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value" align="center"><div id="subtotal">'.$upstatus_fetch['sub_total'].'</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Pre Pending</td>
		      <td class="total-value balance" align="center"><div class="due"><b>'.$upstatus_fetch['prepending'].'</b></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Advance</td>
		      <td class="total-value balance" align="center"><div class="due"><b>'.$upstatus_fetch['amount_paid'].'</b></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Net Total</td>
		      <td class="total-value balance" align="center"><div class="due"><b>'.$upstatus_fetch['amonunt_due'].'</b></div></td>
		  </tr>
		  <tr>
		      <th colspan="2" align="left" style="border-right-style:none;">Thanks for Visit...</th>
			  <th colspan="3" align="right" style="border-left-style:none;">For, Harsh Video.</th>
		  </tr>	
		</table>
	</div>';
require_once('php_plugin/pdf/mpdf.php');
$mpdf = new mPDF('s');
//echo $htm;
$mpdf->WriteHTML($htm);

$mpdf->Output('/home/rvrealtyprop528w/public_html/ZZHARSHVIDEO.COM/order/bill/pdf/Harsh-'.$upstatus_fetch["id"].'.pdf','F');
header('Location:../view-billing-form.php');
//$mpdf->Output(); 
//$mpdf->Output();

//$tmpName = '/home/rvrealtyprop528w/public_html/ZZHARSHVIDEO.COM/order/bill/pdf/Harsh-'.$upstatus_fetch["id"].'.pdf'; // Saving pdf to attach to email 
?><?php /*?>$tmpName = "pdf/7.pdf";
                        
$fileName = "mpdf.pdf";

$attachment = @chunk_split(base64_encode(file_get_contents($tmpName)));

$headers = "From: test@test.com\r\nReply-To: test@test.com";
$random_hash = md5(date('r', time()));
$headers .= "\r\nContent-Type: multipart/mixed; 
boundary=\"PHP-mixed-" . $random_hash . "\"";
$message = "--PHP-mixed-$random_hash\r\n" . "Content-Type: multipart/alternative; 
boundary=\"PHP-alt-$random_hash\"\r\n\r\n";
$message .= "--PHP-alt-$random_hash\r\n" . "Content-Type: text/html; 
charset=\"iso-8859-1\"\r\n" . "Content-Transfer-Encoding: 7bit\r\n\r\n";
$message .= "--PHP-mixed-$random_hash\r\n" . "Content-Type: application/zip; 
name=\"" . $fileName . "\"\r\n" . "Content-Transfer-Encoding: 
base64\r\n" . "Content-Disposition: attachment\r\n\r\n";

$message .= $attachment;
$message .= "/r/n--PHP-mixed-$random_hash--";

$mail = mail("savanisagar99@gmail.com","pdf", $message, $headers);
if($mail){
echo "mail sent";
exit;
}else{echo "not sent";exit;}<?php */?>
