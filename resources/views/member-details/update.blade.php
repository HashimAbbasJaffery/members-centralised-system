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
                    <input type="date" class="form-control" v-model="dob" id="dob" placeholder="dob">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="passport" style="margin-bottom: 5px; margin-top: 10px;">Passport</label>
                    <input type="text" class="form-control" v-model="passport" id="passport" placeholder="passport">
                </div>
                <div class="col-4">
                    <label for="email" style="margin-bottom: 5px; margin-top: 10px;">Email</label>
                    <input type="email" class="form-control" v-model="email" id="email" placeholder="email">
                </div>
                <div class="col-4">
                    <label for="membership" style="margin-bottom: 5px; margin-top: 10px;">Membership</label>
                    <select class="form-select mb-3" v-model="memberships" id="membership">
                        <option selected="">Membership</option>
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}">{{ $membership->membership }}</option>
                        @endforeach
                    </select>
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
                    memberships: "{{ $member->membership_id }}"
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
                        membership_id: this.memberships
                    }
                },
                async submit(e, id) {
                    e.preventDefault();
                    const response = await axios.put(route("api.member-details.update", { member: id, ...this.getData() }));
                    if(response.data.status === 200) {
                        window.location = route('api.member-details');
                    }
                }
            }
        }).mount("#app")
    </script>
    @endpush
</x-layout>