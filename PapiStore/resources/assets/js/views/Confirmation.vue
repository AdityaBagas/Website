<template>
<body>
    <div>
        <div class="kotak">
            <h2>
                <span class="title"><strong>Terima Kasih!</strong></span><br>
                <span class="medium-text">Pesanan anda telah kami terima dan sedang dalam proses.</span><br>
                <router-link :to="{ name: 'userboard'}" class="small-link">Cek orderan anda</router-link>
            </h2>
        </div>
    </div>
    </body>
</template>
<script>
    export default {}
</script>
<style scoped>
    .medium-text {
        font-size: 36px;
    }
    .small-link {
        font-size: 24px;
        text-decoration: underline;
        color: #777;
    }
    .product-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
    }
    .hero-section {
        height: 80vh;
        align-items: center;
        margin-bottom: 20px;
        margin-top: -20px;
    }
    .title {
        font-size: 60px;
    }
    
    div.text{
        margin: 30px;
        background-color: #D7CAC1;
        
        opacity: 0.6;
    }
    div.kotak{
        align-items: center;
        background: #ffffff;
        width: 1050px;
        border: 1px solid black;
        padding: 25px;
        margin: 25px;      
        opacity: 0.9;
        
        
    }
</style>