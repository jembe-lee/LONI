<template>
    <div>
        <br>
        <div class="container">
            <button class=" btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Article</button>
        </div>
        <table class="table">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">View Full</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(article, index) in articles" :key="article.id">
                <th scope="row">{{ index+ 1 }}</th>
                <td>{{ article.title}}</td>
                <td><a href="" data-toggle="modal" data-target="#exampleModal" @click="getArticle(article.id)">Read More</a></td>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#updateModal" @click="getArticle(article.id)">Edit</button></td>
                <td><button class="btn btn-danger" @click="deleteArticle(article.id)">Delete</button></td>
            </tr>

            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> {{ article.title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ article.body }}
                        <hr>
                        <p>This Article was written on - {{ article.created_at }}</p>
                    </div>

                </div>
            </div>
        </div>
<!--        Update Article-->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel"> Edit this Article </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <form method="put" action="" @submit.prevent="updateArticle(article.id)" >
                                <div class="form-group">
                                    <label for="article_title">Article Title</label>
                                    <input type="text" class="form-control" id="article_title" v-model="article.title">
                                </div>
                                <div class="form-group">
                                    <label for="body"> Article Body </label>
                                    <textarea name="" id="body" cols="30" rows="10" class="form-control" v-model="article.body"></textarea>
                                </div>


                                <button type="submit" class="btn btn-primary" >Save</button>
                            </form>

                    </div>

                </div>
            </div>
        </div>
        <!--        Add new Article-->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel"> Edit this Article </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="put" action="" @submit.prevent="addArticle" >
                            <div class="form-group">
                                <label for="article_title">Article Title</label>
                                <input type="text" class="form-control" id="article_title" v-model="newArticle.title">
                            </div>
                            <div class="form-group">
                                <label for="body"> Article Body </label>
                                <textarea name="" id="body" cols="30" rows="10" class="form-control" v-model="newArticle.body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"  >Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            articles: [],
            article: [],
            newArticle: {title: '', body: ''},
            token: localStorage.getItem('token'),
        }
    },
    methods: {
        getArticles: function () {
            this.$http({url: 'api/articles/', method: 'GET', headers: {'Authorization': 'Bearer ' + this.token},})
                .then(response => {
                    this.articles = response.data.articles;
                }).catch(err => {
                console.log(err)
            });
        },
        getArticle(id) {
            this.$http({url: 'api/articles/' + id, method: 'GET', headers: {'Authorization': 'Bearer ' + this.token},})
                .then(response => {
                    this.article = response.data.article;

                }).catch(err => {
                console.log(err)
            });
        },
        updateArticle (id) {
            this.$http({url: 'api/articles/' + id, method: 'PUT', data:this.article, headers: {'Authorization': 'Bearer ' + this.token},})
                .then(response => {
                    this.article = response.data.article;
                    this.getArticles();

                }).catch(err => {
                console.log(err)
            });
        },
        deleteArticle (id) {
            if (confirm("Are you sure you want to delete this article")) {
                this.$http({url: 'api/articles/' + id, method: 'DELETE', headers: {'Authorization': 'Bearer ' + this.token}})
                    .then(response => {
                        this.getArticles();
                    })
                .catch(err => {
                    console.log(err)
                });
            }
        },
        addArticle() {
            this.$http({url: 'api/articles', method: 'POST', data: this.newArticle, headers: {'Authorization': 'Bearer ' + this.token}})
            .then(response => {
                console.log(response.data);
                this.getArticles();
            })
            .catch(err => {
                console.log(err);

            })

        }
    },
    created() {
        this.getArticles();

    }
}
</script>

<style scoped>

</style>
