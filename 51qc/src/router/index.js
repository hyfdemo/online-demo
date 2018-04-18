import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Resume from '@/components/Resume'
import Works from '@/components/Works'


Vue.use(Router)

export default new Router({
  routes: [
    // {
    //   path: '/',
    //   name: 'HelloWorld',
    //   component: HelloWorld
    // },
    // {
    //   path:'/',
    //   redirect:{
    //     name:'resume'
    //   }
    // },
    {
      path: '/',
      name: 'resume',
      component: Resume
    },
    {
      path: '/works',
      name: 'works',
      component: Works
    }
  ]
})
