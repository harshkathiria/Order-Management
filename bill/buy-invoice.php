<?php

include ("../include/makeSession.php"); 

$upquery = mysqli_query($con,"select * from `billing` where id = '".$_REQUEST['upid']."'");

$upstatus_fetch = mysqli_fetch_array($upquery);

?>

<?php 

if(isset($_POST) && is_array($_POST)  == 'true'){

	function sendSms($mob='8401181400', $text='we will contact u soon'){

	$newtxt = str_replace(PHP_EOL, '', $text);

	$txt_msg = str_replace(' ', '+', $newtxt);

	$ch = curl_init('http://mitechsolution.com/smsapi.aspx?username=harshvideo&password=harsh.video..&sender=HARSHV&to='.$mob.'&message='.$txt_msg.'&route=route3');

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($ch);	

}





}

if(isset($_REQUEST['pdf']) && $_REQUEST['pdf']!=''){



$tmpName = "pdf/".$_POST['id'].".pdf";

$email = $_POST['email'];

$fileName = $_POST['id'].".pdf";



$attachment = @chunk_split(base64_encode(file_get_contents($tmpName)));



$headers = "From: Invoice@harshvideo.com\r\nReply-To: Invoice@harshvideo.com";

$random_hash = md5(date('r', time()));

$headers .= "\r\nContent-Type: multipart/mixed; 

boundary=\"PHP-mixed-" . $random_hash . "\"";

// Set your file path here	

//define the body of the message.

$message = "--PHP-mixed-$random_hash\r\n" . "Content-Type: multipart/alternative; 

boundary=\"PHP-alt-$random_hash\"\r\n\r\n";

$message .= "--PHP-alt-$random_hash\r\n" . "Content-Type: text/html; 

charset=\"iso-8859-1\"\r\n" . "Content-Transfer-Encoding: 7bit\r\n\r\n";



//Insert the html message.

//include attachment

$message .= "--PHP-mixed-$random_hash\r\n" . "Content-Type: application/zip; 

name=\"" . $fileName . "\"\r\n" . "Content-Transfer-Encoding: 

base64\r\n" . "Content-Disposition: attachment\r\n\r\n";



$message .= $attachment;

$message .= "/r/n--PHP-mixed-$random_hash--";

$mail = mail($email,"invoice", $message, $headers);

}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

<title>Invoice</title>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="../bootstrap/css/style.css">

<link rel='stylesheet' type='text/css' href='css/style.css' />

<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />

<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>

<script type='text/javascript' src='js/example.js'></script>

<script>



function myFunction() {



	



$(document).ready(function(){



	$('#printb').css('display', 'none');



	$('#print1').css('display', 'none');

	$('#print2').css('display', 'none');

	$('#print3').css('display', 'none');



	



});



    window.print();



}



</script>

</head>



<body>

<center>

  <button id="printb" onClick="myFunction()">Print this page</button>

</center>

<div id="page-wrap">

  <textarea id="header">INVOICE</textarea>

  <div id="identity"> <br />

    <p id="address" style="margin-top: -16px;"><b>Harsh Video Lab</b><br />

      Rajkamal Chowk,<br />

      Opp. Municipal Office,<br />

      Station Road,Amreli,Gujarat.<br />

      Phone: (+91) 94264 48268</p>

    <div id="logo"> <img id="image" src="images/logo.jpg" width="200px" height="110px" alt="logo" /> </div>

  </div>

  <div style="clear:both"></div>

  <div id="customer"><b>BILL TO,</b> <br />

    <?php $resultq = mysqli_query($con,"select * from `order` where id = '".$upstatus_fetch['o_id']."'");



$rowq= mysqli_fetch_array($resultq);







				  $resultc = mysqli_query($con,"select * from `customer` where id = '".$rowq['cust_id']."'");



				  $rowc= mysqli_fetch_array($resultc); ?>

    <p id="address">M/s.&nbsp;<?php echo $rowc['name']; ?><br />

      <?php echo $rowc['address'] ; ?><br />

      Phone: (+91) <?php echo $rowc['mobile'] ; ?> </p>

    <table id="meta">

      <tr>

        <td class="meta-head">Invoice #</td>

        <td><textarea>Harsh-<?php echo $upstatus_fetch['id']; ?></textarea></td>

      </tr>

      <tr>

        <td class="meta-head">Date</td>

        <td><textarea id="date"><?php echo $rowq['o_date']; ?></textarea></td>

      </tr>

      <tr>

        <td class="meta-head">Bill Amount</td>

        <td><div class="due"><?php echo $upstatus_fetch['amonunt_due']; ?></div></td>

      </tr>

    </table>

  </div>

  <table id="items">

    <tr>

      <th colspan="2" >Particulars</th>

      <th>Quantity</th>

      <th>Rate</th>

      <th>Amount</th>

    </tr>

    <?php			  $subtotal = 0;



		   					 $sql_bd = "select * from `billing_details` where `billing_id` = '".$upstatus_fetch['id']."' order by id asc";



		   				     $user = mysqli_query($con, $sql_bd);



							  while($user_row = mysqli_fetch_array($user)){ ?>

    <tr class="item-row" style="border:1px solid;">

      <td class="description" colspan="2" style="border:1px solid;"><p><?php echo $user_row['title']; ?></p></td>

      <td align="center" style="border:1px solid;"><p class="qty"><?php echo $user_row['qty']; ?>

          </textarea>

      </td>

      <td align="center" style="border:1px solid;"><p class="qty"><?php echo $user_row['rate']; ?>

          </textarea>

      </td>

      <td align="center" style="border:1px solid;"><span class="price"><?php echo $user_row['amount']; ?></span></td>

    </tr>

    <?php } ?>

    <?php if($upstatus_fetch['sub_total']!=''){ ?>

    <tr>

      <td colspan="2" class="blank"></td>

      <td colspan="2" class="total-line">Subtotal</td>

      <td class="total-value" align="center"><div id="subtotal"><?php echo $upstatus_fetch['sub_total']; ?></div></td>

    </tr>

    <?php } ?>

    <?php if($upstatus_fetch['prepending']!=''){ ?>

    <tr>

      <td colspan="2" class="blank"></td>

      <td colspan="2" class="total-line balance">Pre Pending</td>

      <td class="total-value balance" align="center"><div class="due"><b><?php echo $upstatus_fetch['prepending']; ?></b></div></td>

    </tr>

    <?php } ?>

    <?php if($upstatus_fetch['amount_paid']!=''){ ?>

    <tr>

      <td colspan="2" class="blank"></td>

      <td colspan="2" class="total-line balance">Advance</td>

      <td class="total-value balance" align="center"><div class="due"><b><?php echo $upstatus_fetch['amount_paid']; ?></b></div></td>

    </tr>

    <?php } ?>

    <?php if($upstatus_fetch['amonunt_due']!=''){ ?>

    <tr>

      <td colspan="2" class="blank"></td>

      <td colspan="2" class="total-line balance">Net Total</td>

      <td class="total-value balance" align="center"><div class="due"><b><?php echo $upstatus_fetch['amonunt_due']; ?></b></div></td>

    </tr>

    <?php } ?>

    <tr>

      <th colspan="2" align="left" style="border-right-style:none;">Thanks for Visit...</th>

      <th colspan="3" align="right" style="border-left-style:none;">For, Harsh Video.</th>

    </tr>

  </table>

  <form action="" method="post" id="print2">

  	<input type="hidden" name="sendSMS" value="true"  />

    <div class="form-group">

      <label>Mobile</label>

      <input class="form-control" type="text" name="mobile" value="<?php echo $rowc['mobile'] ; ?>" />

    </div>

    <div class="form-group">

      <label>Title</label>

      <input class="form-control" type="text" name="title" value="Welcome to, Harsh Video Lab" />

    </div>

    <div class="form-group">

      <label>Bill No</label>

      <input class="form-control" type="text" name="invoice_no" value="Harsh-<?php echo $upstatus_fetch['id']; ?>" />

    </div>

    <div class="form-group">

      <label>Date</label>

      <input class="form-control" type="text" name="date" value="<?php echo $rowq['o_date']; ?>" />

    </div>

    <div class="form-group">

      <label>Name</label>

      <input class="form-control" type="text" name="name" value="<?php echo $rowc['name']; ?>" />

    </div>

    <div class="form-group">

      <label>amount paid</label>

      <input class="form-control" type="text" name="amount_paid" value="<?php echo $upstatus_fetch['amount_paid']; ?>" />

    </div>

    <div class="form-group">

      <label>amount due</label>

      <input class="form-control" type="text" name="amonunt_due" value="<?php echo $upstatus_fetch['amonunt_due']; ?>" />

    </div>

    <center>

      <input type="submit" value="Send SMS" class="btn btn-info"/>

    </center>

  </form>

  <form method="post" action="../mail_sent.php" id="print3">

    <div class="form-group">

      <label>Email Id</label>

      <input class="form-control" type="email" required name="email" />

      <input type="hidden"  name="id"  value="<?php echo $upstatus_fetch['id']; ?>"/>

    </div>

    <center>

      <input type="submit" value="Send PDF" name="pdf" class="btn btn-success"/>

    </center>

  </form>

</div>

</body>

</html>