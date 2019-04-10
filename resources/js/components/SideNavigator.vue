<template>
  <!-- 侧边栏 -->
  <mu-drawer
    :open="open"
    @update:open="$emit('update:open', $event)"
    :docked="docked"
    :right="position === 'right'"
  >
    <mu-list>
      <mu-list-item button>
        <mu-list-item-title>
          <a class="navigator-action" href="javascript:;">赛事安排</a>
        </mu-list-item-title>
      </mu-list-item>
      <mu-list-item button>
        <mu-list-item-title>
          <a class="navigator-action" href="javascript:;">运动会新闻</a>
        </mu-list-item-title>
      </mu-list-item>
      <mu-list-item @click="$emit('update:open', false)" button>
        <mu-list-item-title>
          <a class="navigator-action" href="javascript:;">金牌排名</a>
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
  }
}
</script>
