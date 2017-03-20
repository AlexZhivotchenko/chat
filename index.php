<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/chat.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    

        var name = prompt("Enter your chat name:", "Alex");

    	if (!name || name === ' ') {
    	   name = "Alex";
    	}

    	name = name.replace(/(<([^>]+)>)/ig,"");
    	$("#name-area").html("You are: <span>" + name + "</span>");

        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState();

             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  

                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;

                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 

                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 1000)">

        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h2>Alex Chat</h2>
        
                    <p id="name-area"></p>
        
                    <div id="chat-wrap"><div id="chat-area"></div></div>

                    <form id="send-message-area">
                        <p>Your message: </p>
                        <textarea id="sendie" maxlength = '100' ></textarea>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

</body>

</html>