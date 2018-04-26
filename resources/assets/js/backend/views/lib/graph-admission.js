import { Line } from 'vue-chartjs'

export default {
  extends: Line,

  mounted () {
     axios.get('/md-vs2/manage/graph/admission/origin').then(response => {
        this.$store.commit('graphAdmin_data', response.data)
        this.fillData()
      })
     this.fillData()
  },
  methods: {
    fillData(){
       this.renderChart({
      labels: this.getAges,
      datasets: [
        {
          label: 'Data One',
          backgroundColor: '#f87979',
          data: this.totalAge
        }
      ]
    }, {responsive: true, maintainAspectRatio: false, beginAtZero: true})
    }
  },
  computed: {
    getAges(){
      var ages = []
      var numbers = this.$store.state.graphAdmin
      numbers.forEach((age) => {
        ages.push(age.idade)
      })
      return ages
    },
    totalAge(){
      var total = []
      var count = this.$store.state.graphAdmin
      count.forEach((odd) => {
        total.push(odd.total)
      })
      return total
    }
  }
}
