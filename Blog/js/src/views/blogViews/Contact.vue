
<template>
    <div class="container">
        <h1>Contact Us</h1>
        <p>Hello! Have any questions or suggestions for this site? <br /> Just drop me a message using the form below, and I'll get back to you soon.</p>

        <form action="#">
            <div class="form-group">

                <input type="text" id="fullname" name="fullname" placeholder="Full name" required>
            </div>
            <div class="form-group">

                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">

                <input type="text" id="subject" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">

                <textarea id="message" name="message" placeholder="Message" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>
</template>
  
<script  setup>

</script>
<style lang="scss" scoped>
@import '../../styles/_variables.scss';

.container {
    max-width: 800px;
    margin: 4rem auto;
    padding: 40px 20px;
    background-color: $secondary ;
    border-radius: 15px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.194);
}
h1,
p {
    text-align: center;
    margin-bottom: 1rem;
}
h1 {
    text-transform: uppercase;
}
p {
    font-size: .8rem;
}


.form-group {
    margin-bottom: 20px;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid $borders;
    border-radius: 20px;
    background: transparent;
    color: white;
}

textarea {
    height: 150px;
}

button {
    background-color: $accents;
    color: $text-headings;
    padding: 12px 20px;
    border: none;
    border-radius: 50px;
    cursor: pointer;

}

button:hover {
    background-color: $accents-hover;
}

/* Media Queries for Responsive */
@media (max-width: 768px) {
    .container {
        padding: 10px;
        border-radius:0;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        padding: 8px;
    }

    button {
        padding: 10px 15px;
    }
}
</style>
  
