<?php
$server = new swoole_websocket_server("localhost", 8080);

// events
  // open
$server->on("open",function (swoole_websocket_server $server,$request ){
echo "User ".$request->fd." connect\n";
});

  // message

  $server->on("message",function (swoole_websocket_server $server,$frame ){
  echo "User ".$frame->fd." send message ".$frame->data ." \n";
      foreach ($server->connections as $fd) {
      if ($frame->fd != $fd) {
          $server->push($fd,$frame->data);
      }
      }
  });

  // close
  $server->on("close",function($server,$fd ){
  echo "User ".$fd." disconnet\n";
  });
  // start

  $server->start();
?>
