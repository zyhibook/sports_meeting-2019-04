<template>
  <div class="home-page">
    <Navigator @open="sideNavigator.open = !sideNavigator.open"/>
    <Banner/>
    <SideNavigator :open.sync="sideNavigator.open"/>
    <section class="home-page-main-section">
      <GoldTops/>
      <flash-message-list ref="flashMessageList"/>
      <GameArrangement/>
      <GameNews/>
      <GameRanking/>
    </section>
  </div>
</template>

<script>
import FlashMessageList from '../components/FlashMessageList'
import Navigator from '../components/Navigator'
import SideNavigator from '../components/SideNavigator'
import Banner from '../components/Banner'
import GoldTops from '../components/GoldTops'
import GameArrangement from '../components/GameArrangement'
import GameNews from '../components/GameNews'
import GameRanking from '../components/GameRanking'
import axios, { setFlashMessageDisplayer } from '../axios'

export default {
  name: 'PageHome',
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
.home-page-space {
  height: 300px;
  width: 100%;
}
.home-page-main-section {
  padding-top: 20px;
  background-color: #fff;
}
</style>
