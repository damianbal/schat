<template>
    <div></div>
</template>

<script>
    export default {
        mounted() {
            var self = this;
            setInterval(function() {
                self.updateActivity();
            },15000);
        },
        methods: {
            updateActivity() {
                axios.get('/user/update_activity').then(function(response) {

                }).catch(function(error) {
                    alert('Could not update activty time!');
                });
            }
        }
    }
</script>
