<script setup>
import { usePage } from '@inertiajs/vue3'

const { props: { users } } = usePage();
const { props: { responseUsers } } = usePage();
const { props: { isAdmin } } = usePage();
console.log(responseUsers); 
console.log(users);
console.log(isAdmin);

const isUserResponded = (userId) => {
  return responseUsers.some(user => user.id === userId);
};


</script>

<template>

    <div v-if="isAdmin" class="container">
        <div class="row ">
            <div class="card my-4">
                <div class="card-body">
                <div class="card-header center">
                    Users information survey
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Survey Completed</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(user,index) in users" :key="index">
                        <th scope="row">{{user.id}}</th>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td v-if="isUserResponded(user.id)"> Completed ✅</td>
                        <td v-else>Pending ❌</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</template>
