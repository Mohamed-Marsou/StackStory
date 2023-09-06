<template>
    <div class="container">
      <h1>Frequently Asked Questions</h1>
      <div class="faq-item" v-for="(faq, index) in faqs" :key="index">
        <div class="question" @click="toggleAnswer(index)" :class="{ active: faq.active }">
          {{ faq.question }}
        </div>
        <div class="answer" v-show="faq.active">{{ faq.answer }}</div>
      </div>
    </div>
  </template>
  
  <script setup>
  const faqs = [
    {
      question: "Q1: What is this website about?",
      answer: "A1: This website provides information about various topics.",
      active: false,
    },
    {
      question: "Q2: How can I contact support?",
      answer: "A2: You can contact our support team through the contact page.",
      active: false,
    },
    {
      question: "Q3: Is registration required?",
      answer: "A3: Registration is not required to access most of our content.",
      active: false,
    },
    {
      question: "Q4: How do I reset my password?",
      answer:
        'A4: You can reset your password by visiting the "Forgot Password" page and following the instructions.',
      active: false,
    },
    {
      question: "Q5: What payment methods do you accept?",
      answer: "A5: We accept credit cards, PayPal, and other common payment methods.",
      active: false,
    },
  ];
  
  const toggleAnswer = (index) => {
    faqs[index].active = !faqs[index].active;
  };
  </script>
  
  <style lang="scss" scoped>
  @import '../../styles/faq.scss';
  @import '../../styles/_variables.scss';
  </style>
  
