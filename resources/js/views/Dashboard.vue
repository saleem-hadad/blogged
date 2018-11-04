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
                            <span class="h2 font-weight-bold mb-0">2</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fa fa-chart-bar"></i>
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
                            <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fa fa-chart-pie"></i>
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
                            <span class="h2 font-weight-bold mb-0">2,356</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fa fa-chart-pie"></i>
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
                <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Articles</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Publish Date</th>
                        <th scope="col">Published</th>
                        <th scope="col">Featured</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                            <a href="#" class=" rounded mr-3">
                                <img width="200px" alt="Image placeholder" src="#">
                            </a>
                            </div>
                        </th>
                        <td>
                            How to handle http kernel?
                        </td>
                        <td>
                            Nov 20, 2018
                        </td>
                        <td>
                            <span class="badge badge-dot mr-4">
                                <i class="bg-warning"></i> No
                            </span>
                        </td>
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