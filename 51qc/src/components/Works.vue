<template>
    <div class="resume">
        <h3>上传作品</h3>
        <img src="../assets/上传作品.png" alt="">
        <input type="file">
        <p>
            <span>注：</span>
            <span>1.支持.jpg   .wav    .mp4等图片、音频、视频等文件格式；</span>    
            <span>2.建议文件名称：文件类型（如:视频）+名称</span>
            </p>
            <button>提交作品</button>
    </div>
</template>

<script>
export default {
  
}
</script>
<style lang='css' scoped>
.resume{
    flex: 1;
    display: flex;
    flex-direction: column;
        justify-content: space-evenly;
    align-items: center;
}
.resume>h3{
    font-weight: normal;
    font-size: 1.13rem;
}
.resume>input{
    width: 10rem;
}
.resume>p{
    display: flex;
    flex-direction: column;
}
.resume>input,.resume>p>span{
    font-size: 0.75rem;
}
.resume>p>span{
    color: rgba(229, 28, 35, 1);
}
.resume>img{
    width: 12.5rem;
    height: 12.5rem;
}
.resume>button{
    width: 15.63rem;
    height: 2.5rem;
    background: rgba(22, 150, 242, 1);
    color: #fff;
    font-size: 0.88rem;
    border:0;
    border-radius: 0.5rem;
}
</style>
