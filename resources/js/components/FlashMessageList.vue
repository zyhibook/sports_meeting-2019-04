<template>
  <ul class="flash-message-list" v-if="flashMessages.length > 0">
    <flash-message
      v-for="(item, i) in flashMessages"
      :key="i"
      :type="item.type"
      :message="item.message"
      :index="i"
      @delete="handleRemoveFlashMessage"
    ></flash-message>
  </ul>
  <ul v-else></ul>
</template>

<script>
import FlashMessage from './FlashMessage'

export default {
  name: 'FlashMessageList',
  components: {
    FlashMessage
  },
  data () {
    return {
      flashMessages: []
    }
  },
  methods: {
    handleReceiveFlashMessage (item) {
      this.flashMessages.push(item)
    },
    handleRemoveFlashMessage (index) {
      this.flashMessages.splice(index, 0)
    }
  }
}
</script>

<style>
.flash-message-list {
  padding: 8px 16px;
}
.flash-message-list li {
  margin: 8px 0;
}
</style>
