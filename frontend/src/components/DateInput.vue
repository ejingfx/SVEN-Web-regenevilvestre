<template>
  <div class="date-input">
    <p for="date" class="date-input__label">Start Date</p>
    <input
      required
      name="date"
      :v-model="date"
      @input="updateDate"
      type="date"
      placeholder="MM/DD/YYYY"
    >
  </div>
</template>

<script>
export default {
  name: 'DateInput',
  props: {
    value: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      date: this.value // Initialize with the prop value
    }
  },
  watch: {
    value (newValue) {
      this.date = newValue // Update the date if the prop changes
    }
  },
  methods: {
    updateDate () {
      this.$emit('input', this.date) // Emit the new date value to the parent
    }
  }
}
</script>

<style lang="scss" scoped>
.date-input {
  input {
    padding: 5px;
    height: 40px;
    min-height: 53px;
    width: 100%;
    border: 1px solid #333;
    border-radius: 5px;

    &::placeholder {
      color: red;
    }
  }
}
.date-input__label {
  display: block;
  color: #333;
  text-align: left;
  margin-bottom: 10px;
  font-weight: 600;

  span {
    text-transform: capitalize;
    margin-right: 10px;
  }
}
</style>
