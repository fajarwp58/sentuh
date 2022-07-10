<template>
    <div>
        <h3 class="text-center">All Produk</h3><br/>
 
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th width="15%">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="produk in data" :key="produk.id">
                <td>{{ produk.nama }}</td>
                <td>{{ produk.harga }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: produk.id }}" class="btn btn-primary">Edit
                        </router-link>
                        &nbsp;&nbsp;<button class="btn btn-danger" @click="deleteProduk(produk.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                data: []
            }
        },
        created() {
            this.$axios
                .get('http://localhost:8000/api/produk')
                .then(response => {
                    //console.log(response.data);
                    this.data = response.data;
                });
        },
        methods: {
            deleteProduk(id) {
                this.$axios
                    .delete(`http://localhost:8000/api/produk/${id}`)
                    .then(response => {
                        let i = this.data.map(item => item.id).indexOf(id); // find index of your object
                        this.data.splice(i, 1)
                    });
            }
        }
    }
</script>