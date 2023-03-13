<template>
    <div class="card">
        <div class="card-header">
            <h4 class="mt-2">Add contact information</h4>
        </div>
        <div class="card-body">
            <form @submit.prevent="create">
                <div class="mb-3 row g-1">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="email" id="contactEmail" class="form-control" v-model="contact.email"
                                   placeholder="example@test.com" required>
                            <label for="contactEmail">E-mail address</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" id="contactFirstname" class="form-control"
                                   v-model="contact.firstname" placeholder="" required>
                            <label for="contactFirstname">Firstname</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" id="contactLastname" class="form-control"
                                   v-model="contact.lastname"
                                   placeholder="" required>
                            <label for="contactLastname">Lastname</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" id="contactStreet" class="form-control" v-model="contact.street"
                                   placeholder="">
                            <label for="contactStreet">Street</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" id="contactHousenumber" class="form-control"
                                   v-model="contact.housenumber" placeholder="">
                            <label for="contactHousenumber">Housenumber</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" id="contactZip" class="form-control" pattern="\d{5,5}(-\d{4,4})?"
                                   v-model="contact.zip" placeholder="">
                            <label for="contactZip">Zip code (5 digits)</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" id="contactCity" class="form-control" v-model="contact.city"
                                   placeholder="">
                            <label for="contactCity">City</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row g-1">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <br>
                </div>
            </form>
            <div class="mt-2" v-for="(errorArray, idx) in errorDetails" :key="idx">
                <div v-for="(allErrors, idx) in errorArray" :key="idx">
                    <span class="text-danger">{{ allErrors }} </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "add-contact",
    data() {
        return {
            contact: {
                email: "",
                firstname: "",
                lastname: "",
                street: "",
                housenumber: "",
                zip: "",
                city: ""
            },
            errorDetails: ''
        }
    },
    methods: {
        async create() {
            await this.axios
                .post('/api/contact', this.contact)
                .then(response => {
                    this.$router.push({name: "contactList"})
                })
                .catch(error => {
                    this.errorDetails = error.response.data.errors;
                })
        }
    }
}
</script>
