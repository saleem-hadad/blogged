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
                        <div class="card-header border-0">
                            <h3 class="mb-0">Articles</h3>
                        </div>
                        
                        <articles :data="articles"></articles>

                        <div v-if="isLoading" class="text-center py-4">
                            <ball-beat-loader color="#8F8F8F"></ball-beat-loader>
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
