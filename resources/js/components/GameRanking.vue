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
        <tr v-for="(item, i) in computedTeamsRankedMedal" :key="i">
          <td>{{ item.rank }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.total_count }}</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'GameRanking',
  computed: {
    ...mapGetters({
      teamsRankedMedal: 'teamsRankedMedal'
    }),
    computedTeamsRankedMedal() {
      return this.teamsRankedMedal.map(item => ({
        ...item,
        total_count: item.golden_count + item.golden_s_count + item.silver_count + item.silver_s_count + item.bronze_count + item.bronze_s_count
      }))
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
