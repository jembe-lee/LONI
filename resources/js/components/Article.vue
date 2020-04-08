<template>
<div>
    <h3>Welcome you have logged </h3>

    <button @click="getArticles">Get Articles</button>
    <li v-for="article in articles" :key="article.id">
        {{ article.title}}
    </li>
</div>
</template>

<script>
import Navbar from './Navbar'
export default {
    data() {
        return {
            articles: [],
        }
    },
    methods: {
        getArticles: function () {
            axios({url: 'api/articles/', method: 'GET'})
                .then(response => {
                    this.articles = response.data.articles;
                    console.log(response.data)
                }).catch(err => {
                console.log(err)
            });
        }
    },
    created() {


    }
}
</script>

<style scoped>

</style>
