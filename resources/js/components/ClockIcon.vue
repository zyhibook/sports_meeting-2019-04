<template>
  <div class="clock-icon">
    <div class="clock-icon-hour-line" :style="{
      'transform': `rotate(${hourAngle}deg)`
    }"></div>
    <div class="clock-icon-minute-line" :style="{
      'transform': `rotate(${minuteAngle}deg)`
    }"></div>
  </div>
</template>

<script>
export default {
  name: 'ClockIcon',
  props: {
    hour: {
      type: Number,
      default: 10
    },
    minute: {
      type: Number,
      default: 0
    }
  },
  computed: {
    hourAngle() {
      const minuteAdd = ((this.minute + 60) % 60) * 0.5
      return parseInt(((this.hour + 12) % 12) * 30 + minuteAdd + 180) % 360
    },
    minuteAngle() {
      return (((this.minute + 60) % 60) * 6 + 180) % 360
    }
  }
}
</script>

<style>
.clock-icon {
  position: relative;
  display: inline-block;
  border-radius: 50%;
  border: 1px solid #3b55e6;
}
.clock-icon-hour-line,
.clock-icon-minute-line {
  width: 1.5px;
  background-color: #3b55e6;
  position: absolute;
  top: 50%;
  left: calc(50% - 0.75px);
  transform-origin: top center;
}
.clock-icon-hour-line {
  height: 30%;
}
.clock-icon-minute-line {
  height: 45%;
}
</style>
