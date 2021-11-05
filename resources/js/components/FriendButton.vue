<template>
    <div>
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <button class="btn btn-success" v-if="status == 'none'" @click="addFriend">Add Friend</button>
            <button class="btn btn-success" v-if="status == 'pending'" @click="acceptFriend">Accept Friend</button>
            <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
            <button class="btn btn-success" v-if="status == 'friend'" @click="removeFriend">Remove Friend</button>
        </p>
    </div>
</template>

<script>
    
    let baseURL = document.head.querySelector('meta[name="base-url"]').content;
    
    export default {
        props: [
            'user_id'
        ],
        mounted() {
            this.checkFriend()
        },
        data: function() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {
            checkFriend: function() {
                 axios.get(baseURL + '/api/friendship/check/' + this.user_id ).then((res) => {
                    this.status = res.data.status
                    this.loading = false
                })
            },
            addFriend: function() {
                
                this.loading = true
                
                axios.post(baseURL + '/api/friendship/request/' + this.user_id ).then((res) => {
                    
                    if (res.data.status == 'waiting') this.status = res.data.status
                    
                    noty({
                        type: 'information',
                        layout: 'bottomLeft',
                        text: 'Friend request sent.',
                        timeout: 3000
                    })
                    
                    this.loading = false
                })
                
                this.loading = false
            },
            acceptFriend: function() {
                
                this.loading = true
                
                axios.post(baseURL + '/api/friendship/accept/' + this.user_id ).then((res) => {
                    
                    if (res.data.status == 'friend') this.status = 'friend'
                    
                    noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: 'You are now friend.',
                        timeout: 3000
                    })
                    
                    this.loading = false
                })
                
                this.loading = false
            },
            removeFriend: function() {
                
                this.loading = true
                
                axios.post(baseURL + '/api/friendship/remove/' + this.user_id ).then((res) => {
                    
                    if (res.data.status == 'none') this.status = 'none'
                    
                    noty({
                        type: 'warning',
                        layout: 'bottomLeft',
                        text: 'Friend has removed.',
                        timeout: 3000
                    })
                    this.loading = false
                })
                
                this.loading = false
            }
        }
    }
</script>
