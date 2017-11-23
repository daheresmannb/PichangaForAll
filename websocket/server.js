var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var redis = require('redis');
var r = redis.createClient();
//suscripción a canal de redis
r.subscribe('message');
//evento de conección de cliente de sockets
io.on(
	'connection', 
	function(socket) {
  		//console.log('usuario conectado');
	}
);
//cuando llegue un mensaje a redis 
r.on(
	'message', 
	function(channel, messageStr) {
		console.log("canal: " + channel);
    	var message = JSON.parse(messageStr);
    	console.log(message);
    	io.emit('message', message);    
	}
);

http.listen(
	3200, 
	function() {
  		console.log('listening on *:3200');
	}
);





















/*

// sending to sender-client only
socket.emit('message', "this is a test");

// sending to all clients, include sender
io.emit('message', "this is a test");

// sending to all clients except sender
socket.broadcast.emit('message', "this is a test");

// sending to all clients in 'game' room(channel) except sender
socket.broadcast.to('game').emit(
	'message', 'nice game'
);

// sending to all clients in 'game' room(channel), include sender
io.in('game').emit('message', 'cool game');

// sending to sender client, only if they are in 'game' room(channel)
socket.to('game').emit(
	'message', 'enjoy the game');

// sending to all clients in namespace 'myNamespace', include sender
io.of('myNamespace').emit('message', 'gg');

// sending to individual socketid
socket.broadcast.to(socketid).emit(
	'message', 
	'for your eyes only'
);

*/