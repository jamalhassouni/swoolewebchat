<?php
$server = new swoole_websocket_server("127.0.0.1,9080");

// events
  // open
$server->on("open",function(swoole_websocket_server $server,$request ){
echo "User ".$request->fd." connect\n";
});

  // message

  $server->on("message",function(swoole_websocket_server $server,$frame ){
  echo "User ".$frame->fd." send message ".$frame->data ." \n";
  });

  // close
  $server->on("close",function($server,$fd ){
  echo "User ".$fd." disconnet\n";
  });
  // start

  $server->start();
