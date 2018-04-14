<template>
    <div style="position:relative" v-bind:class="{'open':openSuggestion, 'md-load': true}">
        <input class="form-control" type="text" :value="value" @input="updateValue($event.target.value)"
          @keydown.enter = 'enter'
          @keydown.down = 'down'
          @keydown.up = 'up'
        >
        <label v-show="isFetching" class="pull-right"><i class="load fa fa-spinner fa-spin"></i></label>
        <ul class="dropdown-menu" style="width:100%">
            <li v-for="(suggestion, index) in matches"
                v-bind:class="{'active': isActive(index)}"
                @click="suggestionClick(index)"
            >
              <a href="javascript:void(0)">{{ suggestion.a }} <small>{{ suggestion.b }}</small></a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {

  props: {

    value: {
      type: String
    },
    isFetching: {
      type: Boolean
    },
    suggestions: {
      type: Array
    }

  },

  data () {
    return {
      open: false,
      current: 0
    }
  },

  computed: {
    // Filtering the suggestion based on the input
    matches () {
      //return this.suggestions
     return this.suggestions.filter((obj) => {
        return obj.a.toLowerCase().indexOf(this.value) >= 0
     })
    },

    openSuggestion () {
      return this.selection !== '' &&
             this.matches.length !== 0 &&
             this.open === true
    }
  },

  methods: {

    updateValue (value) {
      if (this.open === false) {
        this.open = true
        this.current = 0
      }
      this.$emit('input', value)
    },

    // When enter pressed on the input
    enter () {
      this.$emit('input', this.matches[this.current].b)
      this.open = false
    },

    // When up pressed while suggestions are open
    up () {
      if (this.current > 0) {
        this.current--
      }
    },

    // When up pressed while suggestions are open
    down () {
      if (this.current < this.matches.length - 1) {
        this.current++
      }
    },

    // For highlighting element
    isActive (index) {
      return index === this.current
    },

    // When one of the suggestion is clicked
    suggestionClick (index) {
      this.$emit('input', this.matches[index].b)
      this.open = false
    }

  }

}
</script>

<style>
  .md-load .load{
    position: absolute;
    right: 7px;
    top: 10px;
  }
</style>
