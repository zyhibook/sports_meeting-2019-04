import Vue from 'vue'
import Vuex from 'vuex'
import { fetchNews } from './api/data'
import { fetchTeams } from './api/data'
import { fetchGames } from './api/data'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    initOver: false,
    news: {
      data: []
    },
    teams: {
      teams_ranked_golden: {
        data: []
      },
      teams_ranked_medal: {
        data: []
      }
    },
    games: {
      games_12am_track: {
        data: []
      },
      games_12am_field: {
        data: []
      },
      games_12pm_track: {
        data: []
      },
      games_12pm_field: {
        data: []
      },
      games_13am_track: {
        data: []
      },
      games_13am_field: {
        data: []
      },
      games_13pm_track: {
        data: []
      },
      games_13pm_field: {
        data: []
      },
    }
  },
  getters: {
    teamsRankedGolden: state => state.teams.teams_ranked_golden.data,
    teamsRankedMedal: state => state.teams.teams_ranked_medal.data,
    news: state => state.news.data,
    games_12am_track: state => state.games.games_12am_track.data,
    games_12am_field: state => state.games.games_12am_field.data,
    games_12pm_track: state => state.games.games_12pm_track.data,
    games_12pm_field: state => state.games.games_12pm_field.data,
    games_13am_track: state => state.games.games_13am_track.data,
    games_13am_field: state => state.games.games_13am_field.data,
    games_13pm_track: state => state.games.games_13pm_track.data,
    games_13pm_field: state => state.games.games_13pm_field.data,
  },
  mutations: {
    setInitOver (state, flag = true) {
      state.initOver = flag
    },

    setNews (state, payload) {
      state.news = payload
    },

    setTeams (state, teams) {
      state.teams = teams
    },

    setGames (state, games) {
      state.games = games
    }
  },
  actions: {
    async fetchData ({ commit }) {
      try {
        commit('setNews', await fetchNews())
        commit('setTeams', await fetchTeams())
        commit('setGames', await fetchGames())
        commit('setInitOver')
      } catch (error) {
        console.error(error)
        Vue.prototype.$toast.message.error(error.message)
      }
    }
  }
})
