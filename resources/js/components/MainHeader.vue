<template>
  <div>
    <Navigator @open="sideNavigatorOpen = !sideNavigatorOpen"/>
    <Banner/>
    <SideNavigator :open.sync="sideNavigatorOpen"/>
  </div>
</template>

<script>
import Navigator from './Navigator'
import Banner from './Banner'
import SideNavigator from './SideNavigator'

export default {
  name: 'MainHeader',
  components: {
    Navigator,
    Banner,
    SideNavigator
  },
  data () {
    return {
      sideNavigatorOpen: false
    }
  }
}
</script>
