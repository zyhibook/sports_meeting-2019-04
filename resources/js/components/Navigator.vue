<template>
  <nav class="navigator">
    <!-- 顶部导航栏：侧边弹出按钮、交大校徽、e瞳logo -->
    <div class="navigator-inner">
      <mu-button icon slot="left" @click="$emit('open')">
        <mu-icon value="menu"></mu-icon>
      </mu-button>
      <div class="navigator-logos">
        <div class="navigator-logo-container">
          <img class="navigator-logo" src="../../imgs/logo_xjtu.png" alt="logo_xjtu">
        </div>
        <div class="navigator-logo-container">
          <img class="navigator-logo" src="../../imgs/logo_eeyes.png" alt="logo_eeyes">
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navigator'
}
</script>

<style>
.navigator {
  position: relative;
  z-index: 100;
  display: flex;
  justify-content: center;
  background: #fff;
  padding: 20px 10px;
  box-shadow: 0 2px 6px #aaa;
}
.navigator-inner {
  width: 100%;
  display: flex;
}
.navigator-logos {
  flex: 1 1 auto;
  display: flex;
  align-items: center;
}
.navigator-logo-container {
  padding: 0 5px;
  width: 50%;
}
.navigator-logo {
  margin: 0 auto;
  display: block;
  max-width: 100%;
  height: auto;
}
.navigator-action {
  color: #000;
  font-weight: bold;
}
</style>
