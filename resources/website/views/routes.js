

export default [
  {
    path: '/',
    name: 'default',
   
    component: () => import('./home'),
  },
  
  {
    path: '/ad-post',
    name: 'ads-post',
   
    component: () => import('./ad-post'),
  },

  {
    path: '/ads',
    name: 'ads',
    // meta: {
    //   authRequired: true,
    // },
    component: () => import('./ads'),
  },
  {
    path: '/ad-detail',
    name: 'ad-detail',
    // meta: {
    //   authRequired: true,
    // },
    component: () => import('./ad-detail'),
  },

  
]
