<template>
    <div class="table-responsive cart_table">
        <!-- <spinner/> -->
        <template v-if="cartItems.length > 0">
         
        <div class="cart-overlay"></div>
        <table class="table">
            <tbody>
                <tr>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                <cart-items @qtyupdate="handleQtyUpdate" v-for="item in cartItems" :key="item.rowId" :item="item"></cart-items>
              <!--   <tr>
                    <td>
                        <p class="text-success"></p>
                    </td>
                    <td>&nbsp;</td>
                    <td>Sub-total</td>
                    <td>${{subtotal}}</td>
                    <td>&nbsp;</td>
                </tr> -->
                 <tr v-if="coupon!==false">
                    <td>
                        <p class="text-success"></p>
                    </td>
                    <td>&nbsp;</td>
                    <td>Coupon Discount</td>
                    <td>${{coupon.discount}}</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <div class="cupon_code_wrap">
                           <form @submit.prevent="applyCoupon">
                                <input
                                type="text"
                                name="cupon_code"
                                placeholder="####"
                                class="cupon_code"
                                v-model="code"
                                oninvalid="this.setCustomValidity('Please enter coupon code')"
                                 oninput="this.setCustomValidity('')"
                                required
                            />
                            <button
                                v-if="auth==true"
                                type="submit"
                                value="Apply Cupon Code"
                                class="cupon_btn ast_btn"

                            >
                                Apply Coupon Code
                            </button>
                            <a class="ast_btn popup-with-zoom-anim" href="#login-dialog" v-else @click="showLoginError('Please Login to apply Coupon Code')" > Apply Coupon Code</a>
                           </form>
                        </div>
                    </td>
                    <td>&nbsp;</td>
                    <td>Total</td>
                    <td>${{subtotal}}</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <div class="alert alert-danger" role="alert"  v-if="couponError!==false">
            {{couponError}}
        </div>
         <div class="alert alert-success" role="alert"  v-if="coupon!==false">
            {{coupon.message}}
        </div>
        <div style="justify-content: space-between;display: flex;">
            <a
                href="/shop"
                value="Apply Cupon Code"
                class="proceed_btn ast_btn "
                >Continue Shopping
            </a>
            <a
                v-if="auth==true"
                href="/checkout"
                value="Apply Cupon Code"
                class="proceed_btn ast_btn"
                >checkout
            </a>
            <a class="ast_btn popup-with-zoom-anim" href="#login-dialog" v-else @click="showLoginError('Please login to continue checkout')" >checkout</a>

        </div>
        </template>
        <template v-else>
                <h1>Your cart is currently empty.</h1>
                <p>You may check out all the available products and buy some in the shop.</p>
                <a href="/shop" class="proceed_btn ast_btn" style="margin-top:10px">Return to shop</a>
        </template>
        </div>

</template>

<script>
import Axios from 'axios';
import CartItem from "./CartItem.vue";
import Spinner from "./Spinner.vue";
import { eventBus } from '../app';
export default {
    props:["cart","auth","couponData"],
    components:{
        "cart-items":CartItem,
        "spinner":Spinner
    },
    data(){
        return{
            cartItems:[],
            subtotal:0,
            code:"",
            coupon:false,
            couponError:false,
            couponSuccess:false,
        }
    },
    methods:{
        handleQtyUpdate(data){
            // console.log(data);
            Axios.post("cart/update",data).then(response => {
                // console.log()
                this.cartItems = Object.values(response.data.cart);
                this.subtotal = response.data.total;
                this.coupon =false;
                this.couponError = false;
            }).catch(error => {
                console.log(error)

            })
        },
        applyCoupon(){
            this.coupon =false;
            this.couponError = false;
            Axios.post("cart/coupon-apply",{code:this.code}).then(response => {
                // console.log(response.data)
                if(response.data.error===true){
                    this.couponError = response.data.message;
                }
                if(response.data.success===true){
                    this.coupon = response.data;
                    this.subtotal = response.data.subtotal;
                }
            }).catch(error => {
                /* if(error.response.status===422 || error.response.status===404){
                    this.couponError = error.response.data.message;
                } */
                
            })
        },
        showLoginError(msg){
            eventBus.$emit("showLoginError",msg);
        }
    },
    created(){
        let cart = JSON.parse(this.cart);
        this.cartItems = Object.values(cart.items);
        this.subtotal = cart.subtotal;
        // console.log(this.couponData)
        if(this.couponData!='false'){
            let coupon = JSON.parse(this.couponData);
            this.coupon = coupon;
            this.coupon.discount = coupon.discountAmount_str;
            this.code = coupon.code;
            this.subtotal = coupon.subtotal;
            // console.log(coupon)
        }
    }
};
</script>

<style>
.cart-overlay{
     height: 350px;
    width: 108%;
    position: absolute;
    background: rgba(0,0,0,0.5);
    top: -25px;
    left: -4%;
    display: none;
}
</style>
