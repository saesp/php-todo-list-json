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
          // console.log(data);
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
  },


  mounted() {
    this.getAllData();
  }
}
</script>


<template>
  <div class="container">
    <h1>To do list</h1>

    <ul>
      <li v-for="(todoElement, index) in todoList" :key="index">
        <span class="task">{{ todoElement.text }}</span>
        <span class="delete" @click="deleteTodo(index)">Delete</span>
      </li>
    </ul>

    <form @submit="addTodo">
      <input type="text" name="todo" v-model="newTodo">
      <input type="submit" value="Add">
    </form>
  </div>
</template>


<style lang="scss" scoped>
// @use '../style/general.scss' as *;
.container {
  margin: auto;
  display: table;

  h1 {
    text-align: center;
  }

  li {
    margin-bottom: 10px;
    list-style-type: none;

    >span {
      display: inline-block;
    }

    .task {
      width: 70%;
    }

    .delete {
      margin-left: 20px;
      color: red;
      cursor: pointer;
      float: right;
    }
  }

  form {
    display: table;
    margin: auto;
  }
}
</style>