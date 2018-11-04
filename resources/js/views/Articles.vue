<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- body -->
        <div class="container-fluid mt--7">
            <!-- Table -->
            <div class="row">
            <div class="col">
                <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">My Articles</h3>
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