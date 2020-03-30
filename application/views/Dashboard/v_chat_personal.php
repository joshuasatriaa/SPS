<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title>
    
    <!-- <link rel="stylesheet" href="<?php echo base_url().'assets/type1/css/style-chat-admin.css'?>" type="text/css" /> -->
    <?php include('style-chat-admin.php'); ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/type1/js/chat-admin.js'?>"></script>
    <script type="text/javascript">
    
        name = "<?php echo $this->session->userdata('nama');?>";        
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");

    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState("<?php echo base_url().'Dashboard/ChatUser/process'?>", "<?php echo $id_penerima; ?>"); 
             
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																								});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, "<?php echo base_url().'Dashboard/ChatUser/process'?>", "<?php echo $id_penerima;?>");	
                        $(this).val("");
                        console.log("pesan");
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
            window.addEventListener('load', 
                    function() { 
                        setInterval(chat.update, 1000, '<?php echo base_url('Dashboard/ChatUser/process');?>', '<?php echo $id_penerima; ?>');
                    }, false);
            });

        
    </script>

</head>

<body>

        <button class="button button-back"style="float:left;top:50px;left:50px;position:absolute;"><a href="<?php echo base_url().'Dashboard/ChatUser';?>">BACK</a></button>
    <div id="page-wrap">
        <h2>Chat Personal With User : <?php echo ($id[0]['id_pengguna'] == null) ? $id[0]['nama_bengkel'] : $id[0]['nama_pengguna']; ?></h2>
        
        <p id="name-area"></p>
        
        <div id="chat-wrap">
            <div id="chat-area">
            <?php
             foreach($chatAdmin as $a)
                {?>
                    <p><span><?php
                     if(substr($a->id_pengirim,0,4) == "BID"){
                         echo $a->nama_pengirim_bengkel;
                     }else if(substr($a->id_pengirim,0,4) == "USER"){
                        echo $a->nama_pengirim_pengguna;
                     }
                     else{
                         echo "Admin";
                        }
                    ?></span><?php echo $a->pesan; ?></p>
             <?php 
                }?>
            </div>
        </div>
        
        <form id="send-message-area">
            <p>Your message: </p>
            <textarea id="sendie" maxlength = '100' ></textarea>
        </form>
    
    </div>

    
</body>



</html>