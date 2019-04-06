<template>
  <li class="flassh-message">
    <mu-alert
      v-show="visible"
      :color="color"
      @delete="handleRemove"
      delete
      transition="mu-scale-transition"
    >
      <mu-icon left :value="icon"></mu-icon>
      <span>{{ message }}</span>
    </mu-alert>
  </li>
</template>

<script>
export default {
  name: 'FlashMessage',
  props: {
    type: {
      type: String,
      default: 'info'
    },
    message: {
      type: String,
      default: ''
    },
    index: {
      type: Number,
      required: true
    }
  },
  data () {
    return {
      visible: false
    }
  },
  mounted () {
    this.$nextTick(() => {
      this.visible = true
    })
  },
  computed: {
    color () {
      const colorMap = {
        'danger': 'error',
        'warning': 'warning',
        'success': 'success',
        'info': 'info'
      }
      return colorMap[this.type] || this.type
    },
    icon () {
      const iconMap = {
        'danger': 'warning',
        'warning': 'priority_high',
        'success': 'check_circle',
        'info': 'info'
      }
      return iconMap[this.type] || this.type
    }
  },
  methods: {
    handleRemove () {
      this.visible = false
      setTimeout(() => {
        this.$emit('delete', this.index)
      }, 200)
    }
  }
}
</script>

<style>
</style>
