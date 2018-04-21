<template>
  <div class="resumeD">
      <header>
    <a href="javascript:;">
    <input id='checkAll' type="checkbox" v-model="allChecked">
    <label for="checkAll">全选</label>
    </a>
      <a href="javascript:;" @click='downlot'>批量下载</a>       
      </header>
    <ul class="content">
          <li class="headTitle">
              <a href="">选中</a>
              <a href="">序号</a>
              <a href="">微信用户</a>
              <a href="">文件名称</a>
              <a href="">文件类型</a>
              <a href="">上传时间</a>
              <a href="">操作</a>
          </li>
          <li v-for="(item,index) in list" :key="index">
              <a href="javascript:;">
                    <input type="checkbox" v-model="checked" :value='index'>
              </a>
              <a href="javascript:;">{{index+1}}</a>
              <a href="javascript:;">{{item.wx}}</a>
              <a href="javascript:;">{{item.name}}</a>
              <a href="javascript:;">{{item.ext}}</a>
              <a href="javascript:;">{{item.time}}</a>
              <a :href="item.href" class="download">
                 <span>下载</span> 
                </a>
          </li>
         
      </ul>
    <footer>
        <ul class="pages">
        </ul>
    </footer>
  </div>
</template>
<script>
export default {
  props:['list'],
  data(){
      return {
          checked:[],
          pageTotal:5,
          showItem:10,
          pageCurrent:1
      }
  },
  computed:{
      allChecked:{
      get:function(){
          return this.list.length==this.checked.length
      },
      set:function(value){
        if(value){
            this.checked=this.list.map((item,index,list)=>{
                return index
    })
        }else{
            this.checked=[]
        }
      }
      }
  },
  methods:{
      loadPage(){
          this.list.length/10
      },
      downlot(){

      }
  }
}

</script>
<style lang='css'>
ul.content{
    margin-top: 0.63rem;
}
ul.content li{
    display: flex;
    list-style: none;
    height: 5.25rem;
    line-height: 5.25rem;
    font-size: 0.75rem;
}

ul.content li:nth-child(odd){
    background: rgba(245, 252, 255, 1);
}
ul.content li>a,header>a{
    text-align: center;
    color: rgba(51, 51, 51, 1);        
}
ul.content li>a:nth-child(1){
    flex-basis: 3.13rem;
}
ul.content li>a:nth-child(2){
    flex-basis: 3.69rem;
}
ul.content li>a:nth-child(3),li>a:nth-child(4){
    flex: auto;
}
ul.content li>a:nth-child(5){
    flex-basis: 9.94rem;
}
ul.content li>a:nth-child(6){
    flex-basis: 15.5rem;
}
ul.content li>a:nth-child(7){
    flex-basis: 12.44rem;
}
ul.content li.headTitle{
    font-size: 0.88rem;
}
ul.content li.headTitle>a{
    background: rgba(187, 222, 242, 1);
    margin-right: 0.06rem;
}
.resumeD{
    padding: 0 8.13rem;
}
.resumeD header{
    margin: 2.25rem 0.94rem 1.13rem;
}
.resumeD header a{
    margin-right: 1.31rem;
    cursor: pointer;
}
.download span{
    padding:0.4rem 1rem;
    color: #fff;
    background: rgba(57, 130, 51, 1);
    border-radius: 0.25rem;

}
</style>
