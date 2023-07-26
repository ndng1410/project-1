import Vuex from "vuex";
import Vue from "vue";
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    tasks: [
      // { id: 1, taskName: "job1" },
      // { id: 2, taskName: "job2" },
      // { id: 3, taskName: "job3" },
    ],
    // currentID: null,
  },
  getters: {
    getTaskItem(state) {
      return state.tasks;
    },
    // getCurrentId(state) {
    //   if (state.currentID == null) return 0;
    //   return state.currentID;
    // },
  },
  mutations: {
    // setTaskName(state, newTaskName) {
    //   state.taskName = newTaskName;
    // },
    // setTaskId(state, newTaskId) {
    //   state.id = newTaskId;
    // },
    SET_TASK(state, newTask) {
      state.tasks.push(newTask);
      console.log(newTask);
    },
    REMOVE_TASK(state, removedTask) {
      state.tasks.splice(removedTask, 1);
    },
    // SET_CURRENT_ID(state, currentID) {
    //   state.currentID = currentID;
    // },
    SET_TASKS(state, tasks) {
      state.tasks = tasks;
    },
    // EDIT_TASK(state, content) {
    //   // state.tasks[content.index-1].task_name = content.content;
    //   // console.log(content.index, content.content)
    //   axios.put(`http://127.0.0.1:8000/api/tasks/${content.index}`, {task_name: content.content})
    //   .then(function (response) {
    //     console.log('da sua', response)
    //   })
    //   .catch(function (error) {
    //     console.log(error);
    //   });
    //   // console.log('state', state);
    //   // console.log('content', content.index-1);
    //   // console.log('state can lay:', state.tasks[0].task_name)
    // }
  },
  actions: {
    // handleSetTaskName(context, newTaskName) {
    //   context.commit("setTaskName", newTaskName);
    // },
    // handleSetTaskId(context, newTaskId) {
    //   context.commit("setTaskId", newTaskId);
    // },
    // handleSetTask(context, newTask) {
    //   context.commit("setTask", newTask);
    // },
    setTask(context, newTask) {
      context.commit("SET_TASK", newTask);
    },
    removeTask(context, removedTask) {
      context.commit("REMOVE_TASK", removedTask);
    },
    // setCurrentID(context, currentID) {
    //   context.commit("SET_CURRENT_ID", currentID);
    //   console.log(currentID);
    // },
    async fetchData({commit}) {
      try {
        let res = await axios.get('http://127.0.0.1:8000/task')
        commit("SET_TASKS", res.data)
      } catch(e) {
        console.log(e)
      }
      // axios
      //   .get('http://127.0.0.1:8000/task')
      //   .then(function (response) {
      //     commit("SET_TASKS", response.data);
      //     console.log("response result", response.data);
      //     // console.log("tasks after fetch," , state.tasks)
      //     // console.log(response.data, state)
      //   })
      //   .catch(function (error) {
      //     console.log(error);
      //   });
    },
    // editTask(context, content) {
    //   context.commit("EDIT_TASK", content);
    // }
  },
});
