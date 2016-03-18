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
        },
          function loadLog(){
              var oldScrollHeight = $("#chatbox").attr("scrollHeight") - 20;
              $.ajax({
                 url: "log.html",
                 cache: false,
                 success: function(html){
                     $('#chatbox').html(html);
                     
              var newScrollHEight =  $('#chatbox').attr("scrollHeight") - 20;
              console.log(newScrollHEight);
           if (newScrollHEight > oldscrollHeight) {
               $('#chatbox').animate({
                   scrollTop: newScrollHEight
                   }, 'normal');
           }
              },
          });
          }
       
    );
      setInterval(loadLog,2500);