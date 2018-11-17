<template>
    <div>
        <!-- statistics -->
        <statistics :data="statistics"></statistics>
        
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div v-if="! articles.length && ! isLoading" class="text-center my-6">
                            <img width="300px" src="/vendor/binarytorch/blogged/assets/empty.svg">
                            <h2 class="pt-4">No articles found!</h2>
                            <router-link tag="a" to="/articles/new" class="btn btn-primary">
                                Write New Article
                            </router-link>
                        </div>

                        <div v-if="articles.length" class="card-header border-0">
                            <h3 class="mb-0 pull-left">Articles</h3>

                            <router-link tag="a" to="/articles/new" class="btn btn-sm btn-primary pull-right">
                                <i class="ni ni-fat-add"></i> New Article
                            </router-link>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <articles v-if="articles.length" :data="articles"></articles>

                        <div v-if="isLoading" class="text-center py-4">
                            <loader color="#8F8F8F"></loader>
                        </div>

                        <div v-if="! isLoading && nextPage" class="card-footer justify-content-center py-4">
                            <div @click="fetchArticles" class="btn">Load More</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Articles from '../components/Articles';
import Statistics from '../components/Statistics';

export default {
    data() {
        return {
            articles: [],
            isLoading: true,
            nextPage: 1,
            statistics: {
                total: 0,
                published: 0,
                featured: 0,
            },
        }
    },
    mounted() {
        this.fetchArticles();
    },
    methods: {
        fetchArticles() {
            if(! this.nextPage) { return; }

            this.isLoading = true;
            axios.get('/blogged-api/articles', { params: { page: this.nextPage } })
                .then((response) => {
                    this.isLoading = false;
                    this.prepareNextPage(response)
                    this.statistics = {...response.data.statistics};
                    response.data.data.forEach(article => {
                        this.articles.push(article);
                    });
                }).catch(() => {
                    this.isLoading = false;
                });
        },
        prepareNextPage(response) {
            if(response.data.meta.last_page - response.data.meta.current_page) {
                this.nextPage = response.data.meta.current_page + 1;
            }else {
                this.nextPage = null;
            }
        }
    },
    components: {
        Articles,
        Statistics
    }
}
</script>
