<template>

  <div class="ast_cart_box">
    <div class="ast_cart_list">
      <ul v-if="typeof cartItems !== 'undefined' && cartItems.length > 0">
        <li v-for="product in cartItems" :key="product.id">
          <div class="ast_cart_img">
            <img :src="product.options.thumbnailUrl" class="img-responsive" />
          </div>
          <div class="ast_cart_info">
            <a href="#">{{product.name}}</a>
            <p>{{product.qty}} X {{product.price}}</p>
            <a
              href="javascript:;"
              class="ast_cart_remove"
              @click="removeCartItem(product.rowId)"
              ><i class="fa fa-trash"></i
            ></a>
          </div>
        </li>
      </ul>
      <p v-else>Your cart is empty!</p>
    </div>
    <div class="ast_cart_total">
      <p>
        total<span>{{carttotal}}</span>
      </p>
    </div>
    <div v-if="cartItems.length > 0" class="ast_cart_btn">
      <a href="/cart" style="margin-right: 15px"
        ><button type="button">view cart</button>
      </a>
      <a  href="/checkout"><button type="button">checkout</button></a>
    </div>
  </div>

</template>

<script>
import Axios from 'axios';
import { eventBus } from '../app';
export default {
    props:["cart","total"],
    data(){
        return{
            cartItems:[],
            carttotal:0
        }
    },
    computed:{
      isCartEmpty(){
        return this.cartItems.length > 0;
      }
    },
    methods:{
        removeCartItem(rowId){
            Axios.get("cart/remove/"+rowId).then(response => {
              this.cartItems = Object.values(response.data.cart);
              this.$parent.showToast(response.data.message);
              this.carttotal =  response.data.total;
            document.getElementById("cartCount").innerHTML = this.cartItems.length;

            }).catch(error => {
              console.log(error)
            })
        }
    },
    created(){
        eventBus.$on("updateCart",({cart,total,message}) => {
            this.cartItems = Object.values(cart);
            this.carttotal = total;
            this.$parent.showToast(message);
            document.getElementById("cartCount").innerHTML = this.cartItems.length;
        });
        const cartObj = JSON.parse(this.cart);
        this.cartItems=Object.values(cartObj);
        this.carttotal = this.total;


    }
};
</script>

<style>
</style>