var app = new Vue({
  el: '#calculator',
  data() {
    return {
      current_value: 0,
      processing_value: false,
      current_operation: false
    }
  },

  computed: {
    value_displayed() {
      var value = 0;
      
      if (this.processing_value) {
        value = this.current_value || this.processing_value;
      } else {
        value = this.current_value;
      }

      return value;
    }
  },

  methods: {
    clear() {
      this.current_value = 0;
      this.processing_value = false;
      this.current_operation = false;
    },
    selectDigit(digit) {
      if (this.current_operation === '=') {
        this.processing_value = false;
      }
      if(this.current_value === 0) {
        this.current_value = digit;
      } else {
        this.current_value = this.current_value + '' + digit;
      }
    },
    selectOperation(op) {
      if (this.current_operation) {
        this.calculate();
      }
      else {
        this.processing_value = this.current_value;
      }
      this.current_value = 0;
      this.current_operation = op;
    },
    calculate() {
      if (this.current_operation === '+') {
        this.processing_value += this.current_value;
      }
      else if (this.current_operation === '-') {
        this.processing_value -= this.current_value;
      }
      else if (this.current_operation === '*') {
        this.processing_value *= this.current_value;
      }
      else if (this.current_operation === '/') {
        this.processing_value /= this.current_value;
      }
      else if (this.current_operation === '=' && this.current_value) {
        this.processing_value = this.current_value;
      }
      this.current_value = 0;
      this.current_operation = false;
    }
  }
})