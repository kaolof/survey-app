<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import usersTable from '../Components/UsersTable.vue';
import { usePage } from '@inertiajs/vue3'

const { props: { isAdmin } } = usePage();

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        
        
       <div class="d-flex justify-content-center">

        <div class="container m-5 ">
            <div class="card border border-0 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <h5 v-if="isAdmin" class="card-header">Hi Admin, you're logged!</h5>
                <h5 v-else class="card-header">You're logged!</h5>
                <div class="card-body">
                  <h5 class="card-title">Your opinion is important to us ❤️</h5>
                  <p class="card-text">Can you answer this survey?</p>
                  <a href="survey/1/questions" class="btn btn-primary mt-2">Sure!</a>
                </div>
              </div>

              <usersTable ></usersTable>
            </div>

       </div>
        

    </AuthenticatedLayout>
</template>
