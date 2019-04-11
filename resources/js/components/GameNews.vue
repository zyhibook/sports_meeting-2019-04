<template>
  <div class="game-news">
    <h2 class="game-news-title">运动会新闻</h2>
    <hr class="game-news-hr">
    <table class="game-news-table">
      <tr v-for="(item, i) in news" :key="i">
        <td class="game-news-number">News.{{ i + 1 }}</td>
        <td>{{ item.title }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import axios from '../axios'

export default {
  name: 'GameNews',
  data() {
    return {
      news: []
    }
  },
  mounted() {
    this.fetchNewsIndex()
  },
  methods: {
    async fetchNewsIndex() {
      try {
        const data = await axios({
          url: '/news',
          method: 'get'
        })
        this.news = data.news.data
      } catch (error) {
        this.$toast.error(error.message)
      }
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
