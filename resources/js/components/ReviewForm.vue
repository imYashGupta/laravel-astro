<template>
  <div>
    <h4>review</h4>
        <template v-if="JSON.parse(reviews).length > 0">
    <ul style="padding: 0px; margin-top: 25px; margin-bottom: 25px">

      <li v-for="review in JSON.parse(reviews)" :key="review.id" style="list-style: none">
        <div class="ast_blog_comment" style="border-bottom:1px solid #ccc;margin-bottom:15px;">
          <div class="ast_comment_text">
            <h5 class="ast_bloger_name">
                {{review.name}} <span class="rating_star" v-html="renderStars(review.rating)"></span>
            </h5>
            <span class="ast_blog_date">{{review.created_at}}</span>
            <p class="ast_blog_post">
              {{review.review}}
            </p>
            
          </div>
        </div>
      </li>
    </ul>
        </template>
        <template v-else>
            <p>There are no reviews yet.</p>
            <h3>Be the first to review "{{productName}}"</h3>
        </template>
    <div class="clearfix"></div>
    <div v-if="showSuccess" class="alert alert-success" role="alert">
        <strong>Thank You!</strong> {{message}}
    </div>
    <div v-if="alreadyDone" class="alert alert-info" role="alert">
       {{message}}
    </div>
    <h4>add a review</h4>
    <p>Your email address will not be published.</p>
    <form class="ast_review_form">
      <textarea
        placeholder="Your Review"
        rows="6"
        v-model.trim="$v.review.$model"
        :style="$v.review.$error && 'margin-bottom: 0px;'"
      ></textarea>
      <div v-if="$v.review.$dirty">
        <p class="invalid-feedback" v-if="!$v.review.minLength">
          Please write few more words.
        </p>
        <p class="invalid-feedback" v-if="!$v.review.required">
          Please write a review.
        </p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <select class="select-opt" v-model="$v.rating.$model" required>
            <option value="5">5 ★★★★★</option>
            <option value="4">4 ★★★★</option>
            <option value="3">3 ★★★</option>
            <option value="2">2 ★★</option>
            <option value="1">1 ★</option>
          </select>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" v-if="auth == false">
          <input
            type="text"
            placeholder="Your Name"
            v-model.trim="$v.name.$model"
            style="margin-bottom: 0px"
          />
          <div v-if="$v.name.$dirty">
            <p class="invalid-feedback" v-if="!$v.name.minLength">
              Please enter a valid Name.
            </p>
            <p class="invalid-feedback" v-if="!$v.name.required">
              Name is required.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" v-if="auth == false">
          <input
            type="text"
            placeholder="Your Email"
            v-model.trim="$v.email.$model"
            style="margin-bottom: 0px"
          />
          <div v-if="$v.email.$dirty">
            <p class="invalid-feedback" v-if="!$v.email.email">
              Please enter a valid email address.
            </p>
            <p class="invalid-feedback" v-if="!$v.email.required">
              Email is required.
            </p>
          </div>
        </div>
      </div>
      <a href="#" @click.prevent="submit" class="ast_btn">submit</a>
    </form>
  </div>
</template>

<script>
import Axios from "axios";
import { required, email, minLength } from "vuelidate/lib/validators";
export default {
  props: ["route", "authenticated", "reviews","productName"],
  data() {
    return {
      name: "",
      email: "",
      rating: "5",
      review: "",
      auth: false,
      showSuccess:false,
      alreadyDone:false,
      message:"",
    };
  },
  validations: {
    name: {
      required,
      minLength: minLength(3),
    },
    email: {
      required,
      email,
    },
    rating: {
      required,
    },
    review: {
      required,
      minLength: minLength(15),
    },
  },
  methods: {
    renderStars(rating){
        return `<i class='fa fa-star mr-1px' aria-hidden='true'></i>`.repeat(rating)+`<i class='fa fa-star-o mr-1px' aria-hidden='true'></i>`.repeat(5-rating);
    },
    resetForm(){
      this.review = "";
      this.email = "";
      this.name = "";
    },
    submit() {
      if (this.$v.$invalid) {
        // console.log(this.$v);
        this.$v.$touch();
        return;
      }
      // console.log(this.authenticated == "false");
      Axios.post(this.route, {
        name: this.authenticated == "false" ? this.name : undefined,
        email: this.authenticated == "false" ? this.email : undefined,
        rating: this.rating,
        review: this.review,
      })
        .then((response) => {
            if(response.status===201){
                this.showSuccess = true;
                this.message = response.data.message;
                this.resetForm();
            }
            if(response.status===200){
                this.alreadyDone = true;
                this.message = response.data.message;
                this.resetForm();
            }
          // console.log(response);
                this.resetForm();

        })
        .catch((error) => {
          console.log(error);
                this.resetForm();
          
        });
    },
  },
  created() {
    // console.log(this.authenticated)
    if (this.authenticated != "false") {
  
      this.auth = JSON.parse(this.authenticated) ;
      this.email = this.auth.email;
      this.name = this.auth.name;
    }
    
  },
};
</script>

<style>
.invalid-feedback {
  display: block;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #832625;
}

.d-block {
  display: block;
}
.d-none {
  display: none;
}
.rating_star{
        font-family: 'Open Sans', sans-serif;
    font-size: 15px;
    line-height: 1.5;
    color: #777777;
    -webkit-font-smoothing: antialiased;
}
.mr-1px{
    margin-right: 3px;
}
</style>