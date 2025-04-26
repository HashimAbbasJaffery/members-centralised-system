<x-layout>
    
	<main class="content" id="app">
		<div class="container-fluid p-0">
            <h5 class="h5 mb-3">Update Hashim Abbas in Recovery Members</h5>
        </div>
        <div class="rows" style="background: white !important; padding: 20px; border-radius: 5px;">
        <div class="row">
            <div class="col-3">
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
            <div class="col-3">
                <label for="phone_2" style="margin-bottom: 5px; margin-top: 10px;">Alternate Phone Number</label>
                <input type="text" class="form-control" v-model="alt_phone_number" id="phone_2" placeholder="Phone Number">
            </div>
            <div class="col-3">
                <label for="membership_type" style="margin-bottom: 5px; margin-top: 10px;">Membership Type</label>
                <select class="form-select mb-3" v-model="membership_type" id="membership_type">
                    <option selected="">Membership Type</option>
                    <option value="permanent">Permanent</option>
                    <option value="permanent+">Permanent+</option>
                    <option value="founder">Founder</option>
                    <option value="corporate">Corporate</option>
                    <option value="permanent se">Permanent S.E</option>
                </select>
            </div>
            <div class="col-3">
                <label for="phone_2" style="margin-bottom: 5px; margin-top: 10px;">Membership Number</label>
                <input type="text" class="form-control" v-model="membership_number" id="phone_2" placeholder="Membership Number">
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
                <button style="margin-top: 25px;" @click="submit" class="btn btn-primary">Submit</button>
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
    </main>
    @push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const app = Vue.createApp({
            data() {
                return {
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
                    sum: ""
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
                async submit() {
                    const response = await axios.put(route('api.recovery.update', { recovery: parseInt(route().params.recovery) }), this.getData(), {
                                        headers: {
                                            'Content-Type': 'application/json',
                                        }
                                    });
                    if(response.status === 200) {
                        window.location = route("member.add.recovery");
                    }
                }
            }
        }).mount("#app")
    </script>
    @endpush
</x-layout>