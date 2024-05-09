<template>
    <div  class="modal fade" id="myModal3" role="dialog">
      <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Students</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" @submit.prevent="addStudentsToRoute()" >
        <div class="modal-body">
            <div class="row g-3">
                <table class="table" id="myTable" style="width: 100%;">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="student in students" :key="student.child_id">
                                        <td><input type="checkbox" :value="student.child_id" v-model="selectedStudents"></td>
                                        <td>{{student.username}}</td>
                                        <td>{{student.age}}</td>
                                        </tr>
                                    </tbody>
                                </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button id="add" type="submit" class="btn btn-success btn-sm">Add</button>
        </div>
        </div>
        </form>
        </div>
</div>
    </div>
</template>
<script setup>
import axios from "axios";
import {  onMounted, ref } from "vue";

const students = ref([]);
const selectedStudents = ref([]);
const props = defineProps(['waypoint']);

const emit = defineEmits(['call-students']);

onMounted(async()=>{
    await getStudents();
    initializeDataTable();


});
const initializeDataTable = () => {
    $('#myTable').DataTable({
    "pageLength": 5 
  });
}
const getStudents = async ()=>{
   const { data } = await axios.get('http://127.0.0.1:8000/api/route/students')
    if(data.length > 0){
        students.value = [];
        students.value = data.map((ele)=>ele);
    }else{
        console.log('error')
    }
}
const addStudentsToRoute =async ()=>{
    await axios.post('http://127.0.0.1:8000/api/waypoint/students/add',{students:selectedStudents.value,waypoint_id:props.waypoint})
    selectedStudents.value = [];
    await getStudents();
    // initializeDataTable()
    $('#myModal3').modal('hide');
    emit('call-students');
}
</script>
<style scoped>
  /* Override Bootstrap styles as needed */
</style>