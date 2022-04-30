<template>
<body>
    <div>
        <div class="text">
            <h2 class="title">Halaman Admin</h2>
        </div>
        <div class="container">
            <div class="kotak">
            <div class="row">
                <div class="col-md-3">
                    <ul style="list-style-type:none">
                      <li><button class="btn" @click="setComponent('products')">Products</button></li>                     
                    </ul>
                </div>
                </div>
                <div class="col-md-9">
                    <component :is="activeComponent"></component>
                </div>
            </div>
        </div>
    </div>
</body>
</template>
<script>
    import Main from '../components/admin/Main'
    import Users from '../components/admin/Users'
    import Products from '../components/admin/Products'
   
    
    export default {
        data(){
            return {
                user : null,
                activeComponent : null
            }
        },
        components : {
            Main, Users, Products,
        },
        beforeMount(){
            this.setComponent(this.$route.params.page)
            this.user = JSON.parse(localStorage.getItem('user'))
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('jwt')
        },
        methods : {
            setComponent(value){
                switch(value) {
                    case "users":
                        this.activeComponent = Users
                        this.$router.push({name : 'admin-pages', params : {page: 'users'}})
                        break;
                    case "products":
                        this.activeComponent = Products
                        this.$router.push({name : 'admin-pages', params : {page: 'products'}})
                        break;
                    default:
                        this.activeComponent = Main
                        this.$router.push({name : 'admin'})
                        break;
                }
            }
        }
    }
</script>
<style scoped>
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
    body{
        background: url(bg.png);
        background-repeat: no-repeat;
        background-size: contain;
        width: 1400px;
        height: 1000px;
    }
    div.text{
        margin: 30px;
        background-color: #D7CAC1;
        
        opacity: 0.6;
    }
    div.kotak{
        background: #ffffff;
        width: 1050px;
        border: 1px solid black;
        padding: 25px;
        margin: 25px;
        opacity: 0.9;
        
    }
</style>