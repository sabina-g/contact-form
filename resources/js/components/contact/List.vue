<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"contactAdd"}' class="btn btn-primary">Add new contact information</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Contact</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>E-mail address</th>
                                <th>Name</th>
                                <th>Street / Housenumber</th>
                                <th>Zip code / City</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody v-if="contacts.length > 0">
                            <tr v-for="(contact,key) in contacts" :key="key">
                                <td>{{ contact.id }}</td>
                                <td>{{ contact.email }}</td>
                                <td>{{ contact.firstname }} {{ contact.lastname }}</td>
                                <td>{{ contact.street }} {{ contact.housenumber }}</td>
                                <td>{{ contact.zip }} {{ contact.city }}</td>
                                <td>
                                    <button type="button" @click="deleteContact(contact.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="6" align="center">No contacts found.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"contacts",
    data(){
        return {
            contacts:[],
            messages:''
        }
    },
    mounted(){
        this.getContacts()
    },
    methods:{
        async getContacts(){
            await this.axios.get('/api/contact').then(response=>{
                this.contacts = response.data
            }).catch(error=>{
                console.log(error)
                this.contacts = []
            })
        },
        deleteContact(id){
                this.axios.delete(`/api/contact/${id}`).then(response=>{
                    this.getContacts()
                }).catch(error=>{
                    console.log(error)
                })
            }
    }
}
</script>
