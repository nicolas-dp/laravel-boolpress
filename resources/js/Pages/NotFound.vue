<template>
  <div class="page">
    <div class="p-5 bg-dark text-white">
      <div class="container">
        <h1>Pagina non trovata</h1>
      </div>
    </div>

    <div class="container">
        The Page Request was not found try to visit these pages

        <ul>
            <li>
                <router-link :to="{name: 'home'}">Home</router-link>
            </li>
            <li>
                <router-link :to="{name: 'about'}">About</router-link>
            </li>
            <li>
                <router-link :to="{name: 'posts'}">Posts</router-link>
            </li>
        </ul>
        
    </div>
  </div>
</template>

<script>
export default {
  name: 'NotFound',
};
</script>

<style>
</style>