<template>
  <div class="single-page">
    <div class="container">
      <img :src="'/storage/' + post.cover_image" :alt="post.title" />
      <h1>{{ post.title }}</h1>
      <p>
        {{ post.content }}
      </p>
      <hr>
      <div class="category" v-if="post.category">
        <strong>Category: </strong> {{ post.category.name }}
      </div>
      
      <div class="tags" v-if="post.tags.length > 0">
        <strong>Tags: </strong>
        <ul>
          <li v-for="tag in post.tags" :key="tag.id">
            {{ tag.name }}
          </li>
        </ul>
      </div>
      <div class="no-tags" v-if="post.tags.lenght > 0">
        <strong>Tags: </strong>
        <ul>
          <li>NO tags</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  name: "Post",
  data() {
    return {
      post: "",
    };
  },
  mounted() {
    Axios.get("/api/posts/" + this.$route.params.slug)
      .then((response) => {
        //console.log(response.data);
        this.post = response.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>