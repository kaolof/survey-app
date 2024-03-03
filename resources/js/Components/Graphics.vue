<template>

    <div class="d-flex justify-content-center ">
        <div class="container m-5">
            <div class="row justify-content-center">
                <div>
                    <div class="card d-flex justify-content-center pe-4 ps-1 py-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                        <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
                    </div>  
                </div>
            </div>
        </div> 
    </div>


       
    
  </template>
  
  <script>
  import { Bar } from 'vue-chartjs'
  import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
  import { usePage } from '@inertiajs/vue3'
  
  
  ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
  
  export default {
    
    name: 'BarChart',
    components: { Bar },
    
    setup() {
        const { props: { averageResponses } } = usePage();

        const data = averageResponses.map(response => response.average_response);
        

        return {
        data
        }
  },
    data() {
      return {
        chartData: {
            
          labels: [ '1', '2', '3','4', '5', '6','7', '8', '9', '10' ],
          datasets: [ { 
            data: this.data,
            label: 'Users Average Answers',
            borderColor: [
                'rgba(144, 64, 205,0.6)',
            ],
            backgroundColor: [
                'rgba(144, 64, 205, 0.2)',
            ],
            borderWidth: 1,
        } ]
        },
        chartOptions: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Questions'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Answers'
                    },
                    suggestedMin: 1,
                    suggestedMax: 5,
                    ticks: {
                        // forces step size to be 50 units
                        stepSize: 1,
                    }
                }   
            },
        }
      }
    }
  }

  </script>