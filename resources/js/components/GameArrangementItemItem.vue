<template>
  <li class="game-arrangement-item-item">
    <mu-divider></mu-divider>
    <div class="game-arrangement-item-item-title-container" @click="visible = !visible">
      <mu-ripple :opacity="0.4">
        <div class="game-arrangement-item-item-title">
          <ClockIcon :size="24" :hour="getHour(item.begins_at)" :minute="getMinute(item.begins_at)" />
          <span class="game-arrangement-item-item-title-text">{{ getTimeString(item.begins_at) }} - {{ item.name }}</span>
        </div>
      </mu-ripple>
    </div>
    <mu-expand-transition>
      <table v-if="visible" class="game-arrangement-item-item-table">
        <tr class="game-arrangement-item-item-row">
          <td class="medal-cell"><img class="medal" src="../../img/golden.png"></td>
          <td>冠军</td>
          <td>{{ item.golden_team }}</td>
          <td>{{ item.golden_name }}</td>
        </tr>
        <tr class="game-arrangement-item-item-row">
          <td class="medal-cell"><img class="medal" src="../../img/silver.png"></td>
          <td>亚军</td>
          <td>{{ item.silver_team }}</td>
          <td>{{ item.silver_name }}</td>
        </tr>
        <tr class="game-arrangement-item-item-row">
          <td class="medal-cell"><img class="medal" src="../../img/bronze.png"></td>
          <td>季军</td>
          <td>{{ item.bronze_team }}</td>
          <td>{{ item.bronze_name }}</td>
        </tr>
        <tr class="game-arrangement-item-item-row">
          <td class="medal-cell"><img class="medal" src="../../img/golden.png"></td>
          <td>体特冠军</td>
          <td>{{ item.golden_s_team }}</td>
          <td>{{ item.golden_s_name }}</td>
        </tr>
        <tr class="game-arrangement-item-item-row">
          <td class="medal-cell"><img class="medal" src="../../img/silver.png"></td>
          <td>体特亚军</td>
          <td>{{ item.silver_s_team }}</td>
          <td>{{ item.silver_s_name }}</td>
        </tr>
        <tr class="game-arrangement-item-item-row">
          <td class="medal-cell"><img class="medal" src="../../img/bronze.png"></td>
          <td>体特季军</td>
          <td>{{ item.bronze_s_team }}</td>
          <td>{{ item.bronze_s_name }}</td>
        </tr>
      </table>
    </mu-expand-transition>
  </li>
</template>

<script>
import ClockIcon from './ClockIcon'

// 补上数字前导零
function fixZero(num) {
  return num < 10 ? `0${num}` : `${num}`
}

// 获取时间字符串
function getTimeString(val) {
  const date = new Date(val)
  const h = fixZero(date.getHours())
  const m = fixZero(date.getMinutes())
  return `${h}:${m}`
}

export default {
  name: 'GameArrangementItemItem',
  components: {
    ClockIcon
  },
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      visible: false
    }
  },
  methods: {
    getTimeString: getTimeString,
    getHour(val) {
      const date = new Date(val)
      return date.getHours()
    },
    getMinute(val) {
      const date = new Date(val)
      return date.getMinutes()
    }
  }
}
</script>

<style>
.game-arrangement-item-item-title-container {
  position: relative;
}
.game-arrangement-item-item-title {
  display: flex;
  height: 30px;
  align-items: center;
  font-size: 1.15em;
}
.game-arrangement-item-item-title-text {
  margin-left: 9px;
}
.game-arrangement-item-item-table {
  margin-left: 20px;
}
.game-arrangement-item-item-row .medal-cell {
  display: flex;
  align-items: center;
}
.game-arrangement-item-item-row td {
  padding: 0 6px;
  text-align: center;
}
.medal {
  width: 12px;
  height: auto;
}
</style>
