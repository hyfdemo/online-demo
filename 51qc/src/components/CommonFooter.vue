<template>
    <div class="footer">
        <router-link :to="{name:'resume'}" exact><img :src="[resumeactive ? resumeimgactive : resumeimg]" alt=""><span>上传简历</span></router-link>
        <router-link :to="{name:'works'}" ><img :src="[worksactive ?worksimgactive :worksimg]" alt=""><span>上传作品</span></router-link>
    </div>
</template>

<script>
export default {
    data(){
        return {
            resumeimg:require('../assets/上传简历-未选中.png'),
            resumeimgactive:require('../assets/上传简历-选中.png'),
            worksimg:require('../assets/上传作品-未选中.png'),
            worksimgactive:require('../assets/上传作品-选中.png')            
        }
    },
    computed:{
        resumeactive(){
            if(this.$route.name=='resume'){
            return this.$route.path==window.location.pathname
            }else{
                return false;
            }
        },
        worksactive(){
            if(this.$route.name=='works'){
            return this.$route.path==window.location.pathname
            }else{
                return false;
            }
        }
    },
    methods:{
    }
}
</script>

<style lang='css' scoped>
    .footer{
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
    .footer .router-link-active{
        color:rgba(22, 150, 242, 1);
    }
</style>
