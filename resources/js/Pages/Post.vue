<template>
  <div class="single-page">
    <div class="wrapper h-100" v-if="!loading">
      <div
        class="p-5 hero_image"
        :style="{ backgroundImage: 'url(/storage/' + post.image + ')' }"
      >
        <div class="container">
          <img :src="'/storage/' + post.cover_image" :alt="post.title" />
          <h1>{{ post.title }}</h1>
          <p>
            {{ post.content }}
          </p>
          <hr />
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
    </div>
    <div class="loading bg-dark text-center text-white" v-else>⏲️ Loading</div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  name: "Post",
  data() {
    return {
      post: "",
      loading: true,
    };
  },
  mounted() {
    Axios.get("/api/posts/" + this.$route.params.slug)
      .then((response) => {
        //console.log(response.data);
        this.post = response.data;
        this.loading = false;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style lang="scss" scoped>
.hero_image{
    background-repeat: no-repeat ;
    background-size: cover;
    background-position: center;
    background-blend-mode: overlay;
    background-color: rgba(255, 255, 255, 0.778);
    height: 100%;
    .container{
        color: black;
    }
}
</style>