<template>
  <div class="rounded-full text-white border border-gray-400 bg-blue-400 w-10 h-10 flex justify-center items-center">
    {{ userCircle }}
  </div>
</template>
<script>
  export default {
    name: 'UserCircle',
    props: [
      'name'
    ],
    computed: {
      userCircle() {
        return this.name.match(/[A-Z]/g).slice(0, 2).join('')
      }
    },
  }
</script>