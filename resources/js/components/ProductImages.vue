<template>
<div class="images">
    <div v-for="(image,i) in images" :key="image.id" class="image">
        <span @click="removeImage(image.id,i)" class=" cross"><i class="mdi mdi-close font-18"></i></span>
        <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" :src="image.url" data-holder-rendered="true">
    </div>
</div>
</template>

<script>
import swal from 'sweetalert';
import Axios from 'axios';
export default {
    props:["imagesArr"],
    data(){
        return{
            images:[]
        }
    },
    methods:{
        removeImage(id,index){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    Axios.post("admin/product/image/delete",{id:id}).then(response => {
                         swal("Success! Image has been deleted!", {
                             icon: "success",
                        });
                        this.images.splice(index,1);
                    }).catch(error => {
                        swal({
                            title: "Oops!",
                            text: "Something went wrong, please try again!",
                            icon: "error",
                        });
                    })
                }
            });           
        },
    },
    created(){
        this.images= JSON.parse(this.imagesArr);
        console.log(this.images)
    }
}
</script>

<style scoped>
    .images{
        display: flex;
        flex-direction:row;
        justify-content: center;
        margin-top: 20px;
    }
    .image{
        margin: 5px;
        position: relative;
    }
    .cross{
       position: absolute;
        right: 0;
        height: 20px;
        width: 20px;
        background: red;
        border-radius: 20px;
        color: white;
    /* text-align: center; */
        display: flex;
        justify-content: center;
        align-items: center;
        /* box-shadow: 3px 3px 3px 1px #4e4e4e; */
        cursor: pointer;
    }
</style> 