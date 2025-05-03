<x-layout>
    
	<main class="content" id="app">
		<div class="container-fluid p-0">
            <h1 class="h3 mb-3">Add Hashim Abbas in Introletter</h1>
        </div>
        <div class="rows" v-if="step === 1" style="background: white !important; padding: 20px; border-radius: 5px;">
        <div class="row">
            <div class="col-4">
                <label for="phone_2" style="margin-bottom: 5px; margin-top: 10px;">File Number</label>
                <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['file_number']?.[0]"></p>
                <input type="text" class="form-control" v-model="file_number" :class="{ 'border border-danger': errors['file_number']?.[0].length }" v-model="file_number" id="file_number" placeholder="File Number">
            
            </div>
            <div class="col-4">
                <label for="phone_2" style="margin-bottom: 5px; margin-top: 10px;">Date of Applying</label>
                <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['date_of_applying']?.[0]"></p>
                <input type="text" class="form-control" v-model="date_of_applying" :class="{ 'border border-danger': errors['date_of_applying']?.[0].length }" v-model="date_of_applying" id="date_of_applying" placeholder="Date of Applying">
            </div>
            <div class="col-4">
                <label for="merital" style="margin-bottom: 5px; margin-top: 10px;">Marital</label>
                <select class="form-select mb-3" v-model="marital_status" style="margin-top: 5px;" id="marital">
                    <option selected="">Marital Status</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="merital" style="margin-bottom: 5px; margin-top: 10px;">Membership Status</label>
                <select class="form-select mb-3" v-model="membership_status" id="membership_status">
                    <option selected="">Membership Status</option>
                    <option value="regular">Regular</option>
                    <option value="defaulter">Defaulter</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="col-6">
                <label for="city_country" style="margin-bottom: 5px;">City Country</label>
                <p class="text-danger" style="font-size: 10px; margin-bottom: 5px; margin-top: 10px;" v-text="errors['city_country']?.[0]"></p>
                <input type="text" class="form-control" v-model="city_country" :class="{ 'border border-danger': errors['city_country']?.[0].length }" id="city_country" placeholder="City Country">
            </div>
        </div>

        </div>

        <div class="rows" v-if="step === 2" style="background: white !important; padding: 20px; border-radius: 5px;">
            <div class="row">
                <div class="col-6">
                    <label for="spouse" style="margin-bottom: 5px; margin-top: 10px;">First Spouse</label>
                    <input type="text" class="form-control" v-model="spouses[0]" id="first_spouse" placeholder="First Spouse">
                </div>
                <div class="col-6">
                    <label for="spouse" style="margin-bottom: 5px; margin-top: 10px;">Second Spouse</label>
                    <input type="text" class="form-control" v-model="spouses[1]" id="second_spouse" placeholder="Second Spouse">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="spouse" style="margin-bottom: 5px; margin-top: 10px;">Third Spouse</label>
                    <input type="text" class="form-control" v-model="spouses[2]" id="third_spouse" placeholder="Third Spouse">
                </div>
                <div class="col-6">
                    <label for="spouse" style="margin-bottom: 5px; margin-top: 10px;">Fourth Spouse</label>
                    <input type="text" class="form-control" v-model="spouses[3]" id="fourth_spouse" placeholder="Fourth Spouse">
                </div>
            </div>
            </div>
            <div class="rows" v-if="step === 3" style="background: white !important; padding: 20px; border-radius: 5px;">
                <div class="row">
                    <div class="col-6">
                        <label for="first_child" style="margin-bottom: 5px; margin-top: 10px;">First Child</label>
                        <input type="text" class="form-control" v-model="children[0][0]" id="first_child" placeholder="First Child">
                    </div>
                    <div class="col-6">
                        <label for="first_child_dob" style="margin-bottom: 5px; margin-top: 10px;">First Child DOB</label>
                        <input type="date" class="form-control" v-model="children[0][1]" id="first_child_dob" placeholder="First Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="second_child" style="margin-bottom: 5px; margin-top: 10px;">Second Child</label>
                        <input type="text" class="form-control" v-model="children[1][0]" id="second_child" placeholder="Second Child">
                    </div>
                    <div class="col-6">
                        <label for="second_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Second Child DOB</label>
                        <input type="date" class="form-control" v-model="children[1][1]" id="second_child_dob" placeholder="Second Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="third_child" style="margin-bottom: 5px; margin-top: 10px;">Third Child</label>
                        <input type="text" class="form-control" v-model="children[2][0]" id="third_child" placeholder="Third Child">
                    </div>
                    <div class="col-6">
                        <label for="third_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Third Child DOB</label>
                        <input type="date" class="form-control" v-model="children[2][1]" id="third_child_dob" placeholder="Third Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="fourth_child" style="margin-bottom: 5px; margin-top: 10px;">Fourth Child</label>
                        <input type="text" class="form-control" v-model="children[3][0]" id="fourth_child" placeholder="Fourth Child">
                    </div>
                    <div class="col-6">
                        <label for="fourth_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Fourth Child DOB</label>
                        <input type="date" class="form-control" v-model="children[3][1]" id="fourth_child_dob" placeholder="Fifth Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="fifth_child" style="margin-bottom: 5px; margin-top: 10px;">Fifth Child</label>
                        <input type="text" class="form-control" v-model="children[4][0]" id="fifth_child" placeholder="Fifth Child">
                    </div>
                    <div class="col-6">
                        <label for="fifth_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Fifth Child DOB</label>
                        <input type="date" class="form-control" v-model="children[4][1]" id="fifth_child_dob" placeholder="Fifth Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="sixth_child" style="margin-bottom: 5px; margin-top: 10px;">Sixth Child</label>
                        <input type="text" class="form-control" v-model="children[5][0]" id="sixth_child" placeholder="Sixth Child">
                    </div>
                    <div class="col-6">
                        <label for="sixth_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Sixth Child DOB</label>
                        <input type="date" class="form-control" v-model="children[5][1]" id="sixth_child_dob" placeholder="Sixth Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="seventh_child" style="margin-bottom: 5px; margin-top: 10px;">Seventh Child</label>
                        <input type="text" class="form-control" v-model="children[6][0]" id="seventh_child" placeholder="Seventh Child">
                    </div>
                    <div class="col-6">
                        <label for="seventh_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Seventh Child DOB</label>
                        <input type="date" class="form-control" v-model="children[6][1]" id="seventh_child_dob" placeholder="Seventh Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="eighth_child" style="margin-bottom: 5px; margin-top: 10px;">Eighth Child</label>
                        <input type="text" class="form-control" v-model="children[7][0]" id="eighth_child" placeholder="Eighth Child">
                    </div>
                    <div class="col-6">
                        <label for="eighth_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Eighth Child DOB</label>
                        <input type="date" class="form-control" v-model="children[7][1]" id="eighth_child_dob" placeholder="Eighth Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="ninth_child" style="margin-bottom: 5px; margin-top: 10px;">Ninth Child</label>
                        <input type="text" class="form-control" v-model="children[8][0]" id="ninth_child" placeholder="Ninth Child">
                    </div>
                    <div class="col-6">
                        <label for="ninth_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Ninth Child DOB</label>
                        <input type="date" class="form-control" v-model="children[8][1]" id="ninth_child_dob" placeholder="Ninth Child DOB">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="tenth_child" style="margin-bottom: 5px; margin-top: 10px;">Tenth Child</label>
                        <input type="text" class="form-control" v-model="children[9][0]" id="tenth_child" placeholder="Tenth Child">
                    </div>
                    <div class="col-6">
                        <label for="tenth_child_dob" style="margin-bottom: 5px; margin-top: 10px;">Tenth Child DOB</label>
                        <input type="date" class="form-control" v-model="children[9][1]" id="tenth_child_dob" placeholder="Tenth Child DOB">
                    </div>
                </div>
            </div>
            <div style="margin-top: 10px; text-align: center;">
                <button :disabled="step === 1" class="btn btn-dark" @click="step--" style="margin: 0 auto; width: 10%; margin-top: 10px; margin-right: 10px;">Previous</button>
                <button v-if="step < finalStep" class="btn btn-primary" style="margin: 0 auto; width: 10%; margin-top: 10px;" @click="step++">Next</button>
                <button v-else class="btn btn-primary" style="margin: 0 auto; width: 10%; margin-top: 10px;" @click="submit">Submit</button>
            </div>
    </div>
    </div>
    </main>
    @push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    step: 1,
                    finalStep: 3,
                    children: 0,
                    file_number: "",
                    date_of_applying: "",
                    marital_status: "",
                    membership_status: "",
                    city_country: "",
                    spouses: [],
                    children: [[], [], [], [], [], [], [], [], [], []],
                    errors: []
                }
            },
            methods: {
                getData() {
                    return {
                        member_id: parseInt(route().params.member),
                        file_number: this.file_number,
                        date_of_applying: this.date_of_applying,
                        marital_status: this.marital_status,
                        membership_status: this.membership_status,
                        city_country: this.city_country,
                        spouses: this.spouses,
                        children: this.children
                    }
                },
                async submit() {
                    try {
                        const response = await axios.post(route("api.introletter.store", this.getData()));
                        if(response.status === 200) {
                            window.location = route("introletter.index");
                        }
                    } catch(e) {
                        console.log(e);
                        if(e.status === 422) {
                            this.errors = e.response.data.errors;
                        }
                    }
                }
            }
        }).mount("#app")
    </script>
    @endpush
</x-layout>