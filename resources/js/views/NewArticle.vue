<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- body -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow no-border pb-2">
                        <img class="card-img-top" id="pick-image" :src="articleImage" alt="Card image">

                        <image-uploader
                            trigger="#pick-image"
                            @uploaded="handleUploaded"
                            upload-form-name="image"
                            upload-url="/blogged-api/images"/>

                        <div class="alert alert-secondary alert-dismissible fade show" style="border-radius: 0px" role="alert">
                            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-inner--text"><strong>SEO Tip!</strong> {{ randomSeoTip }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="card-body px-5">
                            <div class="form-group mb-4">
                                <span class="mr-2">Category:</span>
                                    
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select One</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Education</a>
                                        <a class="dropdown-item" href="#">Development</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Title" type="text">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Url" type="text">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Excerpt (short description)" type="text">
                                </div>
                            </div>

                            <article class="mb-4 is-light">
                                <textarea class="form-control form-control-alternative" rows="10" placeholder="Write a great content..."></textarea>
                            </article>
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
import ImageUploader from '../components/ImageUploader';

export default {
    data() {
        return {
            SEO: [
                'Keep your title short and precise with less than 60 chars!',
                'Keep your excerpt short and precise with less than 160 chars!',
                'Try to include CTA phrases in your article (such as Learn More, Click here..) to grab readers\' attention!',
            ],
            articleImage: 'https://s3.ap-southeast-1.amazonaws.com/myseniorio/new.svg'
        }
    },
    computed: {
        randomSeoTip() { 
            return this.SEO[Math.floor(Math.random() * this.SEO.length)];
        },
    },
    methods: {
        handleUploaded(url) {
            this.articleImage = url
        }
    },
    components: {
        ImageUploader
    }
}
</script>

<style>
#pick-image {
    cursor: pointer;
}
</style>
