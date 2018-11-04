<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- body -->
        <div class="container-fluid mt--7">
            <div class="row">
            <div class="col">
                <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">New Article</h3>
                </div>
                <div class="card-body border-0">
                    <form role="form">
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Title" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-alternative" rows="3" placeholder="Write a large text here ..."></textarea>
                        </div>
                        <div class="text-center">
                        <button type="button" class="btn btn-primary my-4">Publish Now</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>