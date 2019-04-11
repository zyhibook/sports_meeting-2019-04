<template>
  <!-- 侧边栏 -->
  <mu-drawer
    :open="open"
    @update:open="$emit('update:open', $event)"
    :docked="docked"
    :right="position === 'right'"
  >
    <mu-list>
      <mu-list-item button @click="scrollAndHide('arrangement')">
        <mu-list-item-title>
          <a class="navigator-action" href="#arrangement">赛事安排</a>
        </mu-list-item-title>
      </mu-list-item>
      <mu-list-item button @click="scrollAndHide('news')">
        <mu-list-item-title>
          <a class="navigator-action" href="#news">运动会新闻</a>
        </mu-list-item-title>
      </mu-list-item>
      <mu-list-item button @click="scrollAndHide('ranking')">
        <mu-list-item-title>
          <a class="navigator-action" href="#ranking">金牌排名</a>
        </mu-list-item-title>
      </mu-list-item>
    </mu-list>
  </mu-drawer>
</template>

<script>
export default {
  name: 'SideNavigator',
  props: {
    open: {
      type: Boolean,
      required: true
    }
  },
  data () {
    return {
      docked: false,
      position: 'left'
    }
  },
  methods: {
    scroll(anchor) {
      window.location.hash = '#' + anchor
    },
    scrollAndHide(anchor) {
      this.scroll(anchor)
      this.$emit('update:open', false)
    }
  }
}
</script>
