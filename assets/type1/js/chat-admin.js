
        /* 
Created by: Kenrick Beckett

Name: Chat Engine
*/

var instanse = false;
var state;
var mes;
var file;

function Chat () {
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
}

//gets the state of the chat
function getStateOfChat(url, receiver){
	if(!instanse){
		 instanse = true;
		 $.ajax({
			   type: "POST",
			   url: url,
			   data: {  
			   			'function': 'getState',
						'file': file,
						'receiver' : receiver,
						},
			   dataType: "json",
			
			   success: function(data){
				   state = data.state;
				   instanse = false;
				   console.log("berhasil getstate");
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
				  },
			});
			
	}else{
		console.log("gagal getstate");
	}	 
}

//Updates the chat
function updateChat(url, receiver){
	
	     $.ajax({
			   type: "POST",
			   url: url,
			   data: {  
			   			'function': 'update',
						'state': state,
						'file': file,
						'receiver' : receiver,
						},
			   dataType: "json",
			   success: function(data){
				   if(data.text){
					   $('#chat-area').empty();
						for (var i = 0; i < data.text.length; i++) {
							$id = data.text[i].id_pengirim;
							if($id.substring(0,3) == "BID"){
								$nama = data.text[i].nama_pengirim_bengkel;
							}else if($id.substring(0,4) == "USER"){
							   	$nama = data.text[i].nama_pengirim_pengguna;
							}
							else{
								$nama = "Admin";
							   }
                            $('#chat-area').append($("<p><span>"+$nama+"</span>"+ data.text[i].pesan +"</p>"));
                        }								  
				   }
				   document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
				   //instanse = false;
				   state = data.state;
				   //console.log("berhasil");
			   },
			   error: function(xhr, status, error) {
				//console.log(xhr.responseText);
			  },
			});
			
}

//send the message
function sendChat(message, url, receiver)
{       
    //updateChat(url, receiver);
     $.ajax({
		   type: "POST",
		   url: url,
		   data: {  
		   			'function': 'send',
					'message': message,
					'file': file,
					'receiver': receiver
				 },
		   dataType: "json",
		   success: function(data){
			   updateChat(url, receiver);
		   },
		   error: function(xhr, status, error) {
			//console.log(xhr.responseText);
		  },
		});
}

    