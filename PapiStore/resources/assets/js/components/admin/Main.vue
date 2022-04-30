<template>
</template>
<script>
	export default {
        data(){
            return {
                user : null,
                orders : [],
                products : [],
                users : []
            }
        },
        mounted(){
            axios.get('/api/users/')
            .then(response => {
                this.users = response.data
            })
            .catch(error => {
                console.error(error);
            })

            axios.get('/api/products/')
            .then(response => {
                this.products = response.data
            })
            .catch(error => {
                console.error(error);
            })

            axios.get('/api/orders/')
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
    .big-text {
        font-size: 28px;
    }
	.product-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
        height: 20vh
    }
</style>