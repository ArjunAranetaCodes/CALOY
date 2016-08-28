<?php
require 'lib/replytocodelib.php';
$replytocode = new replytocode();

$sender = $_POST['txtsender'];
$originalmsg = $_POST['txtmessage'];

$msg = explode(" ",$originalmsg);
$send_dt = date("Y-m-d h:i:sa",strtotime("today"));
$code = $replytocode->getcode($msg[0]);
$debitcard = $replytocode->getdebitcard($msg[1]);
$topupcard = $replytocode->gettopupcard($msg[1]);
$debitcardkeyword = $code. ' '.$debitcard;
$topupkeyword = $code.' '.$topupcard;

if($code == "WRONG KEYWORD"){
	echo $code;	
}else{
	if($code == 'ACTIVATE'){
		if($debitcard == "NOT EXISTING"){
			echo $debitcard;
		}else{
			if($originalmsg == $debitcardkeyword){
				$activate = $replytocode->activation($sender,$debitcard);
			if($activate == "DEBIT CARD ACTIVATED"){
				
				echo $activate;
			}elseif($activate == "DEBIT CARD ALREADY ACTIVATED"){
				
				echo $activate;
			}elseif($activate =="NUMBER ALREADY IN USE"){
				
				echo $activate;
			}
		}
	}
	}elseif($code == 'LOAD'){
		if($topupcard == "TOP UP CARD NOT EXISTING"){
			
			echo $topupcard;
		}else{
			if($originalmsg == $topupkeyword){
				$topupactivate = $replytocode->tuactivation($sender,$topupcard);
				if($topupactivate == "TOP UP CARD ACTIVATED"){
					
					echo $topupactivate;
				}elseif($topupactivate == "TOP UP CARD ALREADY ACTIVATED"){
				
					echo $topupactivate;
				}elseif($topupactivate == "ACCOUNT NOT FOUND"){
					
					echo $topupactivate;
				}
			}
		}
	}
	
}


?>