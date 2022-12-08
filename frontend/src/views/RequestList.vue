<template>
  <List/>
</template>

<script>
import axios from "../axios";
import List from "../components/Requests/List.vue";

export default {
  name: "RequestList",
  components: {
    List
  },
}
</script>

<style scoped>

</style>