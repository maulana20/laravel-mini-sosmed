<template>
    <div></div>
</template>

<script>
    export default {
        mounted() {
            this.listen();
        },
        props: [
            'id'
        ],
        methods: {
            listen() {
                Echo.private('App.Models.User.' + this.id).notification((res) => {
                    noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: res.message,
                        timeout: 3000
                    })
                    
                    this.$store.commit('addNotification', res)
                })
            }
        }
    }
</script>
