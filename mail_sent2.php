<?php $tmpName = "bill/pdf/Harsh-".$_POST['id'].".pdf";
					   $email = $_POST['email'];
                        $fileName = "Harsh-".$_POST['id'].".pdf";
						
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
						echo "Mail Sent";
						header("Location:bill/direct-invoice.php?upid=".$_POST['id']);
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bill/direct-invoice.php?upid='.$_POST['id'].'">';
						
						?>
		