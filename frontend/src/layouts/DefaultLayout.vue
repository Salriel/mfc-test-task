<template>
  <div class="h-screen">
    <Header/>
    <div class="m-10">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Header from "../components/Header.vue";
export default {
  name: "DefaultLayout",
  components: {
    Header
  }
}
</script>

<style scoped>

</style>