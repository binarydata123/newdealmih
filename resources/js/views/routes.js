import store from '../state/store'

export default [{
        path: '/dashboard/home',
        name: 'default',
        meta: {
            authRequired: true,
        },
        component: () =>
            import ('./dashboard/default'),
    },
    {
        path: '/login',
        name: 'login',
        component: () =>
            import ('./dashboard/saas'),

    },
    {
        path: '/register',
        name: 'Register',
        component: () =>
            import ('./account/register'),
        meta: {
            beforeResolve(routeTo, routeFrom, next) {
                // If the user is already logged in
                if (store.getters['auth/loggedIn']) {
                    // Redirect to the home page instead
                    next({ name: 'default' })
                } else {
                    // Continue to the login page
                    next()
                }
            },
        },
    },
    {
        path: '/dashboard/forgot-password',
        name: 'Forgot password',
        component: () =>
            import ('./account/forgot-password'),
        meta: {
            beforeResolve(routeTo, routeFrom, next) {
                // If the user is already logged in
                if (store.getters['auth/loggedIn']) {
                    // Redirect to the home page instead
                    next({ name: 'default' })
                } else {
                    // Continue to the login page
                    next()
                }
            },
        },
    },
    {
        path: '/logout',
        name: 'logout',
        meta: {
            authRequired: true,
            beforeResolve(routeTo, routeFrom, next) {
                if (process.env.VUE_APP_DEFAULT_AUTH === "firebase") {
                    store.dispatch('auth/logOut')
                } else {
                    store.dispatch('authfack/logout')
                }
                const authRequiredOnPreviousRoute = routeFrom.matched.some(
                        (route) => route.push('/login')
                    )
                    // Navigate back to previous page, or home as a fallback
                next(authRequiredOnPreviousRoute ? { name: 'default' } : {...routeFrom })
            },
        },
    },
    {
        path: '/404',
        name: '404',
        component: require('./utility/404').default,
    },
    // Redirect any unmatched routes to the 404 page. This may
    // require some server configuration to work in production:
    // https://router.vuejs.org/en/essentials/history-mode.html#example-server-configurations
    {
        path: '*',
        redirect: '404',
    },
    {
        path: '/dashboard/saas',
        name: 'saas-dashboard',
        meta: { authRequired: true },
        component: () =>
            import ('./dashboard/saas')
    },
    {
        path: '/dashboard/crypto',
        name: 'crypto-dashboard',
        meta: { authRequired: true },
        component: () =>
            import ('./dashboard/crypto')
    },
    {
        path: '/dashboard/blog',
        name: 'blog-dashboard',
        meta: { authRequired: true },
        component: () =>
            import ('./dashboard/blog')
    },
    {
        path: '/calendar',
        name: 'Calendar',
        meta: { authRequired: true },
        component: () =>
            import ('./calendar/calendar')
    },
    {
        path: '/chat',
        name: 'chat',
        meta: { authRequired: true },
        component: () =>
            import ('./chat/chat')
    },
    {
        path: '/apps/file-manager',
        name: 'file-manager',
        meta: { authRequired: true },
        component: () =>
            import ('./file-manager/index')
    },
    {
        path: '/ecommerce/products',
        name: 'Products',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/products')
    },
    {
        path: '/ecommerce/product-detail/:id',
        name: 'Product Detail',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/product-detail')
    },
    {
        path: '/ecommerce/orders',
        name: 'Orders',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/orders')
    },
    {
        path: '/ecommerce/customers',
        name: 'Customers',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/customers')
    },
    {
        path: '/ecommerce/cart',
        name: 'Cart',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/cart')
    },
    {
        path: '/ecommerce/checkout',
        name: 'Checkout',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/checkout')
    },
    {
        path: '/ecommerce/shops',
        name: 'Shops',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/shops')
    },
    {
        path: '/ecommerce/add-product',
        name: 'Add Product',
        meta: { authRequired: true },
        component: () =>
            import ('./ecommerce/add-product')
    },
    {
        path: '/blog/list',
        name: 'blog-list',
        meta: { authRequired: true },
        component: () =>
            import ('./blog/list')
    },
    {
        path: '/blog/grid',
        name: 'blog-grid',
        meta: { authRequired: true },
        component: () =>
            import ('./blog/grid')
    },
    {
        path: '/blog/detail',
        name: 'blog-detail',
        meta: { authRequired: true },
        component: () =>
            import ('./blog/detail')
    },
    {
        path: '/crypto/wallet',
        name: 'Wallet',
        meta: { authRequired: true },
        component: () =>
            import ('./crypto/wallet')
    },
    {
        path: '/crypto/buy-sell',
        name: 'Buy/sell',
        meta: { authRequired: true },
        component: () =>
            import ('./crypto/buy-sell')
    },
    {
        path: '/crypto/exchange',
        name: 'Exchange',
        meta: { authRequired: true },
        component: () =>
            import ('./crypto/exchange')
    },
    {
        path: '/crypto/lending',
        name: 'Lending',
        meta: { authRequired: true },
        component: () =>
            import ('./crypto/lending')
    },
    {
        path: '/crypto/orders',
        name: 'crypto-orders',
        meta: { authRequired: true },
        component: () =>
            import ('./crypto/orders')
    },
    {
        path: '/crypto/kyc-application',
        name: 'kyc-application',
        meta: { authRequired: true },
        component: () =>
            import ('./crypto/kyc-application')
    },
    {
        path: '/crypto/ico-landing',
        name: 'Ico-landing',
        meta: { authRequired: true },
        component: () =>
            import ('./crypto/ico-landing')
    },
    {
        path: '/invoices/detail',
        name: 'Invoice Detail',
        meta: { authRequired: true },
        component: () =>
            import ('./invoices/detail')
    },
    {
        path: '/invoices/list',
        name: 'Invoice List',
        meta: { authRequired: true },
        component: () =>
            import ('./invoices/list')
    },
    {
        path: '/ui/alerts',
        name: 'Alerts',
        meta: {
            authRequired: true
        },
        component: () =>
            import ('./ui/alerts')
    },
    {
        path: '/ui/buttons',
        name: 'Buttons',
        meta: {
            authRequired: true
        },
        component: () =>
            import ('./ui/buttons')
    },
    {
        path: '/ui/cards',
        name: 'Cards',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/cards')
    },
    {
        path: '/ui/carousel',
        name: 'Carousel',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/carousel')
    },
    {
        path: '/ui/dropdowns',
        name: 'Dropdowns',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/dropdowns')
    },
    {
        path: '/ui/grid',
        name: 'Grid',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/grid')
    },
    {
        path: '/ui/images',
        name: 'Images',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/images')
    },
    {
        path: '/ui/modals',
        name: 'Modals',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/modals')
    },
    {
        path: '/ui/drawer',
        name: 'Drawer',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/drawer')
    },
    {
        path: '/ui/rangeslider',
        name: 'Rangeslider',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/rangeslider')
    },
    {
        path: '/ui/progressbars',
        name: 'Progressbars',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/progressbars')
    },
    {
        path: '/ui/sweet-alert',
        name: 'Sweet-alert',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/sweet-alert')
    },
    {
        path: '/ui/tabs-accordions',
        name: 'Tabs-accordions',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/tabs-accordions')
    },
    {
        path: '/ui/typography',
        name: 'Typography',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/typography')
    },
    {
        path: '/ui/video',
        name: 'Video',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/video')
    },
    {
        path: '/ui/general',
        name: 'General',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/general')
    },
    {
        path: '/ui/colors',
        name: 'Colors',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/colors')
    },
    {
        path: '/ui/lightbox',
        name: 'Lightbox',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/lightbox')
    },
    {
        path: '/ui/image-cropper',
        name: 'Image Cropper',
        meta: { authRequired: true },
        component: () =>
            import ('./ui/cropper')
    },
    {
        path: '/projects/grid',
        name: 'Projects Grid',
        meta: { authRequired: true },
        component: () =>
            import ('./projects/projects-grid')
    },
    {
        path: '/projects/list',
        name: 'Projects List',
        meta: { authRequired: true },
        component: () =>
            import ('./projects/projects-list')
    },
    {
        path: '/projects/overview',
        name: 'Project Overview',
        meta: { authRequired: true },
        component: () =>
            import ('./projects/overview')
    },
    {
        path: '/projects/create',
        name: 'Create New',
        meta: { authRequired: true },
        component: () =>
            import ('./projects/create')
    },
    {
        path: '/contacts/grid',
        name: 'User Grid',
        meta: { authRequired: true },
        component: () =>
            import ('./contacts/contacts-grid')
    },
    {
        path: '/contacts/list',
        name: 'User List',
        meta: { authRequired: true },
        component: () =>
            import ('./contacts/contacts-list')
    },
    {
        path: '/contacts/profile',
        name: 'Profile',
        meta: { authRequired: true },
        component: () =>
            import ('./contacts/contacts-profile')
    },
    {
        path: '/charts/apex',
        name: 'Apex chart',
        meta: { authRequired: true },
        component: () =>
            import ('./charts/apex')
    },
    {
        path: '/charts/chartjs',
        name: 'Chartjs chart',
        meta: { authRequired: true },
        component: () =>
            import ('./charts/chartjs/index')
    },
    {
        path: '/charts/chartist',
        name: 'Chartist chart',
        meta: { authRequired: true },
        component: () =>
            import ('./charts/chartist')
    },
    {
        path: '/charts/echart',
        name: 'Echart chart',
        meta: { authRequired: true },
        component: () =>
            import ('./charts/apex')
    },
    {
        path: '/icons/boxicons',
        name: 'Boxicons Icon',
        meta: { authRequired: true },
        component: () =>
            import ('./icons/boxicons')
    },
    {
        path: '/icons/materialdesign',
        name: 'Materialdesign Icon',
        meta: { authRequired: true },
        component: () =>
            import ('./icons/materialdesign')
    },
    {
        path: '/icons/dripicons',
        name: 'Dripicons Icon',
        meta: { authRequired: true },
        component: () =>
            import ('./icons/dripicons')
    },
    {
        path: '/icons/fontawesome',
        name: 'Fontawesome Icon',
        meta: { authRequired: true },
        component: () =>
            import ('./icons/fontawesome')
    },
    {
        path: '/maps/google',
        name: 'Google Maps',
        meta: { authRequired: true },
        component: () =>
            import ('./maps/google')
    },
    {
        path: '/maps/leaflet',
        name: 'Leaflet Maps',
        meta: { authRequired: true },
        component: () =>
            import ('./maps/leaflet/index')
    },
    {
        path: '/tables/basic',
        name: 'Basic Tables',
        meta: { authRequired: true },
        component: () =>
            import ('./tables/basictable')
    },
    {
        path: '/tables/advanced',
        name: 'Advanced Tables',
        meta: { authRequired: true },
        component: () =>
            import ('./tables/advancedtable')
    },
    {
        path: '/form/advanced',
        name: 'Form Advanced',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/advanced')
    },
    {
        path: '/form/elements',
        name: 'Form Elements',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/elements')
    },
    {
        path: '/form/layouts',
        name: 'Form Layouts',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/layouts')
    },
    {
        path: '/form/editor',
        name: 'Form Editors',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/ckeditor')
    },
    {
        path: '/form/uploads',
        name: 'File Uploads',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/uploads')
    },
    {
        path: '/form/validation',
        name: 'Form Validation',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/validation')
    },
    {
        path: '/form/wizard',
        name: 'Form Wizard',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/wizard')
    },
    {
        path: '/form/repeater',
        name: 'Form Repeater',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/repeater')
    },
    {
        path: '/form/mask',
        name: 'Form Mask',
        meta: { authRequired: true },
        component: () =>
            import ('./forms/mask')
    },
    {
        path: '/pages/starter',
        name: 'Starter',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/starter')
    },
    {
        path: '/pages/maintenance',
        name: 'Maintenance',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/maintenance')
    },
    {
        path: '/pages/coming-soon',
        name: 'coming-soon',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/coming-soon')
    },
    {
        path: '/pages/timeline',
        name: 'Timeline',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/timeline')
    },
    {
        path: '/pages/faqs',
        name: 'FAQs',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/faqs')
    },
    {
        path: '/pages/pricing',
        name: 'Pricing',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/pricing')
    },
    {
        path: '/pages/404',
        name: 'Error-404',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/404')
    },
    {
        path: '/pages/500',
        name: 'Error-500',
        meta: { authRequired: true },
        component: () =>
            import ('./utility/500')
    },
    {
        path: '/email/inbox',
        name: 'Inbox',
        meta: { authRequired: true },
        component: () =>
            import ('./email/inbox')
    },
    {
        path: '/email/reademail/:id',
        name: 'Read Email',
        meta: { authRequired: true },
        component: () =>
            import ('./email/reademail')
    },
    {
        path: '/email/templates/basic',
        name: 'Email template basic',
        meta: { authRequired: true },
        component: () =>
            import ('./email/templates/basic')
    },
    {
        path: '/email/templates/billing',
        name: 'Email template billing',
        meta: { authRequired: true },
        component: () =>
            import ('./email/templates/billing')
    },
    {
        path: '/email/templates/alert',
        name: 'Email template alert',
        meta: { authRequired: true },
        component: () =>
            import ('./email/templates/alert')
    },
    {
        path: '/tasks/list',
        name: 'Task list',
        meta: { authRequired: true },
        component: () =>
            import ('./tasks/task-list')
    },
    {
        path: '/tasks/kanban',
        name: 'Kanbanboard',
        meta: { authRequired: true },
        component: () =>
            import ('./tasks/kanbanboard')
    },
    {
        path: '/tasks/create',
        name: 'Create Task',
        meta: { authRequired: true },
        component: () =>
            import ('./tasks/task-create')
    },
    {
        path: '/auth/login-1',
        name: 'Login sample',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/login-sample')
    },
    {
        path: '/auth/login-2',
        name: 'Login-2-sample',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/login-2')
    },
    {
        path: '/auth/register-1',
        name: 'Register sample',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/register-sample')
    },
    {
        path: '/auth/register-2',
        name: 'Register-2',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/register-2')
    },
    {
        path: '/auth/recoverpwd',
        name: 'Recover pwd',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/recoverpw-sample')
    },
    {
        path: '/auth/recoverpwd-2',
        name: 'Recover pwd-2',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/recoverpwd-2')
    },
    {
        path: '/auth/lock-screen',
        name: 'Lock screen',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/lockscreen')
    },
    {
        path: '/auth/lock-screen-2',
        name: 'Lock screen-2',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/lockscreen-2')
    },
    {
        path: '/auth/confirm-mail',
        name: 'confirm-mail',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/confirm-mail')
    },
    {
        path: '/auth/confirm-mail-2',
        name: 'confirm-mail-2',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/confirm-mail-2')
    },
    {
        path: '/auth/email-verification',
        name: 'email-verification',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/email-verification')
    },
    {
        path: '/auth/email-verification-2',
        name: 'email-verification-2',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/email-verification-2')
    },
    {
        path: '/auth/two-step-verification',
        name: 'two-step-verification',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/two-step-verification')
    },
    {
        path: '/auth/two-step-verification-2',
        name: 'two-step-verification-2',
        meta: { authRequired: true },
        component: () =>
            import ('./sample-pages/two-step-verification-2')
    },

    //custom routes
    // category 
    {
        path: '/dashboard/category',
        name: 'category',
        // meta: { authRequired: true },
        component: () =>
            import ('./admin/category/index')
    },
    {
        path: '/dashboard/category/create',
        name: 'category-create',
        // meta: { authRequired: true },
        component: () =>
            import ('./admin/category/create')
    },
    {
        path: '/dashboard/category/edit/:id',
        name: 'category-edit',
        component: () =>
            import ('./admin/category/edit')
    },

    {
        path: '/dashboard/features',
        name: 'features',
        component: () =>
            import ('./admin/features')
    },
    {
        path: '/dashboard/features/create',
        name: 'feature-create',
        component: () =>
            import ('./admin/features/create')
    },
    {
        path: '/dashboard/features/edit/:id',
        name: 'feature-edit',
        component: () =>
            import ('./admin/features/edit')
    },

    {
        path: '/dashboard/users',
        name: 'users',
        component: () =>
            import ('./admin/users/index')
    },
    {
        path: '/dashboard/commision',
        name: 'commision',
        component: () =>
            import ('./admin/users/com')
    },

    {
        path: '/dashboard/users/edit/:id',
        name: 'user-edit-view',
        component: () =>
            import ('./admin/users/view')
    },

    {
        path: '/dashboard/ads',
        name: 'ads',
        component: () =>
            import ('./admin/ads/index')
    },
    {
        path: '/dashboard/header-category',
        name: 'header-category',
        component: () =>
            import ('./admin/header-category/index')
    },
    {
        path: '/dashboard/header-category/create',
        name: 'header-category-create',
        component: () =>
            import ('./admin/header-category/create')
    },
    {
        path: '/dashboard/header-category/edit/:id',
        name: 'header-category-edit',
        component: () =>
            import ('./admin/header-category/edit')
    },

    {
        path: '/dashboard/products',
        name: 'product',
        component: () =>
            import ('./admin/product/index')
    },
    {
        path: '/dashboard/orders',
        name: 'orders',
        component: () =>
            import ('./admin/orders/index')
    },
    {
        path: '/dashboard/orders/view/:id',
        name: 'orders-edit-view',
        component: () =>
            import ('./admin/orders/view')
    },
    {
        path: '/dashboard/cms',
        name: 'cms',
        component: () =>
            import ('./admin/cms/index')
    },
    {
        path: '/dashboard/cms/create',
        name: 'cms-create',
        component: () =>
            import ('./admin/cms/create')
    },
    {
        path: '/dashboard/cms/edit/:id',
        name: 'cms-edit',
        component: () =>
            import ('./admin/cms/edit')
    },

     {
        path: '/dashboard/analytics',
        name: 'analytics',
        component: () =>
            import ('./admin/analytics/analytics')
    },

    {
        path: '/dashboard/web-ads',
        name: 'web-ads',
        component: () =>
            import ('./admin/web-ads/index')
    },
    {
        path: '/dashboard/web-ads/create',
        name: 'ads-create',
        component: () =>
            import ('./admin/web-ads/create')
    },
    {
        path: '/dashboard/web-ads/edit/:id',
        name: 'ads-edit',
        component: () =>
            import ('./admin/web-ads/edit')
    },
     {
        path: '/dashboard/errors',
        name: 'web-adssdsad',
        component: () =>
        import ('./admin/errors/index')
    },
    {
        path: '/dashboard/errors/view/:id',
        name: 'errors-view',
        component: () =>
            import ('./admin/errors/view')
    },

    {
        path: '/dashboard/email-template',
        name: 'email-template',
        component: () =>
            import ('./admin/email-template/index')
    },
    {
        path: '/dashboard/email-template/create',
        name: 'create-template',
        component: () =>
            import ('./admin/email-template/create')
    },

    {
        path: '/dashboard/email-template/edit/:id',
        name: 'edit-template',
        component: () =>
            import ('./admin/email-template/edit')
    },

    {
        path: '/dashboard/business-users',
        name: 'business-user',
        component: () =>
            import ('./admin/users/business-user')
    },
    {
        path: '/dashboard/business-users/view/:id',
        name: 'business-user-edit-view',
        component: () =>
            import ('./admin/users/business-user-view')
    },
    {
        path: '/dashboard/features/model/create/:id',
        name: 'feature-data-create',
        component: () =>
            import ('./admin/features/feature-model/create')
    },

    {
        path: '/dashboard/store-users',
        name: 'store-user',
        component: () =>
            import ('./admin/users/store-user')
    },
    {
        path: '/dashboard/ads',
        name: 'store-usercc',
        component: () =>
            import ('./admin/ads/index')
    },
    {
        path: '/dashboard/commission-master',
        name: 'commission-master',
        component: () =>
            import ('./admin/ads/index')
    },
    {
        path: '/dashboard/settings',
        name: 'settings',
        component: () =>
            import ('./admin/settings/index')
    },
    {
        path: '/dashboard/notification',
        name: 'admin-notification',
        component: () =>
            import ('./admin/notification/notification')
    },




    /*{
        path: '/dashboard/settings/edit/:id',
        name: 'edit-settings',
        component: () =>
            import ('./admin/settings/edit')
    },*/




]