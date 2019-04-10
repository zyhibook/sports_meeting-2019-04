<template>
  <div id="app">
    <Navigator @open="sideNavigator.open = !sideNavigator.open"/>
    <Banner/>
    <SideNavigator :open.sync="sideNavigator.open"/>
    <div class="home-page-second">
      <flash-message-list ref="flashMessageList"/>
      <GoldTops/>
      <GameArrangement/>
      <GameNews/>
      <GameRanking/>
    </div>
  </div>
</template>

<script>
import FlashMessageList from './components/FlashMessageList'
import Navigator from './components/Navigator'
import SideNavigator from './components/SideNavigator'
import Banner from './components/Banner'
import GoldTops from './components/GoldTops'
import GameArrangement from './components/GameArrangement'
import GameNews from './components/GameNews'
import GameRanking from './components/GameRanking'
import axios, { setFlashMessageDisplayer } from './axios'

export default {
  components: {
    FlashMessageList,
    Navigator,
    SideNavigator,
    Banner,
    GoldTops,
    GameArrangement,
    GameNews,
    GameRanking
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
.home-page-second {
  background-color: #fff;
  padding-top: 20px;
}
</style>
