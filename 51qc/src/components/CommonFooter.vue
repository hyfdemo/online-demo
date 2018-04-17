<template>
    <div class="footer">
        <a href="" class="active"><img src="../assets/上传简历-选中.png" alt=""><span>上传简历</span></a>
        <a href=""><img src="../assets/上传作品-未选中.png" alt=""><span>上传作品</span></a>
    </div>
</template>

<script>
export default {
  
}
</script>

<style lang='css' scoped>
    .footer{
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2.81rem;
        background: #f9f9f9;
        display: flex;

    }
    .footer a{
        flex-basis: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        color: rgba(191, 191, 191, 1);
    }
    .footer img{
        width:1.5rem;
        height: 1.5rem;
    }
    .footer a.active{
        color:rgba(22, 150, 242, 1);
    }
</style>
