<template>
    <li>
        <a id="unread-notif-link" href="#">
            Unread <span class="badge">{{ allNotificationCount }}</span>
        </a>
    </li>
</template>

<script>
    let baseURL = document.head.querySelector('meta[name="base-url"]').content;
    
    export default {
        mounted () {
            $('#unread-notif-link').attr('href', baseURL + '/notification');
            this.getUnreadNotifications()
        },
        methods: {
            getUnreadNotifications: function() {
                axios.get(baseURL + '/notification/unread').then((res) => {
                    res.data.forEach( (notif) => {
                        this.$store.commit('addNotification', notif)
                    })
                })
            }
        },
        computed: {
            allNotificationCount: function() {
                return this.$store.getters.allNotificationCount
            }
        }
    }
</script>
