// const https = require('https')
// const options = {
//   hostname: 'videochat-app.younggeeks.net',
//   port: 443,
//   path: '/video-chat/dash/twillo/twilio-call.php',
//   method: 'GET'
// }

// const req = https.request(options, res => {
//   console.log(`statusCode: ${res.statusCode}`)

//   res.on('data', d => {
//     process.stdout.write(d)
//   })
// })

// req.on('error', error => {
//   console.error(error)
// })

// req.end()


// var express = require("express");
// var app = express();
// var http = require("http").createServer(app);
// var io = require("socket.io")(http);

// app.get('/', function(req, res){
//     res.sendFile('twilio-call.php')
// })

// http.listen(8080, function(){
//     console.log("successfully  Connected node server");

//     io.on("connection" , function(socket){
//         console.log("Auth value : "+ socket.id);

//         socket.on("sendNotification" , function(details){
//             socket.broadcast.emit("sendNotification",details);
//         });
//     });
// });


var path = require('path');
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
app.get('/', (req, res) => {
  console.error('express connection');
  res.sendFile(path.join(__dirname, 'twilio-call.php'));
});

app.get('/forced', (req, res) => {
    console.error('express connection');
    res.sendFile(path.join(__dirname, 'twilio-call-forced.php'));
});
// app.get('/', function(req, res) {
//     // req.sendFile('twilio-call.php');
//    res.sendFile('twilio-call.php');
// });

io.on('connection', function(socket) {
   console.log('A user connected');
   
   //Send a message after a machinecall page hit
   socket.on('machineclick' , function(data){
        if(data == 'machine is click'){
            console.log(data);
        socket.send('machine page Click');
        }
        
    });

    //Send a message after a twilio-call page hit
    socket.on('modalclick' , function(data){
        if(data == 'modal is click'){
            console.log(data);
        socket.send('modal Click on live server');
        }
        
    });


    //Send a message after a ajax hit
    socket.on('ajaxEvent' , function(data){
        if(data == 'ajax click'){
            console.log('ajax hit by me');
        socket.send('ajaxEvent');
        }
    });

   socket.on('disconnect', function () {
      console.log('A user disconnected');
   });

   

});

http.listen(8080, function() {
   console.log('listening on *:8080');
});
