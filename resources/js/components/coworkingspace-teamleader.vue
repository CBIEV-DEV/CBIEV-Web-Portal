<template>
  <div class="app">
    <div>
      
      
      <div class="form-row">
         <div class="form-group col-md-6">
          <label for="coworkingspaceleaderUCID">Student ID</label>
          <span style="color:red">*</span>
          <input 
            type="text" 
            class="form-control"
            required=""
            placeholder="Example: xxWMDxxxxx, etc...."
            pattern="[0-9]{2}[A-Z]{3}[0-9]{5}|[0-9]{4}"
            title="Example: xxWMDxxxxx, etc...."
            name="coworkingspaceleaderUCID"
            id="coworkingspaceleaderUCID"  
            :readonly="disableUCID"
            v-model="coworkingspaceleaderUCID"
            v-on:keyup="checkFaculty()"
            @change="checkFaculty()"
          >
        </div>
        
        <div class="form-group col-md-6">
          <label for="coworkingspaceleaderDepartment">Faculty</label>
          <span style="color:red">*</span>
          <multiselect 
          id="coworkingspaceleaderDepartment"
          :options="departmentOption" 
          :disabled="disableDeparCenFac"
          v-model="coworkingspaceleaderDepartment"
          @select="selectFaculty"></multiselect>
        </div>
        <input type="hidden" name="coworkingspaceleaderDepartmentCode" v-model="coworkingspaceleaderDepartmentCode">
       
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="coworkingspaceleaderProgramme">Programme Study</label>
          <span style="color:red">*</span>
          <multiselect 
          :options="coworkingspaceleaderProgrammeList" 
          :disabled="disablePrograme"
          v-model="coworkingspaceleaderProgramme"></multiselect>
          <span>
            <small>Only for TAR UC Student</small>
          </span>
        </div>
        <input type="hidden" name="coworkingspaceleaderProgramme" v-model="coworkingspaceleaderProgramme">
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
      
      coworkingspaceleaderUCID: "",
      coworkingspaceleaderDepartment: "",
      coworkingspaceleaderProgramme: "",
      coworkingspaceleaderDepartmentCode: "",
      coworkingspaceleaderProgrammeList: [],
      
      disableDeparCenFac: true,
      disableUCID: false,
      disablePrograme: false,

    };
  },
  methods: {
    checkFaculty(){
      
       if(this.coworkingspaceleaderUCID.length >= 4 ){
        if (this.coworkingspaceleaderUCID.charAt(3) == 'P' || this.coworkingspaceleaderUCID.charAt(3) == 'p') {
          this.coworkingspaceleaderDepartment= "Centre for Postgraduate Studies and Research";
          this.coworkingspaceleaderDepartmentCode = 4
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'R' || this.coworkingspaceleaderUCID.charAt(3) == 'r') {
          this.coworkingspaceleaderDepartment= "Centre for Pre-University Studies";
          this.coworkingspaceleaderDepartmentCode = 5
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'B' || this.coworkingspaceleaderUCID.charAt(3) == 'b') {
          this.coworkingspaceleaderDepartment= "Facuty of Accounting, Finance and Business";
          this.coworkingspaceleaderDepartmentCode = 17
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'K' || this.coworkingspaceleaderUCID.charAt(3) == 'k') {
          this.coworkingspaceleaderDepartment= "Facuty of Communication and Creative Industries";
          this.coworkingspaceleaderDepartmentCode = 20
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'L' || this.coworkingspaceleaderUCID.charAt(3) == 'l') {
          this.coworkingspaceleaderDepartment= "Facuty of Applied Science";
          this.coworkingspaceleaderDepartmentCode = 18
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'V' || this.coworkingspaceleaderUCID.charAt(3) == 'v') {
          this.coworkingspaceleaderDepartment= "Facuty of Build Envionment";
          this.coworkingspaceleaderDepartmentCode = 19
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'M' || this.coworkingspaceleaderUCID.charAt(3) == 'm') {
          this.coworkingspaceleaderDepartment= "Facuty of Computing and Information Technology";
          this.coworkingspaceleaderDepartmentCode = 20
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'G' || this.coworkingspaceleaderUCID.charAt(3) == 'g') {
          this.coworkingspaceleaderDepartment= "Facuty of Engineering and Technology";
          this.coworkingspaceleaderDepartmentCode = 22
        }
        if (this.coworkingspaceleaderUCID.charAt(3) == 'J' || this.coworkingspaceleaderUCID.charAt(3) == 'j') {
          this.coworkingspaceleaderDepartment= "Facuty of Social Science and Humanities";
          this.coworkingspaceleaderDepartmentCode = 23
        }

      }

      //continue here
    //url = getprog + faculty id code & lvl code

    if (this.coworkingspaceleaderUCID.length == 10) {

      console.log('test12')
      // faculty = this.leaderUCID.charAt(4)
      // level = this.leaderUCID.charAt(5)

      axios
          .get('/get/programmes/' + this.coworkingspaceleaderUCID.charAt(3) + '/' + this.coworkingspaceleaderUCID.charAt(4))
          .then(
            response => (this.coworkingspaceleaderProgrammeList = response.data)
          );
    }else {
      this.coworkingspaceleaderProgrammeList = []
    }

    },

    selectFaculty(selectedOption, id){
      if (this.coworkingspaceleaderType == 2) {
        this.coworkingspaceleaderDepartmentCode = selectedOption;
      }
    }
  },
  
  beforeCreate() {
        axios
          .get('/get/programmes')
          .then(
            response => (this.options = response.data)
          );
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
