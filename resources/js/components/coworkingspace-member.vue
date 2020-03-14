<template>
  <div>
    <div class="form-group">
      <input
        type="button"
        @click="addcoworkingspacemember()"
        class="btn btn-info"
        value="Add Member"
      />
    </div>

    <div class v-for="(member,index) in member" :key="(member, index)">
      <input type="hidden" name="participantIndex" :value="participantIndex" />

      <div class="form-row">
        <div class="col-md-6">
          <div>
            <strong>Member No: {{index + 1}}</strong>
          </div>
        </div>
        <div class="col-md-6">
          <button
            type="button"
            @click="deletecoworkingspaceMember()"
            title="Remove Member"
            class="btn btn-outline-danger"
          >X</button>
        </div>
      </div>

      <div class>
        <div class="col-md-6">
          <label for="coworkingspacememberName">Member Name</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            placeholder="Insert your name"
            required=""
            title="Please insert your name"
            name="memberName[]"
            id="coworkingspacememberName"
            :readonly="member.disableName"
            v-model="member.coworkingspacememberName"
          />
        </div>
      </div>

      <div class>
        <div class="col-md-6">
          <label for="coworkingspacememberUCID">Student ID</label>
          <span style="color:red">*</span>
          <input
            type="text"
            class="form-control"
            name="coworkingspacememberUCID[]"
            required=""
            placeholder="Example: xxWMDxxxxx, etc...."
            pattern="[0-9]{2}[A-Z]{3}[0-9]{5}|[0-9]{4}"
            title="Example: xxWMDxxxxx, etc...."
            id="coworkingspacememberUCID"
            :readonly="member.disableUCID"
            v-model="member.coworkingspacememberUCID"
            @change="checkFaculty(index)"
          />
          <!-- v-on:keyup="checkFaculty(index)" -->
        </div>
      </div>

      <div class="col-md-6">
        <label for="coworkingspacememberDepartment">Faculty/Center/Faculty</label>
        <span style="color:red">*</span>
        <multiselect
          id="coworkingspacememberDepartment"
          :options="departmentOption"
          :disabled="member.disableDeparCenFac"
          v-model="member.coworkingspacememberDepartment"
        >@select="selectFaculty(index)"></multiselect>

        <input
          type="hidden"
          name="coworkingspacememberDepartment[]"
          v-model="member.coworkingspacememberDepartment"
        />
      </div>

      <div class>
        <div class="col-md-6">
          <label for="coworkingspacememberProgramme">Programme Study</label>
          <span style="color:red">*</span>
          <multiselect
            id="coworkingspacememberProgramme"
            name="coworkingspacememberProgramme[]"
            :options="member.coworkingspacememberProgrammeList"
            :disabled="member.disablePrograme"
            v-model="member.coworkingspacememberProgramme"
          ></multiselect>

          <span>
            <input
              type="hidden"
              name="coworkingspacememberProgramme[]"
              id="coworkingspacememberProgramme"
              v-model="member.coworkingspacememberProgramme"
            />
            <small>Only for TAR UC Student</small>
          </span>
        </div>
      </div>

      <div class>
        <div class="col-md-6">
          <label for="coworkingspacememberContact">Contact No(HP)</label>
          <span style="color:red">*</span>
          <input
            class="form-control"
            type="text"
            placeholder="Example: 012-xxxxxxx, etc...."
            required=""
            pattern="0[0-9]{2}[-][0-9]{7,}"
            title="Example: 012-xxxxxxx, etc...."
            name="coworkingspacememberContact[]"
            id="coworkingspacememberContact"
            :readonly="member.disableContact"
            v-model="member.coworkingspacememberContact"
          />
        </div>
      </div>

      <div class="col-md-6">
        <label for="coworkingspacememberEmail">E-mail</label>
        <span style="color:red">*</span>
        <input
          type="email"
          placeholder="Example: abc123@gmail.com, etc..."
          required=""
          pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.com$|[a-z0-9._%+-]+@[a-z0-9.-]+\.my$|[a-z0-9._%+-]+@[a-z0-9.-]+\.net$"
          title="Example: 05-598 xxxx, 03-2xxx xxxx, etc...."
          name="coworkingspacememberEmail[]"
          id="coworkingspacememberEmail"
          class="form-control"
          :readonly="member.disablePerEmail"
          v-model="member.coworkingspacememberEmail"
        />
      </div>
    </div>
    <br />
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
      departmentOption: [],
      member: [
        {
          coworkingspacememberName: "",
          coworkingspacememberUCID: "",
          coworkingspacememberDepartment: "",
          coworkingspacememberProgramme: "",
          coworkingspacememberProgrammeList: [],
          coworkingspacememberContact: "",
          coworkingspacememberEmail: "",
          coworkingspacememberDepartmentCode: "",

          disablePrograme: false,
          disableDeparCenFac: true
        }
      ],
      placeholder: "",
      participantIndex: 1
    };
  },

  methods: {
    initMember(index) {
      this.member[index].coworkingspacememberName = "";
      this.member[index].coworkingspacememberUCID = "";
      this.member[index].coworkingspacememberDepartment = "";
      this.member[index].coworkingspacememberProgramme = "";
      this.member[index].coworkingspacememberContact = "";
      this.member[index].coworkingspacememberEmail = "";
      this.member[index].coworkingspacememberDepartmentCode = "";
      this.member[index].coworkingspacememberDepartmentCode = "";

      this.member[index].disableDeparCenFac = true;
      this.member[index].disablePrograme = false;
    },
 

  addcoworkingspacemember() {
    if (this.participantIndex < 5) {
      this.participantIndex++;
      this.member.push({
        coworkingspacememberName: "",
        coworkingspacememberUCID: "",
        coworkingspacememberDepartment: "",
        coworkingspacememberProgramme: "",
        coworkingspacememberContact: "",
        coworkingspacememberEmail: "",

        disableDeparCenFac: true,
        disablePrograme: true
      });
    }
  },

  deletecoworkingspaceMember(index) {
    this.participantIndex--;
    this.member.splice(index, 1);
  },

  checkFaculty(index) {
    console.log(this.member[index].coworkingspacememberUCID.charAt(3));

    if (this.member[index].coworkingspacememberUCID.length == 10) {
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "P" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "p"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Centre for Postgraduate Studies and Research";
        this.member[index].coworkingspacememberDepartmentCode = "cpsr";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "R" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "r"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Centre for Pre-University Studies";
        this.member[index].coworkingspacememberDepartmentCode = "cpus";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "B" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "b"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Facuty of Accounting, Finance and Business";
        this.member[index].coworkingspacememberDepartmentCode = "fafb";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "K" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "k"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Facuty of Communication and Creative Industries";
        this.member[index].coworkingspacememberDepartmentCode = "fcci";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "L" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "l"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Facuty of Applied Science";
        this.member[index].coworkingspacememberDepartmentCode = "foas";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "V" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "v"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Facuty of Build Envionment";
        this.member[index].coworkingspacememberDepartmentCode = "fobe";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "M" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "m"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Facuty of Computing and Information Technology";
        this.member[index].coworkingspacememberDepartmentCode = "focs";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "G" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "g"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Facuty of Engineering and Technology";
        this.member[index].coworkingspacememberDepartmentCode = "foet";
      }
      if (
        this.member[index].coworkingspacememberUCID.charAt(3) == "J" ||
        this.member[index].coworkingspacememberUCID.charAt(3) == "j"
      ) {
        this.member[index].coworkingspacememberDepartment =
          "Facuty of Social Science and Humanities";
        this.member[index].coworkingspacememberDepartmentCode = "fssh";
      }
    }

    if (this.member[index].coworkingspacememberUCID.length == 10) {
      console.log("test12");
      // faculty = this.member[index].coworkingspacememberUCID.charAt(4)
      // level = this.member[index].coworkingspacememberUCID.charAt(5)

      axios
        .get(
          "/get/programmes/" +
            this.member[index].coworkingspacememberUCID.charAt(3) +
            "/" +
            this.member[index].coworkingspacememberUCID.charAt(4)
        )
        .then(
          response =>
            (this.member[index].coworkingspacememberProgrammeList =
              response.data)
        );
    } else {
      this.member[index].coworkingspacememberProgrammeList = [];
    }
  },
 },
  before() {
    axios
      .get("/get/department")
      .then(response => (this.departmentOption = response.data));
  },
  watch: {}
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
