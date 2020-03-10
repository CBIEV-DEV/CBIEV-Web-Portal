<template>
  <div class="app">
    <div class="form-group">
      <input type="button" @click="addMember" class="btn btn-info" value="Add Member">
    </div>
    <div class v-for="(member,index) in members" :key="(member, index)">
      <input type="hidden" name="participantIndex" :value="participantIndex">

      <div class="form-row">
        <div class="form-group col-md-6">
          <div>
            <strong>Member No: {{index + 1}}</strong>
          </div>
        </div>
        <div class="form-group col-md-6">
          <button
            type="button"
            @click="deleteMember"
            title="Remove Member"
            class="btn btn-outline-danger"
          >X</button>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="memberType">Member Type</label>
          <select
            class="form-control"
            name="memberType[]"
            id="memberType"
            @change="checkType($event, index)"
            v-model="member.memberType"
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
          <label for="memberName">Name</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="memberName[]"
            id="memberName"
            :readonly="member.disableName"
            v-model="member.memberName"
          >
        </div>
        <div class="form-group col-md-6">
          <label for="memberIC">IC No</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="memberIC[]"
            id="memberIC"
            style="text-transform:uppercase"
            :readonly="member.disableICNo"
            v-model="member.memberIC"
          >
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="memberContact">Contact No.</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="memberContact[]"
            id="memberContact"
            :readonly="member.disableContact"
            v-model="member.memberContact"
          >
        </div>
        <div class="form-group col-md-6">
          <label for="memberEmail">Personal Email</label>
          <span style="color:red">*</span>
          <input
            type="email"
            name="memberEmail[]"
            id="memberEmail"
            class="form-control"
            :readonly="member.disablePerEmail"
            v-model="member.memberPersonalEmail"
          >
        </div>
        
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <div class="checkbox">
            <label for="memberHasCompany">
              <input type="checkbox" 
              name="memberHasCompany" 
              id="memberHasCompany"
              :disabled="member.disableHasCompany"
              @change="checkHasCompany($event, index)"
              > Own a company?
            </label>
          </div>
        <input type="hidden" name="memberHasCompany[]" v-model="member.memberHasCompany">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="memberCompanyName">Company Name</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="memberCompanyName[]"
            id="memberCompanyName"
            v-model="member.memberCompanyName"
            :readonly="member.disableCompanyName"
          >
        </div>
        <div class="form-group col-md-6">
          <label for="memberCompanyRegNo">Company Registration No.</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            name="memberCompanyRegNo[]"
            id="memberCompanyRegNo"
            :readonly="member.disableCompanyRegNo"
            v-model="member.memberCompanyRegNo"
          >
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="memberCompanyEmail">{{member.mailText}}</label>
          <span style="color:red">*</span>
          <input 
          class="form-control"
          type="text" 
          name="memberCompanyEmail[]"
          id="memberCompanyEmail"
          :readonly="member.disableCompanyEmail"
          v-model="member.memberCompanyEmail" >
        </div>
        <div class="form-group col-md-6">
          <label for="memberPosition">Position</label>
          <span style="color:red">*</span>
          <input 
          class="form-control" 
          type="text" 
          name="memberPosition[]"
          id="memberPosition"
          :readonly="member.disablePosition"
          v-model="member.memberPosition"
          >
        </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
          <label for="memberUCID">{{member.idText}}</label>
          <span style="color:red">*</span>
          <input 
            type="text" 
            class="form-control"
            name="memberUCID[]"
            id="memberUCID"  
            :readonly="member.disableUCID"
            v-model="member.memberUCID"
            @change="checkFaculty(index)"
          >
            <!-- v-on:keyup="checkFaculty(index)" -->

        </div>
        <div class="form-group col-md-6">
          <label for="memberDepartment">Department/Center/Faculty</label>
          <span style="color:red">*</span>
          <multiselect 
          id="memberDepartment"
          :options="departmentOption" 
          :disabled="member.disableDeparCenFac"
          v-model="member.memberDepartment"
          @select="selectFaculty(index)"></multiselect>

          <input type="hidden" name="memberDepartment[]" v-model="member.memberDepartment">
        </div>
       
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="memberProgramme">Programme Study</label>
          <span style="color:red">*</span>
          <multiselect 
          id="memberProgramme"
          name="memberProgramme[]"
          :options="member.memberProgrammeList" 
          :disabled="member.disablePrograme"
          v-model="member.memberProgramme"></multiselect>
          <span>
            <input type="hidden" name="memberProgramme[]" id="memberProgramme" v-model="member.memberProgramme">
            <small>Only for TAR UC Student</small>
          </span>
        </div>
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
      departmentOption : [],
      members: [
        {
          memberType: "",
          memberName: "",
          memberIC: "",
          memberContact: "",
          memberPersonalEmail: "",
          memberHasCompany: false,
          memberCompanyName: "",
          memberCompanyRegNo: "",
          memberPosition: "",
          memberCompanyEmail: "",
          memberUCID: "",
          memberDepartment: "",
          memberProgramme: "",
          memberProgrammeList: [],
          memberDepartmentCode: "",

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
        }
      ],
      placeholder: '',
      participantIndex: 1,
    };
  },
  methods: {
    initMember(index){
      this.members[index].memberName= "";
      this.members[index].memberIC= "";
      this.members[index].memberContact= "";
      this.members[index].memberPersonalEmail= "";
      this.members[index].memberHasCompany= false;

      this.members[index].memberCompanyName= "";
      this.members[index].memberCompanyRegNo= "";
      this.members[index].memberPosition= "";
      this.members[index].memberCompanyEmail= "";
      this.members[index].memberUCID= "";
      this.members[index].memberDepartment= "";
      this.members[index].memberDepartmentCode= "";
      this.members[index].memberProgramme= "";
      this.members[index].memberDepartmentCode= "";

      this.members[index].disableName= true;
      this.members[index].disableICNo= true;
      this.members[index].disablePerEmail= true;
      this.members[index].disableContact= true;
      this.members[index].disableHasCompany= true;

      this.members[index].disableCompanyName= true;
      this.members[index].disableCompanyRegNo= true;
      this.members[index].disableCompanyEmail= true;
      this.members[index].disablePosition= true;
      this.members[index].disableDeparCenFac= true;
      this.members[index].disableUCID= true;
      this.members[index].disablePrograme= true;

      this.members[index].mailText ='Company Email/TAR UC Email';
      this.members[index].idText = 'Alumni ID/Staff ID/Student ID'
    },
    checkType(event,index) {
      this.initMember(index);
      if ((event.target.value == 1)) {
        this.members[index].disableUCID= false;
        this.members[index].disableCompanyName= true;
        this.members[index].disableCompanyRegNo= true;
        this.members[index].disableDeparCenFac= true;
        this.members[index].disablePrograme= false;
        this.members[index].disablePosition= true;
        this.members[index].disableHasCompany= true;

        this.members[index].disableName= false;
        this.members[index].disableICNo= false;
        this.members[index].disablePerEmail= false;
        this.members[index].disableContact= false;
        this.members[index].disableCompanyEmail= false;

        this.members[index].memberHasCompany = true;


        this.members[index].mailText = 'TAR UC Email';
        this.members[index].idText = 'Student ID';

        this.members[index].memberCompanyName= "Tunku Abdul Rahman University College";
        this.members[index].memberCompanyRegNo= "1033820M";
        this.members[index].memberPosition= "Student";

      }else if(event.target.value == 2){
        this.members[index].disableUCID= false;
        this.members[index].disableCompanyName= true;
        this.members[index].disableCompanyRegNo= true;
        this.members[index].disableDeparCenFac= false;
        this.members[index].disablePrograme= true;
        this.members[index].disablePosition= false;
        this.members[index].disableHasCompany= true,

        this.members[index].memberHasCompany = true;

        this.members[index].disableName= false;
        this.members[index].disableICNo= false;
        this.members[index].disablePerEmail= false;
        this.members[index].disableContact= false;
        this.members[index].disableCompanyEmail= false;

        this.members[index].mailText = 'TAR UC Email';
        this.members[index].idText = 'Staff ID';

        this.members[index].mailText = 'TAR UC Email';
        this.members[index].idText = 'Staff ID';

        this.members[index].memberCompanyName= "Tunku Abdul Rahman University College";
        this.members[index].memberCompanyRegNo= "1033820M";

        this.members[index].memberPosition= "";

      }else if(event.target.value == 3){
        document.getElementById("memberHasCompany").checked = false;

        this.members[index].disableUCID= false;
        this.members[index].disableCompanyName= true;
        this.members[index].disableCompanyRegNo= true;
        this.members[index].disableDeparCenFac= true;
        this.members[index].disablePrograme= true;
        this.members[index].disablePosition= true;
        this.members[index].disableHasCompany= false,

        this.members[index].memberHasCompany = false;

        this.members[index].disableName= false;
        this.members[index].disableICNo= false;
        this.members[index].disablePerEmail= false;
        this.members[index].disableContact= false;
        this.members[index].disableCompanyEmail= true;

        this.members[index].mailText = 'Official/Company Email';
        this.members[index].idText = 'Alumni ID';

        this.members[index].memberCompanyName= "";
        this.members[index].memberCompanyRegNo= "";
        this.members[index].memberDepartment= "Alumni";
        this.members[index].memberDepartmentCode= "";
        
        this.members[index].memberProgramme= "N/A";

      }else if(event.target.value == 4){
        this.members[index].disableUCID= true;
        this.members[index].disableCompanyName= true;
        this.members[index].disableCompanyRegNo= true;
        this.members[index].disableDeparCenFac= true;
        this.members[index].disablePrograme= true;
        this.members[index].disablePosition= true;
        this.members[index].disableHasCompany= false,

        this.members[index].memberHasCompany = false;
        
        this.members[index].disableName= false;
        this.members[index].disableICNo= false;
        this.members[index].disablePerEmail= false;
        this.members[index].disableContact= false;
        this.members[index].disableCompanyEmail= true;

        this.members[index].mailText = 'Official/Company Email';
        this.members[index].idText = 'Student ID/Staff ID/Alumni ID';

        this.members[index].memberCompanyName= "";
        this.members[index].memberCompanyRegNo= "";
        this.members[index].memberPosition= "";
        this.members[index].memberDepartment= "";
        this.members[index].memberDepartmentCode= "";

        this.members[index].memberUCID= "N/A";
        this.members[index].memberDepartment= "N/A";
        this.members[index].memberProgramme= "N/A";

      }
    },
    addMember() {
      if (this.participantIndex < 5) {
        this.participantIndex++;
        this.members.push({
          memberType: "",
          memberName: "",
          memberIC: "",
          memberContact: "",
          memberPersonalEmail: "",
          memberCompanyName: "",
          memberCompanyRegNo: "",
          memberPosition: "",
          memberCompanyEmail: "",
          memberUCID: "",
          memberDepartment: "",
          memberProgramme: "",

          disableName: true,
          disableICNo: true,
          disablePerEmail: true,
          disableContact: true,
          disableCompanyName: true,
          disableCompanyRegNo: true,
          disableCompanyEmail: true,
          disablePosition: true,
          disableDeparCenFac: true,
          disableUCID: true,
          disablePrograme: true,

          mailText :'Official Email/Company Email/UC Email',
          idText : 'Student ID/Staff ID/Alumni ID',
        });
      }
    },
    deleteMember(index) {
      this.participantIndex--;
      this.members.splice(index, 1);
    },
    checkFaculty(index){
      if(this.members[index].memberUCID.length == 10 && this.members[index].memberType == 1){
        if (this.members[index].memberUCID.charAt(3) == 'P' || this.members[index].memberUCID.charAt(3) == 'p') {
          this.members[index].memberDepartment= "Centre for Postgraduate Studies and Research";
          this.members[index].memberDepartmentCode = 'cpsr'
        }
        if (this.members[index].memberUCID.charAt(3) == 'R' || this.members[index].memberUCID.charAt(3) == 'r') {
          this.members[index].memberDepartment= "Centre for Pre-University Studies";
          this.members[index].memberDepartmentCode = 'cpus'
        }
        if (this.members[index].memberUCID.charAt(3) == 'B' || this.members[index].memberUCID.charAt(3) == 'b') {
          this.members[index].memberDepartment= "Faculty of Accounting, Finance and Business";
          this.members[index].memberDepartmentCode = 'fafb'
        }
        if (this.members[index].memberUCID.charAt(3) == 'K' || this.members[index].memberUCID.charAt(3) == 'k') {
          this.members[index].memberDepartment= "Faculty of Communication and Creative Industries";
          this.members[index].memberDepartmentCode = 'fcci'
        }
        if (this.members[index].memberUCID.charAt(3) == 'L' || this.members[index].memberUCID.charAt(3) == 'l') {
          this.members[index].memberDepartment= "Faculty of Applied Science";
          this.members[index].memberDepartmentCode = 'foas'
        }
        if (this.members[index].memberUCID.charAt(3) == 'V' || this.members[index].memberUCID.charAt(3) == 'v') {
          this.members[index].memberDepartment= "Faculty of Build Envionment";
          this.members[index].memberDepartmentCode = 'fobe'
        }
        if (this.members[index].memberUCID.charAt(3) == 'M' || this.members[index].memberUCID.charAt(3) == 'm') {
          this.members[index].memberDepartment= "Faculty of Computing and Information Technology";
          this.members[index].memberDepartmentCode = 'focs'
        }
        if (this.members[index].memberUCID.charAt(3) == 'G' || this.members[index].memberUCID.charAt(3) == 'g') {
          this.members[index].memberDepartment= "Faculty of Engineering and Technology";
          this.members[index].memberDepartmentCode = 'foet'
        }
        if (this.members[index].memberUCID.charAt(3) == 'J' || this.members[index].memberUCID.charAt(3) == 'j') {
          this.members[index].memberDepartment= "Faculty of Social Science and Humanities";
          this.members[index].memberDepartmentCode = 'fssh'
        }

      }else if(this.members[index].memberUCID.length < 4 && this.members[index].memberType == 1){
        this.members[index].memberDepartment= "";
        this.members[index].memberDepartmentCode = ''
      }

      if(this.members[index].memberType == 3){
        this.members[index].memberDepartment= "Alumni";
        this.members[index].memberDepartmentCode = 'alumni'
      }else if (this.members[index].memberType == 4) {
        this.members[index].memberDepartment= "N/A";
        this.members[index].memberDepartmentCode = 'public'
      }

      if (this.members[index].memberUCID.length == 10) {

        axios
            .get('/get/programmes/' + this.members[index].memberUCID.charAt(3) + '/' + this.members[index].memberUCID.charAt(4))
            .then(
              response => (this.members[index].memberProgrammeList = response.data)
            );
      }else {
        this.members[index].memberProgrammeList = []
      }

    },
    checkHasCompany(e, index){
      if(e.target.checked == true){
        this.members[index].disableCompanyName= false;
        this.members[index].disableCompanyRegNo= false;
        this.members[index].disablePosition= false;
        this.members[index].disableCompanyEmail= false;

        this.members[index].memberHasCompany = true;
      }else{
        this.members[index].disableCompanyName= true;
        this.members[index].disableCompanyRegNo= true;
        this.members[index].disablePosition= true;
        this.members[index].disableCompanyEmail= true;

        this.members[index].memberHasCompany = false;
      }
    },
    selectFaculty(index){
      if (this.members[index].memberType == 2) {
        
        console.log(members)
        console.log(index)
        console.log(this.members[index].memberDepartment)
        this.placeholder =  this.members[index].memberDepartment;
        this.members[index].memberDepartmentCode = this.placeholder;
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
