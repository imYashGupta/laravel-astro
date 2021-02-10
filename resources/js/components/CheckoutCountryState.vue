<template>
    <div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="country" v-if="label">Country</label>
                <select
                    v-model="selectedCountry"
                    name="_country"
                    id="country"
                    class="form-control"
                    @change="findState($event)"
                    :class="countryError!==undefined ? 'is-error' : ''"
                >
                    <option value="" disabled selected>Choose Country</option>
                    <option
                        v-for="country in countries"
                        :value="country.id"
                        :key="country.id"
                        >{{ country.name }}</option
                    >
                </select>
                <input type="hidden" name="country" :value="selectedCountry" />
                <span v-if="countryError!==undefined" class="invalid-feedback d-block" role="alert">
                    <strong>{{ countryError }}</strong>
                </span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="state" v-if="label">State</label>
                <select  name="_state" id="state" v-model="selectedState" class="form-control" @change="findCities()"
                    :class="stateError!==undefined ? 'is-error' : ''"

                > 
                    <option value="" disabled selected>Choose State</option>
                    <option v-for="state in states" :value="state.id" :key="state.id">{{ state.name }}</option>
                </select>
                <input type="hidden" name="state" :value="selectedState">
                <span v-if="stateError!==undefined" class="invalid-feedback d-block" role="alert">
                    <strong>{{ stateError }}</strong>
                </span>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="city" v-if="label">City</label>
                 <select
                    :class="cityError!==undefined ? 'is-error' : ''"

                  name="_city" id="city" v-model="selectedCity" class="form-control"  > 
                    <option value="" disabled selected>Choose City</option>
                    <option v-for="city in cities" :value="city.id" :key="city.id">{{ city.name }}</option>
                </select>
                <input type="hidden" name="city" :value="selectedCity">
                <span v-if="cityError!==undefined" class="invalid-feedback d-block" role="alert">
                    <strong>{{ cityError }}</strong>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["dataCountries", "country", "state", "city","countryError","stateError","cityError","label"],
    data() {
        return {
            countries: [],
            selectedCountry: "",
            states: [],
            selectedState: "",
            cities: [],
            selectedCity: ""
        };
    },
    methods: {
        findState(e) {
            this.states = [];
            this.selectedState = "";
            this.cities = [];
            this.selectedCity = "";

            axios
                .post("api/world-data", {
                    from: "states",
                    fieldname: "country_id",
                    data: this.selectedCountry
                })
                .then(response => {
                    console.log(response);
                    this.states = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        findCities() {
            this.cities = [];
            this.selectedCity = "";
            axios
                .post("api/world-data", {
                    from: "cities",
                    fieldname: "state_id",
                    data: this.selectedState
                })
                .then(response => {
                    console.log(response);
                    this.cities = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.countries = JSON.parse(this.dataCountries);
        if (this.country != null) {
            this.selectedCountry = this.country;
            this.findState();
        }
        if (this.state != null) {
            this.selectedState = this.state;
            this.findCities();
        }
        if (this.city != null) {
            this.selectedCity = this.city;
        }
        console.log(this.cityError)
    }
};
</script>

<style></style>
