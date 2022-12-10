<template>
  <List/>
</template>

<script>
import axios from "../axios";
import List from "../components/requests/List.vue";

export default {
  name: "RequestList",
  components: {
    List
  },
}
</script>

<style scoped>

</style>