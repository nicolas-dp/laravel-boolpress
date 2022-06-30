<template>
    <h1>HomePage</h1>
</template>

<script>
import Axios from 'axios'
export default {
    name: 'Home',
    data(){
        return{
            posts: ''
        }
    },
    methods: {

    },
    mouted(){
        Axios.get('/api/posts')
        .then(response => {
            console.log(response.data);
            const posts = response.data.data
            this.posts = posts.slice(0, 4)
        })
        .catch(e => {
            console.error(e);
        })
    }
}
</script>

<style>

</style>