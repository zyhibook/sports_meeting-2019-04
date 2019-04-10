<template>
  <div class="game-ranking">
    <h2 class="game-ranking-title">奖牌排名</h2>
    <hr class="game-ranking-hr">
    <div class="game-ranking-table-container">
      <table class="game-ranking-table">
        <tr class="game-ranking-first-line">
          <th>排名</th>
          <th>队伍名称</th>
          <th>奖牌数</th>
        </tr>
        <tr v-for="(item, i) in list" :key="i">
          <td>{{ item.rank }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.count }}</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: 'GameRanking',
  data() {
    return {
      list: [
        {
          rank: 1,
          name: '某某书院',
          count: 30
        },
        {
          rank: 1,
          name: '某某书院',
          count: 30
        },
        {
          rank: 2,
          name: '某某书院',
          count: 20
        },
        {
          rank: 2,
          name: '某某书院',
          count: 20
        },
        {
          rank: 2,
          name: '某某书院',
          count: 20
        },
        {
          rank: 2,
          name: '某某书院',
          count: 20
        },
      ]
    }
  }
}
</script>

<style>
.game-ranking {
  padding: 60px 0;
  text-align: center;
}
.game-ranking-title {
  margin: 12px 0;
}
.game-ranking-hr {
  margin: 0 60px;
  border: none;
  border-bottom: 2px solid #000;
}
.game-ranking-table-container {
  margin: 0 60px;
  display: flex;
}
.game-ranking-table {
  width: 100%;
}
.game-ranking-first-line th {
  padding-top: 12px;
}
</style>
