<template>
  <div>
    <h4>review</h4>
    <p>there are no reviews yet</p>
    <h4>add a review</h4>
    <p>Your email address will not be published.</p>
    <form class="ast_review_form">
      <textarea @blur="$v.review.$touch"  placeholder="Your Review" rows="6" v-model.trim="$v.review.$model"></textarea>
       <span v-if="!$v.review.required" class="invalid-feedback" role="alert" >
            <strong>The Name field is required.</strong>
        </span>   
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <select class="select-opt">
            <option value="">5 ★★★★★</option>
            <option value="">4 ★★★★</option>
            <option value="">3 ★★★</option>
            <option value="">2 ★★</option>
            <option value="">1 ★</option>
          </select>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <input type="text" placeholder="Your Name" v-model.trim="$v.name.$model" />
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <input type="text" placeholder="Your Email" v-model.trim="$v.email.$model" />
        </div>
      </div>
      <a href="#" class="ast_btn">submit</a>
    </form>
  </div>
</template>

<script>
import { required,email,minLength,between	 } from 'vuelidate/lib/validators';
export default {
    validations :{
        name:{
            required,
            minLength:minLength(3)
        },
        email:{
            required,
            email,
        },
        rating:{
            required,
            between:{min:1,max:5}
        },
        review:{
            required,
        }
    }
};
</script>

<style>
.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}


</style>