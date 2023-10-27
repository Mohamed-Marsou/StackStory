<script>
  export default {
    props: {
      tagName: String,
      tagColor: String, 
      tags: Array,
    },
  };
</script>


<template>
    <div class="tag">
      <div :style="{ backgroundColor: tagColor }" class="tag-color"></div>
        <p class="tag-content">{{ tagName }}</p>
    </div>
</template>

<style lang="scss">
  @import '../../styles/_variables.scss';
  .tags{
    width: 100%;
    .tag{
      width: fit-content;
      padding: .2rem .7rem;
      border-radius: 50px;
      background-color: $light-grey-tags;
      transition: .5s ease-in-out;
      color: $text-paragraphs;
      text-transform: capitalize;
      cursor: pointer;
      @include flex(_, center, _, _);
      &:hover{
        background-color: $light-grey-tags-hover;
      }
      .tag-color{
        width: 0.5rem;
        height: 0.5rem;
        border-radius: 50%;
        margin-right: 8px;
      }
    }
  }
</style>