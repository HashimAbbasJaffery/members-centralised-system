<x-layout>
    <link rel="stylesheet" href="https://unpkg.com/vue-toast-notification/dist/theme-sugar.css">
<script src="https://unpkg.com/vue-toast-notification"></script>
    <main class="content" id="app">
		<div class="container-fluid p-0">
            <h5 class="h5 mb-3">Update Hashim Abbas in Recovery Members</h5>
        </div>
        <div class="rows" style="background: white !important; padding: 20px; border-radius: 5px;">
        <div class="row">
            <div class="col-6">
                <label for="level" style="margin-bottom: 5px; margin-top: 10px;">Level</label>
                <select class="form-select mb-3" v-model="level" id="level">
                    <option selected="">Level</option>
                    <option value="regular">Regular</option>
                    <option value="level 1">Level 1 - Request for Payment</option>
                    <option value="level 2">Level 2 - Payment Reminder Letter</option>
                    <option value="level 3">Level 3 - Final Notice</option>
                    <option value="level 4">Level 4 - Membership Cancelled</option>
                    <option value="cleared">Cleared</option>
                    <option value="re-regularized">Re-regularized</option>
                </select>
            </div>
            <div class="col-6">
                <label for="phone_2" style="margin-bottom: 5px; margin-top: 10px;">Alternate Phone Number</label>
                <input type="text" class="form-control" v-model="alt_phone_number" id="phone_2" placeholder="Phone Number">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="installment_month" style="margin-bottom: 5px; margin-top: 10px;">Installment Month</label>
                <input type="text" class="form-control" v-model="installment_months" id="installment_month" placeholder="Installment Month">
            </div>
            <div class="col-6">
                <label for="file_number" style="margin-bottom: 5px; margin-top: 10px;">File Number</label>
                <input type="text" class="form-control" v-model="file_number" id="file_number" placeholder="Installment Month">
            </div>
        </div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-3">
                <label for="form_fee" style="margin-bottom: 5px; margin-top: 10px;">Form Fee</label>
                <input type="text" v-model="form_fee" class="form-control" id="form_fee" placeholder="Form Fee">
            </div>
            <div class="col-3">
                <label for="processing_fee" style="margin-bottom: 5px; margin-top: 10px;">Processing Fee</label>
                <input type="text" class="form-control" v-model="processing_fee" id="processing_fee" placeholder="Processing Fee">
            </div>
            <div class="col-3">
                <label for="first_payment" style="margin-bottom: 5px; margin-top: 10px;">First Payment</label>
                <input type="text" class="form-control" id="first_payment" v-model="first_payment" placeholder="First Payment">
            </div>
            <div class="col-3">
                <label for="total_installment" style="margin-bottom: 5px; margin-top: 10px;">Total Installment</label>
                <input type="text" class="form-control" id="total_installment" v-model="total_installment" placeholder="Total Installment">
            </div>
        </div>
        <div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-3">
                <button :disabled="is_updating_recovery" style="margin-top: 25px;" @click="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('member.add.recovery') }}" style="margin-top: 25px; margin-left: 10px;" class="btn btn-dark">Cancel</a>
            </div>
            <div class="col-3">&nbsp;</div>
            <div class="col-3">&nbsp;</div>
            <div class="col-3" style="float: right;">
                <label for="total_sum" style="margin-bottom: 5px; margin-top: 10px;">Total Sum</label>
                <input type="text" :value="total" class="form-control" id="total_sum" placeholder="Total Sum" disabled>
            </div>
        </div>
    </div>
    </div>
    <h5 class="h5 mb-3" style="margin-top: 10px;">{{ $member->name }}'s Basic Details</h5>
    <form id="form" @submit="submit_basic_member_form($event)">
        <div class="rows" style="background: white !important; padding: 20px; border-radius: 5px;">
          
          <!-- Row 1 -->
          <div class="row">
            <div class="col-4">
              <label for="name" style="margin-bottom: 5px; margin-top: 10px;">Name</label>
              <input type="text" class="form-control" v-model="name" id="name" placeholder="Name">
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
              <input type="date" v-model="dob" class="form-control" id="dob" placeholder="dob">
            </div>
          </div>
      
          <!-- Row 2 -->
          <div class="row">
            <div class="col-4">
              <label for="passport" style="margin-bottom: 5px; margin-top: 10px;">Passport</label>
              <input type="text" class="form-control" v-model="passport" id="passport" placeholder="Passport">
            </div>
            <div class="col-4">
              <label for="email" style="margin-bottom: 5px; margin-top: 10px;">Email</label>
              <input type="email" class="form-control" v-model="email" id="email" placeholder="Email">
            </div>
            <div class="col-4">
              <label for="membership" style="margin-bottom: 5px; margin-top: 10px;">Membership</label>
              <select class="form-select mb-3" v-model="membership" id="membership">
                <option selected="">Membership</option>
                <option value="1">Permanent</option>
                <option value="2">Permanent+</option>
                <option value="3">Permanent SE</option>
                <option value="4">Founder</option>
                <option value="5">Corporate</option>
              </select>
            </div>
          </div>
      
          <!-- Buttons -->
          <div class="mt-3">
            <button type="submit" :disabled="is_updating_member" class="btn btn-primary" v-text="is_updating_member ? 'Updating...' : 'Update'"></button>
          </div>
      
        </div>
      </form>
      
    </main>
    @push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    // Recovery Form member
                    level: "{{ $recovery->level }}",
                    alt_phone_number: "",
                    membership_type: "{{ $recovery->membership_type }}",
                    membership_number: "{{ $recovery->membership_number }}",
                    installment_months: "{{ $recovery->installment_months }}",
                    file_number: "{{ $recovery->file_number }}",
                    form_fee: "{{ $recovery->form_fee }}",
                    processing_fee: "{{ $recovery->processing_fee }}",
                    first_payment: "{{ $recovery->first_payment }}",
                    total_installment: "{{ $recovery->total_installment }}",
                    sum: "",

                    // Basic Member's form member
                    id: "{{ $member->id }}",
                    name: "{{ $member->name }}",
                    gender: "{{ $member->gender }}",
                    dob: "{{ $member->dob }}",
                    passport: "{{ $member->passport }}",
                    email: "{{ $member->email }}",
                    membership: "{{ $member->membership_id }}",

                    // Toast Notification
                    toast: VueToast.useToast(),

                    // Spinner flags
                    is_updating_member: false,
                    is_updating_recovery: false
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
                        id: parseInt(route().params.recovery),
                        level: this.level,
                        alt_phone_number: this.alt_phone_number,
                        membership_type: this.membership_type,
                        membership_number: this.membership_number,
                        installment_months: this.installment_months,
                        file_number: this.file_number,
                        form_fee: this.form_fee,
                        processing_fee: this.processing_fee,
                        first_payment: this.first_payment,
                        total_installment: this.total_installment,
                    }
                },
                getMemberData() {
                    return {
                        id: this.id,
                        name: this.name,
                        gender: this.gender,
                        dob: this.dob,
                        passport: this.passport,
                        email: this.email,
                        membership_id: this.membership
                    }
                },
                async submit() {
                    this.is_updating_recovery = true;
                    const response = await axios.put(route('api.recovery.update', { recovery: parseInt(route().params.recovery) }), this.getData(), {
                                        headers: {
                                            'Content-Type': 'application/json',
                                        }
                                    });
                    if(response.status === 200) {
                        this.toast.success("Recovery Data has been Updated!", {
                            position: "top-right",
                        });

                    }
                    this.is_updating_recovery = false;
                },

                async submit_basic_member_form(e) {
                    e.preventDefault();
                    this.is_updating_member = true;
                    const response = await axios.put(route("api.member-details.update", { member: parseInt(this.id), ...this.getMemberData() }));
                    console.log(response);
                    if(response.status === 200) {
                        this.toast.success("Member's basic details has been updated!", {
                            position: "top-right",
                        });
                    }
                    this.is_updating_member = false;
                }
            }
        });

        app.use(VueToast).mount("#app");
    </script>
    @endpush
</x-layout>