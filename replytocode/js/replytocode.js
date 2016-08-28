$("#btnsend").click(function(){
	var msg = $("#txtmessage").val();
	var sender = $("#txtsender").val();
	$.ajax({
		url: "function.php",
		method: "POST",
		data:{txtsender:sender,txtmessage:msg},
		success:function(data){
			$("#result").text(data);
			
		}
	});
});