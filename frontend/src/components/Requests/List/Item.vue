<template>
  <tr>
    <td>{{ request.status }}</td>
    <td>{{ request.title }}</td>
    <td><a href="#" class="text-blue-800">Фото пляжа</a></td>
    <td>{{ request.created_at }}</td>
  </tr>
</template>

<script>
export default {
  name: "Item",
  props: [
    'request'
  ],
}
</script>

<style scoped>

</style>