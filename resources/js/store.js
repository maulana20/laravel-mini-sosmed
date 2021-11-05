import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        notifications: [],
        posts: []
    },
    getters: {
        allNotification(state) {
            return state.notifications
        },
        allNotificationCount(state) {
            return state.notifications.length
        },
        allPost(state) {
            return state.posts
        }
    },
    mutations: {
        addNotification(state, notif) {
            state.notifications.push(notif)
        },
        resetPost(state) {
            Object.assign(state, { posts: [] })
        },
        pushPost(state, posts) {
            state.posts = state.posts.concat(posts)
        },
        addPost(state, post) {
            state.posts.unshift(post)
        }
    }
})
