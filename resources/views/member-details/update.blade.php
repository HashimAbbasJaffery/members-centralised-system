<x-layout>
    <main class="content" id="app">
		<div class="container-fluid p-0">
            <h5 class="h5 mb-3">Update Hashim Abbas in Recovery Members</h5>
        </div>
        <form id="form" @submit="submit($event, '{{ $member->id }}')" method="">
            <div class="rows" style="background: white !important; padding: 20px; border-radius: 5px;">
            <div class="row">
                <div class="col-4">
                    <label for="name" style="margin-bottom: 5px; margin-top: 10px;">Name</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['name']?.[0]"></p>
                    <input type="text" class="form-control" :class="{ 'border border-danger': errors['name']?.[0].length }" v-model="name" id="name" placeholder="Name">
                </div>
                <div class="col-4">
                    <label for="gender" style="margin-bottom: 5px; margin-top: 10px;">Gender</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['gender']?.[0]"></p>
                    <select :class="{ 'border border-danger': errors['gender']?.[0].length }" class="form-select mb-3" v-model="gender" id="gender">
                        <option selected="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="dob" style="margin-bottom: 5px; margin-top: 10px;">Date of Birth</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['dob']?.[0]"></p>
                    <input type="date" class="form-control" :class="{ 'border border-danger': errors['dob']?.[0].length }" v-model="dob" id="dob" placeholder="dob">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="passport" style="margin-bottom: 5px; margin-top: 10px;">Passport</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['passport']?.[0]"></p>
                    <input type="text" class="form-control" :class="{ 'border border-danger': errors['passport']?.[0].length }" v-model="passport" id="passport" placeholder="passport">
                </div>
                <div class="col-4">
                    <label for="email" style="margin-bottom: 5px; margin-top: 10px;">Email</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['email']?.[0]"></p>
                    <input type="email" class="form-control" :class="{ 'border border-danger': errors['email']?.[0].length }" v-model="email" id="email" placeholder="email">
                </div>
                <div class="col-4">
                    <label for="membership" style="margin-bottom: 5px; margin-top: 10px;">Membership</label>
                    <select class="form-select mb-3" v-model="memberships" :class="{ 'border border-danger': errors['membership']?.[0].length }" id="membership">
                        <option selected="">Membership</option>
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}">{{ $membership->membership }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="membership_number" style="margin-bottom: 5px; margin-top: 10px;">Membership Number</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['membership_number']?.[0]"></p>
                    <input type="text" class="form-control" :class="{ 'border border-danger': errors['membership_number']?.[0].length }" v-model="membership_number" id="membership_number" placeholder="Membership Number">
                </div>
                <div class="col-3">
                    <label for="city" style="margin-bottom: 5px; margin-top: 10px;">City/Country</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['city']?.[0]"></p>
                    <input type="text" class="form-control" :class="{ 'border border-danger': errors['city']?.[0].length }" v-model="city" id="city" placeholder="City/Country">
                </div>
                <div class="col-3">
                    <label for="address" style="margin-bottom: 5px; margin-top: 10px;">Address</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['adress']?.[0]"></p>
                    <input type="text" class="form-control" :class="{ 'border border-danger': errors['adress']?.[0].length }" v-model="address" id="address" placeholder="Address">
                </div>
                <div class="col-3">
                    <label for="mobile" style="margin-bottom: 5px; margin-top: 10px;">Mobile</label>
                    <p class="text-danger" style="font-size: 10px; margin-bottom: 5px;" v-text="errors['mobile']?.[0]"></p>
                    <input type="text" class="form-control" :class="{ 'border border-danger': errors['mobile']?.[0].length }" v-model="mobile" id="mobile" placeholder="Mobile">
                </div>
            </div>
            <button class="btn btn-primary" style="margin-top: 20px;" type="submit">Submit</button>
                <a href="{{ route('api.member-details') }}" class="btn btn-dark" style="margin-top: 20px; margin-left: 10px;">Cancel</a>
            </div>
        </form>
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
                    name: "{{ $member->name }}",
                    gender: "{{ $member->gender ?? 1 }}",
                    dob: "{{ $member->dob }}",
                    passport: "{{ $member->passport }}",
                    email: "{{ $member->email }}",
                    memberships: "{{ $member->membership_id }}",
                    membership_number: "{{ $member->membership_number }}",
                    city: "{{ $member->city }}",
                    address: "{{ $member->adress }}",
                    mobile: "{{ $member->mobile }}",
                    errors: []
                }
            },
            methods: {
                getData() {
                    return {
                        id: parseInt(route().params.member),
                        name: this.name,
                        gender: this.gender,
                        dob: this.dob,
                        passport: this.passport,
                        email: this.email,
                        membership_id: this.memberships,
                        membership_number: this.membership_number,
                        city: this.city,
                        mobile: this.mobile,
                        adress: this.address
                    }
                },
                async submit(e, id) {
                    e.preventDefault();
                    try {
                        const response = await axios.put(route("api.member-details.update", { member: id, ...this.getData() }));
                        if(response.data.status === 200) {
                            window.location = route('api.member-details');
                        }
                    } catch(e) {
                        console.log(e);
                        if(e.response.data.status === 422) {
                            const errors = e.response.data.errors;
                            this.errors = errors;
                        }
                    }
                }
            }
        }).mount("#app")
    </script>
    @endpush
</x-layout>