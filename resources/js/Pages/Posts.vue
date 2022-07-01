<template>
  <div>
    <h1>Posts</h1>
    <section class="posts">
      <div class="container">
        <div class="row">
          <div class="col-9">
            <div class="row row-cols-md-4">
              <div
                class="col p-3"
                v-for="post in postsResponse.data"
                :key="post.id"
              >
                <div class="prodct card">
                  <img :src="post.cover_image" :alt="post.title" />
                  <div class="card-body d-flex flex-column">
                    <h4>{{ post.title }}</h4>
                    <p v-if="post.content.length > 100">
                      {{ truncateString(post.content, 100) + "[...]" }}
                    </p>
                    <p v-else>
                      {{post.content}}
                    </p>
                    <router-link
                      class="btn btn-primary"
                      :to="{ name: 'post', params: { slug: post.slug } }"
                      >Read More</router-link
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-2">
            <section class="categories">
              <ul>
                <li class="list-unstyled fw-bold">Categorie</li>
                <li v-for="category in categories" :key="category.id">
                  {{ category.name }}
                </li>
              </ul>
            </section>

            <section class="tag">
              <ul>
                <li class="list-unstyled fw-bold">Tag</li>
                <li v-for="tag in tags" :key="tag.id">
                  {{ tag.name }}
                </li>
              </ul>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import WorkInProgress from "../components/WorkInProgress";
export default {
  name: "Posts",
  components: { WorkInProgress },
  data() {
    return {
      posts: "",
      postsResponse: "",
      categories: "",
      tags: "",
    };
  },

  methods: {
    getAllPosts(postPage) {
      axios
        .get("api/posts", {
          params: {
            page: postPage,
          },
        })
        .then((response) => {
          //console.log(response);
          this.postsResponse = response.data;

          //console.log(this.postsResponse); // Mi restituisce array di 9 elementi
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getAllCategories() {
      axios
        .get("api/categories")
        .then((response) => {
          //console.log(response);
          this.categories = response.data;
        })
        .catch((e) => {
          console.log(e);
        });
    },
    getAllTags() {
      axios
        .get("api/tags")
        .then((response) => {
          //console.log(response);
          this.tags = response.data;
        })
        .catch((e) => {
          console.log(e);
        });
    },

    truncateString(str, num) {
      if (str.length > num) {
        return str.slice(0, num) + "...";
      } else {
        return str;
      }
    },
  },

  mounted() {
    console.log("mounted");
    this.getAllPosts(1);
    this.getAllCategories();
    this.getAllTags();
  },
};
</script>

<style style lang="scss" scoped>
.card {
  img {
    aspect-ratio: 1 / 1;
  }
}

.card-body{
  
  padding: 1rem;
}
</style>