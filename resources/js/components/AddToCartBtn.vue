<template>
  <a href="#" @click.prevent="addToCart()" class="ast_add_cart ast_btn">
        <span v-if="loading">...</span>
        <span v-else>add to cart</span>
  </a>
</template>

<script>
import Axios from 'axios';
import { eventBus } from "./../app";
export default {
    props:["product"],
    data(){
        return {
            prod:{},
            loading:false
        }
    },
    methods:{
        addToCart(){
            this.loading=true;
            const qty = this.prod.min_qty===null ? 1 : this.prod.min_qty;
            Axios.post("cart/add",{
                product:this.prod.id,
                qty:qty
            }).then(response => {
                this.loading=false;
                eventBus.$emit("updateCart",response.data);
            }).catch(error => {
                this.loading=false;
                console.log(error);
            })
        }
    },
    created(){

        this.prod=JSON.parse(this.product);
    }
}
</script>

<style>
/*Huge thanks to @tobiasahlin at http://tobiasahlin.com/spinkit/ */
.spinner {
  margin: 100px auto 0;
  width: 70px;
  text-align: center;
}

.spinner > div {
  width: 18px;
  height: 18px;
  background-color: #333;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}
</style>