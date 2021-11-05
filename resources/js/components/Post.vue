<template>
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <textarea rows="4" class="form-control" v-model="content"></textarea>
                    <br>
                    <button class="btn btn-success pull-right" :disabled="notWorking" @click="createPost">Create post</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    let baseURL = document.head.querySelector('meta[name="base-url"]').content;
    
    export default {
        mounted () {},
        data () {
            return {
                content: '',
                notWorking: true
            }
        },
        watch: {
            content() {
                this.notWorking = (this.content.length > 0) ? false : true
            }
        },
        methods: {
            createPost() {
                axios.post(baseURL + '/api/post', {  content: this.content }).then((res) => {
                    this.content = ''
                   
                    noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: 'Your post has been published.',
                        timeout: 3000
                    })
                    
                    this.$store.commit('addPost', res.data)
                })
            }
        }
    }
</script>
