import Vue from 'vue'
import Router from 'vue-router'
import Resume from '@/components/Resume'
import Works from '@/components/Works'
import Uploaded from '@/pages/Uploaded'
import ResumeD from '@/components/ResumeD'
import WorksD from '@/components/WorksD'

Vue.use(Router)

export default new Router({
  mode:'history',
  routes: [
    {
      path: '/',
      name: 'resume',
      component: Resume
    },
    {
      path: '/works',
      name: 'works',
      component: Works
    },
    {
      path: '/uploaded',
      name: 'uploaded',
      component: Uploaded
    },
    {
      path: '/admin.html',
      redirect:{name: 'resumed'}
    },
    {
      path: '/resumed',
      name: 'resumed',
      component: ResumeD
    },
    {
      path: '/worksd',
      name: 'worksd',
      component: WorksD
    }
  ]
})
