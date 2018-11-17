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
                        <img class="card-img-top" id="pick-image" :src="articleImage" alt="Card image">

                        <image-uploader
                            trigger="#pick-image"
                            @uploaded="handleUploaded"
                            upload-form-name="image"
                            upload-url="/blogged-api/images"/>

                        <div class="card-body px-5">
                            <div class="form-group mb-4">
                                <span class="mr-2">Category:</span>
                                    
                                <div class="btn-group">
                                    <button type="button" 
                                    class="btn btn-outline-primary dropdown-toggle" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false"
                                    v-text="form.category.title"></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" 
                                            v-for="category in categories" 
                                            :key="category.slug"
                                            @click.prevent="form.category = category"
                                            >{{ category.title }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Title" type="text" v-model="form.title">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Url" type="text" v-model="form.slug">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-caps-small"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Excerpt (short description)" type="text" v-model="form.excerpt">
                                </div>
                            </div>

                            <article class="mb-4 is-light">
                                <textarea class="form-control form-control-alternative" rows="10" placeholder="Write a great content..." v-model="form.body"></textarea>
                            </article>

                            <div>
                                <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                                    <input class="custom-control-input" id="featuredCheckbox" type="checkbox" v-model="form.featured">
                                    <label class="custom-control-label" for="featuredCheckbox">Featured</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <button type="button" class="btn btn-primary" @click="publish"><i class="ni ni-spaceship"></i> Update and Publish</button>
                            <button type="button" class="btn btn-outline-primary" @click="save"><i class="fa fa-save"></i> Update only</button>
                        </div>
                        <div class="text-center mb-4">
                            <button type="button" class="btn color-danger btn-link" data-toggle="modal" data-target="#delete-article"><i class="fa fa-trash"></i> Delete this article</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- delete article model -->
        <div class="modal fade" id="delete-article" tabindex="-1" role="dialog" aria-labelledby="delete-article" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        Are you sure you want to delete this article? This action cannot be undone!
                    </div>
                    <div class="text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-primary my-4">No, Cancel</button>
                        <button type="button" @click="deleteArticle" data-dismiss="modal" class="btn btn-link my-4">Yes, Delete!</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- /delete article model -->
    </div>
</template>

<script>
import ImageUploader from '../components/ImageUploader';

export default {
    data() {
        return {
            categories: [],
            isLoading: true,
            form: {
                title: null,
                slug: null,
                excerpt: null,
                body: null,
                published: false,
                featured: false,
                image: null,
                category: {
                    id: 1,
                    title: 'Select One',
                    slug: 'selecte-one'
                },
            }
        }
    },
    watch: {
        'form.image': (newValue, oldValue) => {
            if(! oldValue) { return }

            this.removeOldImage(oldValue.path);
        }
    },
    computed: {
        articleImage() {
            return this.form.image ? this.form.image : '/vendor/binarytorch/blogged/assets/new.svg';
        }  
    },
    created() {
        axios.get('/blogged-api/categories')
            .then((response) => {
                this.categories = response.data.data
            });

        axios.get('/blogged-api/articles/' + this.$route.params.slug)
            .then((response) => {
                this.form = response.data.data;
                this.isLoading = false;
            }).catch(() => {
                this.isLoading = false;
            });
    },
    methods: {
        handleUploaded(url, path) {
            this.form.image = {
                url,
                path
            }
        },
        publish() {
            this.form.published = true;
            this.save();
        },
        save() {
            let form = {...this.form};

            form.image = form.image ? form.image.path : null
            form.category_id = form.category.id

            axios.put('/blogged-api/articles/' + this.$route.params.slug, {
                ...form
            }).then((response) => {
                    this.$toasted.success('Your article has been updated.');
                    this.$router.push({ name: 'dashboard' });
                }).catch((errors) => {
                    this.$toasted.error('Opps! Please make sure the entered data is valid.');
                });
        },
        removeOldImage(path) {
            axios.delete('/blogged-api/images/', { data: { path: path } })
                .then((response) => {
                    this.form.image = null
                });
        },
        deleteArticle() {
            axios.delete('/blogged-api/articles/' + this.$route.params.slug).then((response) => {
                    this.$toasted.success('Article has been deleted.');
                    this.$router.push({ name: 'dashboard' });
                }).catch((errors) => {
                    this.$toasted.error('Something went wronge or you don\'t have permission to perform this action!');
                });
        }
    },
    components: {
        ImageUploader,
    }
}
</script>

<style>
#pick-image {
    cursor: pointer;
}
</style>
