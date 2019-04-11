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
import { mapActions } from 'vuex'
import FlashMessageList from '../components/FlashMessageList'
import Navigator from '../components/Navigator'
import SideNavigator from '../components/SideNavigator'
import Banner from '../components/Banner'
import GoldTops from '../components/GoldTops'
import GameArrangement from '../components/GameArrangement'
import GameNews from '../components/GameNews'
import GameRanking from '../components/GameRanking'

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
    this.fetchData()
  },
  methods: {
    ...mapActions({
      fetchData: 'fetchData'
    })
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
