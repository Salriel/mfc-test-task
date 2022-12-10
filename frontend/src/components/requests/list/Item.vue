<template>
  <tr class="hover:bg-gray-200">
    <Td :data="request.status" />
    <Td :data="request.title" />
    <Td :data='request.images' />
    <Td :data="request.created_at" />
  </tr>
</template>

<script>
import Td from "../../table/Td.vue";

export default {
  name: "Item",
  components: {
    Td
  },
  props: [
    'request'
  ],
}
</script>

<style scoped>

</style>