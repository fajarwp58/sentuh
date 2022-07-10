<template>
    <div>
        <h3 class="text-center">Edit Produk</h3>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="updateProduk">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" v-model="produk.nama">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" v-model="produk.harga">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                produk: {}
            }
        },
        created() {
            this.$axios
                .get(`http://localhost:8000/api/produk/${this.$route.params.id}`)
                .then((response) => {
                    this.produk = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateProduk() {
                this.$axios
                    .put(`http://localhost:8000/api/produk/${this.$route.params.id}`, this.produk)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>