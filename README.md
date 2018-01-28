# angka-partisipasi-murni

[![Join the chat at https://gitter.im/angka-partisipasi-murni/Lobby](https://badges.gitter.im/angka-partisipasi-murni/Lobby.svg)](https://gitter.im/angka-partisipasi-murni/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-murni/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-murni/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-murni/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-partisipasi-murni/build-status/master)

Angka partisipasi Murni (APM)

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/angka-partisipasi-murni:dev-master
```
- Latest release:

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/angka-partisipasi-murni.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\APMurni\APMurniServiceProvider::class,

```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/ap-murni',
    components: {
      main: resolve => require(['./components/views/bantenprov/ap-murni/DashboardAPMurni.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "AP Murni"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/ap-murni',
      components: {
        main: resolve => require(['./components/bantenprov/ap-murni/APMurniAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "AP Murni"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'AP Murni',
          link: '/dashboard/ap-murni',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import APMurni from './components/bantenprov/ap-murni/APMurni.chart.vue';
Vue.component('echarts-ap-murni', APMurni);

import APMurniKota from './components/bantenprov/ap-murni/APMurniKota.chart.vue';
Vue.component('echarts-ap-murni-kota', APMurniKota);

import APMurniTahun from './components/bantenprov/ap-murni/APMurniTahun.chart.vue';
Vue.component('echarts-ap-murni-tahun', APMurniTahun);

import APMurniAdminShow from './components/bantenprov/ap-murni/APMurniAdmin.show.vue';
Vue.component('admin-view-ap-murni-tahun', APMurniAdminShow);

//== Echarts Angka Partisipasi Murni

import APMurniBar01 from './components/views/bantenprov/ap-murni/APMurniBar01.vue';
Vue.component('ap-murni-bar-01', APMurniBar01);

import APMurniBar02 from './components/views/bantenprov/ap-murni/APMurniBar02.vue';
Vue.component('ap-murni-bar-02', APMurniBar02);

//== mini bar charts
import APMurniBar03 from './components/views/bantenprov/ap-murni/APMurniBar03.vue';
Vue.component('ap-murni-bar-03', APMurniBar03);

import APMurniPie01 from './components/views/bantenprov/ap-murni/APMurniPie01.vue';
Vue.component('ap-murni-pie-01', APMurniPie01);

import APMurniPie02 from './components/views/bantenprov/ap-murni/APMurniPie02.vue';
Vue.component('ap-murni-pie-02', APMurniPie02);

//== mini pie charts
import APMurniPie03 from './components/views/bantenprov/ap-murni/APMurniPie03.vue';
Vue.component('ap-murni-pie-03', APMurniPie03);
```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=ap-murni-assets
$ php artisan vendor:publish --tag=ap-murni-public
```
