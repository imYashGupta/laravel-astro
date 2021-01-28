<template>
    <div class="row col-md-12  ">
        <div class="col-md-4">
            <div class="form-group">
                <label for="country">Country </label>
                <select v-model="selectedCountry"  name="_country" id="country" class="form-control" @change="findState($event)">
                    <option value="" disabled selected>Choose Country</option>
                    <option v-for="country in countries"  :value="country.id" :key="country.id">{{country.name}}</option>
                </select>
                <input type="hidden" name="country" :value="selectedCountry">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="state">State </label>
                <select name="_state" id="state" v-model="selectedState" class="form-control" @change="findCities()"> 
                    <option value="" disabled selected>Choose State</option>
                    <option v-for="state in states" :value="state.id" :key="state.id">{{ state.name }}</option>
                </select>
                <input type="hidden" name="state" :value="selectedState">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="city">City </label>
                <select name="_city" id="city" v-model="selectedCity" class="form-control"  > 
                    <option value="" disabled selected>Choose City</option>
                    <option v-for="city in cities" :value="city.id" :key="city.id">{{ city.name }}</option>
                </select>
                <input type="hidden" name="city" :value="selectedCity">
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props:["dataCountries","country","state","city"],
    data(){
        return {
            countries:[],
            selectedCountry:"",
            states:[],
            selectedState:"",
            cities:[],
            selectedCity:""
        }
    },
    methods:{
        findState(e){
            this.states = [];
            this.selectedState = "";
            this.cities = [];
            this.selectedCity = "";

            axios.post("api/world-data",{
                from:"states",
                fieldname:"country_id",
                data:this.selectedCountry
            }).then(response => {
                console.log(response)
                this.states = response.data;
            }).catch(error => {
                console.log(error);
            })
        },
        findCities(){
            this.cities = [];
            this.selectedCity = "";
            axios.post("api/world-data",{
                from:"cities",
                fieldname:"state_id",
                data:this.selectedState
            }).then(response => {
                console.log(response)
                this.cities = response.data;
            }).catch(error => {
                console.log(error);
            })
        }
    },
    created(){
        this.countries = JSON.parse(this.dataCountries);
        if(this.country!=null){
            this.selectedCountry = this.country;
            this.findState(); 
        }
        if(this.state!=null){
            this.selectedState = this.state;
            this.findCities();
        }
        if(this.city!=null){
            this.selectedCity = this.city;
        }
    }
};
</script>

<style></style>
