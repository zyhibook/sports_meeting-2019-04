<template>
  <div class="game-arrangement">
    <div class="game-arrangement-title-group">
      <h2 class="game-arrangement-title">赛事安排</h2>
      <span class="game-arrangement-title-tips">（点击时间查看项目安排）</span>
    </div>
    <hr class="game-arrangement-hr">
    <ul class="game-arrangement-list">
      <li v-for="k in collection" :key="k">
        <mu-icon class="game-arrangement-list-icon" size="24" value="keyboard_arrow_right"></mu-icon>
        <a>{{ readable_map[k] }}</a>
        <mu-icon class="game-arrangement-list-icon" size="24" value="keyboard_arrow_left"></mu-icon>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'GameArrangement',
  computed: {
    ...mapGetters({
      games_12am_track: 'games_12am_track',
      games_12am_field: 'games_12am_field',
      games_12pm_track: 'games_12pm_track',
      games_12pm_field: 'games_12pm_field',
      games_13am_track: 'games_13am_track',
      games_13am_field: 'games_13am_field',
      games_13pm_track: 'games_13pm_track',
      games_13pm_field: 'games_13pm_field'
    }),
    readable_map() {
      return {
        games_12am_track: '12日上午径赛',
        games_12am_field: '12日上午田赛',
        games_12pm_track: '12日下午径赛',
        games_12pm_field: '12日下午田赛',
        games_13am_track: '13日上午径赛',
        games_13am_field: '13日上午田赛',
        games_13pm_track: '13日下午径赛',
        games_13pm_field: '13日下午田赛'
      }
    },
    collection() {
      return [
        'games_12am_track',
        'games_12am_field',
        'games_12pm_track',
        'games_12pm_field',
        'games_13am_track',
        'games_13am_field',
        'games_13pm_track',
        'games_13pm_field',
      ]
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
