<template>
<body>
	<div class="text">
		<h2 class="title">Profile </h2>
	</div>
	
	<div>
	<div class="container">
	<div class="kotak">
	<div class="row">
		<h5><span v-html>Hai, {{user.name}}</span></h5><br><br>
		<table class="table table-responsive table-striped">
			<thead>
                <tr> 
					<td> <span class="small-text text-muted float-center" align="center">User ID</span></td>
					<td> <span class="small-text text-muted float-center">Email</span></td>
					<td> <span class="small-text text-muted float-center">Tanggal Bergabung</span></td>					
                </tr>
            </thead>		
			<tbody>			
				<td> <span class="small-text text-muted float-center">{{user.id}}</span></td>
				<td> <span class="small-text text-muted float-center">{{user.email}}</span></td>
				<td> <span class="small-text text-muted float-right">{{user.created_at}}</span></td>
			</tbody>
		</table>
        <modal @close="endEditing" :user="editingUser" v-show="editingUser != null"></modal>
        <br><button class="btn btn-success" @click="editingUser = user">Edit</button>
	</div>
	</div>
    </div>
	</div>
	
    <br><br>
</body>
</template>

<script>
import Modal from './UserModal'
	export default {
        data(){
            return {
                user:[],
                editingUser : null,
                id:this.$route.params.id
            }
        },
        components : {
            Modal
        },
        beforeMount(){
            axios.get(`/api/users/${this.$route.params.id}`)
            .then(response => {
                this.user = response.data
            })
            .catch(error => {
                console.error(error);
            })     
        },
        methods : {
            endEditing(user){
                this.editingUser = null
                let index = this.users.indexOf(user)
                axios.put(`/api/users/${user.id}`,{

                    name  : user.name,

                    description : user.description,
                })
                .then(response =>{
                    this.users[index] = user
                })
                .catch(response => {
                })
            },
        }
    }
</script>



<style scoped>
    .small-text {
        font-size: 18px;
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
        width: 600px;
        border: 1px solid black;
        padding: 30px;
        margin: 1px;
        opacity:1 ;
        align-items: center;
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
            
        