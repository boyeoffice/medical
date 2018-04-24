import { Pie } from 'vue-chartjs'

export default {
  extends: Pie,
  mounted () {
    this.fillData()
    axios.get('/md-vs2/manage/pie-chart/admission/mf').then(response => {
      this.$store.commit('pieAdmissionMF_data', response.data)
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
            '#E46651',
            '#00D8FF',
            '#DD1B16'
          ],
          data: this.$store.state.pieAdmissionMF
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
    }
  }
}
