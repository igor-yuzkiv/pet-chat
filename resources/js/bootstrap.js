import Echo from 'laravel-echo';
import PusherJS from 'pusher-js';

window.Pusher = PusherJS;

// let client = new PusherJS(import.meta.env.VITE_PUSHER_APP_KEY, {
//     wsHost           : import.meta.env.VITE_WS_HOST,
//     wsPort           : import.meta.env.VITE_WS_PORT,
//     wssPort          : import.meta.env.VITE_WSS_PORT,
//     forceTLS         : false,
//     encrypted        : true,
//     disableStats     : true,
//     enabledTransports: ['ws', 'wss'],
//     cluster          : import.meta.env.VITE_PUSHER_APP_CLUSTER,
// });
//
// client
//     .subscribe('channel-name')
//     .bind('event-name', (message) => {
//         console.log(message);
//     });

window.Echo = new Echo({
    broadcaster      : 'pusher',
    namespace        : '',
    key              : import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost           : import.meta.env.VITE_WS_HOST,
    wsPort           : import.meta.env.VITE_WS_PORT,
    wssPort          : import.meta.env.VITE_WSS_PORT,
    cluster          : import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS         : false,
    encrypted        : true,
    enableLogging    : true,
    disableStats     : true,
    enabledTransports: ['ws', 'wss'],
});
