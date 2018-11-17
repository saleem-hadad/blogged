<template>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th class="text-right" scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="article in data" :key="article.id">
                    <th scope="row">
                        <div class="media align-items-center">
                        <a href="#" class="rounded">
                            <img class="rounded" width="150px" alt="article image" :src="article.image">
                        </a>
                        </div>
                    </th>
                    <td v-text="article.title"></td>
                    <td>
                      <span v-if="! article.published" class="badge badge-dot mr-4"><i class="bg-warning"></i> Draft</span>
                      <span v-if="article.published" class="badge badge-dot mr-4"><i class="bg-success"></i> Published</span>
                    </td>
                    <td class="text-right">
                        <router-link tag="a" :to="{ name: 'view', params: { slug: article.slug } }" class="p-2"><i class="fa fa-eye"></i></router-link>
                        <router-link tag="a" :to="{ name: 'edit', params: { slug: article.slug } }" class="p-2"><i class="fa fa-edit"></i></router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['data'],
}
</script>