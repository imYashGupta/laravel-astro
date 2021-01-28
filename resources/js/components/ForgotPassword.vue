<template>
  <form @submit.prevent="onSubmit">
        <div class="clearfix"></div>
        <div v-if="error!==false" class="alert alert-danger" role="alert" 
           >
            <p>{{error}}</p>
        </div>
        <div v-if="success!==false" class="alert alert-success" role="alert" 
           >
            <strong>Success! </strong><p>{{success}}</p>
        </div>
         <input
            type="email"
            :class="errors.email && 'mb-5'"
            placeholder="Email"
            required
            v-model="email"
        />
        <div class="invalid" v-if="errors.email">{{ errors.email[0] }}</div>
       
       
         <button type="submit" class="ast_btn" :disabled="loading">{{loading ? "Please wait.." : "submit"}}</button>
       <!--  <p>
            Create An Account ?
            <a class="popup-with-zoom-anim" href="#signup-dialog">SignUp</a>
        </p> -->
    </form>
</template>

<script>
import Axios from 'axios'
export default {
    data(){
        return {
            loading:false,
            email:"",
            errors:{},
            error:false,
            success:false,
        }
    },
    methods:{
        onSubmit(){
            this.loading = true;
            Axios.post("password/email",{
                email:this.email
            }).then(response => {
                console.log(response)
                if(response.status===200){
                    this.success = response.data.message;
                }
                this.loading = false;
            }).catch(error => {
                console.log(error);
                console.log(error.response);
                if (error.response.status == 422 || error.response.status==429) {
                    //Unprocessable Entity
                    this.errors = error.response.data.errors;
                }
                this.loading = false;        
            })
        }
    }
}
</script>
<style scoped>

.invalid {
    color: #832625;
    text-align: left !important;
    margin-bottom: 15px;
}
.mb-0 {
    margin-bottom: 0px !important;
}

.mb-5 {
    margin-bottom: 5px !important;
}
</style>