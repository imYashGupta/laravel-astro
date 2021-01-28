<template>
    <form @submit.prevent="signup">
        <div class="clearfix"></div>
         <div v-if="success" class="alert alert-success" role="alert" 
            >
            <strong>Success!</strong> A verification link has been sent to your email.
        </div>
        <div v-if="crash" class="alert alert-danger" role="alert" 
           >
                        <strong>Something went wrong!</strong> Please try again later.

        </div>
        <input
            type="text"
            :class="errors.firstname && 'mb-5'"
            placeholder="Firstname"
            v-model="firstname"
            required
            oninvalid="this.setCustomValidity('Please enter your firstname here.')"
            oninput="this.setCustomValidity('')"

        />
        <!-- <div class="clearfix"></div> -->
        <div class="invalid" v-if="errors.firstname">
            {{ errors.firstname[0] }}
        </div>
        <!-- <div class="clearfix"></div> -->
        <input
            type="text"
            :class="errors.lastname && 'mb-5'"
            placeholder="Lastname"
            required
            v-model="lastname"
             oninvalid="this.setCustomValidity('Please enter your lastname here.')"
            oninput="this.setCustomValidity('')"
        />
        <div class="invalid" v-if="errors.lastname">
            {{ errors.lastname[0] }}
        </div>
        <input
            type="email"
            :class="errors.email && 'mb-5'"
            placeholder="Email"
            required
            v-model="email"
        />
        <div class="invalid" v-if="errors.email">{{ errors.email[0] }}</div>
        <input
            type="password"
            :class="errors.password && 'mb-5'"
            placeholder="Password"
            required
            v-model="password"
            minlength="8"
        />
        <div class="invalid" v-if="errors.password">
            {{ errors.password[0] }}
        </div>
        <button type="submit" class="ast_btn" :disabled="loading">{{loading ? "Please wait.." : "submit"}}</button>
        <p>
            Already have an account?
            <a class="popup-with-zoom-anim" href="#login-dialog">Login</a>
        </p>
    </form>
</template>

<script>
import Axios from "axios";
export default {
    data() {
        return {
            firstname: "",
            lastname: "",
            email: "",
            password: "",
            errors: {},
            success:false,
            crash:false,
            loading:false,
        };
    },
    methods: {
        resetForm(){
            this.errors = {};
            this.email="";
            this.password="";
            this.firstname="";
            this.lastname="";
        },
        signup(e) {
            this.loading = true;
            Axios.post("register", {
                firstname: this.firstname,
                lastname: this.lastname,
                email: this.email,
                password: this.password,
                csrf_token: document.querySelector('meta[name="csrf-token"]')
                    .content
            })
                .then(response => {
                    this.loading = false;
                    if (response.status === 201) {
                        this.success=true;
                        this.resetForm();
                    }else{
                        this.crash=true;
                        this.resetForm();
                    }
                })
                .catch(error => {
                    this.loading = false;
                    if(error.response.status==422){
                        //Unprocessable Entity
                        this.errors=error.response.data.errors;
                    }
                    else{
                        this.crash=true;
                        this.resetForm();
                    }                    
                });
        }
    }
};
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
