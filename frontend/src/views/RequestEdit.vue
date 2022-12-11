<template>
  <div class="flex justify-center">
    <div class="mt-4 -mb-3 w-screen">
      <form action="" class="mx-2" method="get" v-on::submit="onSend">

        <div class="flex flex-col">
          <!--     Поля заявки     -->
          <div v-if="slug">
            <p>
              Создана: {{ form.created_at }}
            </p>
            <p v-if="form.created_at !== form.updated_at">
              Последний раз редактировалась: {{ form.updated_at }}
            </p>
          </div>
          <input :disabled="slug" required v-model="form.title" class="bg-gray-100 mt-2 px-3 py-2 rounded-lg" type="text" name="title" placeholder="Заголовок">

          <select v-if="slug" v-model="form.status" name="status" id="" class="mt-2 px-3 py-2 rounded-lg bg-gray-100 disabled:bg-gray-300" >
            <option v-for="status in statuses" :value="status.id" :selected="form.status === status.id">
              {{ status.name }}
            </option>
          </select>
          <div class="mt-2">
            <textarea :disabled="slug" required v-model="form.text" placeholder="Текст заявки" class="bg-gray-100 px-3 py-2 w-full rounded-lg" type="text" name="text"></textarea>
          </div>

          <div v-if="!slug" class="mt-2">
            <label class="block mb-1 text-gray-900 dark:text-white" for="multiple_files">
              Изображения
            </label>
            <input v-on:change="onFileChange" class="block w-full py-1 px-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
          </div>
          
          <div v-if="slug && form.images.length > 0" class="mt-2 bg-gray-100 p-5 rounded-lg flex flex-wrap">
            <a v-for="image in form.images" :href="backend_url(image.filepath)">
              <img :src="backend_url(image.filepath)" class="h-40 mx-1" :alt="image.filepath">
            </a>
          </div>
          <!--     Поля заявки     -->
        </div>

        <div class="flex w-full justify-end mt-5">
          <button class="bg-gray-100 hover:bg-gray-200 px-2 py-1 rounded-lg">
            Отправить
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "../axios";
import config from "../config";
import router from "../router";
export default {
  name: "RequestEdit",
  data(){
    return {
      slug: '',
      statuses: [],
      form : {
        title: '',
        status: '',
        text: '',
        images: [],
        created_at: '',
        updated_at: ''
      }
    }
  },
  mounted() {
    this.slug =  this.$route.params.slug;
    if(this.slug){
      axios.get('/request/'+this.slug)
          .then((response) =>{
            let request = response.data.data.request;
            this.form.title = request.title;
            this.form.text = request.text.value;
            this.form.status = request.status.id;
            this.form.images = request.image;
            this.form.created_at = new Date(request.created_at).toLocaleString('ru-ru');
            this.form.updated_at = new Date(request.updated_at).toLocaleString('ru-ru');

            this.statuses = response.data.data.statuses;
          })
          .catch(()=>{
            router.push({'name': 'RequestList'});
          });
    }
  },
  methods: {
    onSend: function (event) {
      event.preventDefault();
      let formData = new FormData();
      for(let input in this.form){
        formData.append(input, this.form[input]);
      }
      for( let i = 0; i < this.form.images.length; i++ ){
        let file = this.form.images[i];
        formData.append('image[' + i + ']', file);
      }

      let url = this.slug ? '/request/'+ this.slug : '/request'
      axios.post(url, formData,
          {
            headers: {
              'Content-Type': 'multipart/form-data'
            }}
        )
        .then((response)=>{
          router.push({name : 'RequestList'});
        })
        .catch((response)=>{
          console.log(response);
        });
    },
    onFileChange: function (event) {
      this.form.images = event.target.files;
    },
    backend_url: (uri) => {
      return 'http://' + config.backend_domain + '/' + uri;
    }
  }
}
</script>

<style scoped>

</style>