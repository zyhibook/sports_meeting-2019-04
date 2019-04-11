<template>
  <div class="game-arrangement">
    <div class="game-arrangement-title-group">
      <a id="arrangement" name="arrangement" rel="external nofollow">&nbsp;</a>
      <h2 class="game-arrangement-title">赛事安排</h2>
      <span class="game-arrangement-title-tips">（点击时间查看项目安排）</span>
    </div>
    <hr class="game-arrangement-hr">
    <ul class="game-arrangement-list">
      <GameArrangementItem
        v-for="item in arrangementList"
        :key="item.key"
        :title="item.name"
        :content="item.content"
      />
    </ul>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import GameArrangementItem from './GameArrangementItem'

export default {
  name: 'GameArrangement',
  components: {
    GameArrangementItem
  },
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
    arrangementList() {
      return [
        {
          name: '12日上午径赛',
          key: 'games_12am_track',
          content: this.games_12am_track
        },
        {
          name: '12日上午田赛',
          key: 'games_12am_field',
          content: this.games_12am_field
        },
        {
          name: '12日下午径赛',
          key: 'games_12pm_track',
          content: this.games_12pm_track
        },
        {
          name: '12日下午田赛',
          key: 'games_12pm_field',
          content: this.games_12pm_field
        },
        {
          name: '13日上午径赛',
          key: 'games_13am_track',
          content: this.games_13am_track
        },
        {
          name: '13日上午田赛',
          key: 'games_13am_field',
          content: this.games_13am_field
        },
        {
          name: '13日下午径赛',
          key: 'games_13pm_track',
          content: this.games_13pm_track
        },
        {
          name: '13日下午田赛',
          key: 'games_13pm_field',
          content: this.games_13pm_field
        }
      ]
    },
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
  max-width: 320px;
  margin: 0 auto;
  border: none;
  border-bottom: 2px solid #000;
}
@media screen and (min-width: 480px) {
  .game-arrangement-hr {
    max-width: 400px;
  }
}
@media screen and (min-width: 640px) {
  .game-arrangement-hr {
    max-width: 580px;
  }
}
@media screen and (min-width: 960px) {
  .game-arrangement-hr {
    max-width: 800px;
  }
}
</style>
