<template>
<div class="item  rounded my-3">
                    <div class="header d-flex align-items-center justify-content-around py-3 ">
                            <div class="index">
                                {{ 
                                    index + 1
                                }}
                            </div>
                            <div>
                                {{ 'waypoint-'}}{{ index+1 }}
                            </div>
                            <button @click="toggleOpen" class="green">
                                <i :class="[open ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down', 'toggle']"></i>
                            </button>
                    </div> 
                    <transition name="fade">
                        <div class="body" v-show="open">
                            <hr>
                            <div class="header d-flex flex-column p-3">
                                <div class="head d-flex align-items-center justify-content-between">
                                    <div class="fw-bold">
                                    Student list
                                </div>
                                <button class="green" @click="callModalFn">
                                <i class="fa-add"></i>
                                </button>
                                </div>
                                <div v-if="loading" class="text-center py-4">
                                    <div class="spinner-border text-success" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                </div>
                                </div>
                                <div v-else class="body">
                                    <div class="student-list" v-if="students.length > 0">
                                    <div v-for="student in students" :key="student.child_id" class="student d-flex justify-content-between my-3 border-success-subtle border-bottom pb-2">
                                        <div class="text-black">
                                            {{ student.username }}
                                        </div>
                                        <button class="trash" @click="removeStudentWaypoint(student.child_id)">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                                <div v-else class="text-black text-center " >
                                            Not Founded
                                    </div>
                                </div>
                            </div>
                    </div>
                </transition>
                </div>
</template>
<script setup>
import axios from "axios";
import { ref,defineProps, onMounted } from "vue";


const open = ref(false);
const students = ref([]);
const props = defineProps(['item','index']);
const loading = ref(false);

const emit = defineEmits(['call-modal']);
onMounted(()=>{
getStudents();
});
const toggleOpen = ()=>{
    open.value = !open.value;
}
const getStudents = async ()=>{
    loading.value = true;
    const {data} = await axios.get(`http://127.0.0.1:8000/api/waypoints/${props.item.id}/students`);
    loading.value = false;
    if(data.length > 0){
        students.value = data.map((ele)=>ele);
    }
};
const removeStudentWaypoint = (student)=>{
        axios.get(`http://127.0.0.1:8000/api/waypoints/student/${student}`)
        .then(()=>{
            students.value = [];
            getStudents();
        })
}
const callModalFn = ()=>{
    emit('call-modal',props.item.id);
}
</script>
<style>
.item{
    background-color: #d9f3ea;
    color: #00B074;
}
button.green{
    background-color: #00B074;
    color: white;
    border: none;
    padding: 0 7px;
    border-radius: 4px;
}
button.trash{
    background-color: transparent !important;
    color: red;
    border: none !important;
}
.toggle{
    font-size: 12px;
}
.spinner-border {
    color: #00B074 !important; /* Change to the color you want */
}
/* .fade-enter-active, .fade-leave-active {
  transition: 0.3s ease-out;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
} */
</style>