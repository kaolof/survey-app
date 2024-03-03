<template>
    <AuthenticatedLayout>
      
      <div class="container mt-4  d-flex flex-column ">
        
        <div class="d-flex align-self-center flex-column" >
          <h2 class="my-1" style="font-size:1.5rem">Questions:</h2>
          <p class="my-1" v-for="(question, index) in questions">
            {{ index+1 }}) {{ question.question }}
          </p>
        </div>
        
        <graphics></graphics>
      </div>
      
    </AuthenticatedLayout>
    
  </template>
  
  <script>

  import graphics from '../../Components/Graphics.vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { usePage } from '@inertiajs/vue3'
  
  
  export default {
    
    components: { graphics, AuthenticatedLayout},
    setup() {
    const { props: { questions } } = usePage();
    
    return {
      questions,
    }
  },
  }
 
    

  </script>