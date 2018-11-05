<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- body -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow no-border pb-2">
                        <img class="card-img-top" src="https://s3-ap-southeast-1.amazonaws.com/myseniorio/blogged-showcase.png" alt="Card image cap">

                        <div class="bg-secondary px-5 py-2">
                            <div class="row">
                                <div class="col-md-6">
                                    Category: <button type="button" class="btn btn-outline-danger btn-sm ml-1">Education</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <b>Published on:</b> <span class="description">Date</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-5">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Title" type="text">
                                </div>
                            </div>
                            
                            <article class="pt-2 is-light">
                                <textarea class="form-control form-control-alternative" rows="3" placeholder="Write a large text here ..."></textarea>
                            </article>
                        </div>

                        <div class="text-center my-4">
                            <button type="button" class="btn btn-primary">Publish Now</button>
                            <button type="button" class="btn btn-outline-primary">Save Draft</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>