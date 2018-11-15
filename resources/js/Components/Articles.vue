<template>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
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
                        <button class="btn btn-link"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-link"><i class="fa fa-edit"></i></button>
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