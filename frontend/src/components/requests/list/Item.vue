<template>
  <tr @click="goTo(request.id)" class="hover:bg-gray-200" :class="request.is_new ? 'bg-red-100' : ''">
    <Td :data="request.status" />
    <Td :data="request.title" />
    <Td :images='request.images' />
    <Td :data="request.created_at" />
  </tr>
</template>

<script>
import Td from "../../table/Td.vue";
import router from "../../../router";

export default {
  name: "Item",
  components: {
    Td
  },
  props: [
    'request'
  ],
  methods: {
    goTo: function (id, event = null){
      router.push({name: "RequestEdit", params: {'slug': id}});
    }
  }
}
</script>

<style scoped>

</style>