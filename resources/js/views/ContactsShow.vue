<template>
  <div>
    <div v-if="loading">Cargando...</div>

    <div v-else>
      <div class="flex justify-between items-center">
        <a href="#" class="text-blue-400" @click.prevent="$router.back()">< Back</a>
        <div>
          <router-link :to="`/contacts/${contact.contact_id}/edit`" class="px-4 py-2 rounded text-sm text-green-500 border border-green-500 font-bold mr-2">Editar</router-link>
          <button @click="modal = !modal" href="#" class="px-4 py-2 border border-red-500 rounded text-sm font-bold text-red-500">Borrar</button>
          <div v-if="modal" class="absolute bg-blue-900 text-white rounded-lg z-20 p-8 w-64 right-0 mt-2 mr-6">
            <p>Estás seguro de borrar este registro?</p>
            <div class="flex items-center mt-6 justify-end">
              <button class="text-white pr-4" @click="modal = !modal">Cancelar</button>
              <button class="px-4 py-2 bg-red-500 rounded text-sm font-bold text-white" @click="destroy">Borrar</button>
            </div>
          </div>

          <div @click="modal = !modal" v-if="modal" class="bg-black opacity-25 absolute right-0 left-0 top-0 bottom-0 z-10"></div>
        </div>
      </div>

      <div class="flex items-center pt-6">
        <UserCircle :name="contact.name" />
        <p class="pl-5 text-xl">{{ contact.name }}</p>
      </div>

      <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Contacto</p>
      <p class="pt-2 text-blue-400">{{ contact.email }}</p>

      <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Compañia</p>
      <p class="pt-2 text-blue-400">{{ contact.company }}</p>

      <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Fecha de Nacimiento</p>
      <p class="pt-2 text-blue-400">{{ contact.birthday }}</p>
    </div>
  </div>
</template>

<script>
  import UserCircle from '../components/UserCircle'
  export default {
    name: "ContactsShow",
    data() {
      return {
        loading: true,
        modal: false,
        contact: null,
      }
    },
    components: {
      UserCircle,
    },
    methods: {
      async showContact() {
        try {
          const res = await axios.get(`/api/contacts/${this.$route.params.id}`)
          this.contact = res.data.data
          this.loading = false
        }catch (err) {
          this.loading = false
          if (err.response.status === 404) {
            this.$router.push('/contacts')
          }
        }
      },
      async destroy() {
        try {
          const res = await axios.delete(`/api/contacts/${this.$route.params.id}`)
          this.$router.push('/contacts')
        } catch (err) {
          alert('Error Interno. No se puede eliminar el contacto.')
        }
      }
    },
    mounted() {
      this.showContact()
    },
  }
</script>

<style scoped>

</style>