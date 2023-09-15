<?php 
include ("include/makeSession.php"); 
include("include/header.php"); 
include("include/sidebar.php"); ?>          
 <?php
   
	  if(isset($_REQUEST['submit']) && $_REQUEST['submit']!=''){
	 		 $tmpName = "pdf/mpdf.pdf";
                        
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
						
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=mail.php">';
	  }
?>     
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Compose mail</h1>
                    <ol class="breadcrumb">
                       
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Compose mail</li>
                    </ol>
              </section>

                <!-- Main content -->
                <section class="content">
					<div class='row'>
                        <div class='col-md-8'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    <h3 class='box-title'></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                               	
                                <div class="box-body pad">
                                     
                                    <form method="post"  enctype="multipart/form-data" role="form">
                                     
                                       <div class="box-footer">
                                          <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                                        </div>
                                       
                                      </form>
                                      
                                      
                                </div>
                             
                            </div><!-- /.box -->

                            
                        </div><!-- /.col-->
                    </div><!-- ./row -->
				</section><!-- /.content -->
            </aside><!-- /.right-side -->
             <!-- DATA TABES SCRIPT -->

 <?php include('include/footer.php');?> 
