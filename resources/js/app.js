/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const marked = require('marked');

window.Vue = require('vue');
import Vuelidate from "vuelidate";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import UserCountryStateDropdown from "./components/UserCountryStateDropdown.vue";
import ProductImages from "./components/ProductImages.vue";
import AddToCartBtn from "./components/AddToCartBtn.vue";
import HeaderCart from "./components/HeaderCart.vue";
import ReviewForm from "./components/ReviewForm.vue";
import Cart from "./components/Cart.vue";
import SignUp from "./components/SignUp.vue";
import Login from "./components/Login.vue";
import ForgotPassword from "./components/ForgotPassword.vue";
import CheckoutCountryState from "./components/CheckoutCountryState.vue";
import ProfileCountryState from "./components/ProfileCountryState.vue";
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
export const eventBus = new Vue();
Vue.use(Vuelidate);

const app = new Vue({
    el: '#wrapper',
    components:{
        "user-country-state":UserCountryStateDropdown,
        "product-images":ProductImages,
        "add-to-cart-btn":AddToCartBtn,
        "header-cart":HeaderCart,
        "review-form":ReviewForm,
        'cart':Cart,
        'sign-up':SignUp,
        'login-form':Login,
        'forgot-password-form':ForgotPassword,
        'checkout-country-state':CheckoutCountryState,
        'profile-country-state':ProfileCountryState,
    },
    methods:{
        showPassword(){
            this.editPassword = !this.editPassword;
        },
        showToast(msg){
            var x = document.getElementById("snackbar");
            x.className = "show";
            x.innerHTML = msg;
            setTimeout(function(){ 
                x.className = x.className.replace("show", ""); 
                x.innerHTML = "";
            }, 3000);
        },
        renderMd(md){
            return md;
            const tokens = marked.lexer(md);
            // console.log(tokens);
            const html = marked.parser(tokens);
            // console.log(html);
            return html;
        }
        
      
    },
    data(){
        return {
            editPassword:false,
            freeDelivery:false,
            showLoginError:false,
            btnLoading:false,
        }
    },
    created(){
        eventBus.$on("showLoginError",(msg) => {
            this.showLoginError = msg;
        })
    }
});
