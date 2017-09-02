<template>
    <div class="container">
        <span style="font-size:12px;color:rgba(0,0,0,0.5);padding-right:6px;" v-for="user in active_users">
            <i style="color:#8BC34A;" class="fa fa-circle" aria-hidden="true"></i> {{ user.name }}
            <span v-if="user.can_moderate">(<i class="fa fa-star" aria-hidden="true"></i>)</span>
        </span>
        &nbsp;
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');

            //self.updateActiveUsers();
            //self.fetchActiveUsers();

            this.updateActiveUsers();
            this.fetchActiveUsers();

            var self = this;
            setInterval(function() {
                self.updateActiveUsers();
                self.fetchActiveUsers();
            }, 3000);

        },
        data() {
            return {
                active_users: []
            }
        },
        methods: {
            fetchActiveUsers() {
                let self = this;
                axios.get('/users/active').then(function(response) {

                    self.active_users = response.data;

                }).catch(function(error) {

                });
            },
            updateActiveUsers() {
                axios.get('/user/update_active_users').then(function(response) {
                    //alert('Updating actie users...');
                }).catch(function(error) {
                    alert('Could not update active users');
                });
            }
        }
    }
</script>
