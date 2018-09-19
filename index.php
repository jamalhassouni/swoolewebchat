<html>
    <head>
        <title>Swoole web chat</title>
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- bootstrap -->
    </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <div class="well" id="messagebox" style="min-height: 200px;overflow: scroll"></div>
                        <br>
                        <textarea name="" id="message" cols="30" rows="3" class="form-control"></textarea>
                        <br>
                         <div class="form-group">
                            <input type="submit" onclick="sendMessage();return false;" name="submit" value="Submit" class="btn btn-default col-lg-12" />
                         </div>
                    </div>
                </div>
            </div>

            <!--jquery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

            <script>
                var exampleSocket = new WebSocket("ws://localhost:8080");

                exampleSocket.onopen = function(event){
                    console.log("user connected");
                };

                function sendMessage() {

                    var textMessage = $("#message").val();

                    var msg = {
                        type: "message",
                        text : textMessage,
                        date : Date.now()
                    };

                    exampleSocket.send(JSON.stringify(msg));

                    $("#message").val('');

                    messageParse(textMessage);

                }

                exampleSocket.onmessage = function (event) {
                    messageParse(JSON.parse(event.data).text)
                }

                function messageParse(text) {
                    $('#messagebox').append('<p>'+text+'</p>');
                }


            </script>
          
        </body>
</html>
