<?php
class replytocode{
	//methods
		//connect() returns connection string or error 
		//getcode(CODEKEYWORD) find and returns keyword
		//getdebitcard(DEBITDIGITS) find and returns DEBITDIGITS
		//gettopupcard(TOPUPCODE) find and return TOPUPCARDCODE
		//activatetopupcard(TOPUPCODE) find and updates TOPUPCODE status to sold
		//checktopupcard(TOPUPCODE) find and check if top up card is sold or available
		//tuactivation(ACCOUNTID,TOPUPCODE) call the function activatetopupcard and addbalance
		//activation(ACCOUNTID,DEBITDIGITS) creates account and call function activatedebitcard and getdebitcardvalue 
		//activatedebitcard(DEBITDIGITS) find and update status of debitcard to sold
		//addbalance() find account and add balance to the account
		//getbalance() finds account and get the balance of the account
		//checkifsold(DEBITDIGITS) find debitcard and check if status is sold
		//getdebitcardvalue(DEBITDIGITS) find debitcard and return the value
		//gettopupcardvalue(TOPUPCODE) find topupcard and return the value 
		//checkifexisting(ACCOUNTID) check if account with ACCOUNTID is already existing
		//createaccount(ACCOUNTID,DEBITDIGITS,VALUE) create an account using the designated parameters
		
		
	function connect(){
		$connection = new mysqli('localhost','root','password','dbbankifation');
		if($connection->connect_error){
			return die("CONNECTION FAILED: " .$connection->connect_error);
		}else{
			return $connection;
		}
	}
	function getcode($msg){
		$getkeyword = "Select * from `tblshortcode` Where `CODEKEYWORD` = '".$msg."'";
		$result = $this->connect()->query($getkeyword);
		if($result->num_rows==1){
			while($row = $result->fetch_assoc()){
				$codekeyword = $row['CODEKEYWORD']; 
			}
			$result->free();
			return $codekeyword;
		}else{
			return "WRONG KEYWORD";
		}
		
	}
	function getdebitcard($carddigit){
		$getdebitcard = "Select * from `tbldebitcards` WHERE `DEBITDIGITS` = '".$carddigit."'";
		$result = $this->connect()->query($getdebitcard);
		if($result->num_rows==1){
			while ($row = $result->fetch_assoc()){
				$debitcard = $row['DEBITDIGITS'];
			}
			$result->free();
			return $debitcard;
		}else{
			return "NOT EXISTING";
		}
	}
	
	function gettopupcard($carddigit){
		$gettopup = "Select * from `tbltopupcard` WHERE `CODE` = '".$carddigit."'";
		$result = $this->connect()->query($gettopup);
		if($result->num_rows==1){
			while($row = $result->fetch_assoc()){
				$topupcode = $row['CODE'];
			}
			$result->free();
			return $topupcode;
		}else{
			return "TOP UP CARD NOT EXISTING";
		}
	}
	
	function activatetopupcard($carddigit){
		$activate = "UPDATE `tbltopupcard` SET `STATUS` = 'SOLD' WHERE `CODE` = '".$carddigit."'";
		$result = $this->connect()->query($activate);
		if($result==1){
			return "ACTIVATED";
		}else{
			return "FAILED";
		}
	}
	
	function checktopupcard($carddigit){
		$check = "SELECT * from `tbltopupcard` Where `CODE` = '".$carddigit."'";
		$result = $this->connect()->query($check);
		if($result->num_rows==1){
			while($row = $result->fetch_assoc()){
				$status = $row['STATUS'];
			}
			if($status == 'SOLD'){
				return 'SOLD';
			}else{
				return 'AVAILABLE';
			}
		}else{
			return 'FAILED';
		}
	}
	function pointsaddition($sender){
		$checkaccount = $this->checkifexisting($sender);
		$point = 1;
		if($checkaccount=="NOTFOUND"){
			
		}elseif($checkaccount=="EXISTING"){
			$addpoint = "update `tblaccount` set `POINTS` = ".$point." WHERE `ACCOUNTID` = '".$sender."'";
			$result = $this->connect()->query($addpoint);
			if($result==1){
				return "ADDPOINTSUCCESS";
			}else{
				return "FAILED";
			}
		}
	}
	function tuactivation($sender,$topupcard){
		$checkaccount = $this->checkifexisting($sender);
		if($checkaccount=="NOTFOUND"){
			return "ACCOUNT NOT FOUND";
		}elseif($checkaccount == "EXISTING"){
			$checktopup = $this->checktopupcard($topupcard);
			if($checktopup == "AVAILABLE"){
				$this->activatetopupcard($topupcard);
				$this->addbalance($sender,$this->gettopupcardvalue($topupcard)+$this->getbalance($sender));
				$this->pointsaddition($sender);
				return "TOP UP CARD ACTIVATED";
			}elseif($checktopup == "SOLD"){
				return "TOP UP CARD ALREADY ACTIVATED";
			}
		}
	}
	
	function activation($sender,$debitcard){
		$checkaccount = $this->checkifexisting($sender);
		if($checkaccount=="NOTFOUND"){
			$checkdebitcard = $this->checkifsold($debitcard);
			if($checkdebitcard == "AVAILABLE"){
				$this->createaccount($sender,$debitcard,$this->getdebitcardvalue($debitcard));
				$this->activatedebitcard($debitcard);
				return "DEBIT CARD ACTIVATED";
			}elseif($checkdebitcard == "SOLD"){
				return "DEBIT CARD ALREADY ACTIVATED";
			}
		}elseif($checkaccount=="EXISTING"){
			return "NUMBER ALREADY IN USE";
		}
	}
	
	function activatedebitcard($carddigit){
		$check = $this->checkifsold($carddigit);
		if($check== "AVAILABLE"){
			$activate = "UPDATE `tbldebitcards` SET `STATUS` = 'SOLD' WHERE `DEBITDIGITS` = '".$carddigit."'";
			$result = $this->connect()->query($activate);
			if($result==1){
				return "ACTIVATED";
			}else{
				return "FAILED";
			}
		}elseif($check=="SOLD"){
			return "DEBITCARDSOLD";
		}
		
	}
	
	function addbalance($sender,$value){
			
			$add = "UPDATE `tblaccount` SET `BALANCE` = ".$value." WHERE `ACCOUNTID` = '".$sender."'";
			$result = $this->connect()->query($add);
			if($result==1){
				return "SUCCESS";
			}else{
				return "FAILED";
			}
	}
	
	function getbalance($sender){
		$getbal = "SELECT `BALANCE` from `tblaccount` WHERE `ACCOUNTID` = '".$sender."'";
		$result = $this->connect()->query($getbal);
		if($result->num_rows==1){
			while($row = $result->fetch_assoc()){
				$balance = $row['BALANCE'];
			}
			return $balance;
		}else{
			return "FAILED";
		}
	}
	
	function checkifsold($carddigit){
		$check = "SELECT * from `tbldebitcards` WHERE `DEBITDIGITS` = '".$carddigit."'";
		$result = $this->connect()->query($check);
		if($result->num_rows==1){
			while($row = $result->fetch_assoc()){
				$status = $row['STATUS'];
			}
			if($status == "SOLD"){
				return "SOLD";
			}else{
				return "AVAILABLE";
			}
		}else{
			return "FAILED";
		}
	}
	function getdebitcardvalue($msg){
		$getvalue = "SELECT VALUE from `tbldebitcards` WHERE `DEBITDIGITS` = '".$msg."'";
		$result = $this->connect()->query($getvalue);
		if($result->num_rows==1){
			while($row = $result->fetch_assoc()){
				$debitcardvalue = $row['VALUE'];
			}
			return $debitcardvalue;
		}else{
			return "FAILED";
		}
	}
	
	function gettopupcardvalue($topupcard){
		$getvalue = "SELECT VALUE from `tbltopupcard` WHERE `CODE` = '".$topupcard."'";
		$result = $this->connect()->query($getvalue);
		if($result->num_rows==1){
			while($row = $result->fetch_assoc()){
				$topupcarvalue = $row['VALUE'];
			}
			return $topupcarvalue;
		}else{
			return "FAILED";
		}
	}
	function checkifexisting($accountid){
		$check = "SELECT * from `tblaccount` WHERE `ACCOUNTID` = '".$accountid."'";
		$result = $this->connect()->query($check);
		if($result->num_rows==1){
			return "EXISTING";
		}else{
			return "NOTFOUND";
		}
	}
	function createaccount($accid,$accpass,$value){
		$check = $this->checkifexisting($accid);
		if($check == "NOTFOUND"){
			$create = "INSERT INTO `tblaccount`(`ACCOUNTID`,`ACCOUNTPASSWORD`,`BALANCE`,`POINTS`) VALUES('".$accid."','".$accpass."','".$value."',0)";
			$result = $this->connect()->query($create);
			if($result==1){
				return "SUCCESS";
			}else{
				return "FAILED";
			}
		}elseif($check == "EXISTING"){
			return "ACCOUNTEXISTING";
		}
		
	}
	

	
}

?>