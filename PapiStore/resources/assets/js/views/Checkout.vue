<template>
<body>
    
    <div class="container">
        
        <div class="row">
            <div class="col-md-8 offset-md-2">
                
                <div class="order-box">
                    <img :src="product.image" :alt="product.name" style:width="300px" height="353px">
                    <h2 class="title" v-html="product.name"></h2>
                    <p class="small-text text-muted float-left">Rp {{product.price}}</p>
                    <p class="small-text text-muted float-right">Stock Tersedia: {{product.units}}</p>
                    <br>
                    <hr>
                    <label class="row"><span class="col-md-2 float-left">Quantity: </span><input type="number" name="units" min="1" :max="product.units" class="col-md-2 float-left" v-model="quantity" @change="checkUnits"></label>
                
                </div>
                <br>
                <div>
                    
                    <div v-if="!isLoggedIn">
                        <div class="text">
                        <h2>Login Terlebih Dahulu</h2>
                        </div>
                        <button class="col-md-4 btn btn-primary float-left" @click="login">Login</button>
                        <button class="col-md-4 btn btn-danger float-right" @click="register">Register</button>
                    
                    </div>
                    <div v-if="isLoggedIn">
                        <div class="row">
                            <label for="address" class="col-md-3 col-form-label">Alamat</label>

                            <div class="col-md-9">
                                <input id="address" type="text" class="form-control" v-model="address" required>
                            </div>
                        </div>
                        <br>
                        <button class="col-md-4 btn btn-sm btn-success float-right" v-if="isLoggedIn" @click="placeOrder">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</template>
<script>
    export default {
        props : ['pid'],
        data(){
            return {
                address : "",
                quantity : 1,
                isLoggedIn : null,
                product : []
            }
        },
        mounted(){
            this.isLoggedIn = localStorage.getItem('jwt') != null
        },
        beforeMount(){
            axios.get(`/api/products/${this.pid}`)
            .then(response => {
                this.product = response.data
            })
            .catch(error => {
                console.error(error);
            })       
            if(localStorage.getItem('jwt') != null){
                this.user = JSON.parse(localStorage.getItem('user'))
                axios.defaults.headers.common['Content-Type'] = 'application/json'
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')
            }
        },
        methods : {
            login(){
                this.$router.push({ name: 'login', params: { nextUrl: this.$route.fullPath }})
            },
            register(){
                this.$router.push({ name: 'register', params: { nextUrl: this.$route.fullPath }})
            },
            placeOrder(e) {
                e.preventDefault()
                axios.post('api/orders/', {
                    address : this.address,
                    quantity: this.quantity,
                    product : this.product.id
                })
                .then(response => {
                    this.$router.push('/confirmation')
                })
                .catch(error => {
                    console.error(error);
                })          
            },
            checkUnits(e){
                if (this.quantity > this.product.units)
                {
                    this.quantity = this.product.units
                }
            }
        }
    }
</script>
<style scoped>
    .small-text {
        font-size: 18px;
    }
    .order-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
        align-items: center;
        background: #ffffff;
        opacity: 0.8;
    }
    .title {
        font-size: 36px;
    }
    body{
        background: url(bg.png);
        background-repeat: no-repeat;
        background-size: cover;
    }
    div.text{
        margin: 30px;
        background-color: #ffffff;
        
        opacity: 0.9;
    }
  
</style>