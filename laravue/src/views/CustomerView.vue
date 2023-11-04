<template>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Customer List</h1>
            <RouterLink to="/customers/create"
                ><button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addCustomerModal"
                >
                    Add Customer
                </button></RouterLink
            >
        </div>

        <!-- Table to Display Customers -->
        <table class="table">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Customer Name</th>
                    <th>Customer Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody v-if="customers.length > 0">
                <tr v-for="(customer, index) in customers" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ customer.name }}</td>
                    <td>
                        <div class="container d-inline">
                            <img
                                :src="customer.image"
                                alt=""
                                class="img-fluid h-50 rounded"
                                :style="{ 'max-width': '200px' }"
                            />
                        </div>
                    </td>
                    <td>
                        <div class="d-flex">
                            <RouterLink to="/">
                                <button class="btn btn-dark">Show</button>
                            </RouterLink>
                            <RouterLink to="/">
                                <button class="btn btn-warning mx-2">
                                    Edit
                                </button>
                            </RouterLink>
                            <RouterLink to="/">
                                <button class="btn btn-danger">Delete</button>
                            </RouterLink>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="4" class="text-center">
                        <img
                            src="https://th.bing.com/th/id/R.e4b6323e19e57f6761b1ce47b7d329e0?rik=D4%2b%2fTxSGPiWP2g&pid=ImgRaw&r=0"
                            alt="Loading..."
                            class="img-fluid w-25 h-25"
                        />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Customer",
    data() {
        return {
            customers: [],
        };
    },
    mounted() {
        this.getCustomers();
    },
    methods: {
        getCustomers() {
            axios
                .get("http://127.0.0.1:8000/api/v1/customers")
                .then((response) => {
                    this.customers = response.data.data; // Update the customers data property
                    console.log(this.customers);
                })
                .catch((error) => {
                    console.error("Error fetching customers:", error);
                });
        },
    },
};
</script>
