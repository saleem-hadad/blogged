<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- body -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div v-if="isLoading" class="card text-center shadow no-border py-8">
                        <ball-beat-loader color="#8F8F8F"></ball-beat-loader>        
                    </div>

                    <div v-if="! isLoading" class="card shadow no-border pb-2">
                        <img class="card-img-top" :src="article.image" alt="Card image">
                        
                    </div>

                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-outline-info"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
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
            article: {
                title: '',
            },
            isLoading: true,
        }
    },
    created() {
        axios.get('/blogged-api/articles/' + this.$route.params.slug)
            .then((response) => {
                this.article = response.data.data;
                this.isLoading = false;
            }).catch(() => {
                this.isLoading = false;
            });
    },
}
</script>