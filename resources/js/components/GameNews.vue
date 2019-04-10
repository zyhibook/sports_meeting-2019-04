<template>
  <div class="game-news">
    <h2 class="game-news-title">运动会新闻</h2>
    <hr class="game-news-hr">
    <table class="game-news-table">
      <tr v-for="(line, i) in news" :key="i">
        <td class="game-news-number">News.{{ i }}</td>
        <td>{{ line }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  name: 'GameNews',
  data() {
    return {
      news: [
        '校领导抱篮球跑接力赛顺利结束',
        '精彩聚焦研究生男子组100米短跑预赛',
        '研究生女子400米决赛',
        '男子教工趣味篮球赛--看老师们身手矫捷拍篮球拍篮球拍篮球拍篮球拍篮球拍篮球拍篮球拍篮球拍篮球拍篮球',
        '校领导抱篮球跑接力赛顺利结束',
        '精彩聚焦研究生男子组100米短跑预赛',
        '研究生女子400米决赛',
        '校领导抱篮球跑接力赛顺利结束',
        '精彩聚焦研究生男子组100米短跑预赛',
        '研究生女子400米决赛',
        '校领导抱篮球跑接力赛顺利结束',
        '精彩聚焦研究生男子组100米短跑预赛',
        '研究生女子400米决赛',
      ]
    }
  }
}
</script>

<style>
.game-news {
  background-color: #535353;
  padding: 60px 0;
  text-align: center;
}
.game-news-title {
  margin: 6px 0;
  color: white;
}
.game-news-hr {
  margin: 0 60px;
  border: none;
  border-bottom: 2px solid #fff;
}
.game-news-table {
  padding: 10px 60px;
  color: white;
  text-align: left;
}
.game-news-number {
  width: 60px;
  vertical-align: top;
}
</style>
