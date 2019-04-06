<template>
  <div id="app">
    <mu-container>
      <flash-message-list ref="flashMessageList"/>
    </mu-container>
  </div>
</template>

<script>
import FlashMessageList from './components/FlashMessageList'
import axios, { setFlashMessageDisplayer } from './axios'

export default {
  components: {
    FlashMessageList
  },
  mounted () {
    setFlashMessageDisplayer(this.$refs.flashMessageList.handleReceiveFlashMessage)
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
