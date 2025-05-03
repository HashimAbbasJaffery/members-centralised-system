<x-layout>
    <main class="content" id="app">
		<div class="container-fluid p-0">
            <h1 class="h3 mb-3" v-text="step === 1 ? 'Add Member\'s detail' : 'Register in Introletter'"></h1>
        </div>
            <div class="rows" v-if="step === 1" style="background: white !important; padding: 20px; border-radius: 5px;">
              
              <!-- Row 1 -->
              <div class="row">
                <div class="col-4">
                  <label for="name" style="margin-bottom: 5px; margin-top: 10px;">Name</label>
                  <input type="text" v-model="name" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="col-4">
                  <label for="gender" style="margin-bottom: 5px; margin-top: 10px;">Gender</label>
                  <select class="form-select mb-3" v-model="gender" id="gender">
                    <option selected="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                <div class="col-4">
                  <label for="dob" style="margin-bottom: 5px; margin-top: 10px;">Date of Birth</label>
                  <input type="date" class="form-control" v-model="dob" id="dob" placeholder="dob">
                </div>
              </div>
          
              <!-- Row 2 -->
              <div class="row">
                <div class="col-4">
                  <label for="passport" style="margin-bottom: 5px; margin-top: 10px;">Passport</label>
                  <input type="text" class="form-control" id="passport" v-model="passport" placeholder="Passport">
                </div>
                <div class="col-4">
                  <label for="email" style="margin-bottom: 5px; margin-top: 10px;">Email</label>
                  <input type="email" class="form-control" id="email" v-model="email" placeholder="Email">
                </div>
                <div class="col-4">
                  <label for="membership" style="margin-bottom: 5px; margin-top: 10px;">Membership</label>
                  <select class="form-select mb-3" id="membership" v-model="membership_id">
                    <option selected="">Membership</option>
                    <option value="1">Permanent</option>
                    <option value="2">Permanent+</option>
                    <option value="3">Permanent SE</option>
                    <option value="4">Founder</option>
                    <option value="5">Corporate</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-3">
                    <label for="city" style="margin-bottom: 5px; margin-top: 10px;">City</label>
                    <input type="text" class="form-control" id="city" v-model="city" placeholder="Country/City">
                </div>
                <div class="col-3">
                    <label for="address" style="margin-bottom: 5px; margin-top: 10px;">Address</label>
                    <input type="text" class="form-control" id="address" v-model="address" placeholder="Address">
                </div>
                <div class="col-3">
                    <label for="mobile" style="margin-bottom: 5px; margin-top: 10px;">Mobile</label>
                    <input type="text" class="form-control" id="mobile" v-model="mobile" placeholder="Mobile">
                </div>
                <div class="col-3">
                    <label for="membership_number" style="margin-bottom: 5px; margin-top: 10px;">Membership No.</label>
                    <input type="text" class="form-control" id="membership_number" v-model="membership_number" placeholder="Membership No.">
                </div>
              </div>
              
          
            </div>
          
        <div class="row" v-if="step === 2" style="background: white !important; padding: 20px; border-radius: 5px;">
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
                    <select class="form-select mb-3" v-model="marital" style="margin-top: 5px;" id="marital">
                        <option selected="">Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="merital" style="margin-bottom: 5px; margin-top: 10px;">Membership Status</label>
                    <select class="form-select mb-3" v-model="membership_status" id="membership_status">
                        <option selected="">Membership Status</option>
                        <option value="regular">Regular</option>
                        <option value="defaulter">Defaulter</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" v-if="step === 3" style="background: white !important; padding: 20px; border-radius: 5px;">
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
        <div class="row" v-if="step === 4" style="background: white !important; padding: 20px; border-radius: 5px;">
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
        <div class="row" style="padding-top: 20px;">
            <div class="col-3">
                <button v-if="step < 4" @click="step++" style="margin-top: 25px; white-space: nowrap; font-size: 12px;" class="btn btn-primary">
                    Next
                </button>
                <button v-else style="margin-top: 25px; white-space: nowrap; font-size: 12px;" @click="submit" class="btn btn-primary">
                    Submit
                </button>
                <button style="margin-top: 25px; white-space: nowrap; font-size: 12px; margin-left: 10px;" @click="step--" class="btn btn-dark">
                    Back
                </button>
            </div>
        </div>
    </main>
    @push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const app = Vue.createApp({
            data() {
                return {

                    // Member's basic details input field
                    name: "",
                    gender: "",
                    dob: "",
                    passport: "",
                    email: "",
                    membership_id: "1",
                    city: "",
                    address: "",
                    mobile: "",
                    membership_number: "",

                    // Introletter (step 1)
                    file_number: "",
                    date_of_applying: "",
                    marital: "",
                    membership_status: "",

                    // Introletter (step 2)
                    spouses: [],
                    
                    // Introletter (step 3)
                    children: [[], [], [], [], [], [], [], [], [], []],
                 
                    // Steps in form
                    step: 1,

                    // Errors
                    errors: []
                }
            },
            computed: {
                total() {
                    let total = 0;

                    if(this.form_fee) total += parseInt(this.form_fee);
                    if(this.processing_fee) total += parseInt(this.processing_fee);
                    if(this.first_payment) total += parseInt(this.first_payment);
                    if(this.total_installment) total += parseInt(this.total_installment);

                    return total;
                }
            },
            methods: {
                getData() {
                    return {
                        // Introletter (step 1)
                        file_number: this.file_number,
                        date_of_applying: this.date_of_applying,
                        marital_status: this.marital,
                        membership_status: this.membership_status,
                        city_country: "-",
                        membership_number: this.membership_number,

                        // Introletter (step 2)
                        spouses: this.spouses,
                        
                        // Introletter (step 3)
                        children: this.children,
                    }
                },
                getMembersData() {

                    return {
                        name: this.name,
                        gender: this.gender,
                        dob: this.dob,
                        passport: this.passport,
                        email: this.email,
                        membership_id: this.membership_id,
                        city: this.city,
                        address: this.address,
                        mobile: this.mobile,
                        membership_number: this.membership_number
                    }

                },
                async submit() {
                    let member_id = "";
                    // Creating Member
                    const member_response = await axios.post(route('api.member-details.create', this.getMembersData()));
                    if(member_response.status === 200) {
                        member_id = member_response.data.data.id;
                    }


                    if(member_response.status !== 200 || !member_id) return;

                    const response = await axios.post(route("api.introletter.store", { ...this.getData(), member_id }));

                    if(response.status === 200) {
                        window.location = route("introletter.index");
                    }
                }
            }
        }).mount("#app")
    </script>
    @endpush
</x-layout>