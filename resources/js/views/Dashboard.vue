<template>
    <div>
        <!-- Header -->
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
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="article in data.data" :key="article.id">
                                        <th scope="row">
                                            <div class="media align-items-center">
                                            <a href="#" class="rounded">
                                                <img class="rounded" width="150px" alt="article image" :src="article.image">
                                            </a>
                                            </div>
                                        </th>
                                        <td v-text="article.title"></td>
                                        <td>
                                            <button class="btn btn-link"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-link"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
    created() {
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
        Statistics
    }
}
</script>
