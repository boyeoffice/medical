import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  mounted () {
    this.fillData()
    axios.get('/md-vs2/manage/pie-chart/admission/origin').then(response => {
      this.$store.commit('pieAdminOrigin_data', response.data)
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
          data: this.$store.state.pieAdminOrigin
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
    }
  }
}
