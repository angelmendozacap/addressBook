<template>
  <div>
    <div v-if="loading">Cargando...</div>
    <div v-else>
      <div v-if="!contacts.length">
        <p>Aún no tiene contactos. <router-link to="/contacts/create">Empezar ></router-link></p>
      </div>
      <div v-for="(contact,index) in contacts" :key="index">
        <router-link :to="contact.links.self" class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-100">
          <UserCircle :name="contact.data.name" />
          <div class="pl-4">
            <p class="text-blue-400 font-bold">{{ contact.data.name }}</p>
            <p class="text-gray-600">{{ contact.data.company }}</p>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
  import UserCircle from '../components/UserCircle'
  export default {
    name: "ContactsList",
    props: [
      'endpoint'
    ],
    components: {
      UserCircle
    },
    data() {
      return {
        loading: true,
        contacts: null,
      }
    },
    mounted() {
      this.getAllContacts()
    },
    methods: {
      async getAllContacts() {
        try {
          const res = await axios.get(this.endpoint)
          this.contacts = res.data.data
          this.loading = false
        } catch (err) {
          this.loading = false
          alert('No se puede recuperar los contactos.')
        }
      }
    }
  }
</script>

<style scoped>

</style>