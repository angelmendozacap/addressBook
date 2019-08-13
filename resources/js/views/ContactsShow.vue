<template>
  <div>
    <div class="flex justify-between items-center">
      <div class="text-blue-400">< Back</div>
      <div>
        <router-link :to="`contacts/${contact.contact_id}/edit`" class="px-4 py-2 rounded text-sm text-green-500 border border-green-500 font-bold mr-2">Editar</router-link>
        <a href="#" class="px-4 py-2 border border-red-500 rounded text-sm font-bold text-red-500">Delete</a>
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
</template>

<script>
  import UserCircle from '../components/UserCircle'
  export default {
    name: "ContactsShow",
    data() {
      return {
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
          console.log(res)
        }catch (err) {

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