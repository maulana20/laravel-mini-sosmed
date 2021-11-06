<template>
    <span>
        <span class="badge badge-secondary">{{ post.likers_count }}</span>
        <button class="btn btn-sm btn-danger btn-xs" v-if="post.has_like" @click="sendLike(post)">Unlike</button>
        <button class="btn btn-sm btn-success btn-xs" v-else @click="sendLike(post)">Like</button>
    </span>
</template>

<script>
    let baseURL = document.head.querySelector('meta[name="base-url"]').content;
    
    export default {
        data() {
            return {
            }
        },
        props: [
            'post'
        ],
        methods: {
            sendLike: function(post) {
                axios.post(baseURL + '/api/like/send/' + post.id).then((res) => {
                    this.$store.commit('updatePost', {
                        id: post.id,
                        data: res.data
                    });
                })
            }
        }
    }
</script>
