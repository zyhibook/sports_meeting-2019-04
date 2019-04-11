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
        <ol v-if="content.length > 0" class="game-arrangement-item-list">
          <GameArrangementItemItem
            v-for="(item, i) in copyContent"
            :key="i" :item="item"
            :visible="item.visible"
            @update:visible="handleUpdateVisible(item, i, $event)"
          />
        </ol>
        <div v-else>
          <p style="text-align:center">暂时还没有赛事安排信息哦</p>
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
      visible: false,
      copyContent: []
    }
  },
  watch: {
    content() {
      this.buildCopyContent()
    }
  },
  created() {
    this.buildCopyContent()
  },
  methods: {
    buildCopyContent() {
      this.copyContent = this.content.map(item => ({
        ...item,
        visible: false
      }))
    },
    handleUpdateVisible(item, i, val) {
      if (window.document.body.clientWidth < 640) {
        item.visible = val
      } else if (window.document.body.clientWidth < 960) {
        if (i % 2 == 0) {
          this.changeVisibleIfExist(i, val)
          this.changeVisibleIfExist(i + 1, val)
        } else {
          this.changeVisibleIfExist(i - 1, val)
          this.changeVisibleIfExist(i, val)
        }
      } else {
        if (i % 3 == 0) {
          this.changeVisibleIfExist(i, val)
          this.changeVisibleIfExist(i + 1, val)
          this.changeVisibleIfExist(i + 2, val)
        } else if (i % 3 == 1) {
          this.changeVisibleIfExist(i - 1, val)
          this.changeVisibleIfExist(i, val)
          this.changeVisibleIfExist(i + 1, val)
        } else {
          this.changeVisibleIfExist(i - 2, val)
          this.changeVisibleIfExist(i - 1, val)
          this.changeVisibleIfExist(i, val)
        }
      }
    },
    changeVisibleIfExist(i, val) {
      if (this.copyContent[i]) {
        this.copyContent[i].visible = val
      }
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
@media screen and (min-width: 480px) {
  .game-arrangement-item-main {
    max-width: 400px;
  }
}
@media screen and (min-width: 640px) {
  .game-arrangement-item-main {
    max-width: 580px;
    margin: 0 auto;
  }
  .game-arrangement-item-list {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
  }
  .game-arrangement-item-list > li {
    min-width: 280px;
  }
}
@media screen and (min-width: 960px) {
  .game-arrangement-item-main {
    max-width: 850px;
    margin: 0 auto;
  }
}
</style>
