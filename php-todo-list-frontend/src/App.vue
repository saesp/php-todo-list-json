<script>
import axios from 'axios';

const apiUrl = "http://localhost/php-todo-list-json/php-todo-list-backend/";

export default {
  name: 'App.vue',


  data() {
    return {
      todoList: [],
      newTodo: ""
    };
  },


  methods: {
    getAllData() {
      axios.get(apiUrl + 'api.php')
        .then(res => {
          const data = res.data;
          this.todoList = data;
        });
    },


    addTodo(e) {
      e.preventDefault();

      // usare un oggetto ("params") per memorizzare parametri che saranno inviati con la richiesta GET
      const params = {
        params: {
          'task': this.newTodo
        }
      };

      // - la risposta sarà strutturata nell'oggetto "response", la cui proprietà "data" conterrà i dati inviati dal server
      axios.get(apiUrl + 'api_new_todo.php', params)
        .then(() => {
          // this.newTodo(response.data);
          this.newTodo = "";
          this.getAllData();
        });
    },


    deleteTodo(index) {
      const params = {
        params: {
          'ind': index
        }
      };

      axios.get(apiUrl + 'api_delete_todo.php', params)
        .then(() => {
          this.getAllData();
        });
    },


    toggleTodo(index) {
      const params = {
        params: {
          'ind': index
        }
      };

      axios.get(apiUrl + 'api_toggle_todo.php', params)
        .then(() => {
          // this.newTodo(response.data);
          this.newTodo = "";
          this.getAllData();
        });
    },


    mounted() {
      this.getAllData();
    }
  }
}
</script>


<template>
  <div class="container _container">
    <h1 class="mb-5 mt-3 text-center text-primary-emphasis">To do list</h1>

    <form @submit="addTodo" class="mb-4">
      <input type="text" name="todo" v-model="newTodo" placeholder="Task" class="px-1 border-radius-3">
      <button type="submit" class="px-2">Add</button>
    </form>

    <ul>
      <li v-for="(todoElement, index) in todoList" :key="index">
        <div>
          <s v-if="todoElement.completed === true" class="task">{{ todoElement.text }}</s>
          <span v-else class="task">{{ todoElement.text }}</span>
        </div>

        <div class="todo-right">
          <span @click="toggleTodo(index)">
            <div v-if="todoElement.completed === true">DONE</div>
            <div v-else>NOT DONE</div>
          </span>

          <span class="delete" @click="deleteTodo(index)">Delete</span>
        </div>
      </li>
    </ul>
  </div>
</template>


<style lang="scss" scoped>
// @use '../style/general.scss' as *;
._container {
  width: 60vh;

  li {
    margin-bottom: 10px;
    list-style-type: none;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .task {
      width: 70%;
    }

    .todo-right {
      display: flex;

      span {
        cursor: pointer;
      }

      .delete {
        margin-left: 20px;
        color: red;
        // float: right;
      }
    }
  }

  form {
    display: table;
    margin: auto;
  }
}
</style>