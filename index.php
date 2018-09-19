<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Swoole web chat</title>
        <!-- bootstrap -->

        <!-- bootstrap -->
        <link rel="stylesheet" href="css/styles.css">
    </head>
        <body>
            <div class="chat_window">
              <div class="top_menu">
                <div class="buttons">
                  <div class="button close">
                  </div><div class="button minimize">
                  </div><div class="button maximize">
                  </div>
                </div>
                <div class="title">Chat</div>
              </div>
              <ul class="messages" id="messagesBox"></ul>
              <div class="bottom_wrapper clearfix">
              <div class="message_input_wrapper">
              <input class="message_input" id="message" placeholder="Type your message here..." />
            </div>
            <div onclick="sendMessage();return false;" class="send_message">
            <div class="icon"></div>
            <div  class="text">Send</div>
           </div>
         </div>
       </div>
    <script src="js/main.js"></script>

        </body>
</html>
