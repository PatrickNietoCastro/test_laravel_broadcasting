require('dotenv').config();

const env = process.env;

require('laravel-echo-server').run({
    authHost: env.APP_ENV === 'local' ? 'http://plasma_focus_web' : env.APP_URL,
    // authHost: "localhost",
    authEndpoint: "/broadcasting/auth",
    devMode: env.APP_DEBUG,
    database: 'redis',
    databaseConfig: {
        redis: {
            host: env.REDIS_HOST,
            // host: "localhost",
            port: env.REDIS_PORT,
            keyPrefix: ''
        }
    },
    apiOriginAllow: {
        allowCors: true,
        allowOrigin: '*',
        allowMethods: 'GET, POST',
        allowHeaders: 'Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id'
    }
});
//
// var app = require('express')();
// var server = require('http').Server(app);
// var io = require('socket.io')(server);
// require('dotenv').config();
//
// var redisPort = process.env.REDIS_PORT;
// var redisHost = process.env.REDIS_HOST;
// var ioRedis = require('ioredis');
// var redis = new ioRedis(redisPort, redisHost);
// redis.subscribe('action-channel-one');
// redis.on('message', function (channel, message) {
//     message  = JSON.parse(message);
//     io.emit(channel + ':' + message.event, message.data);
// });
//
// var broadcastPort = process.env.BROADCAST_PORT;
// server.listen(broadcastPort, function () {
//     console.log('Socket server is running.');
// });

