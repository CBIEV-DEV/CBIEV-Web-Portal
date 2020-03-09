<template>
  <div class="app">
    <div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="leaderType">Leader Type</label><span style="color:red">*</span>
          <select
            class="form-control"
            name="leaderType"
            id="leaderType"
            @change="checkType($event)"
            v-model="leaderType"
          >
            <option value="1">TAR UC Student</option>
            <option value="2">TAR UC Staff</option>
            <option value="3">Alumni</option>
            <option value="4">Public</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="leaderName">Name</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="leaderName"
            id="leaderName"
            :readonly="disableName"
            v-model="leaderName"
          >
        </div>
        <div class="form-group col-md-6">
          <label for="leaderIC">IC No</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="leaderIC"
            id="leaderIC"
            style="text-transform:uppercase"
            :readonly="disableICNo"
            v-model="leaderIC"
          >
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="leaderContact">Contact No.</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="leaderContact"
            id="leaderContact"
            :readonly="disableContact"
            v-model="leaderContact"
          >
        </div>
        <div class="form-group col-md-6">
          <label for="leaderEmail">Personal Email</label>
          <span style="color:red">*</span>
          <input
            type="text"
            name="leaderEmail"
            id="leaderEmail"
            class="form-control"
            :readonly="disablePerEmail"
            v-model="leaderPersonalEmail"
          >
        </div>
        
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <div class="checkbox">
            <label for="leaderHasCompany">
              <input type="checkbox" 
              name="leaderHasCompany" 
              id="leaderHasCompany"
              :disabled="disableHasCompany"
              @change="checkHasCompany($event)"
              v-model="leaderHasCompany"
              > Has Company?
            </label>
          
          </div>
        <input type="hidden" name="leaderHasCompany" v-model="leaderHasCompany">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="leaderCompanyName">Company Name</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="leaderCompanyName"
            id="leaderCompanyName"
            v-model="leaderCompanyName"
            :readonly="disableCompanyName"
          >
        </div>
        <div class="form-group col-md-6">
          <label for="leaderCompanyRegNo">Company Registration No.</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="leaderCompanyRegNo"
            id="leaderCompanyRegNo"
            :readonly="disableCompanyRegNo"
            v-model="leaderCompanyRegNo"
          >
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="leaderCompanyEmail">{{mailText}}</label>
          <span style="color:red">*</span>
          <input 
          class="form-control"
          type="text" 
          name="leaderCompanyEmail"
          id="leaderCompanyEmail"
          :readonly="disableCompanyEmail"
          v-model="leaderCompanyEmail" >
        </div>
        <div class="form-group col-md-6">
          <label for="leaderPosition">Position</label>
          <span style="color:red">*</span>
          <input 
          class="form-control" 
          type="text" 
          name="leaderPosition"
          id="leaderPosition"
          :readonly="disablePosition"
          v-model="leaderPosition"
          >
        </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
          <label for="leaderUCID">{{idText}}</label>
          <span style="color:red">*</span>
          <input 
            type="text" 
            class="form-control"
            name="leaderUCID"
            id="leaderUCID"  
            :readonly="disableUCID"
            v-model="leaderUCID"
            v-on:keyup="checkFaculty()"
            @change="checkFaculty()"
          >
        </div>
        <div class="form-group col-md-6">
          <label for="leaderDepartment">Department/Center/Faculty</label>
          <span style="color:red">*</span>
          <multiselect 
          id="leaderDepartment"
          :options="departmentOption" 
          :disabled="disableDeparCenFac"
          v-model="leaderDepartment"
          @select="selectFaculty"></multiselect>
        </div>
        <input type="hidden" name="leaderDepartment" v-model="leaderDepartmentCode">
       
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="leaderProgramme">Programme Study</label>
          <span style="color:red">*</span>
          <multiselect 
          :options="leaderProgrammeList" 
          :disabled="disablePrograme"
          v-model="leaderProgramme"></multiselect>
          <span>
            <small>Only for TAR UC Student</small>
          </span>
        </div>
        <input type="hidden" name="leaderProgramme" v-model="leaderProgramme">
      </div>
      <br>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
  components: {
    Multiselect
  },
  data: function() {
    return {
      options: [],
      departmentOption: [],
      
      leaderType: "",
      leaderName: "",
      leaderIC: "",
      leaderContact: "",
      leaderPersonalEmail: "",
      leaderHasCompany: false,
      leaderCompanyName: "",
      leaderCompanyRegNo: "",
      leaderPosition: "",
      leaderCompanyEmail: "",
      leaderUCID: "",
      leaderDepartment: "",
      leaderProgramme: "",
      leaderDepartmentCode: "",
      leaderProgrammeList: [],


      disableName: true,
      disableICNo: true,
      disablePerEmail: true,
      disableContact: true,
      disableHasCompany: true,
      
      disableCompanyName: true,
      disableCompanyRegNo: true,
      disableCompanyEmail: true,
      disablePosition: true,
      disableDeparCenFac: true,
      disableUCID: true,
      disablePrograme: true,

      mailText :'Company Email/TAR UC Email',
      idText : 'Alumni ID/Staff ID/Student ID',

    };
  },
  methods: {
    checkType(event) {
      this.checkFaculty();
      if ((event.target.value == 1)) {
        this.disableHasCompany= false,

        this.leaderHasCompany = true;
        this.disableUCID= false;
        this.disableCompanyName= true;
        this.disableCompanyRegNo= true;
        this.disableDeparCenFac= true;
        this.disablePrograme= false;
        this.disablePosition= true;
        this.disableHasCompany= true,

        this.leaderHasCompany = true;

        this.disableName= false;
        this.disableICNo= false;
        this.disablePerEmail= false;
        this.disableContact= false;
        this.disableCompanyEmail= false;

        this.mailText = 'TAR UC Email';
        this.idText = 'Student ID';
        
        this.leaderCompanyName= "Tunku Abdul Rahman University College";
        this.leaderCompanyRegNo= "1033820M";
        this.leaderPosition= "Student";

      }else if(event.target.value == 2){
        this.disableUCID= false;
        this.disableCompanyName= true;
        this.disableCompanyRegNo= true;
        this.disableDeparCenFac= false;
        this.disablePrograme= true;
        this.disablePosition= false;
        this.disableHasCompany= true,

        this.leaderHasCompany = true;

        this.disableName= false;
        this.disableICNo= false;
        this.disablePerEmail= false;
        this.disableContact= false;
        this.disableCompanyEmail= false;

        this.mailText = 'TAR UC Email';
        this.idText = 'Staff ID';

        this.mailText = 'TAR UC Email';
        this.idText = 'Staff ID';

        this.leaderCompanyName= "Tunku Abdul Rahman University College";
        this.leaderCompanyRegNo= "1033820M";

        this.leaderPosition= "";

      }else if(event.target.value == 3){
        document.getElementById("leaderHasCompany").checked = false;
        this.disableUCID= false;
        this.disableCompanyName= true;
        this.disableCompanyRegNo= true;
        this.disableDeparCenFac= true;
        this.disablePrograme= true;
        this.disablePosition= true;
        this.disableHasCompany= false,

        this.leaderHasCompany = false;

        this.disableName= false;
        this.disableICNo= false;
        this.disablePerEmail= false;
        this.disableContact= false;
        this.disableCompanyEmail= true;

        this.mailText = 'Official/Company Email';
        this.idText = 'Alumni ID';

        this.leaderCompanyName= "";
        this.leaderCompanyRegNo= "";

      }else if(event.target.value == 4){
        document.getElementById("leaderHasCompany").checked = false;
        this.disableUCID= true;
        this.disableCompanyName= true;
        this.disableCompanyRegNo= true;
        this.disableDeparCenFac= true;
        this.disablePrograme= true;
        this.disablePosition= true;
        this.disableHasCompany= false,
        
        this.leaderHasCompany = false;

        this.disableName= false;
        this.disableICNo= false;
        this.disablePerEmail= false;
        this.disableContact= false;
        this.disableCompanyEmail= true;

        this.mailText = 'Official/Company Email';
        this.idText = 'Student ID/Staff ID/Alumni ID';

        this.leaderCompanyName= "";
        this.leaderCompanyRegNo= "";
        this.leaderPosition= "";
        this.leaderDepartment= "";

      }
    },
    checkFaculty(){
      
       if(this.leaderUCID.length >= 4 && this.leaderUCID.length == 4 && this.leaderType == 1){
        if (this.leaderUCID.charAt(3) == 'P' || this.leaderUCID.charAt(3) == 'p') {
          this.leaderDepartment= "Centre for Postgraduate Studies and Research";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'R' || this.leaderUCID.charAt(3) == 'r') {
          this.leaderDepartment= "Centre for Pre-University Studies";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'B' || this.leaderUCID.charAt(3) == 'b') {
          this.leaderDepartment= "Facuty of Accounting, Finance and Business";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'K' || this.leaderUCID.charAt(3) == 'k') {
          this.leaderDepartment= "Facuty of Communication and Creative Industries";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'L' || this.leaderUCID.charAt(3) == 'l') {
          this.leaderDepartment= "Facuty of Applied Science";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'V' || this.leaderUCID.charAt(3) == 'v') {
          this.leaderDepartment= "Facuty of Build Envionment";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'M' || this.leaderUCID.charAt(3) == 'm') {
          this.leaderDepartment= "Facuty of Computing and Information Technology";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'G' || this.leaderUCID.charAt(3) == 'g') {
          this.leaderDepartment= "Facuty of Engineering and Technology";
          this.leaderDepartmentCode = 'focs'
        }
        if (this.leaderUCID.charAt(3) == 'J' || this.leaderUCID.charAt(3) == 'j') {
          this.leaderDepartment= "Facuty of Social Science and Humanities";
          this.leaderDepartmentCode = 'focs'
        }

      }else if(this.leaderUCID.length < 4 && this.leaderType == 1){
        this.leaderDepartment= "";
        this.leaderDepartmentCode = ''
      }

      if(this.leaderType == 3){
        this.leaderDepartment= "Alumni";
        this.leaderDepartmentCode = 'alumni'
      }else if (this.leaderType == 4) {
        this.leaderDepartment= "N/A";
        this.leaderDepartmentCode = 'public'
      }

      //continue here
    //url = getprog + faculty id code & lvl code

    if (this.leaderUCID.length == 10) {

      console.log('test12')
      // faculty = this.leaderUCID.charAt(4)
      // level = this.leaderUCID.charAt(5)

      axios
          .get('/get/programmes/' + this.leaderUCID.charAt(3) + '/' + this.leaderUCID.charAt(4))
          .then(
            response => (this.leaderProgrammeList = response.data)
          );
    }else {
      this.leaderProgrammeList = []
    }

    },
    checkHasCompany(e){
      if(e.target.checked == true && this.leaderType == 3 || e.target.checked == true && this.leaderType == 4){
        this.disableCompanyName= false;
        this.disableCompanyRegNo= false;
        this.disablePosition= false;
        this.disableCompanyEmail= false;

        this.leaderHasCompany = true;

      }else {
        this.disableCompanyName= true;
        this.disableCompanyRegNo= true;
        this.disablePosition= true;
        this.disableCompanyEmail= true;

        this.leaderHasCompany = false;

      }
    },
    selectFaculty(selectedOption, id){
      if (this.leaderType == 2) {
        this.leaderDepartmentCode = selectedOption;
      }
    }
  },
  
  beforeCreate() {
        axios
          .get('/get/department')
          .then(
            response => (this.departmentOption = response.data)
          );
  },
  watch: {

  }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
