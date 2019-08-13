<template>
  <div>
    <form @submit.prevent="submitForm">
      <InputField name="name" label="Nombre del Contacto" placeholder="Nombre del Contacto" @update:field="form.name = $event" :errors="errors"/>
      <InputField name="email" label="Correo del Contacto" placeholder="Correo del Contacto" @update:field="form.email = $event" :errors="errors"/>
      <InputField name="company" label="Nombre de la Compañia" placeholder="Nombre de la Compañia" @update:field="form.company = $event" :errors="errors"/>
      <InputField name="birthday" label="Fecha de Nacimiento" placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" :errors="errors"/>

      <div class="flex justify-end">
        <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancelar</button>
        <button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Agregar al Nuevo Contacto</button>
      </div>
    </form>
  </div>
</template>

<script>
  import InputField from '../components/InputField'
  export default {
    name: 'ContactsCreate',
    components: {
      InputField
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
      async submitForm() {
        try {
          const res = await axios.post('/api/contacts', this.form)
          this.$router.push(res.data.links.self)
        }catch (err) {
          this.errors = err.response.data.errors
        }
      }
    }
  }
</script>