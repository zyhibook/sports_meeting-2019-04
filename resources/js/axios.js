import axios from axios

// Full config:  https://github.com/axios/axios#request-config
// axios.defaults.baseURL = process.env.baseURL || process.env.apiUrl || ''
// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

const config = {
  baseURL: process.env.baseURL || process.env.apiUrl || '/api'
  // timeout: 60 * 1000, // Timeout
  // withCredentials: true, // Check cross-site Access-Control
}

const defaultFlashMessageDisplayer = function (message) {
  alert(message.value)
}

const customConfig = {
  flashMessageDisplayer: defaultFlashMessageDisplayer
}

const _axios = axios.create(config)

_axios.headers.common['X-Requested-With'] = 'XMLHttpRequest'

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
    _axios.headers.common['X-CSRF-TOKEN'] = token.content
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

_axios.interceptors.response.use(
  function(response) {
    // 整理数据
    const title = response.title
    const flashMessage = response.flash_message
    const data = response.data

    // 修改标题
    window.document.title = `${title} - 西安交通大学57届校运会`

    // 显示flashMessage
    for (const message of flashMessage) {
      customConfig.flashMessageDisplayer(message)
    }

    // 返回数据
    return data
  },
  function(error) {
    return Promise.reject(error)
  }
)

export default _axios

export function setFlashMessageDisplayer(callback) {
  customConfig.flashMessageDisplayer = callback
}
