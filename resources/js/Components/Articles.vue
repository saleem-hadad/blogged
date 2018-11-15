<template>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
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
                    <td class="text-right">
                        <a href="#" class="p-2"><i class="fa fa-eye"></i></a>
                        <a href="#" class="p-2"><i class="fa fa-edit"></i></a>
                        <a href="#" class="p-2"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['data']
}
</script>