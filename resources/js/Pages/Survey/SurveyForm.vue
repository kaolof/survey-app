<template>
  <AuthenticatedLayout>
    <div class="d-flex justify-content-center">
      <div class="container m-5" >
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="card m-2" v-if="viewGraphics===false">
              <div class="card-header d-flex justify-content-center">
                Page {{ currentPage }} of {{ totalPages }}
              </div>
              <div class="card-body">
                <form @submit.prevent="submit">
                  
                  <div v-for="(question, index) in currentQuestions" :key="index" class="mt-4">
                    <p>{{ (currentPage - 1) * questionsPerPage + index + 1 }}) {{ question.question }}</p>
                    <select class="form-select" v-model="responses[question.id]" :name="'group'+(index + 1)" required @click="validateForm">
                      <option disabled selected value="">Seleccione una opción</option>
                      <option v-for="value in [1, 2, 3, 4, 5]" :key="value" :value="value">{{ value }}</option>
                    </select>
                    <!-- <div class="form-check form-check-inline m-2" v-for="value in [1, 2, 3, 4, 5]" :key="value">
                        
                        <input type="radio" :value="value" v-model="responses[question.id]" :name="'group'+(index + 1)" class="form-check-input">
                        <label class="form-check-label">{{ value }}</label>
                    </div> --> 
                  </div> 
                  
                </form>
                <!-- buttons -->
                <div v-if="currentPage < totalPages" class="d-flex justify-content-end">
                  <button  @click="nextPage"  type="button" class="btn btn-outline-primary  mt-3">Next</button>
                </div>
    
                <div v-else class="d-flex justify-content-between">
                  <button  @click="previousPage" type="button" class="btn btn-outline-primary  mt-3">Previous</button>
                  <button  @click="submit" type="submit" :disabled="disabledButton" class="btn btn-outline-success mt-3">Submit</button>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    
      <!-- Average Responses -->
    
      <div v-if="viewGraphics" class="container m-5 justify-content-center row">
        <div class="p-3 mb-2 bg-success-subtle text-success-emphasis">You succesfully completed the survey. These are the average answers provided by all users in this app.</div>
        
        <graphics ></graphics>
      </div>
    </div>
  </AuthenticatedLayout>
  
  
</template>

<script>
import { usePage } from '@inertiajs/vue3'
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'
//import navbar from '../../Components/Navbar.vue';
import graphics from '../../Components/Graphics.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


export default {
  components: {
    graphics,
    AuthenticatedLayout
  },
  setup() {
    const { props: { questions } } = usePage();
    const responses = {};
    const submitResponses={};

    questions.forEach(question => {
      responses[question.id] = null;
    });

    //console.log(responses)

    const currentPage = ref(1);
    let disabledButton=ref(true);
    let viewGraphics=ref(false);
    const questionsPerPage = 5;

    return {
      questions,
      responses,
      currentPage,
      questionsPerPage,
      submitResponses,
      disabledButton,
      viewGraphics
    }
  },

  computed: {
    totalPages() {
      return Math.ceil(this.questions.length / this.questionsPerPage);
    },
    currentQuestions() {
      const startIndex = (this.currentPage - 1) * this.questionsPerPage;
      const endIndex = startIndex + this.questionsPerPage;
      return this.questions.slice(startIndex, endIndex);
    },

    
  },


  methods: {
    nextPage() {
      this.currentPage++;
    },
    previousPage() {
      this.currentPage--;
    },

    validateForm() {
      let count=0;
      for (const i in this.responses) {
        
        console.log(this.responses[i])
        
        if (this.responses[i] === null) {
          count++;
        }
      }
    console.log('count '+count)

    if(count>0){
      this.disabledButton=true
      console.log(this.disabledButton)
    }else{
      this.disabledButton=false
      console.log(this.disabledButton)
    }
  },
    
    submit() {

      //console.log(this.responses)
      this.viewGraphics=true;
      const formattedResponses = Object.entries(this.responses).map(([questionId, selectedValue]) => ({
        question_id: questionId,
        survey_id: 1,
        value: selectedValue
      }))
      console.log(formattedResponses)
      router.post('/submit-form', formattedResponses)
      return redirect('/survey/1/questions');
    },

  }
};
</script>