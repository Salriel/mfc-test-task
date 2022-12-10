<template>
  <div class="h-screen">

    <div class="flex justify-center">
        <div class="max-w-6xl">
        <Header/>
        <router-view></router-view>
      </div>
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