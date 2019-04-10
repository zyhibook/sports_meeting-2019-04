<template>
  <div id="app">
    <Navigator @open="sideNavigator.open = !sideNavigator.open"/>
    <Banner/>
    <SideNavigator :open.sync="sideNavigator.open"/>
    <mu-container>
      <GoldTops/>
      <div class="home-page-space"></div>
      <flash-message-list ref="flashMessageList"/>
    </mu-container>
  </div>
</template>

<script>
import FlashMessageList from './components/FlashMessageList'
import Navigator from './components/Navigator'
import SideNavigator from './components/SideNavigator'
import Banner from './components/Banner'
import GoldTops from './components/GoldTops'
import axios, { setFlashMessageDisplayer } from './axios'

export default {
  components: {
    FlashMessageList,
    Navigator,
    SideNavigator,
    Banner,
    GoldTops
  },
  data () {
    return {
      sideNavigator: {
        open: false
      }
    }
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
.home-page-space {
  height: 300px;
  width: 100%;
}
</style>
