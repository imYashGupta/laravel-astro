<template>
    <tr>
        <td>
            <span class="prod_thumb"
                ><img
                    :src="item.options.thumbnailUrl"
                    alt=""
                    class="img-responsive"
            /></span>
            <div class="product_details">
                <h4><a :href="item.options.url">{{item.name}}</a></h4>
            </div>
        </td>
        <td>&#128;{{item.price}}</td>
        <td>
            <input
                type="number"
                name="pro_quantity"
                v-model="quantity"
                class="pro_quantity"
                @change="qtyUpdate"
            />
        </td>
        <td>&euro;	{{item.subtotal}}</td>
        <td>
            <span @click="removeItem" class="close_pro"><i class="fa fa-trash"></i></span>
        </td>
    </tr>
</template>

<script>
export default {
    props: ["item"],
    data(){
        return{
            quantity:this.item.qty
        }
    },
    watch:{
        quantity(val){
            let {min_qty:min,max_qty:max} = this.item.options;
            // console.log(val)
            if(val < 0) {
                this.quantity = 0;
            }
            if(max!==null && val > max){
                this.quantity = max;
            }
            if(max!==null && val < min){
               this.quantity = 0;
            }
        }
    },
    methods:{
        removeItem(){
            this.$emit("qtyupdate",{qty:0,rowId:this.item.rowId,id:this.item.id});
        },
        qtyUpdate(){
            // console.log(this.quantity)
            this.$emit("qtyupdate",{qty:this.quantity,rowId:this.item.rowId,id:this.item.id});
        }
    },
    created(){
        // console.log(this.item);
    }
};
</script>

<style></style>
