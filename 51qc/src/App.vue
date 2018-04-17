<template>
  <div id="app">
    <common-header></common-header>
    <resume></resume>
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
    'common-footer':CommonFooter,    
    'common-header':CommonHeader,
    'resume':Resume,
    'works':Works        
  }
}
</script>

<style>
body{
  font-size:16px;
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
}
</style>
