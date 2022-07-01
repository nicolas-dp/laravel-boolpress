<template>
  <div class="single_page h-100">
    <div class="wrapper h-100" v-if="!loading">
      <div
        class="p-5 hero_image"
        :style="{
          backgroundImage: 'url(/storage/' + post.cover_image + ')',
          backgroundRepeat: 'no-repeat',
          backgroundSize: 'cover',
        }"
      >
        <div class="container">
          <h1 class="display-3">{{ post.title }}</h1>
          <p class="lead">{{ post.body }}</p>
          <hr class="my-2 bg-white" />
          <div class="row">
            <div class="col">
              <div class="author" v-if="post.user">
                <strong>Author: </strong> {{ post.user.name }}
              </div>
            </div>
            <div class="col" v-if="post.category">
              <strong>Category: </strong> {{ post.category.name }}
            </div>
            <div class="col" v-if="post.tags.length > 0">
              <strong>Tags: </strong>
              <span v-for="tag in post.tags" :key="tag.id">
                #{{ tag.name }}
              </span>
            </div>
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
  //Funzione created riachiama prima del mounted
  created() {
    Axios.get("/api/posts/" + this.$route.params.slug)
      .then((response) => {
        console.log(response.data);
        if (response.data.status_code === 404) {
          this.$router.push({ name: "not-found" });
          this.loading = false;
        } else {
          console.log(this.post);
          this.post = response.data;
          this.loading = false;
        }
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style lang="scss" scoped>
.hero_image {
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-blend-mode: overlay;
  background-color: rgba(255, 255, 255, 0.778);
  height: 100%;
  .container {
    color: black;
  }
}
</style>