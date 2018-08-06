import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  mounted () {
    this.fillData()
    axios.get('/md-vs2/manage/pie-chart/consult/origin').then(response => {
      this.$store.commit('pieConsultOrigin_data', response.data)
      this.fillData()
    })
  },
  methods: {
    fillData(){
      this.renderChart({
      labels: ['Consulta Externa', 'Internamento', 'UAVC', 'UCIP', 'UCISU'],
      datasets: [
        {
          backgroundColor: [
            '#41B883',
            '#E46651',
            '#00D8FF',
            '#DD1B16',
            '#F39C12'
          ],
          data: this.$store.state.pieConsultOrigin
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
    }
  }
}
