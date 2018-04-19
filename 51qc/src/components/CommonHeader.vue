<template>
  <div class="header">
      <router-link v-if="curroute!='uploaded'" :to='{name:"uploaded"}'><img src="../assets/我的上传记录.png" alt=""></router-link>
      <div class="uploadedHeader" v-else>
      <a @click='back()'><img src="../assets/返回.png" alt=""></a>
          <p>上传记录</p>
      </div>
  </div>
</template>
<script>
export default {
    data(){
        return {
            curroute:this.$route.name
        }
    },
    methods:{
        back(){
            this.$router.back()
        }
    }
}
</script>
<style lang='css' scoped>
    .header{
        height: 2.81rem;
        background: rgba(22, 150, 242, 1);
    }
    .uploadedHeader{
        height: inherit;
        line-height: 2.81rem;
        text-align: center;
        position: relative;
        font-size: 1.13rem;
        color: #fff;
    }
    .header .uploadedHeader a{
        position: absolute;
        left: 0;
    }
    .header a{
        width:2.81rem;
        height: inherit;
        position: fixed;
        right: 0;
        top:0;
        text-align: center;
    }
    .header .uploadedHeader img{
        width: 1.2rem;
        height: 1.2rem;
        margin-top: 0.805rem;
    }
    .header img{
        width:1.5rem;
        height:1.5rem;
        margin-top: 0.655rem;
    }
</style>

