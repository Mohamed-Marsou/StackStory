<script setup>
const faqData = [
  {
    question: "Who are we?",
    answer:
      "We are a team of passionate IT professionals dedicated to providing innovative solutions and services to our clients. Our expertise spans a wide range of technologies and industries, and we are committed to delivering excellence in everything we do."
  },
  {
    question: "What is our company's mission?",
    answer:
      "Our mission is to empower businesses with cutting-edge technology solutions that drive growth and success. We strive to be a trusted partner in helping our clients achieve their goals through innovation and exceptional service."
  },
  {
    question: "What is our privacy policy?",
    answer:
      "Protecting your privacy is of utmost importance to us. Our privacy policy outlines how we collect, use, and safeguard your personal information when you visit our website or engage with our services. You can review our full privacy policy on our website."
  },
  {
    question: "How can I contact customer support?",
    answer:
      "We have a dedicated customer support team ready to assist you. You can reach our customer support by phone, email, or through the contact form on our website. We are here to address your inquiries and provide assistance with any issues you may encounter."
  },
  {
    question: "What are our core values?",
    answer:
      "Our core values include integrity, innovation, collaboration, and customer-centricity. We are committed to upholding these values in all our interactions and decisions, ensuring that we maintain the highest standards of professionalism and excellence."
  }
];

const showAnswer = (e)=>{
      const clickedWrapper = e.currentTarget;
      const answerSlot = clickedWrapper.querySelector(".answer__slot");

  // toggle the "showAnswer" class to the answer slot
  answerSlot.classList.toggle("showAnswer");
  }

</script>

<template>
  <main>

    <div class="container">
      <h1>Frequently Asked Questions</h1>

      <div class="wrapper" v-for="(data ,i) in faqData" :key="i" @click="showAnswer($event)">
        <div class="slot" >
          <p>{{ data.question }} </p>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="answer__slot">
          <p>{{ data.answer }} </p>
        </div>
      </div>

    </div>
  </main>
</template>
  

  
<style lang="scss" scoped>
@import '../../styles/_variables.scss';

main {
  width: 100%;
  min-height: 80vh;

  .container {
    width: 925px;
    height: fit-content;
    margin: 5rem auto;
    background-color: $secondary ;
    border-radius: 20px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.3);
    padding-bottom: 2rem !important;

    h1 {
      text-align: center;
      color: $text-headings;
      padding: 1rem;
    }

    .wrapper {
      overflow: hidden;
    }

    .slot {
      width: 80%;
      height: 3rem;
      border-radius: 50px;
      border: 1px solid $text-paragraphs;
      margin: 1rem auto;
      @include flx($jc: space-between);
      padding: 0 1rem;
      cursor: pointer;
    }

    .answer__slot {
      width: 80%;
      min-height: 4rem;
      border-radius: 18px;
      border: 1px solid #555;
      color: #c9c5c5;
      margin: 1rem auto;
      padding: 1rem;
      font-size: .9rem;
      transition: .3s ease-in-out;
      display: none;

      &:hover {
        color: #fff;
      }
    }
  }

}
@media screen and (max-width :1024px) {
  .container {
    width: 100% !important;
    border-radius: 0px !important;
  }
}
.showAnswer {
  display: block !important;
}
</style>
  
