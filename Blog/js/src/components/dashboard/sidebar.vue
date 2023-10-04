<template>
  <aside>
    <div class="side-header">
      <img src="/logo.png" alt="">
      <h3>devtriad</h3>
    </div>
    <ul>
      <li>
        <i class="fa-solid fa-house"></i>
        <RouterLink to="/">home</RouterLink>
      </li>
      <li>
        <i class="fa-solid fa-newspaper"></i>
        <RouterLink to="/">articles</RouterLink>
      </li>
      <li>
        <i class="fa-solid fa-users"></i>
        <RouterLink to="/">users</RouterLink>
      </li>
      <li>
        <i class="fa-solid fa-envelope"></i>
        <RouterLink to="/">subscribers</RouterLink>
      </li>
      <li>
        <i class="fa-solid fa-address-book"></i>
        <RouterLink to="/">contact us</RouterLink>
      </li>
      <li>
        <i class="fa-solid fa-lock"></i>
        <RouterLink to="/">admins</RouterLink>
      </li>
    </ul>
  </aside>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    @import '../../styles/_variables';
    //for 425px and less
    @keyframes expandSidebar {
      from {
        width: 3rem; 
      }
      to {
        width: 50%; 
      }
    }
    @keyframes shrinkSidebar {
      from {
        width: 50%; 
      }
      to {
        width: 3rem; 
      }
    }
    //for 768px 
    @keyframes expandSidebar768 {
      from {
        width: 3rem; 
      }
      to {
        width: 30%; 
      }
    }
    @keyframes shrinkSidebar768 {
      from {
        width: 30%; 
      }
      to {
        width: 3rem; 
      }
    }
    aside { 
      z-index: 999;
      width: 13%;
      top: 0;
      height: 100vh;
      padding: 1rem 0; 
      background-color: $dashSecondary;
      transition: width 0.3s ease-in-out; 
      position: fixed;
      .side-header{
        display: flex;
        @include flex(_, center, _, _);
        margin-bottom: 2rem;
        img{
          height: 3rem;
        }
      }
      ul {
        li{
          @include flex(_, center, _, 1rem);
          height: 2.5rem;
          padding: 0 1rem;
          transition: 0.3s ease-in-out;
          &:hover {
            background-color: $dashLinkHover;

          }
          a {
            text-decoration: none;
            color: white;
            transition: 0.3s ease-in-out;
          }

        }
      }
    }
    @media screen and (max-width: 1024px) {
      aside { 
        width: 18%;
      }
    }
    @media screen and (max-width: 768px) {
      aside { 
        width: fit-content;
        .side-header{
          img {
            width: 3rem;
            height: 2.5rem;
          }
          h3{
            display: none;
          }
          width: 3rem;
        }
        ul {
          width: fit-content;
          li{
            width: fit-content;
            a {
              display: none;
            }
          }
      }
        &:hover  {
          width: 30%;
          animation: expandSidebar768 .3s ease-in-out; 
            .side-header{
              h3{
                display: block;
              }
            }
            ul {
              width: 100%;
              li{
                width: 100%;
                a {
                  display: block;
                }
              }
            }
          }
        }
      aside:not(:hover) {
        animation: shrinkSidebar768 .3s ease-in-out;
      }
    }
    
    @media screen and (max-width: 425px) {
      aside { 
        &:hover  {
          width: 50%;
          animation: expandSidebar .3s ease-in-out; 

        }
      }
      aside:not(:hover) {
        animation: shrinkSidebar .3s ease-in-out;
      }
    }
    @media screen and (max-width: 375px) {

    }
    @media screen and (max-width: 320px) {

    }
    
</style>