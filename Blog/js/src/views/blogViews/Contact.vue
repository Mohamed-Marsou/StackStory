<!--! Always use  ""<script setup>"" COMPOSITION API SYNTAX ALWAYS -->

<template>
    
    
    <div class="container">
        <h1>Contact Us</h1>
        <p>Hello! Do you have any questions or suggestions about this site, or just want to say Hi? Send me a message using below form. I will get back to you as soon as possible.</p>
        <form action="#" >
            <div class="form-group">
                
                <input type="text" id="fullname" name="fullname" placeholder="Full name"  required>
            </div>
            <div class="form-group">
                
                <input type="email" id="email" name="email"  placeholder="Email" required>
            </div>
            <div class="form-group">
                
                <input type="text" id="subject" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
                
                <textarea id="message" name="message" placeholder="Message" required></textarea>
            </div>
            <button type="submit">send Message</button>
        </form>
    </div>
      
  </template>
  
  <script  setup>
    
  </script>
  <style lang="scss" scoped>
  @import '../../styles/contact.scss';
  @import '../../styles/_variables.scss';
</style>
  
