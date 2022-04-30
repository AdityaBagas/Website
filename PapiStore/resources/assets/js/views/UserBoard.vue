<template>
<body>
    <div>
        <div class="text">
            <h2 class="title">Histori Pemesanan</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="row">
                        <div class="kotak" v-for="(order,index) in orders" @key="index">
                            <img :src="order.product.image" :alt="order.product.name" style:width="180px" height="243px">
                            <h5><span v-html="order.product.name"></span><br>
                                <span class="small-text text-muted">Rp {{order.product.price}}</span>
                            </h5>
                            <hr>
                            <span class="small-text text-muted">Jumlah: {{order.quantity}}
                                
                            </span>
                            <br><br>
                            <p><strong>Alamat:</strong> <br>{{order.address}}</p>
                        </div>
                    </div>
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
                users : null,
                orders : []
            }
        },
        beforeMount(){
            this.user = JSON.parse(localStorage.getItem('user'))
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')

            axios.get(`api/users/${this.user.id}/orders`)
            .then(response => {
                this.orders = response.data
            })
            .catch(error => {
                console.error(error);
            })           
        }
       
    }
</script>
<style scoped>
    .small-text {
        font-size: 20px;
    }
    .product-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
    }
    .hero-section {
        height: 20vh;
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
     div.kotak{
        background: #ffffff;
        width: 300px;
        border: 1px solid black;
        padding: 25px;
        margin: 25px;
        opacity:0.9 ;
        
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
</style>