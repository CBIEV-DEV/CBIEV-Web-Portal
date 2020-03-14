/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Import and use vue extensions 
 */

// import VeeValidate from 'vee-validate';//https://baianat.github.io/vee-validate/
// import MaskedInput from 'vue-text-mask'//https://github.com/text-mask/text-mask
import Axios from 'axios';
// Vue.use(VeeValidate);
// https://vue-multiselect.js.org/
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('masked-input', MaskedInput);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('member', require('./components/Member.vue').default);
Vue.component('supervisor', require('./components/Supervisor.vue').default);
Vue.component('team-leader', require('./components/TeamLeader.vue').default);
Vue.component('coworkingspace-member', require('./components/coworkingspace-member.vue').default);
Vue.component('coworkingspace-teamleader',require('./components/coworkingspace-teamleader.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: function(){
        return{
            'mentorType': '',
            'mentorCompanyRegNo' : '',
            'mentorCompanyName' : '',
            'mentorPosition' : '',
            'mentorOfficialEmail' : '',
            'mentorisInternal': false,
            'mentorHasCompany': false,
            'mentorHasCompanyDisable': true,
            'mentorComponyRegNoDisable': true,
            'mentorComponyNameDisable': true,
            'mentorPositionDisable': true,
            'mentorDepartmentDisable': true,
            'mentorOfficialEmailDisable': true,
            'internalMentorCompanyRegNo': '1033820M',
            'internalMentorCompanyName': 'Tunku Abdul Rahman University College',
            'seen' : true,
            'mentorHasExpOption':false,
            'mentorNoExpOption':false,
        }
    },
    methods:{
        internalMentor(){
            this.mentorHasCompany = true
            this.mentorHasCompanyDisable = true
            this.mentorComponyRegNoDisable = true
            this.mentorComponyNameDisable = true

            this.mentorDepartmentDisable = false
            this.mentorPositionDisable = false
            this.mentorOfficialEmailDisable = false
            this.mentorType = 1

            this.mentorCompanyRegNo = this.internalMentorCompanyRegNo
            this.mentorCompanyName = this.internalMentorCompanyName
            console.log(this.mentorType)
        },
        externalMentor(){
            this.mentorHasCompanyDisable = false
            this.mentorHasCompany = false
            this.mentorComponyRegNoDisable = true
            this.mentorComponyNameDisable = true

            this.mentorDepartmentDisable = true
            this.mentorPositionDisable = true
            this.mentorOfficialEmailDisable = true

            this.mentorCompanyRegNo = ''
            this.mentorCompanyName = ''
            this.mentorType = 2
            console.log(this.mentorType)
        },
        checkMentorHasCompany($e){
            console.log($e)

            if ($e.target.checked == true) {
                this.mentorComponyRegNoDisable = false
                this.mentorComponyNameDisable = false
                this.mentorPositionDisable = false
                this.mentorOfficialEmail = false


                if (this.mentorType == 1) {
                    this.mentorComponyRegNoDisable = true
                    this.mentorComponyNameDisable = true
                    this.mentorPositionDisable = false
                    this.mentorOfficialEmail = false
                    this.mentorDepartmentDisable = false
                }
            } else {
                this.mentorComponyRegNoDisable = true
                this.mentorComponyNameDisable = true
                this.mentorPositionDisable = true
                this.mentorOfficialEmail = true


                if (this.mentorType == 1) {
                    this.mentorDepartmentDisable = true
                }
            }
            
        },
        hide(){
            this.seen = false
        },
        unhide(){
            this.seen = true
        },
        hasExp(){
            this.mentorHasExpOption = true
            this.mentorNoExpOption = false
        },
        hasNoExp(){
            this.mentorHasExpOption = false
            this.mentorNoExpOption = true
        },
    }
});
