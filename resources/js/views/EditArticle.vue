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
                        <img class="card-img-top" id="pick-image" :src="form.image ? form.image.url : '/vendor/binarytorch/blogged/assets/new.svg'" alt="Card image">

                        <image-uploader
                            trigger="#pick-image"
                            @uploaded="handleUploaded"
                            upload-form-name="image"
                            upload-url="/blogged-api/images"/>

                        <SEO-tips></SEO-tips>

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
                            <button type="button" class="btn btn-primary" @click="publish"><i class="ni ni-spaceship"></i> Publish Now</button>
                            <button type="button" class="btn btn-outline-primary" @click="save"><i class="ni ni-calendar-grid-58"></i> Save Draft</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SEOTips from '../components/SEOTips';
import ImageUploader from '../components/ImageUploader';

export default {
    data() {
        return {
            categories: [],
            isLoading: true,
            articleCreated: false,
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
    beforeRouteLeave (to, from, next) {
        this.removeOldImage();

        next();
    },
    created() {
        axios.get('/blogged-api/categories')
            .then((response) => {
                this.categories = response.data.data
            });

        axios.get('/blogged-api/articles/' + this.$route.params.slug)
            .then((response) => {
                this.article = response.data.data;
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

            axios.post('/blogged-api/articles', {
                ...form
            }).then((response) => {
                    this.articleCreated = true

                    let action = form.published ? 'published.' : 'saved.'
                    this.$toasted.success('Your article has been ' + action);
                    
                    this.$router.push({ name: 'dashboard' });
                }).catch((errors) => {
                    this.$toasted.error('Opps! Please make sure the entered data is valid.');
                });
        },
        removeOldImage(path) {
            // if the path given null and no image selected or article create => don't remove the image
            if(this.articleCreated || (! path && ! this.form.image)) { return }

            // if path not given and image selected => remove it
            if(! path) { path = this.form.image.path; }

            axios.delete('/blogged-api/images/', { data: { path: path } })
                .then((response) => {
                    this.form.image = null
                });
        }
    },
    components: {
        ImageUploader,
        SEOTips
    }
}
</script>

<style>
#pick-image {
    cursor: pointer;
}
</style>
