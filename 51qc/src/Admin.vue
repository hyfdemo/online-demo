<template>
  <div id="admin">
      <router-link :to='{name:"resumed"}'>简历下载</router-link>
      <router-link :to='{name:"worksd"}'>用户作品下载</router-link>      
      <router-view></router-view>
  </div>
</template>
<script>
export default {
    name:'Admin'
}
</script>
<style scoped>

</style>

