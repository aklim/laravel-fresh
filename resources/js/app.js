/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    created() {
        this.listenForEvents();
    },
    methods: {
        listenForEvents() {

            Echo.channel('posts')
                .listen('PostUpdated', response => {
                    let post = response.post || {};

                    alert(post.title);


                    // if (! ('Notification' in window)) {
                    //     console.log('NO NOTIF');
                    //     alert('Web Notification is not supported');
                    // } else if (Notification.permission === "granted") {
                    //     console.log('GRANTED');
                    //     let notification = new Notification('New post alert!', {
                    //         body: post.title, // content for the alert
                    //         icon: "https://pusher.com/static_logos/320x320.png" // optional image url
                    //     });
                    //
                    //     // link to page on clicking the notification
                    //     notification.onclick = () => {
                    //         window.open(window.location.href);
                    //     };
                    // } else if (Notification.permission !== "denied") {
                    //     console.log('GRANTED');
                    //     Notification.requestPermission().then(function (permission) {
                    //         // If the user accepts, let's create a notification
                    //         if (permission === "granted") {
                    //             let notification = new Notification('New post alert!', {
                    //                 body: post.title, // content for the alert
                    //                 icon: "https://pusher.com/static_logos/320x320.png" // optional image url
                    //             });
                    //
                    //             // link to page on clicking the notification
                    //             notification.onclick = () => {
                    //                 window.open(window.location.href);
                    //             };
                    //         }
                    //     });
                    // }

                });

        }
    }
});
