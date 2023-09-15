<template>
    <div class="main-container">
        <h1>home</h1>
        <div class="widget-container">
            <div class="widget">
                <i class="fa-solid fa-users"></i>                <div class="widget-content">
                    <h3>total users</h3>
                    <p>1552</p>
                </div>
            </div>
            <div class="widget">
                <i class="fa-solid fa-user-plus"></i>                <div class="widget-content">
                    <h3>users month</h3>
                    <p>42</p>
                </div>
            </div>
            <div class="widget">
                <i class="fa-solid fa-box-archive"></i>                <div class="widget-content">
                    <h3>total articles</h3>
                    <p>23</p>
                </div>
            </div>
            <div class="widget">
                <i class="fa-regular fa-newspaper"></i>
                <div class="widget-content">
                    <h3>articles month</h3>
                    <p>266</p>
                </div>
            </div>
        </div>
        <div class="charts">
            <div class="users-signed">
                <h1>users signed in</h1>
                <canvas ref="usersCanvas"></canvas>
            </div>
            <div class="views">
                <h1>views per month</h1>
                <canvas ref="viewsCanvas"></canvas>
            </div>
        </div>
        <div class="comments">
            <h1>comments table</h1>
        </div>
        <div class="comments">
            <h1>contact us table</h1>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Chart from 'chart.js/auto';

const usersCanvas = ref(null); // Use a different variable name
const viewsCanvas = ref(null); // Use a different variable name

onMounted(() => {
  // Chart for users
  const usersSigned = usersCanvas.value.getContext('2d');

  // Define month names
  const months = [
    'January', 'February', 'March', 'April',
    'May', 'June', 'July', 'August',
    'September', 'October', 'November', 'December'
  ];

  // Create the users chart
  new Chart(usersSigned, {
    type: 'bar',
    data: {
      labels: months, 
      datasets: [
        {
          label: 'users',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
          data: [65, 59, 80, 81, 56, 55, 40, 56, 55, 40, 56, 40], // Replace with your data
        },
      ],
    },
    options: {
      // Chart configuration options here
    },
  });

  // Chart for views
  const viewsChart = viewsCanvas.value.getContext('2d'); // Use a different variable name

  // Create the views chart
  new Chart(viewsChart, {
    type: 'line',
    data: {
      labels: months, 
      datasets: [
        {
          label: 'views',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
          data: [65, 59, 80, 81, 56, 55, 40, 56, 55, 40, 56, 40], // Replace with your data
        },
      ],
    },
    options: {
        onProgress: function(animation) {
            progress.value = animation.currentStep / animation.numSteps;
        }
    },
  });
});
</script>

<style lang="scss" scoped>
    @import "../../styles/_variables";
    
    .main-container {
        padding: 5rem 1rem 0 13rem;
        width: 100%;
        background-color: $dashMain;
        text-transform: capitalize;
        color:  $secondaryText;

        h1{
            width: fit-content;
            font-weight: 400;
            margin: 0 0 1rem 0;
        }
        .widget-container {
            @include flex(space-around, _, _, _);
            flex-wrap: wrap;
            padding: 1rem;
            background-color: $dashSecondary;
            border-radius: 15px;
            .widget {
                background-color: $dashMain;
                min-width: 23%;
                @include flex(center, center, _, 2rem);
                height: 6rem;
                border-radius: 15px;
                .widget-content{
                    p {
                        color: white;
                    }
                }
                i{
                    font-size: 32px;
                    color: rgba(75, 192, 192, 0.55);

                }
            }
        }
        .charts {
            width: 100%;
            margin: 1rem 0;
            display: flex;
            background-color: $dashSecondary;
            border-radius: 15px;
            padding: 2rem 1rem;
            div{
                width: 50%;

                h1{ 
                    margin: 0 auto;
                }
            }

        }

        .comments{
            width: 100%;
            height: 50vh;
        }
    }
    @media screen and (max-width: 1024px) {
        .main-container {
            .widget-container {
                padding: 1rem;
                .widget {
                    width: 23%;
                    @include flex(center, center, _, 1rem);
                    padding: 1rem;
                    .widget-content{
                        h3{
                            font-size: 16px;
                        }
                    }
                    i{
                        font-size: 24px;
                        color: white;

                    }
                }
            }
        }
    }
    @media screen and (max-width: 768px) {
        .main-container {
            padding: 5rem 2rem 0 5rem;
        }
    }
    @media screen and (max-width: 425px) {
        .main-container {
            .widget-container {
                @include flex(space-around, _, _, 1rem);

                .widget {
                    width: 90%;
                    .widget-content{
                        h3{
                            font-size: 16px;
                        }
                    }
                    i{
                        font-size: 24px;
                        color: white;

                    }
                }
            }
            .charts {
                gap: 1rem;
                flex-wrap: wrap;
                div{
                    width: 100%;
                    h1{ 
                        font-size: 18px;
                    }
                }
            }
        }
    }
    @media screen and (max-width: 375px) {
        .main-container {
            padding: 5rem 1rem 0 4rem;

        }
    }
</style>