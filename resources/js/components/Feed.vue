<template>
    <div class="row">
        <div class="col-lg-12 col-lg-offset-2">
            <div class="card" v-for="post in posts">
                <h3 class="card-header">
                    {{ post.user.name }}
                    <small class="float-right h6" style="margin-top: 5px;">{{ post.published }}</small>
                </h3>
                <div class="card-body">
                    {{ post.content }}
                </div>
                <div class="card-footer">
                    <like :post="post"></like>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let baseURL = document.head.querySelector('meta[name="base-url"]').content;
    
    export default {
        mounted() {
            this.getFeed()
        },
        methods: {
            getFeed: function() {
                axios.get(baseURL + '/api/post').then((res) => {
                    this.$store.commit('pushPost', res.data)
                })
            }
        },
        computed: {
            posts: function() {
                return this.$store.getters.allPost
            }
        }
    }
</script>
