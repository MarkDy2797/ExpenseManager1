/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./templatejs');

//require('./templateareac');
//require('./templatebar');
//require('./templatedatatable');
//require('./templatepie');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('modal', {
    template: '#modal-template'
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import axios from 'axios';

console.log("qwrqw");
const app = new Vue({
    el: '#app',
    data: {
        seen1: false,
        seen2: false,
        seen3: false,
        seen4: false,
        seen5: true,
        roleItem:  {'displayname': '', 'description' : ''},
        userItem:  {'name': '', 'emailaddress' : '', 'urole' : ''},
        ecItem:  {'displaynameec': '', 'descriptionec' : ''},
        hasError: false,
        hasErrorUser: false,
        hasErrorEc: false,
        showModal: false,
        Items: [],
        ItemsUser: [],
        ItemsEc: []
    },
    mounted: function mounted() {
        console.log("wetew");
        this.getItems();
        this.getItemsUser();
        this.getItemsEc();
        
    },
    methods: {
        maddrole: function maddrole() {
           $('#addrole').modal('show');
        },
        /*meditrole: function meditrole() {
            $('#addrole').modal('show');
        },*/
        getItems: function getItems(){
            var _this = this;
            axios.get('/getItems').then(function(response){
                _this.Items = response.data;
            })
        },
        createrole: function createrole() {
            //alert("working fine");
            var inputrole =  this.roleItem;
            var _this = this;
            if (inputrole['displayname'] == '' || inputrole['description'] == '' ) {
                //alert("Required  Input");
                this.hasError = true;
            }else{
                this.hasError = false;
                axios.post('/storeItem', inputrole).then(function(response){
                   _this.inputrole = {'displayname': '', 'description' : ''}
                   _this.getItems();
                })
            }
        },
        deleteItem: function  deleteItem(item){
            //alert(item.iid);
            var _this = this;
            var r = confirm("Confirm delete");
            if (r == true) {
                alert("Confirm (Not working error found)");
                axios.post('/deleteItem/' +  item.iid).then(function(response){
                    _this.getItems();
                });
            } else {
                alert("Canceled");
            }
        },
        getItemsUser: function getItemsUser(){
            var _this = this;
            axios.get('/getItemsUser').then(function(response){
                _this.ItemsUser = response.data;
            })
        },
        createuser: function createuser() {
            //alert("working fine");
            var inputuser =  this.userItem;
            var _this = this;
            if (inputuser['name'] == '' || inputuser['emailaddress'] == ''  || inputuser['urole'] == '' ) {
                //alert("Required  Input");
                this.hasErrorUser = true;
            }else{
                this.hasErrorUser = false;
                axios.post('/storeItemUser', inputuser).then(function(response){
                   _this.inputuser = {'name': '', 'emailaddress' : '', 'urole' : ''}
                   _this.getItemsUser();
                })
            }
        },
        getItemsEc: function getItemsEc(){
            var _this = this;
            axios.get('/getItemsEc').then(function(response){
                _this.ItemsEc = response.data;
            })
        },
        createec: function createec() {
            //alert("working fine");
            var inputec =  this.ecItem;
            var _this = this;
            if (inputec['displaynameec'] == '' || inputec['descriptionec'] == '' ) {
                //alert("Required  Input");
                this.hasErrorEc = true;
            }else{
                this.hasErrorEc = false;
                axios.post('/storeItemEc', inputec).then(function(response){
                   _this.inputec = {'displaynameec': '', 'descriptionec' : ''}
                   _this.getItemsEc();
                })
            }
        }
        

    }
});
