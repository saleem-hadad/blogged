<template>
    <div>
        <!-- statistics -->
        <statistics :data="statistics"></statistics>
        
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div v-if="isLoading" class="card text-center shadow no-border py-8">
                        <ball-beat-loader color="#8F8F8F"></ball-beat-loader>        
                    </div>

                    <div v-if="! isLoading" class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Articles</h3>
                        </div>
                        
                        <articles :data="data.data"></articles>

                        <div class="card-footer justify-content-center py-4">
                            <div class="btn">Load More</div>
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
            data: [],
            isLoading: true,
            statistics: {
                total: 0,
                published: 0,
                featured: 0,
            },
        }
    },
    mounted() {
        axios.get('/blogged-api/articles')
            .then((response) => {
                this.data = response.data;
                this.statistics = {...response.data.statistics};
                this.isLoading = false;
            }).catch(() => {
                this.isLoading = false;
            });
    },
    components: {
        Articles,
        Statistics
    }
}
</script>
