<template>
  <div class="uploaded">
      <common-header></common-header>
      <ul>
          <li class="headTitle">
              <a href="">上传时间</a>
              <a href="">文件名</a>
              <a href="">格式</a>
          </li>
          <li>
              <a href="">2018-04-15 18:25</a>
              <a href="">** 求职简历</a>
              <a href="">.doc</a>
          </li>
          <li>
              <a href="">2018-04-15 18:25</a>
              <a href="">** 求职简历</a>
              <a href="">.doc</a>
          </li>
          <li>
              <a href="">2018-04-15 18:25</a>
              <a href="">** 求职简历</a>
              <a href="">.doc</a>
          </li>
          <li>
              <a href="">2018-04-15 18:25</a>
              <a href="">** 求职简历</a>
              <a href="">.doc</a>
          </li>
      </ul>
  </div>
</template>
<script>
import CommonHeader from '@/components/CommonHeader'
export default {
  components:{
      CommonHeader
  }
}
</script>
<style lang='css' scoped>
ul{
    margin: 0;
    padding: 0;
    margin-top: 0.63rem;
}
li{
    display: flex;
    list-style: none;
    height: 2.5rem;
    line-height: 2.5rem;
    font-size: 0.75rem;
}
li:nth-child(odd){
    background: rgba(237, 249, 255, 1);
}
li>a{
    flex-basis:33.333%;
    text-align: center;
    color: rgba(51, 51, 51, 1);        
}
li.headTitle{
    font-size: 0.88rem;
}
li.headTitle>a{
    background: rgba(187, 222, 242, 1);
    margin-right: 0.06rem;
}
</style>

