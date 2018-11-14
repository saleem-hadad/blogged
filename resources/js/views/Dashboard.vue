<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8">
            <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                <div class="col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Articles</h5>
                            <span class="h2 font-weight-bold mb-0">{{ totalArticles }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fa fa-user"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Published Articles</h5>
                            <span class="h2 font-weight-bold mb-0">{{ totalArticles }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fa fa-check"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Featured Articles</h5>
                            <span class="h2 font-weight-bold mb-0">{{ totalArticles }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fa fa-star"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        
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
                                        <th scope="col">Published</th>
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
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i> Yes
                                            </span>
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
export default {
    data() {
        return {
            data: [],
            isLoading: true
        }
    },
    computed: {
        totalArticles() {
            if(!this.data.meta) {
                return 0
            }
            
            return this.data.meta.total
        }
    },
    created() {
        axios.get('/blogged-api/articles')
            .then((response) => {
                this.data = response.data
                this.isLoading = false;
            }).catch(() => {
                this.isLoading = false;
            });
    }
}
</script>
