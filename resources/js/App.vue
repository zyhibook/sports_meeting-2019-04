<template>
  <div id="app">
    <flash-message-list :messages="flashMessages" @delete="handleRemoveFlashMessage"/>
  </div>
</template>

<script>
import FlashMessageList from './components/FlashMessageList'
import axios, { setFlashMessageDisplayer } from './axios'

export default {
  components: {
    FlashMessageList
  },
  data () {
    return {
      flashMessages: []
    }
  },
  created () {
    setFlashMessageDisplayer(this.handleReceiveFlashMessage)
  },
  methods: {
    handleReceiveFlashMessage (item) {
      this.flashMessages.push(item)
    },
    handleRemoveFlashMessage (index) {
      this.flashMessages.splice(index, 1)
    }
  },
  mounted () {
    axios('/games')
  }
}
</script>

<style>
* {
  margin: 0;
  padding: 0;
  list-style: none;
}
body {
  background-color: #f2f2f2;
}
</style>
