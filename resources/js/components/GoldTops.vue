<template>
  <div class="gold-tops">
    <div class="gold-tops-header">金牌排名</div>
    <ul class="gold-tops-list">
      <li v-for="(item, i) in list" :key="i" class="gold-tops-item">
        <p class="gold-tops-item-line1">No.{{ i + 1 }}：{{ item.count }}枚</p>
        <p class="gold-tops-item-line2">{{ item.name }}书院</p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'GoldTops',
  data () {
    return {
      list: [
        {
          count: 30,
          name: '某某'
        },
        {
          count: 30,
          name: '某某'
        },
        {
          count: 30,
          name: '某某'
        },
      ]
    }
  }
}
</script>

<style>
.gold-tops {
  margin: 20px auto 0;
  max-width: 240px;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 2px 2px 12px #999;
  overflow: hidden;
  font-family: "Microsoft Yahei";
}
.gold-tops-header {
  padding: 6px 0;
  background-color: #3b55e6;
  color: #fff;
  text-align: center;
  font-size: 1.2em;
  font-weight: bold;
}
.gold-tops-list {
  padding: 20px 0;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.gold-tops-item {
  text-align: center;
  font-size: 1.2em;
}
.gold-tops-item-line1 {
  border-bottom: 1px solid #000;
}
.gold-tops-item-line1,
.gold-tops-item-line2 {
  padding: 6px;
}
</style>
