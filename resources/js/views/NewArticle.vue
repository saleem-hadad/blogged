<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- body -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow no-border pb-2">
                        <img class="card-img-top" id="pick-image" :src="form.image" alt="Card image">

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
                                    v-text="selectedCategory ? selectedCategory.title : 'Select One'"></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" 
                                            v-for="category in categories" 
                                            :key="category.slug"
                                            @click.prevent="selectedCategory = category"
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
                                    <input class="custom-control-input" type="checkbox" v-model="form.featured">
                                    <label class="custom-control-label" for="customCheck5">Featured</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <button type="button" class="btn btn-primary"><i class="ni ni-spaceship"></i> Publish Now</button>
                            <button type="button" class="btn btn-outline-primary"><i class="ni ni-calendar-grid-58"></i> Save Draft</button>
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
            selectedCategory: null,
            form: {
                title: null,
                slug: null,
                image: '/vendor/binarytorch/blogged/assets/new.svg',
                excerpt: null,
                body: null,
                category: '',
                publish_date: null,
                published: false,
                featured: false,
            }
        }
    },
    watch: {
        selectedCategory() {
            this.form.category = this.selectedCategory.slug
        }
    },
    created() {
        axios.get('/blogged-api/categories')
            .then((response) => {
                this.categories = response.data.data
            });
    },
    methods: {
        handleUploaded(url) {
            this.form.image = url
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
