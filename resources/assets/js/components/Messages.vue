<template>
    <div class="container mb-3 mt-3" style="overflow-y: scroll; height:400px;" id="chat">
        <div class="row message-row mb-2 p-1" v-for="message in messages">
            <div class="col-12">
                <span :style="{ color: message.user_color }" style="font-weight:bold;">{{ message.user }}</span>
            </div>
            <div class="col-12">
                {{ message.message }}
            </div>
            <div class="col-12 text-right">
                <small class="muted">{{ message.ago }}</small>
            </div>
            <div class="col-12 text-right p-2" v-if="user.can_moderate">
                <button type="button" v-on:click="removeMessage(message)" class="btn btn-outline-danger btn-sm">Remove</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Messages mounted.')

            let self = this;
            self.fetchMessages();

            setInterval(function() {
                self.fetchMessages();
            }, 3000);

             self.fetchUser();

        //    $('#chat').hide();
        },
        data() {
            return {
                messages: [],
                user: {}
            }
        },
        props:["isadmin"],
        methods: {
            removeMessage(message) {
                //alert('removing ' + message.id);

                axios.get('/message/remove/' + message.id).then(function(response) {
                //    toastr.info('Message (#' + message.id + ') created by ' + message.user + ' has been removed!');
            //    toastr.info('hej');
                }).catch(function(error) {
                    alert('Could not remove message!');
                });

            },

            fetchUser() {
                let self = this;
                axios.get('/user').then(function(response) {
                    self.user.name = response.data.name;
                    self.user.can_moderate = response.data.can_moderate;

                    //$('#chat').slideDown();

                }).catch(function(error) {
                    //

                    alert('Error loading user info!');
                });
            },

            fetchMessages() {
                let self = this;
                axios.get('/api/fetch/messages').then(function(response) {

                    let msgs = response.data;
                    self.messages = msgs;

                }).catch(function(error) {
                    //
                });
            }
        }
    }
</script>
