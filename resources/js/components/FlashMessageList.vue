<template>
  <ul class="flash-message-list">
    <flash-message
      v-for="(item, i) in messages"
      :key="i"
      :type="item.type"
      :message="item.message"
      :index="i"
      @delete="$emit('delete', $event)"
    ></flash-message>
  </ul>
</template>

<script>
import FlashMessage from './FlashMessage'

export default {
  name: 'FlashMessageList',
  components: {
    FlashMessage
  },
  props: {
    messages: {
      type: Array,
      required: true
    }
  }
}
</script>

<style>
</style>
