<template>
    <div>
        <body>
        <div class="text">
            <h2 class="title">Selamat Berbelanja Di PapiShop</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="kotak" v-for="(product,index) in products" @key="index">
                            <router-link :to="{ path: '/products/'+product.id}">
                                <img :src="product.image" :alt="product.name" style:width="180px" height="243px">
                                <h5><span v-html="product.name"></span>
                                    <span class="small-text text-muted float-right">Rp {{product.price}}</span>
                                </h5>
                                <button class="col-md-4 btn btn-sm btn-primary float-right">Beli</button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                products : []
            }
        },
        mounted(){
            axios.get("api/products/")
            .then(response => {
                this.products = response.data
            })
            .catch(error => {
                console.error(error);
            })       
        }
    }
</script>
<style scoped>
    .small-text {
        font-size: 14px;
    }
    .product-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
    }
    .hero-section {
        height: 30vh;
        background: #ababab;
        align-items: center;
        margin-bottom: 20px;
        margin-top: -20px;
    }
    .title {
        font-size: 60px;
        color: #000000;
        text-align: center;
        
    }
    body{
        background: url(bg.png);
        background-repeat: no-repeat;
        background-size: cover;
    }
    div.text{
        margin: 30px;
        background-color: #D7CAC1;
        
        opacity: 0.6;
    }
    div.kotak{
        background: #ffffff;
        width: 300px;
        border: 1px solid black;
        padding: 25px;
        margin: 25px;
        opacity: 0.9;
        
    }
    
    
</style>