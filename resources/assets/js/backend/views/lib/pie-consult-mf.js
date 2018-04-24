import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  mounted () {
    this.fillData()
    axios.get('/md-vs2/manage/pie-chart/consult/m-f').then(response => {
      this.$store.commit('pieConsultMF_data', response.data)
      this.fillData()
    })
  },
  methods: {
    fillData(){
      this.renderChart({
      labels: ['Male', 'Female'],
      datasets: [
        {
          backgroundColor: [
            '#41B883',
            '#E46651',
            '#00D8FF',
            '#DD1B16'
          ],
          data: this.$store.state.pieConsultMF
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
    }
  }
}
