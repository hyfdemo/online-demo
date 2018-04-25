<template>
  <div id="admin">
      <header>
      <router-link :to='{name:"resumed"}' exact>简历下载</router-link>
      <router-link :to='{name:"worksd"}'>用户作品下载</router-link>      
      </header>
      <router-view></router-view>
  </div>
</template>
<script>

export default {
    name:'Admin',
    data(){
        return {
        }
    }
}
</script>
<style>
html{
  font-size:14px;
  width: 100%;
  height: 100%;
}
body{
  width: inherit;
  height: inherit;
}
body,h3,p,ul,li{
    margin:0;
  padding:0;
}
li{
    list-style: none;
}
a{
  text-decoration: none;
}
#admin{
    padding-bottom: 2rem;
}
  #admin>header{
        height: 6.75rem;
        background: rgba(22, 150, 242, 1);
        padding: 0 8.13rem;
        display: flex;
        align-items: flex-end;
    }
    #admin>header a{
        width: 12.56rem;
        height: 3rem;
        line-height: 3rem;
        text-align: center;
        color: #fff;
    }
    #admin>header  .router-link-active{
        background: #fff;
        color: rgba(16, 16, 16, 1);
    }
</style>

