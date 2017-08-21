
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Libs
 */

import Vue from 'vue'

// scroll auto scrool to button
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

// for notifications
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/Message.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	message: '',
    	chat: {
    		messages: [],
			users: [],
            colors: [],
            times: []
    	},
        typing: '',
        users: 0
    },
    watch: {
        message() {
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                });
        }
    },
    methods: {
    	send() {
    		if (this.message.length != 0) {

    			axios.post('/send', {
    			    message: this.message
			    })
                .then(response => {
                    this.chat.messages.push(this.message);
                    this.chat.users.push('You');
                    this.chat.colors.push('success');
                    this.chat.times.push(this.getTime());

                    this.message = '';
                })
                .catch(error => {
				    console.log(error);
				});
    		}
    	},
        getTime() {
    	    let time = new Date();

    	    return time.getHours() + ':' + time.getMinutes();
        }
    },
	mounted() {
    	Echo.private('chat')
			.listen('ChatEvent', (e) => {
                this.chat.messages.push(e.message);
                this.chat.users.push(e.user);
                this.chat.colors.push('warning');
                this.chat.times.push(this.getTime());
			})
            .listenForWhisper('typing', (e) => {

                if (e.name != '') {
                    this.typing = 'typing...';
                } else {
                    this.typing = '';
                }
            });

    	Echo.join('chat')
            .here((users) => {
    	        this.users = users.length;
            })
            .joining((user) => {
    	        this.users += 1;

    	        this.$toaster.success(user.name + ' is joined the chat room');
            })
            .leaving((user) => {
    	        this.users -= 1;

    	        this.$toaster.warning(user.name + ' is leaved the chat room');
            });
	}
});
