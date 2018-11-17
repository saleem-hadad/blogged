<template>
    <div>
        <!-- Header -->
        <div class="header bg-primary py-8"></div>

        <!-- Page content -->
        <div class="container-fluid mt--7">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div v-if="! categories.length && ! isLoading" class="text-center my-6">
                            <img width="300px" src="/vendor/binarytorch/blogged/assets/empty.svg">
                            <h2 class="pt-4">No categories found!</h2>

                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#new-category">Create New Category</button>
                        </div>

                        <div v-if="categories.length" class="card-header border-0">
                            <h3 class="mb-0 pull-left">Categories</h3>

                            <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#new-category">New Category</button>

                            <div class="clearfix"></div>
                        </div>
                        
                        <div v-if="categories.length" class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col"># of Articles</th>
                                        <th class="text-right" scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="category in categories" :key="category.id">
                                        <th scope="row" v-text="category.title"></th>
                                        <td v-text="category.slug"></td>
                                        <td v-text="category.articlesCount"></td>
                                        <td class="text-right">
                                            <a href="#" @click="selectedCategory = category" data-toggle="modal" data-target="#update-category" class="p-2"><i class="fa fa-edit"></i></a>

                                            <a href="#" @click="selectedCategory = category" data-toggle="modal" data-target="#delete-category" class="p-2"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div v-if="isLoading" class="text-center py-4">
                            <ball-beat-loader color="#8F8F8F"></ball-beat-loader>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- create category model -->
        <div class="modal fade" id="new-category" tabindex="-1" role="dialog" aria-labelledby="new-category" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                    <small>Create new blog category</small>
                    </div>
                    <form role="form">
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tag"></i></span>
                        </div>
                        <input class="form-control" placeholder="Title" type="text" v-model="selectedCategory.title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                        </div>
                        <input class="form-control" placeholder="Slug" type="text" v-model="selectedCategory.slug"/>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" @click="createCategory" data-dismiss="modal" class="btn btn-primary my-4">Create Category</button>
                        <button type="button" data-dismiss="modal" class="btn btn-link my-4">Cancel</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- /create category model -->

        <!-- update category model -->
        <div class="modal fade" id="update-category" tabindex="-1" role="dialog" aria-labelledby="update-category" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                    <small>Update category</small>
                    </div>
                    <form role="form">
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tag"></i></span>
                        </div>
                        <input class="form-control" placeholder="Title" type="text" v-model="selectedCategory.title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                        </div>
                        <input class="form-control" placeholder="Slug" type="text" v-model="selectedCategory.slug"/>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" @click="updateCategory" data-dismiss="modal" class="btn btn-primary my-4">Update Category</button>
                        <button type="button" data-dismiss="modal" class="btn btn-link my-4">Cancel</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- /update category model -->


        <!-- delete category model -->
        <div class="modal fade" id="delete-category" tabindex="-1" role="dialog" aria-labelledby="delete-category" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        This action will remove all the articles that belongs to this category! Are you sure you want to delete this category?
                    </div>
                    <div class="text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-primary my-4">No, Cancel</button>
                        <button type="button" @click="deleteCategory" data-dismiss="modal" class="btn btn-link my-4">Yes, Delete!</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- /delete category model -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
            selectedCategory: {
                title: '',
                slug: '',
            },
            isLoading: true,
        }
    },
    created() {
        this.fetchCategories();
    },
    methods: {
        fetchCategories() {
            this.isLoading = true;

            axios.get('/blogged-api/categories')
                .then((response) => {
                    this.isLoading = false;
                    this.categories = response.data.data;
                }).catch(() => {
                    this.isLoading = false;
                });
        },
        createCategory() {
            axios.post('/blogged-api/categories', { ...this.selectedCategory })
                .then((response) => {
                    this.selectedCategory = {title: '', slug: ''};
                    this.$toasted.success('Category created');
                    this.categories.push({...response.data.data, articlesCount: 0});
                }).catch(() => {
                    this.isLoading = false;
                    this.selectedCategory = {title: '', slug: ''};
                    this.$toasted.error('Something went wronge or you don\'t have permission to perform this action!');
                });
        },
        updateCategory() {
            axios.put('/blogged-api/categories/' + this.selectedCategory.id, { 
                    title: this.selectedCategory.title,
                    slug: this.selectedCategory.slug
                })
                .then((response) => {
                    this.categories.map(cat => {
                        if(cat.id !== this.selectedCategory.id) { return }

                        cat.title = this.selectedCategory.title;
                        cat.slug = this.selectedCategory.slug;
                    });

                    this.selectedCategory = {title: '', slug: ''};
                    this.$toasted.success('Category updated');
                }).catch(() => {
                    this.$toasted.error('Something went wronge or you don\'t have permission to perform this action!');
                    this.selectedCategory = {title: '', slug: ''};
                });
        },
        deleteCategory() {
            axios.delete('/blogged-api/categories/' + this.selectedCategory.id)
                .then((response) => {
                    this.categories = this.categories.filter(cat => cat.slug !== this.selectedCategory.slug);
                    this.selectedCategory = {title: '', slug: ''};
                    this.$toasted.success('Category deleted');
                }).catch(() => {
                    this.$toasted.error('Something went wronge or you don\'t have permission to perform this action!');
                    this.selectedCategory = {title: '', slug: ''};
                });
        },
    }
}
</script>
