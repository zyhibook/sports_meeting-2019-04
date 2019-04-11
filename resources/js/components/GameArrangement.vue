<template>
  <div class="game-arrangement">
    <div class="game-arrangement-title-group">
      <h2 class="game-arrangement-title">赛事安排</h2>
      <span class="game-arrangement-title-tips">（点击时间查看项目安排）</span>
    </div>
    <hr class="game-arrangement-hr">
    <ul class="game-arrangement-list">
      <li v-for="(item, i) in list" :key="i">
        <mu-icon class="game-arrangement-list-icon" size="24" value="keyboard_arrow_right"></mu-icon>
        <a :href="item.url">{{ item.name }}</a>
        <mu-icon class="game-arrangement-list-icon" size="24" value="keyboard_arrow_left"></mu-icon>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from '../axios'

export default {
  name: 'GameArrangement',
  data() {
    return {
      list: []
    }
  },
  mounted() {
    this.fetchGamesIndex()
  },
  methods: {
    async fetchGamesIndex() {
      try {
        const data = await axios({
          url: '/games',
          method: 'get'
        })
        this.list = data.games.data
      } catch (error) {
        this.$toast.error(error.message)
      }
    }
  }
}
</script>

<style>
.game-arrangement {
  padding: 10px 0 60px;
  text-align: center;
}
.game-arrangement-title-group {
  margin: 12px 0;
}
.game-arrangement-title-tips {
  font-size: 0.8em;
  color: #aaa;
}
.game-arrangement-hr {
  margin: 0 60px;
  border: none;
  border-bottom: 2px solid #000;
}
.game-arrangement-list li {
  margin: 4px auto;
  max-width: 200px;
  font-size: 1.3em;
  display: flex;
  justify-content: center;
  align-items: center;
}
.game-arrangement-list li a {
  color: #000;
}
.game-arrangement-list-icon {
  position: relative;
  top: 2px;
}
.game-arrangement-list li:hover {
  background-color: #0001;
}
.game-arrangement-list li:hover .game-arrangement-list-icon {
  animation: rotate 1s infinite linear;
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
