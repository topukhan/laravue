<template>
    <div class="container mt-4">
        <h1>Create Customer</h1>

        <form @submit.prevent="createCustomer">
            <div class="form-group">
                <label for="customerName">Customer Name:</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="customerName"
                    v-model="model.customerName"
                />
            </div>

            <div class="form-group">
                <label for="customerImage">Customer Image:</label>
                <input
                    type="file"
                    class="form-control"
                    name="customerImage"
                    id="customerImage"
                    @change="handleImageChange"
                />
            </div>

            <div class="py-2">
                <button type="submit" @click="createCustomer" class="btn btn-primary">Create</button>
                <router-link to="/customers" class="btn btn-secondary ms-2"
                    >Back</router-link
                >
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "customerCreate",
    data() {
        return {
            model: {
                customerName: "",
                image: null, 
            },
        };
    },
    methods: {
        createCustomer() {
            axios
            .post('http://127.0.0.1:8000/api/v1/customers', this.model)
            .then(res => {
                console.log(res.data);
                alert(res.data.message)
            })
            // Create a new FormData object
            const formData = new FormData();
            formData.append("customerName", this.model.customerName);
            formData.append("image", this.model.image);

            // Now you can submit formData to your Laravel backend
            // using Axios or any other method
        },
        handleImageChange(event) {
            // Update the image property with the selected file
            this.model.image = event.target.files[0];
        },
    },
};
</script>
