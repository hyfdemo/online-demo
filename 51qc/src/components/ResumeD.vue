<template>
  <div class="resumeD">
      <header>
<a href="">全选</a>
      <a href="">批量下载</a>       
      </header>
    <ul>
          <li class="headTitle">
              <a href="">选中</a>
              <a href="">序号</a>
              <a href="">微信用户</a>
              <a href="">文件名称</a>
              <a href="">文件类型</a>
              <a href="">上传时间</a>
              <a href="">操作</a>
          </li>
          <li>
              <a href="">
                    <input type="checkbox">
              </a>
              <a href="">序号</a>
              <a href="">微信用户</a>
              <a href="">文件名称</a>
              <a href="">文件类型</a>
              <a href="">上传时间</a>
              <a href="">操作</a>
          </li>
          <li>
              <a href="">选中</a>
              <a href="">序号</a>
              <a href="">微信用户</a>
              <a href="">文件名称</a>
              <a href="">文件类型</a>
              <a href="">上传时间</a>
              <a href="">操作</a>
          </li><li>
              <a href="">选中</a>
              <a href="">序号</a>
              <a href="">微信用户</a>
              <a href="">文件名称</a>
              <a href="">文件类型</a>
              <a href="">上传时间</a>
              <a href="">操作</a>
          </li><li>
              <a href="">选中</a>
              <a href="">序号</a>
              <a href="">微信用户</a>
              <a href="">文件名称</a>
              <a href="">文件类型</a>
              <a href="">上传时间</a>
              <a href="">操作</a>
          </li>
      </ul>

  </div>
</template>
<script>
export default {
  
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
    background: rgba(245, 252, 255, 1);
}
li>a{
    flex: auto;
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
