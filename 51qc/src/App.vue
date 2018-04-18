<template>
  <div id="app">
    <common-header></common-header>
    <router-view></router-view>
    <common-footer></common-footer>
  </div>
</template>

<script>
import CommonFooter from './components/CommonFooter.vue'
import CommonHeader from './components/CommonHeader.vue'
import Resume from './components/Resume.vue'
import Works from './components/Works.vue'


export default {
  name: 'App',
  components:{
    CommonFooter,    
    CommonHeader,
    Resume,
    Works        
  }
}
</script>

<style>
html{
  font-size:16px;
  width: 100%;
  height: 100%;
}
body{
  width: inherit;
  height: inherit;
}
body,h3{
    margin:0;
  padding:0;
}
a{
  text-decoration: none;
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  display: flex;
  flex-direction: column;
  width: inherit;
  height: inherit;
}
</style>
