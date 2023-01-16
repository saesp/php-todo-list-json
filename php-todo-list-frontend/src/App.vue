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
          'delete': index
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
  <h1>To do list</h1>

  <ul>
    <li v-for="(todoElement, index) in todoList" :key="index">
      <span @click="deleteTodo(index)">
        {{ todoElement.text }}
      </span>

    </li>
  </ul>

  <form @submit="addTodo">
    <input type="text" name="todo" v-model="newTodo">
    <input type="submit" value="Add">
  </form>
</template>

<style scoped>

</style>