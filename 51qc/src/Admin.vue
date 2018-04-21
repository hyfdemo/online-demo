<template>
  <div id="admin">
      <header>
      <router-link :to='{name:"resumed"}' exact>简历下载</router-link>
      <router-link :to='{name:"worksd"}'>用户作品下载</router-link>      
      </header>
      <router-view :list='list'></router-view>
  </div>
</template>
<script>
var list=[
    {
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },
    {
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },
    {
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    },{
              wx:'微信号',
              name:'张三求职简历-会计专业',
              ext:'.png',
              time:'2018-05-03 18:26',
              href:'xxxxxxx'
    }
]
export default {
    name:'Admin',
    data(){
        return {
            list:list
        }
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
body,h3,p,ul,li{
    margin:0;
  padding:0;
}
a{
  text-decoration: none;
}
  #admin>header{
        height: 8.75rem;
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

