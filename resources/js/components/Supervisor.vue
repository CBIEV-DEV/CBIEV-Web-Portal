<template>
  <keep-alive>
    <div id="app">
      <div class="form-group">
        <input type="button" value="Add Supervisor" class="btn btn-info" @click="addSupervisor">
      </div>
      <div class v-for="(supervisor,index) in supervisors" :key="(supervisor, index)">
        <input type="hidden" name="supervisorIndex" :value="supervisorIndex">
        <div class="superviser-field">
          <div class="form-row">
            <div class="form-group col-md-6">
              <div>
                Supervisor
                <strong>{{index + 1}}</strong>
              </div>
            </div>
            <div class="form-group col-md-6">
              <button
                type="button"
                @click="deleteSupervisor"
                title="Remove Supervisor"
                class="btn btn-outline-danger"
              >X</button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="supType">Supervisor Type</label>
              <select 
              class="form-control" 
              name="supType[]" 
              id="supType"
              @change="checkType($event, index)"
              v-model="supervisor.supervisorType"
              >
                <option value="2">TAR UC Staff</option>
                <option value="3">Alumni</option>
                <option value="4">Public</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="supervisorName">Name</label>
              <span style="color:red">*</span>
              <input
                class="form-control"
                type="text"
                placeholder="Insert your name" 
                required="" 
                title="Please insert your name"
                name="supervisorName[]"
                id="supervisorName"
                :readonly="supervisor.disableName"
                v-model="supervisor.supervisorName"
              >
            </div>
            <div class="form-group col-md-6">
              <label for="supervisorIC">IC No.</label>
              <span style="color:red">*</span>
              <input
                class="form-control"
                type="text"
                placeholder="Example:xxxxxx-xx-xxxx, etc..." 
                required="" 
                pattern="[0-9]{6}[-][0-9]{2}[-][0-9]{4}" 
                title="Example:xxxxxx-xx-xxxx"
                name="supervisorIC[]"
                id="supervisorIC"
                :readonly="supervisor.disableICNo"
                v-model="supervisor.supervisorIC"
              >
            </div>
          </div>
          <div class="form-row">
            
            <div class="form-group col-md-6">
              <label for="supervisorContact">Contact Number</label>
              <span style="color:red">*</span>
              <input
                class="form-control"
                type="text"
                placeholder="Example:012-xxxxxxx, etc..." 
                required="" 
                pattern="0[0-9]{2}[-][0-9]{7,}" 
                title="Example:012-xxxxxxx, etc...."
                name="supervisorContact[]"
                id="supervisorContact"
                :readonly="supervisor.disableContact"
                v-model="supervisor.supervisoContact"
              >
            </div>
            <div class="form-group col-md-6">
              <label for="supervisorEmail">Personal Email</label>
              <span style="color:red">*</span>
              <input
                class="form-control"
                type="email"
                placeholder="Example:abc123@gmail.com, etc..." 
                required="" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$|[a-z0-9._%+-]+@[a-z0-9.-]+\.my$|[a-z0-9._%+-]+@[a-z0-9.-]+\.net$" 
                title="Example:abc123@gmail.com, etc..."
                name="supervisorEmail[]"
                id="supervisorEmail"
                :readonly="supervisor.disablePerEmail"
                v-model="supervisor.supervisorEmail"
              >
            </div>
          </div>
          <div class="form-row">
        <div class="form-group col-md-6">
          <div class="checkbox">
            <label for="supervisorHasCompany">
              <input type="checkbox" 
              name="supervisorHasCompany" 
              id="supervisorHasCompany"
              :disabled="supervisor.disableHasCompany"
              @change="checkHasCompany($event, index)"
              v-model="supervisor.supervisorHasCompany"
              > Own a company?
            </label>
          </div>
        <input type="hidden" name="supervisorHasCompany[]" v-model="supervisor.supervisorHasCompany">
        </div>
      </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="supervisorCompanyName">Company Name</label>
              <span style="color:red">*</span>
              <input
                class="form-control"
                type="text"
                placeholder="Insert company name"
                required=""
                title="Please insert company name"
                name="supervisorCompanyName[]"
                id="supervisorCompanyName"
                :readonly="supervisor.disableCompanyName"
                v-model="supervisor.supervisorCompanyName"
              >
            </div>
            <div class="form-group col-md-6">
              <label for="supervisorCompanyRegNo">Company Registration No.</label>
              <span style="color:red">*</span>
              <input
                class="form-control"
                type="text"
                placeholder="Insert company registration number"
                required=""
                pattern="[a-zA-Z0-9]+"
                title="Please insert company registration number"
                name="supervisorCompanyRegNo[]"
                id="supervisorCompanyRegNo"
                :readonly="supervisor.disableCompanyRegNo"
                v-model="supervisor.supervisorCompanyRegNo"
              >
            </div>
            <div class="form-group col-md-6"></div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="supervisorCompanyEmail">{{ supervisor.mailText }}</label>
              <span style="color:red">*</span>
              <input
                class="form-control"
                type="text" 
                placeholder="Example:abc123@gmail.com, etc..." 
                required="" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$|[a-z0-9._%+-]+@[a-z0-9.-]+\.my$|[a-z0-9._%+-]+@[a-z0-9.-]+\.net$" 
                title="Example:abc123@gmail.com, etc..."
                name="supervisorCompanyEmail[]"
                id ="supervisorCompanyEmail" 
                :readonly="supervisor.disableCompanyEmail"
                v-model="supervisor.supervisorCompanyEmail"
              >
            </div>
            <div class="form-group col-md-6">
              <label for="supervisorPosition">Position</label>
              <span style="color:red">*</span>
              <input 
                class="form-control"
                type="text" 
                placeholder="Insert supervisor position "
                required=""
                pattern="[a-zA-Z]+"
                title="Please insert supervisor position"
                name="supervisorPosition[]"
                id ="supervisorPosition"
                list="position" 
                :readonly="supervisor.disablePosition"
                v-model="supervisor.supervisorPosition"
              >
              <datalist id="position">
                <option value="Programme Leader"/>
                <option value="Course Leader"/>
                <option value="Lecturer"/>
              </datalist>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="supervisorUCID">{{ supervisor.idText }}</label>
              <span style="color:red">*</span>
              <input 
                class="form-control"
                type="text"
                placeholder="Example: xxWMDxxxxx,MRxxxxxx etc...."
                pattern="[0-9]{2}[A-Z]{3}[0-9]{5}|[0-9]{4}|[A-Z]{2}[0-9]{6}"
                title="Example: xxWMDxxxxx, etc...."
                required=""
                id="supervisorUCID"
                name="supervisorUCID[]"
                :readonly="supervisor.disableUCID"  
                v-model="supervisor.supervisorUCID"
              >
            </div>
            <div class="form-group col-md-6">
              <label for="supervisorDepartment">Center/Department/Faculty</label>
              <span style="color:red">*</span>
              <multiselect 
              id="supervisorDepartment"
              :options="departmentOption" 
              :disabled="supervisor.disableDeparCenFac"
              v-model="supervisor.supervisorDepartment"
              @select="selectFaculty(index)"></multiselect>
            <input type="hidden" name="supervisorDepartmentCode[]" id="supervisorDepartment" v-model="supervisor.supervisorDepartment">
            </div>
            
          </div>
        </div>
        <br>
      </div>
    </div>
  </keep-alive>
</template>


<script>
import Multiselect from "vue-multiselect";

export default {
  components: {
    Multiselect
  },
  data: function() {
    return {
      supervisors: [
        {
          supervisorType: "",
          supervisorName: "",
          supervisorIC: "",
          supervisorContact: "",
          supervisorEmail: "",
          supervisorHasCompany: false,
          supervisorCompanyName: "",
          supervisorCompanyRegNo: "",
          supervisorPosition: "",
          supervisorCompanyEmail: "",
          supervisorUCID: "",
          supervisorDepartment: "",
          supervisorDepartmentCode: "",

          disableName: true,
          disableICNo: true,
          disableContact: true,
          disablePerEmail: true,
          disableHasCompany: true,
          disableCompanyName: true,
          disableCompanyRegNo: true,
          disablePosition: true,
          disableCompanyEmail: true,
          disableUCID: true,
          disableDeparCenFac: true,

          mailText :'TAR UC Email/Company Email',
          idText : 'Alumni ID/Staff ID',
        }
      ],
      supervisorIndex: 1,
      departmentOption: []
    };
  },
  watch: {
    name(value) {
      this.supervisors.name = value;
    }
  },
  methods: {
    initSupervisor(index){
          this.supervisors[index].supervisorName= "";
          this.supervisors[index].supervisorIC= "";
          this.supervisors[index].supervisorContact= "";
          this.supervisors[index].supervisorEmail= "";
          this.supervisors[index].supervisorCompanyName= "";
          this.supervisors[index].supervisorCompanyRegNo= "";
          this.supervisors[index].supervisorPosition= "";
          this.supervisors[index].supervisorCompanyEmail= "";
          this.supervisors[index].supervisorUCID= "";
          this.supervisors[index].supervisorDepartment= "";
          this.supervisors[index].supervisorDepartmentCode= "";

          this.supervisors[index].disableName= true;
          this.supervisors[index].disableICNo= true;
          this.supervisors[index].disableContact= true;
          this.supervisors[index].disablePerEmail= true;
          this.supervisors[index].disableCompanyName= true;
          this.supervisors[index].disableCompanyRegNo= true;
          this.supervisors[index].disablePosition= true;
          this.supervisors[index].disableCompanyEmail= true;
          this.supervisors[index].disableUCID= true;
          this.supervisors[index].disableDeparCenFac= true;
          this.supervisors[index].disableHasCompany= true;
          this.supervisors[index].mailText = 'TAR UC Email/Company Email';
          this.supervisors[index].idText = 'Staff ID/ALumni ID';
    },
    checkType(event,index) {
      if ((event.target.value == 2)) {
        this.supervisors[index].disableUCID= false;
        this.supervisors[index].disableCompanyName= true;
        this.supervisors[index].disableCompanyRegNo= true;
        this.supervisors[index].disableDeparCenFac= false;
        this.supervisors[index].disablePrograme= false;
        this.supervisors[index].disablePosition= false;

        this.supervisors[index].disableName= false;
        this.supervisors[index].disableICNo= false;
        this.supervisors[index].disablePerEmail= false;
        this.supervisors[index].disableContact= false;
        this.supervisors[index].disableCompanyEmail= false;
        this.supervisors[index].supervisorHasCompany= true;
        this.supervisors[index].disableHasCompany= true;

        this.supervisors[index].mailText = 'UC Email';
        this.supervisors[index].idText = 'Staff ID';

        this.supervisors[index].supervisorCompanyName= "Tunku Abdul Rahman University College";
        this.supervisors[index].supervisorCompanyRegNo= "1033820M";
        this.supervisors[index].supervisorUCID = ""
        this.supervisors[index].supervisorDepartment= "";

      }else if(event.target.value == 3){
        this.supervisors[index].disableUCID= false;
        this.supervisors[index].disableCompanyName= false;
        this.supervisors[index].disableCompanyRegNo= false;
        this.supervisors[index].disableDeparCenFac= true;
        this.supervisors[index].disablePrograme= true;
        this.supervisors[index].disablePosition= false;

        this.supervisors[index].disableName= false;
        this.supervisors[index].disableICNo= false;
        this.supervisors[index].disablePerEmail= false;
        this.supervisors[index].disableContact= false;
        this.supervisors[index].disableHasCompany= false;
        this.supervisors[index].disableCompanyName= true;
        this.supervisors[index].disableCompanyRegNo= true;
        this.supervisors[index].disablePosition= true;
        this.supervisors[index].disableCompanyEmail= true;

        this.supervisors[index].mailText = 'Company Email';
        this.supervisors[index].idText = 'Alumni ID';

        this.supervisors[index].supervisorCompanyName= "";
        this.supervisors[index].supervisorCompanyRegNo= "";
        this.supervisors[index].supervisorUCID = ""
        this.supervisors[index].supervisorDepartment= "Alumni";


      }else if(event.target.value == 4){

        this.supervisors[index].disableUCID= true;
        this.supervisors[index].disableCompanyName= false;
        this.supervisors[index].disableCompanyRegNo= false;
        this.supervisors[index].disableDeparCenFac= true;
        this.supervisors[index].disablePrograme= true;
        this.supervisors[index].disablePosition= false;
        
        this.supervisors[index].disableName= false;
        this.supervisors[index].disableICNo= false;
        this.supervisors[index].disablePerEmail= false;
        this.supervisors[index].disableContact= false;
        this.supervisors[index].disableHasCompany= false;
        this.supervisors[index].disableCompanyName= true;
        this.supervisors[index].disableCompanyRegNo= true;
        this.supervisors[index].disablePosition= true;
        this.supervisors[index].disableCompanyEmail= true;

        this.supervisors[index].mailText = 'Official/Company Email';
        this.supervisors[index].idText = 'Student ID/Staff ID/Alumni ID';

        this.supervisors[index].supervisorUCID = "N/A"
        this.supervisors[index].supervisorCompanyName= "";
        this.supervisors[index].supervisorCompanyRegNo= "";
        this.supervisors[index].supervisorPosition= "";
        this.supervisors[index].supervisorDepartment= "N/A";

      }
    },
    addSupervisor() {
      while (this.supervisorIndex < 3) {
        this.supervisorIndex++;
        this.supervisors.push({
          supervisorType: "",
          supervisorName: "",
          supervisorIC: "",
          supervisorContact: "",
          supervisorEmail: "",
          supervisorCompanyName: "",
          supervisorCompanyRegNo: "",
          supervisorPosition: "",
          supervisorCompanyEmail: "",
          supervisorUCID: "",
          supervisorDepartment: "",

          disableName: true,
          disableICNo: true,
          disableContact: true,
          disablePerEmail: true,
          disableCompanyName: true,
          disableCompanyRegNo: true,
          disablePosition: true,
          disableCompanyEmail: true,
          disableUCID: true,
          disableDeparCenFac: true,

          mailText :'Official Email/Company Email/UC Email',
          idText : 'Student ID/Staff ID/Alumni ID',
        });
      }
    },
    deleteSupervisor(index) {
      this.supervisorIndex--;
      this.supervisors.splice(index, 1);
    },
    selectFaculty(index){
      if (this.supervisors[index].supervisorType == 2) {
        
        console.log(this.supervisors)
        console.log(index)
        console.log(this.supervisors[index].supervisorDepartment)
        this.placeholder =  this.supervisors[index].supervisorDepartment;
        this.supervisors[index].supervisorDepartmentCode = this.placeholder;
      }
    },
    checkHasCompany(e, index){
      if(e.target.checked == true){
        this.supervisors[index].disableCompanyName= false;
        this.supervisors[index].disableCompanyRegNo= false;
        this.supervisors[index].disablePosition= false;
        this.supervisors[index].disableCompanyEmail= false;

        this.supervisors[index].supervisorHasCompany = true;
      }else{
        this.supervisors[index].disableCompanyName= true;
        this.supervisors[index].disableCompanyRegNo= true;
        this.supervisors[index].disablePosition= true;
        this.supervisors[index].disableCompanyEmail= true;

        this.supervisors[index].supervisorHasCompany = false;
      }
    },
  },
  beforeCreate() {
        axios
          .get('/get/department')
          .then(
            response => (this.departmentOption = response.data)
          );
  },
};
</script>
