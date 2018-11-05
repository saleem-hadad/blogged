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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Title" type="text">
                                </div>
                            </div>
                            
                            <article class="mb-4 is-light">
                                <textarea class="form-control" rows="10" placeholder="Write a great content..."></textarea>
                            </article>

                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" placeholder="Select Publish date" type="text">
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