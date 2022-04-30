<template>
<body>
    <div class="container">
        <div class="kotak">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <img :src="product.image" :alt="product.name" style:width="300px" height="353px">
                <h3 class="title" v-html="product.name"></h3>
                <p class="text-muted">{{product.description}}</p>
                <h4>
                    <span class="small-text text-muted float-left">Rp {{product.price}}</span>
                    <span class="small-text float-right">Stock Tersedia: {{product.units}}</span>
                </h4>
                <br>
                <hr>
                <router-link :to="{ path: '/checkout?pid='+product.id }" class="col-md-4 btn btn-sm btn-primary float-right">Beli</router-link>
            </div>
        </div>
    </div>
    </div>
</body>
</template>
<script>
    export default {
        data(){
            return {
                product : []
            }
        },
        beforeMount(){
            axios.get(`/api/products/${this.$route.params.id}`)
            .then(response => {
                this.product = response.data
            })
            .catch(error => {
                console.error(error);
            })       
        }
    }
</script>
<style scoped>
    .small-text {
        font-size: 18px;
    }
    .title {
        font-size: 36px;
    }
    div.kotak{
        align-items: center;
        background: #ffffff;
        width: 1000px;
        border: 1px solid black;
        padding: 25px;
        margin: 25px;      
        opacity: 0.9;
        
    }
    body{
        background: url(bg.png);
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
</style>