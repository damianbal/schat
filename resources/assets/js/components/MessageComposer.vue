<template>
    <div class="container">
        <div class="row p-2">
            <div class="col-sm-8">
                <input id="cmessage" v-on:keyup.enter="addMessage" v-model="msg" class="form-control dark-form-control" placeholder="Write your message..." type="text">
            </div>

            <div class="col-sm-4">
                <button v-on:click="addMessage" class="btn btn-primary" style="width:100%;"> <i class="fa fa-paper-plane fa-fw"></i> Send</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('MessageComposer mounted.');
        },
        data() {
            return { msg: "", user:"none" }
        },
        methods: {
            addMessage() {

                $(document).ready(function() {
                    $('#cmessage').val('');
                });

                let self = this;
                axios.post('/message/create', {
                    message: self.msg
                }).then(function(response) {


                }).catch(function(error) {
                    alert('Failed sending your message: ' + error);
                });
            }
        }
    }
</script>
