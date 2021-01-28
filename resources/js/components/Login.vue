<template>
    <form @submit.prevent="onSubmit">
        <div class="clearfix"></div>
         <div v-if="error!==false" class="alert alert-danger" role="alert" 
           >
            <p>{{error}}</p>

        </div>
         <input
            type="email"
            :class="errors.email && 'mb-5'"
            placeholder="Email"
            required
            v-model="form.email"
        />
        <div class="invalid" v-if="errors.email">{{ errors.email[0] }}</div>
        <input
            type="password"
            :class="errors.password && 'mb-5'"
            placeholder="Password"
            required
            v-model="form.password"
        />
        <div class="invalid" v-if="errors.password">
            {{ errors.password[0] }}
        </div>
        <div class="ast_login_data">
            <label class="tp_custom_check" for="remember_me"
                >Remember me
                <input
                    type="checkbox"
                    name="ast_remember_me"
                    value="yes"
                    id="ast_remember_me"
                /><span class="checkmark"></span>
            </label>
            <a class="popup-with-zoom-anim" href="#forgot-password-dialog">Forgot password ?</a>
        </div>
         <button type="submit" class="ast_btn" :disabled="loading">{{loading ? "Please wait.." : "submit"}}</button>
        <p>
            Create An Account ?
            <a class="popup-with-zoom-anim" href="#signup-dialog">SignUp</a>
        </p>
    </form>
</template>

<script>
export default {
    data() {
        return {
            appurl:$("meta[name='app-url']").attr("content"),
            form: {
                email: "",
                password: "",
                remember_me: ""
            },
            loading: false,
            errors: {},
            error:false
        };
    },
    methods: {
        onSubmit() {
            this.loading = true;
            axios
                .post("login", {
                    email: this.form.email,
                    password: this.form.password,
                    remember_me: this.form.remember_me
                })
                .then(response => {
                    this.loading = false;
                    if (response.status === 204) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    this.loading = false;
                    if(error.response.status===403){
                        this.error = error.response.data.message;
                        console.log(this.error,error.response.data.message)
                    }
                    if (error.response.status == 422 || error.response.status==429) {
                        //Unprocessable Entity
                        this.errors = error.response.data.errors;
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
