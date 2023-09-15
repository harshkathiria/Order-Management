<?php 
	include_once('include/config.inc.php');
	session_start();
	switch($_REQUEST['do']) {
	    case "addcustomer" :
			$name = mysqli_escape_string($con,$_REQUEST['name']);
			$address = mysqli_escape_string($con,$_REQUEST['address']);
			$mobile = mysqli_escape_string($con,$_REQUEST['mobile']);
			$mobile_two = mysqli_escape_string($con,$_REQUEST['mobile_two']);
			$city = mysqli_escape_string($con,$_REQUEST['city']);
			$state = mysqli_escape_string($con,$_REQUEST['state']);
			$office_no = mysqli_escape_string($con,$_REQUEST['office_no']);
			$website = mysqli_escape_string($con,$_REQUEST['website']);
			$email = mysqli_escape_string($con,$_REQUEST['email']);
			$note = mysqli_escape_string($con,$_REQUEST['note']);
			mysqli_query($con,"insert into customer(name,address,mobile,mobile_two,city,state,office_no,website,email,note) values('".$name."','".$address."','".$mobile."','".$mobile_two."','".$city."','".$state."','".$office_no."','".$website."','".$email."','".$note."')");
			header("Location:viewcustomer.php");
		break;
		case "editcustomer" :
			$name = mysqli_escape_string($con,$_REQUEST['name']);
			$address = mysqli_escape_string($con,$_REQUEST['address']);
			$mobile = mysqli_escape_string($con,$_REQUEST['mobile']);
			$mobile_two = mysqli_escape_string($con,$_REQUEST['mobile_two']);
			$city = mysqli_escape_string($con,$_REQUEST['city']);
			$state = mysqli_escape_string($con,$_REQUEST['state']);
			$office_no = mysqli_escape_string($con,$_REQUEST['office_no']);
			$website = mysqli_escape_string($con,$_REQUEST['website']);
			$email = mysqli_escape_string($con,$_REQUEST['email']);
			$note = mysqli_escape_string($con,$_REQUEST['note']);
			mysqli_query($con,"update customer set name='".$name."' , address='".$address."', mobile='".$mobile."', mobile_two='".$mobile_two."', city='".$city."', state='".$state."' , office_no='".$office_no."' , website='".$website."' , email='".$email."' , note='".$note."' where id=".(int)$_REQUEST['doid']); 
			header("Location:viewcustomer.php");
		break;
		case "addcameraman" :
			$name = mysqli_escape_string($con,$_REQUEST['name']);
			$address = mysqli_escape_string($con,$_REQUEST['address']);
			$mobile = mysqli_escape_string($con,$_REQUEST['mobile']);
			$mobile_two = mysqli_escape_string($con,$_REQUEST['mobile_two']);
			$city = mysqli_escape_string($con,$_REQUEST['city']);
			$state = mysqli_escape_string($con,$_REQUEST['state']);
			$office_no = mysqli_escape_string($con,$_REQUEST['office_no']);
			$website = mysqli_escape_string($con,$_REQUEST['website']);
			$email = mysqli_escape_string($con,$_REQUEST['email']);
			$note = mysqli_escape_string($con,$_REQUEST['note']);

			mysqli_query($con,"insert into cameraman(name,address,mobile,mobile_two,city,state,office_no,website,email,note) values('".$name."','".$address."','".$mobile."','".$mobile_two."','".$city."','".$state."','".$office_no."','".$website."','".$email."','".$note."')");

			header("Location:viewcameraman.php");
		break;
		case "editcameraman" :
					$name = mysqli_escape_string($con,$_REQUEST['name']);
					$address = mysqli_escape_string($con,$_REQUEST['address']);
					$mobile = mysqli_escape_string($con,$_REQUEST['mobile']);
					$mobile_two = mysqli_escape_string($con,$_REQUEST['mobile_two']);
					$city = mysqli_escape_string($con,$_REQUEST['city']);
					$state = mysqli_escape_string($con,$_REQUEST['state']);
					$office_no = mysqli_escape_string($con,$_REQUEST['office_no']);
					$website = mysqli_escape_string($con,$_REQUEST['website']);
					$email = mysqli_escape_string($con,$_REQUEST['email']);
					$note = mysqli_escape_string($con,$_REQUEST['note']);
					mysqli_query($con,"update cameraman set name='".$name."' , address='".$address."', mobile='".$mobile."', mobile_two='".$mobile_two."', city='".$city."', state='".$state."' , office_no='".$office_no."' , website='".$website."' , email='".$email."' , note='".$note."' where id=".(int)$_REQUEST['doid']); 

					header("Location:viewcameraman.php");

		break;
		case "addorder" :
				$o_date = mysqli_escape_string($con,$_REQUEST['o_date']);
				$cust_id = mysqli_escape_string($con,$_REQUEST['cust_id']);
				$dofp = mysqli_escape_string($con,$_REQUEST['dofp']);
				$iafpv = mysqli_escape_string($con,$_REQUEST['iafpv']);
				$video_charge = mysqli_escape_string($con,$_REQUEST['video_charge']);
				$casate_nang = mysqli_escape_string($con,$_REQUEST['casate_nang']);
				$mixing_charge = mysqli_escape_string($con,$_REQUEST['mixing_charge']);
				$dvd = mysqli_escape_string($con,$_REQUEST['dvd']);
				$l_shoot_c = mysqli_escape_string($con,$_REQUEST['l_shoot_c']);
				$vs_note = mysqli_escape_string($con,$_REQUEST['vs_note']);
				$photographer = mysqli_escape_string($con,$_REQUEST['photographer']);
				$p_size = mysqli_escape_string($con,$_REQUEST['p_size']);
				$p_size_rate = mysqli_escape_string($con,$_REQUEST['p_size_rate']);
				$p_digital = mysqli_escape_string($con,$_REQUEST['p_digital']);
				$p_digital_rate = mysqli_escape_string($con,$_REQUEST['p_digital_rate']);
				$k_size = mysqli_escape_string($con,$_REQUEST['k_size']);
				$k_size_rate = mysqli_escape_string($con,$_REQUEST['k_size_rate']);
				$type_of_cover = mysqli_escape_string($con,$_REQUEST['type_of_cover']);
				$k_note = mysqli_escape_string($con,$_REQUEST['k_note']);
				$t_of_p = mysqli_escape_string($con,$_REQUEST['t_of_p']);
				$t_of_p_ed = mysqli_escape_string($con,$_REQUEST['t_of_p_ed']);
				$t_of_v = mysqli_escape_string($con,$_REQUEST['t_of_v']);
				$t_of_v_ed = mysqli_escape_string($con,$_REQUEST['t_of_v_ed']);
				$sub_total = mysqli_escape_string($con,$_REQUEST['sub_total']);
				$tax = mysqli_escape_string($con,$_REQUEST['tax']);
				$tax_amount = mysqli_escape_string($con,$_REQUEST['tax_amount']);
				$total = mysqli_escape_string($con,$_REQUEST['total']);
				$amount_paid = mysqli_escape_string($con,$_REQUEST['amount_paid']);
				$amonunt_due = mysqli_escape_string($con,$_REQUEST['amonunt_due']);
				mysqli_query($con,"insert into `order`(o_date,cust_id,dofp,iafpv,video_charge,	casate_nung,mixing_charge,dvd,l_shoot_c,vs_note,photographer,p_size,p_size_rate,p_digital,p_digital_rate,k_size,k_size_rate,type_of_cover,k_note,t_of_p,t_of_p_ed,t_of_v,t_of_v_ed,sub_total,tax,tax_amount,total,amount_paid,amount_due) values('".$o_date."','".$cust_id."','".$dofp."','".$iafpv."','".$video_charge."','".$casate_nang."','".$mixing_charge."','".$dvd."','".$l_shoot_c."','".$vs_note."','".$photographer."','".$p_size."','".$p_size_rate."','".$p_digital."','".$p_digital_rate."','".$k_size."','".$k_size_rate."','".$type_of_cover."','".$k_note."','".$t_of_p."','".$t_of_p_ed."','".$t_of_v."','".$t_of_v_ed."','".$sub_total."','".$tax."','".$tax_amount."','".$total."','".$amount_paid."','".$amonunt_due."')");
				$last_id = mysqli_insert_id($con);
				foreach($_REQUEST['pv_title'] as $key=>$value){
					mysqli_query($con,"insert into order_details(pv_title,pv_date,start_time,end_time,pv_note,o_id) values('".$value."','".$_REQUEST['pv_date'][$key]."','".$_REQUEST['start_time'][$key]."','".$_REQUEST['end_time'][$key]."','".$_REQUEST['pv_note'][$key]."','".$last_id."')");
				}
				header("Location:view-order-book.php");

		break;
		case "editorder" :
		            $o_date = mysqli_escape_string($con,$_REQUEST['o_date']);
					$cust_id = mysqli_escape_string($con,$_REQUEST['cust_id']);
					$dofp = mysqli_escape_string($con,$_REQUEST['dofp']);
					$iafpv = mysqli_escape_string($con,$_REQUEST['iafpv']);
					$video_charge = mysqli_escape_string($con,$_REQUEST['video_charge']);
					$casate_nang = mysqli_escape_string($con,$_REQUEST['casate_nang']);
					$mixing_charge = mysqli_escape_string($con,$_REQUEST['mixing_charge']);
					$dvd = mysqli_escape_string($con,$_REQUEST['dvd']);
					$l_shoot_c = mysqli_escape_string($con,$_REQUEST['l_shoot_c']);
					$vs_note = mysqli_escape_string($con,$_REQUEST['vs_note']);
					$photographer = mysqli_escape_string($con,$_REQUEST['photographer']);
					$p_size = mysqli_escape_string($con,$_REQUEST['p_size']);
					$p_size_rate = mysqli_escape_string($con,$_REQUEST['p_size_rate']);
					$p_digital = mysqli_escape_string($con,$_REQUEST['p_digital']);
					$p_digital_rate = mysqli_escape_string($con,$_REQUEST['p_digital_rate']);
					$k_size = mysqli_escape_string($con,$_REQUEST['k_size']);
					$k_size_rate = mysqli_escape_string($con,$_REQUEST['k_size_rate']);
					$type_of_cover = mysqli_escape_string($con,$_REQUEST['type_of_cover']);
					$k_note = mysqli_escape_string($con,$_REQUEST['k_note']);
					$t_of_p = mysqli_escape_string($con,$_REQUEST['t_of_p']);
					$t_of_p_ed = mysqli_escape_string($con,$_REQUEST['t_of_p_ed']);
					$t_of_v = mysqli_escape_string($con,$_REQUEST['t_of_v']);
					$t_of_v_ed = mysqli_escape_string($con,$_REQUEST['t_of_v_ed']);
					$sub_total = mysqli_escape_string($con,$_REQUEST['sub_total']);
					$tax = mysqli_escape_string($con,$_REQUEST['tax']);
					$tax_amount = mysqli_escape_string($con,$_REQUEST['tax_amount']);
					$total = mysqli_escape_string($con,$_REQUEST['total']);
					$amount_paid = mysqli_escape_string($con,$_REQUEST['amount_paid']);
					$amonunt_due = mysqli_escape_string($con,$_REQUEST['amonunt_due']);
					mysqli_query($con,"update `order` set o_date='".$o_date."' , cust_id='".$cust_id."', dofp='".$dofp."', iafpv='".$iafpv."', video_charge='".$video_charge."', casate_nung='".$casate_nang."' , mixing_charge='".$mixing_charge."' , dvd='".$dvd."' , l_shoot_c='".$l_shoot_c."' , vs_note='".$vs_note."', photographer='".$photographer."' , p_size='".$p_size."', p_size_rate='".$p_size_rate."', p_digital='".$p_digital."', p_digital_rate='".$p_digital_rate."', k_size='".$k_size."' , k_size_rate='".$k_size_rate."' , type_of_cover='".$type_of_cover."' , k_note='".$k_note."' , t_of_p='".$t_of_p."', t_of_p_ed='".$t_of_p_ed."' , t_of_v='".$t_of_v."', t_of_v_ed='".$t_of_v_ed."', sub_total='".$sub_total."', tax='".$tax."', tax_amount='".$tax_amount."' , total='".$total."' , amount_paid='".$amount_paid."' , amount_due='".$amonunt_due."' where id=".(int)$_REQUEST['doid']); 					mysqli_query($con,"delete from order_details where o_id = '".(int)$_REQUEST['doid']."'");
					foreach($_REQUEST['pv_title'] as $key=>$value){
						mysqli_query($con,"insert into order_details(pv_title,pv_date,start_time,end_time,pv_note,o_id) values('".$value."','".$_REQUEST['pv_date'][$key]."','".$_REQUEST['start_time'][$key]."','".$_REQUEST['end_time'][$key]."','".$_REQUEST['pv_note'][$key]."','".(int)$_REQUEST['doid']."')");
					}
					header("Location:view-order-book.php");
		break;
		
		case "addasigncameraman" :

					$acm_date = mysqli_escape_string($con,$_REQUEST['acm_date']);
					$note = mysqli_escape_string($con,$_REQUEST['note']);
					$cm_id = (int)$_REQUEST['cm_id'];
					$o_id =(int)$_REQUEST['o_id'];
					$city = (int)$_REQUEST['city'];
					
					$query = mysqli_query($con,"select * from asign_cameraman where acm_date = '".$_REQUEST['acm_date']."' AND cm_id = '".$_REQUEST['cm_id']."'");
					if(mysqli_num_rows($query) > 0){
						header("Location:asign-cameraman.php?error1");
					}else{
						mysqli_query($con,"insert into asign_cameraman(acm_date,note,cm_id,o_id,status) values('".$acm_date."','".$note."','".$cm_id."','".$o_id."','0')");
						header("Location:view-asign-cameraman.php");
					}

		break;

		

		case "editasigncameraman" :

					$acm_date = mysqli_escape_string($con,$_REQUEST['acm_date']);
					$note = mysqli_escape_string($con,$_REQUEST['note']);
					$cm_id = (int)$_REQUEST['cm_id'];
					$o_id =(int)$_REQUEST['o_id'];
					$status =(int)$_REQUEST['status'];
					$doid = $_REQUEST['doid'];
					
					$query = mysqli_query($con,"select * from asign_cameraman where acm_date = '".$_REQUEST['acm_date']."' AND cm_id = '".$_REQUEST['cm_id']."'");
					if(mysqli_num_rows($query) > 0){
						 mysqli_query($con,"update asign_cameraman set  note='".$note."' where id=".(int)$_REQUEST['doid']); 
						header("Location:asign-cameraman.php?upid=$doid&error1");
					}else{
				   mysqli_query($con,"update asign_cameraman set acm_date='".$acm_date."' , note='".$note."', cm_id='".$cm_id."', o_id='".$o_id."', status='".$status."' where id=".(int)$_REQUEST['doid']); 
				   
				   
					header("Location:view-asign-cameraman.php");
					}
		break;
		
		case "addBookingcameraman" :

					$acm_date = mysqli_escape_string($con,$_REQUEST['acm_date']);
					$note = mysqli_escape_string($con,$_REQUEST['note']);
					$cm_id = (int)$_REQUEST['cm_id'];
					
					$query = mysqli_query($con,"select * from booking_cameraman where acm_date = '".$_REQUEST['acm_date']."' AND cm_id = '".$_REQUEST['cm_id']."'");
					if(mysqli_num_rows($query) > 0){
						header("Location:booking-cameraman.php?error1");
					}else{
						mysqli_query($con,"insert into booking_cameraman(acm_date,note,cm_id) values('".$acm_date."','".$note."','".$cm_id."')");
						header("Location:view-booking-cameraman.php");
					}

		break;

		

		case "editBookingcameraman" :

					$acm_date = mysqli_escape_string($con,$_REQUEST['acm_date']);
					$note = mysqli_escape_string($con,$_REQUEST['note']);
					$cm_id = (int)$_REQUEST['cm_id'];
					
					$doid = $_REQUEST['doid'];
					
					$query = mysqli_query($con,"select * from booking_cameraman where acm_date = '".$_REQUEST['acm_date']."' AND cm_id = '".$_REQUEST['cm_id']."'");
					if(mysqli_num_rows($query) > 0){
						 mysqli_query($con,"update booking_cameraman set  note='".$note."' where id=".(int)$_REQUEST['doid']); 
						header("Location:booking-cameraman.php?upid=$doid&error1");
					}else{
				   mysqli_query($con,"update booking_cameraman set acm_date='".$acm_date."' , note='".$note."', cm_id='".$cm_id."' where id=".(int)$_REQUEST['doid']); 
				   
				   
					header("Location:view-booking-cameraman.php");
					}
		break;
		
		case "addbilling" :
		
					$b_date = mysqli_escape_string($con,$_REQUEST['b_date']);
					$o_id = (int)$_REQUEST['o_id'];
					$sub_total = mysqli_escape_string($con,$_REQUEST['sub_total']);
					$prepending = mysqli_escape_string($con,$_REQUEST['prepending']);
					$amount_paid = mysqli_escape_string($con,$_REQUEST['amount_paid']);
					$amonunt_due = mysqli_escape_string($con,$_REQUEST['amonunt_due']);
					
					
				   	mysqli_query($con,"insert into billing(b_date,o_id,sub_total,prepending,amount_paid,amonunt_due) values('".$b_date."','".$o_id."','".$sub_total."','".$prepending."','".$amount_paid."','".$amonunt_due."')");
					$last_id = mysqli_insert_id($con);
					
					foreach($_REQUEST['title'] as $key=>$value){
						
						mysqli_query($con,"insert into billing_details(title,qty,rate,amount,billing_id) values('".$value."','".$_REQUEST['qty'][$key]."','".$_REQUEST['rate'][$key]."','".$_REQUEST['amount'][$key]."','".$last_id."')");
					
					}
					header("Location:view-billing-form.php");

		break;

		

		case "editbilling" :

					$b_date = mysqli_escape_string($con,$_REQUEST['b_date']);
					$o_id = (int)$_REQUEST['o_id'];
					$sub_total = mysqli_escape_string($con,$_REQUEST['sub_total']);
					$prepending = mysqli_escape_string($con,$_REQUEST['prepending']);
					$amount_paid = mysqli_escape_string($con,$_REQUEST['amount_paid']);
					$amonunt_due = mysqli_escape_string($con,$_REQUEST['amonunt_due']);
					mysqli_query($con,"update billing set b_date='".$b_date."' , o_id='".$o_id."', sub_total='".$sub_total."', prepending='".$prepending."', amount_paid='".$amount_paid."', amonunt_due='".$amonunt_due."' where id=".(int)$_REQUEST['doid']); 
					mysqli_query($con,"delete from billing_details where billing_id = '".(int)$_REQUEST['doid']."'");
					foreach($_REQUEST['title'] as $key=>$value){
						
						mysqli_query($con,"insert into billing_details(title,qty,rate,amount,billing_id) values('".$value."','".$_REQUEST['qty'][$key]."','".$_REQUEST['rate'][$key]."','".$_REQUEST['amount'][$key]."','".(int)$_REQUEST['doid']."')");
					
					}
					header("Location:view-billing-form.php");

		break;		
		case "adddirectbilling" :
		
					$b_date = mysqli_escape_string($con,$_REQUEST['b_date']);
					$cust_name = mysqli_escape_string($con,$_REQUEST['cust_name']);
					$cust_mobile = mysqli_escape_string($con,$_REQUEST['cust_mobile']);
					//$o_id = (int)$_REQUEST['o_id'];
					$sub_total = mysqli_escape_string($con,$_REQUEST['sub_total']);
					$prepending = mysqli_escape_string($con,$_REQUEST['prepending']);
					$amount_paid = mysqli_escape_string($con,$_REQUEST['amount_paid']);
					$amonunt_due = mysqli_escape_string($con,$_REQUEST['amonunt_due']);
					
					
				   	mysqli_query($con,"insert into direct_billing(b_date,cust_name,cust_mobile,sub_total,prepending,amount_paid,amonunt_due) values('".$b_date."','".$cust_name."','".$cust_mobile."','".$sub_total."','".$prepending."','".$amount_paid."','".$amonunt_due."')");
					$last_id = mysqli_insert_id($con);
					
					foreach($_REQUEST['title'] as $key=>$value){
						
						mysqli_query($con,"insert into direct_billing_details(title,qty,rate,amount,billing_id) values('".$value."','".$_REQUEST['qty'][$key]."','".$_REQUEST['rate'][$key]."','".$_REQUEST['amount'][$key]."','".$last_id."')");
					
					}
					header("Location:view-direct-billing.php");

		break;

		

		case "editdirectbilling" :

					$b_date = mysqli_escape_string($con,$_REQUEST['b_date']);
					$cust_name = mysqli_escape_string($con,$_REQUEST['cust_name']);
					$cust_mobile = mysqli_escape_string($con,$_REQUEST['cust_mobile']);
				//	$o_id = (int)$_REQUEST['o_id'];
					$sub_total = mysqli_escape_string($con,$_REQUEST['sub_total']);
					$prepending = mysqli_escape_string($con,$_REQUEST['prepending']);
					$amount_paid = mysqli_escape_string($con,$_REQUEST['amount_paid']);
					$amonunt_due = mysqli_escape_string($con,$_REQUEST['amonunt_due']);
					mysqli_query($con,"update direct_billing set b_date='".$b_date."' ,cust_name='".$cust_name."' ,cust_mobile='".$cust_mobile."' , sub_total='".$sub_total."', prepending='".$prepending."', amount_paid='".$amount_paid."', amonunt_due='".$amonunt_due."' where id=".(int)$_REQUEST['doid']); 
					mysqli_query($con,"delete from direct_billing_details where billing_id = '".(int)$_REQUEST['doid']."'");
					
					
					foreach($_REQUEST['title'] as $key=>$value){
						
						mysqli_query($con,"insert into direct_billing_details(title,qty,rate,amount,billing_id) values('".$value."','".$_REQUEST['qty'][$key]."','".$_REQUEST['rate'][$key]."','".$_REQUEST['amount'][$key]."','".(int)$_REQUEST['doid']."')");
					
					}
					header("Location:view-direct-billing.php");

		break;				
		case "addquickorder" :
		    
		    $name = mysqli_escape_string($con,$_REQUEST['cus_name']);
		    $address = mysqli_escape_string($con,$_REQUEST['cus_address']);	
		    $mobile = mysqli_escape_string($con,$_REQUEST['cus_mobile']);
		    $mobile_two = mysqli_escape_string($con,$_REQUEST['cus_mobile_two']);
		    $city = mysqli_escape_string($con,$_REQUEST['cus_city']);
		    $state = mysqli_escape_string($con,$_REQUEST['cus_state']);
		    $office_no = mysqli_escape_string($con,$_REQUEST['cus_office_no']);
		    $website = mysqli_escape_string($con,$_REQUEST['cus_website']);
		    $email = mysqli_escape_string($con,$_REQUEST['cus_email']);	
		    $note = mysqli_escape_string($con,$_REQUEST['cus_note']);
		    mysqli_query($con,"insert into customer(name,address,mobile,mobile_two,city,state,office_no,website,email,note) values('".$name."','".$address."','".$mobile."','".$mobile_two."','".$city."','".$state."','".$office_no."','".$website."','".$email."','".$note."')");
		    $cust_id = mysqli_insert_id($con);
		    
		    $o_date = mysqli_escape_string($con,$_REQUEST['o_date']);
		    
		    //$cust_id = mysqli_escape_string($con,$_REQUEST['cust_id']);
		    
		    $dofp = mysqli_escape_string($con,$_REQUEST['dofp']);
		    $iafpv = mysqli_escape_string($con,$_REQUEST['iafpv']);
		    $video_charge = mysqli_escape_string($con,$_REQUEST['video_charge']);
		    $casate_nang = mysqli_escape_string($con,$_REQUEST['casate_nang']);
		    $mixing_charge = mysqli_escape_string($con,$_REQUEST['mixing_charge']);
		    $dvd = mysqli_escape_string($con,$_REQUEST['dvd']);	
		    $l_shoot_c = mysqli_escape_string($con,$_REQUEST['l_shoot_c']);
		    $vs_note = mysqli_escape_string($con,$_REQUEST['vs_note']);	
		    $photographer = mysqli_escape_string($con,$_REQUEST['photographer']);
		    $p_size = mysqli_escape_string($con,$_REQUEST['p_size']);
		    $p_size_rate = mysqli_escape_string($con,$_REQUEST['p_size_rate']);	
		    $p_digital = mysqli_escape_string($con,$_REQUEST['p_digital']);		
		    $p_digital_rate = mysqli_escape_string($con,$_REQUEST['p_digital_rate']);
		    $k_size = mysqli_escape_string($con,$_REQUEST['k_size']);
		    $k_size_rate = mysqli_escape_string($con,$_REQUEST['k_size_rate']);
		    $type_of_cover = mysqli_escape_string($con,$_REQUEST['type_of_cover']);	
		    $k_note = mysqli_escape_string($con,$_REQUEST['k_note']);		
		    $t_of_p = mysqli_escape_string($con,$_REQUEST['t_of_p']);	
		    $t_of_p_ed = mysqli_escape_string($con,$_REQUEST['t_of_p_ed']);	
		    $t_of_v = mysqli_escape_string($con,$_REQUEST['t_of_v']);	
		    $t_of_v_ed = mysqli_escape_string($con,$_REQUEST['t_of_v_ed']);		
		    $sub_total = mysqli_escape_string($con,$_REQUEST['sub_total']);	
		    $tax = mysqli_escape_string($con,$_REQUEST['tax']);	
		    $tax_amount = mysqli_escape_string($con,$_REQUEST['tax_amount']);
		    $total = mysqli_escape_string($con,$_REQUEST['total']);		
		    $amount_paid = mysqli_escape_string($con,$_REQUEST['amount_paid']);	
		    $amonunt_due = mysqli_escape_string($con,$_REQUEST['amonunt_due']);	
		    
		    mysqli_query($con,"insert into `order`(o_date,cust_id,dofp,iafpv,video_charge,	casate_nung,mixing_charge,dvd,l_shoot_c,vs_note,photographer,p_size,p_size_rate,p_digital,p_digital_rate,k_size,k_size_rate,type_of_cover,k_note,t_of_p,t_of_p_ed,t_of_v,t_of_v_ed,sub_total,tax,tax_amount,total,amount_paid,amount_due) values('".$o_date."','".$cust_id."','".$dofp."','".$iafpv."','".$video_charge."','".$casate_nang."','".$mixing_charge."','".$dvd."','".$l_shoot_c."','".$vs_note."','".$photographer."','".$p_size."','".$p_size_rate."','".$p_digital."','".$p_digital_rate."','".$k_size."','".$k_size_rate."','".$type_of_cover."','".$k_note."','".$t_of_p."','".$t_of_p_ed."','".$t_of_v."','".$t_of_v_ed."','".$sub_total."','".$tax."','".$tax_amount."','".$total."','".$amount_paid."','".$amonunt_due."')");
		    $last_id = mysqli_insert_id($con);	
		    foreach($_REQUEST['pv_title'] as $key=>$value){	
		        mysqli_query($con,"insert into order_details(pv_title,pv_date,start_time,end_time,pv_note,o_id) values('".$value."','".$_REQUEST['pv_date'][$key]."','".$_REQUEST['start_time'][$key]."','".$_REQUEST['end_time'][$key]."','".$_REQUEST['pv_note'][$key]."','".$last_id."')");	
		    }
		    
		    header("Location:view-order-book.php");		
		    
		    break;
}

?>