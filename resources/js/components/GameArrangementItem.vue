<template>
  <li class="game-arrangement-item">
    <div class="game-arrangement-item-header" @click="visible = !visible">
      <mu-ripple :opacity="0.4">
        <mu-icon class="game-arrangement-item-icon" size="24" value="keyboard_arrow_right"></mu-icon>
        <a>{{ title }}</a>
        <mu-icon class="game-arrangement-item-icon" size="24" value="keyboard_arrow_left"></mu-icon>
      </mu-ripple>
    </div>
    <mu-expand-transition>
      <div class="game-arrangement-item-main" v-if="visible">
        <ol v-if="content.length > 0">
          <GameArrangementItemItem v-for="(item, i) in content" :key="i" :item="item" />
        </ol>
        <div v-else>
          <p>暂时还没有赛事安排信息哦</p>
        </div>
      </div>
    </mu-expand-transition>
  </li>
</template>

<script>
import GameArrangementItemItem from './GameArrangementItemItem'

export default {
  name: 'GameArrangementItem',
  components: {
    GameArrangementItemItem
  },
  props: {
    title: {
      type: String,
      required: true
    },
    content: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      visible: false
    }
  }
}
</script>

<style>
.game-arrangement-item-header {
  position: relative;
  margin: 4px auto;
  max-width: 200px;
  font-size: 1.3em;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.game-arrangement-item-header a {
  color: #000;
}
.game-arrangement-item-icon {
  position: relative;
  top: 6px;
}
.game-arrangement-item-header:hover {
  background-color: #0001;
}
.game-arrangement-item-header:hover .game-arrangement-item-icon {
  animation: rotate 1s infinite linear;
}
.game-arrangement-item-main {
  margin: 0 auto;
  max-width: 320px;
  text-align: left;
}
@keyframes rotate {
  from {
    transform: rotateX(0deg);
  }
  to {
    transform: rotateX(180deg);
  }
}
</style>
