$(document).ready(function() {
         
           $.material.init();
           
           $('#exit').click(function(){
            var exit = confirm("Esta usted seguro de querer salir?");
            if (exit === true) {
               window.location = 'index.php?logout=true';
               
            }
           });
           
          $('#submitmsg').click(function(){
              var clientMsg = $('#focusedInput1').val();
              
              $.post("post.php", {
                  text: clientMsg
              });
              $('#focusedInput1').attr('value',"");
               
              return false;
              
          });
});
    function loadLog(){		
        
		var oldscrollHeight = $('.chatbox').attr("scrollHeight") - 20;

        $.ajax({
			url: "log.html",
			cache: false,
			success: function(html){		
				$('.chatbox').html(html);				
				var newscrollHeight = $('.chatbox').attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$('.chatbox').animate({ scrollTop: newscrollHeight }, 'normal'); 
				}				
		  	},
		});
	}
      setInterval('loadLog()',1500);