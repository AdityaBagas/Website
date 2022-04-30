<template>
	<div>
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <td></td>
                    <td>Product</td>
                    <td>Units</td>
                    <td>Harga</td>
                    <td>Keterangan</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product,index) in products" @key="index">
                    <td>{{index+1}}</td>
                    <td v-html="product.name"></td>
                    <td v-model="product.units">{{product.units}}</td>
                    <td v-model="product.price">{{product.price}}</td>
                    <td v-model="product.price">{{product.description}}</td>
					<td><button class="btn btn-success" @click="editingItem = product">Edit</button></td>
                    <td><button class="btn btn-danger" @click="delProduct(product.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
        <modal @close="endEditing" :product="editingItem" v-show="editingItem != null"></modal>
        <modal @close="addProduct"  :product="addingProduct" v-show="addingProduct != null"></modal>
        <br>
        <button class="btn btn-primary" @click="newProduct">Tambah Produk Baru</button>
    </div>
</template>
<script>
    import Modal from './ProductModal'
	export default {
        data(){
            return {
                products : [],
                editingItem : null,
                addingProduct : null,
				deleteProduct : null
            }
        },
        components : {
            Modal
        },
        beforeMount(){
            axios.get('/api/products/')
            .then(response => {
                this.products = response.data
            })
            .catch(error => {
                console.error(error);
            })     
        },
        methods : {
            newProduct(){
                this.addingProduct = {
                    name : null, 
                    units : null, 
                    price : null,
                    description : null,
                    image : null
                }
            },
            endEditing(product){
                this.editingItem = null
                let index = this.products.indexOf(product)
                axios.put(`/api/products/${product.id}`,{
                    name  : product.name,
                    units : product.units,
                    price : product.price,
                    description : product.description,
                })
                .then(response =>{
                    this.products[index] = product
                })
                .catch(response => {
                })
            },
            addProduct(product){
                this.addingProduct = null
                axios.post("/api/products/",{
                    name  : product.name,
                    units : product.units,
                    price : product.price,
                    description : product.description,
                    image : product.image
                })
                .then(response =>{
                    this.products.push(product)
                })
                .catch(response => {
                })
            },
            delProduct(id){
                swal({
                    title: 'Apakah anda yakin?',
                    text: "Anda tidak dapat mengembalikan ini!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        // Send request to the server
                         if (result.value) {
                                axios.delete(`/api/products/delete/${id}`).then(()=>{
                                        swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                              
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            }
        }
    }
</script>