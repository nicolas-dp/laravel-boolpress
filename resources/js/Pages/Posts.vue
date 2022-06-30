<template>
  <div>
    <h1>Posts</h1>
    <work-in-progress></work-in-progress>
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
                  <img height="200" :src="post.cover_image" :alt="post.title" />
                  <div class="card-body" style="height: 15rem">
                    <h4>{{ post.title }}</h4>
                    <p v-if="post.content.length > 100">
                      {{ post.content.substring(0, 100) + "[...]" }}
                      <a href="#">Read more</a>
                    </p>
                    <p v-else>{{ post.content }}</p>
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
          console.log(response);
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
          console.log(response);
          this.tags = response.data;
        })
        .catch((e) => {
          console.log(e);
        });
    },

    textTruncate(response) {
      console.log(this.response);
      //testocompleto = postsResponse.data.content;

      //Se la stringa è più lunga di 20 caratteri la taglio e metto i puntini
      /*  if (testocompleto.length > 20) {
        anteprima = testocompleto.substr(0, 20) + "...";
        console.log(anteprima);
      }
      //In caso contrario la stampo per intero
      else {
        anteprima = testocompleto;
      }

      //Stampo a video il risultato
      document.write(anteprima); */
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

<style>
</style>