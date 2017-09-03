<template>
    <div class="container content-container user-profile-bar">
        <div class="row">
            <div class="col-6">
                You are chatting as <b>{{ user.name }}</b>
            </div>
            <div class="col-6 text-right">
                <div v-if="user.can_moderate">
                    <i style="color:yellow;" class="fa fa-star" aria-hidden="true"></i> <span style='color:red;'>Admin</span>
                </div>
                <div v-else-if>
                    User
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchUser();
        },
        data() {
            return {
                user: { name:'Loading...', can_moderate: false }
            }
        },
        methods: {
            fetchUser() {
                let self = this;
                axios.get('/user').then(function(response) {
                    self.user.name = response.data.name;
                    self.user.can_moderate = response.data.can_moderate;
                }).catch(function(error) {
                    alert('Error loading user info!');
                });
            }
        }
    }
</script>
