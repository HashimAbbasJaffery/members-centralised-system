
<x-layout>
	
	<main class="content" id="app">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">Members</h1>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Members List</h5>
						</div>
						<div style="margin-top: 20px; margin-right: 20px;">
							<input type="text" id="search" style="width: 24%; float: right; margin-top: 30px;" class="form-control" v-model="keyword" placeholder="Search">
							<label for="per_page" style="margin-left: 20px; margin-bottom: 5px;">Per Page</label>
							<select v-model="perpage" id="per_page" class="form-select" style="width: 13%; margin-left: 20px;" aria-label="Default select example">
								<option selected>Per page</option>
								<option value="10">10</option>
								<option value="25">25</option>
								<option value="50">50</option>
								<option value="100">100</option>
							</select>
						</div>
						<div class="card-body" style="overflow: scroll;">
							<table class="table table-hover my-0" style="font-size: 10px;">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Gender</th>
										<th>DOB</th>
										<th>Passport</th>
										<th>Email</th>
                                        <th>Partial Paid</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
										<tr v-for="(member, index) in members" :class="{ 'highlighted': member.highlighted == 'highlighted' }">
											<td v-text="index + 1" :class="{ 'highlighted': member.highlighted == 'highlighted' }"></td>
											<td v-text="member.name" :class="{ 'highlighted': member.highlighted == 'highlighted' }"></td>
											<td v-text="member.gender" :class="{ 'highlighted': member.highlighted == 'highlighted' }"></td>
											<td v-text="member.dob" :class="{ 'highlighted': member.highlighted == 'highlighted' }"></td>
											<td v-text="member.passport" :class="{ 'highlighted': member.highlighted == 'highlighted' }"></td>
											<td v-text="member.email" :class="{ 'highlighted': member.highlighted == 'highlighted' }"></td>
											<td v-html="member.is_partial_paid === true ? 'Yes' : 'No'"></td>
											<td :class="{ 'highlighted': member.highlighted == 'highlighted' }">
												<div style="display: flex;">
													<button @click="deleteMember(member.id)" style="font-size: 10px; margin-right: 10px;" class="btn btn-danger">
														<i class="fa-solid fa-trash"></i>
													</button>
													<button @click="updateMember(member.id)" style="font-size: 10px; margin-right: 10px;" class="btn btn-primary">
														<i class="fa-solid fa-edit"></i>
													</button>
												</div>
											</td>
										</tr>
								</tbody>
							</table>
							<nav aria-label="Page navigation example" style="margin-top: 20px;">
								<ul class="pagination">
								  <li class="page-item" :class="{ 'active': page.label == current_page }" @click="visitPage(page.url)" v-for="page in member_pages"><a class="page-link" href="#" v-html="page.label"></a></li>
								</ul>
							</nav>
						</div>
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
						members: [],
						member_pages: [],
						current_page: "1",
						keyword: "",
						perpage: 10
					}
				},
				mounted() {
					this.getRecord(route("api.members.index", { type: "member" }));
				},
				watch: {
					keyword(newValue) {
						this.getRecord(route("api.members.index", { keyword: newValue, per_page: this.perpage, type: "member" }));
					},
					perpage(newValue) {
						this.getRecord(route("api.members.index", { per_page: newValue, keyword: this.keyword, type: "member" }));
					}
				},
				methods: {
					getQueryParams() {
						return {
							current_page: this.current_page,
							per_page: this.perpage,
							keyword: this.keyword
						}
					},
					async getRecord(url) {
						const response = await axios.get(url);
						this.members = response.data.data;
						this.member_pages = response.data.meta.links;
						this.current_page = response.data.meta.current_page;
					},
					visitPage(url) {
						this.getRecord(url);
					},
					async deleteMember(id) {
						const isConfirm = confirm("Are you sure you want to delete?");
						if(!isConfirm) return;

						const response = await axios.post(route("api.members.destroy", { member: id, _method: "DELETE"}) );
						const status = response.status;
			
						this.members = this.members.filter(member => member.id !== id);
					},

					async highlight(id) {
						const response = await axios.put(route("api.members.highlight", { member: id }));

						this.members.forEach(member => {
							if(member.id == id) {
								member.highlighted = member.highlighted === "highlighted" ? "" : "highlighted";
							}
						});
					},
					
					addToRecovery(id) {
						window.location = route("member.create.recovery", { member: id });
					},

					updateMember(id) {
						window.location = route("update.member-details", { member: id });
					}
				}
			}).mount("#app");
		</script>
	@endpush
</x-layout>
