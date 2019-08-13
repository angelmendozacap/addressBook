<template>
  <div>
    <div class="flex justify-between items-center">
      <a href="#" class="text-blue-400" @click.prevent="$router.back()">< Back</a>
    </div>

    <form @submit.prevent="submitForm">
      <InputField name="name" label="Nombre del Contacto" placeholder="Nombre del Contacto" @update:field="form.name = $event" :errors="errors" :data="form.name"/>
      <InputField name="email" label="Correo del Contacto" placeholder="Correo del Contacto" @update:field="form.email = $event" :errors="errors" :data="form.email"/>
      <InputField name="company" label="Nombre de la Compañia" placeholder="Nombre de la Compañia" @update:field="form.company = $event" :errors="errors" :data="form.company"/>
      <InputField name="birthday" label="Fecha de Nacimiento" placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" :errors="errors" :data="form.birthday"/>

      <div class="flex justify-end">
        <button type="button" class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancelar</button>
        <button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Guardar</button>
      </div>
    </form>
  </div>
</template>

<script>
  import InputField from '../components/InputField'
  export default {
    name: 'ContactsEdit',
    components: {
      InputField
    },
    mounted() {
      this.getContact()
    },
    data() {
      return {
        form: {
          'name': '',
          'email': '',
          'company': '',
          'birthday': '',
        },
        errors: null,
      }
    },
    methods: {
      async getContact() {
        try {
          const res = await axios.get(`/api/contacts/${this.$route.params.id}`)
          this.form = res.data.data
        }catch (err) {
          if (err.response.status === 404) {
            this.$router.push('/contacts')
          }
        }
      },
      async submitForm() {
        try {
          delete this.form.contact_id
          delete this.form.last_updated
          const res = await axios.patch(`/api/contacts/${this.$route.params.id}`, this.form)
          this.$router.push(res.data.links.self)
        }catch (err) {
          this.errors = err.response.data.errors
        }
      }
    }
  }
</script>