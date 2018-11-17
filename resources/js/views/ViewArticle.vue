<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- body -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div v-if="isLoading" class="card text-center shadow no-border py-8">
                        <loader color="#8F8F8F"></loader>        
                    </div>

                    <div v-if="! isLoading" class="card shadow no-border pb-2">
                        <img class="card-img-top" :src="article.image" alt="Card image">

                        <div class="bg-secondary px-5 py-2">
                            <a href="#" class="btn btn-link btn-sm" style="margin-right: 0px">{{ article.category.title }}</a>/ <span class="description">Created at: {{ article.created_at }} | Published at: {{ article.publish_date }}</span>
                        </div>

                        <div class="card-body px-5">
                            <h1 class="display-2"><span v-if="article.published" style="display: inline">&#9733;</span> {{ article.title }}</h1>
                            
                            <article class="pt-2 is-dark" v-html="articleContent"></article>
                        </div>

                        <div class="card-footer justify-content-center py-4">
                            <router-link tag="a" 
                                :to="{ name: 'edit', params: { slug: article.slug } }" 
                                class="btn btn-outline-info">
                                <i class="fa fa-edit"></i> Edit this article
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import marked from 'marked';
import Article from '../Article';

export default {
    data() {
        return {
            article: {
                title: '',
                body: '',
            },
            isLoading: true,
        }
    },
    computed: {
        articleContent() {
            return marked(this.article.body)
        }
    },
    mounted() {
        axios.get('/blogged-api/articles/' + this.$route.params.slug)
            .then((response) => {
                this.article = response.data.data;
                this.isLoading = false;
                Article.parse();
            }).catch(() => {
                this.isLoading = false;
            });
    }
}
</script>