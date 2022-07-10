<template>
    <div>
        <h3 class="text-center">Add Produk</h3>
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="addProduk">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" v-model="produk.nama">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" v-model="produk.harga">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
        methods: {
            addProduk() {
 
                this.$axios
                    .post('http://localhost:8000/api/produk', this.produk)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>