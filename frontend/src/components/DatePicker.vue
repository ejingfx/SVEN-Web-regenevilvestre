<template>
  <div class="datepicker">
    <p class="datepicker__label">Start date</p>
    <div class="datepicker__input">
      <Datepicker
        v-model="selectedDate"
        :lowerLimit="minDate"
        :disabled-dates="disablePastDates"
        :inputFormat="options.inputFormat"
        @update:modelValue="handleDateChange"
      />
    </div>
  </div>
</template>

<script>
import { ref, defineComponent, computed, onMounted } from 'vue'
import Datepicker from 'vue3-datepicker'

export default defineComponent({
  name: 'DatePickerComponent',
  components: {
    Datepicker
  },
  props: {
    field: {
      type: String,
      default: 'date'
    }
  },
  setup (props, { emit }) {
    const options = ref({
      inputFormat: 'MM/dd/yyyy'
    })
    const minDate = new Date()
    const selectedDate = ref(new Date())
    const today = new Date()
    today.setHours(0, 0, 0, 0)

    const disablePastDates = {
      to: today
    }

    const handleDateChange = () => {
      emit('input', { field: props.field, value: formattedDate.value })
    }

    const formatDisplay = (date) => {
      if (!date) return ''
      const d = new Date(date)
      const month = String(d.getMonth() + 1).padStart(2, '0')
      const day = String(d.getDate()).padStart(2, '0')
      const year = d.getFullYear()
      return `${month}/${day}/${year}`
    }

    const formattedDate = computed(() => {
      if (!selectedDate.value) return ''
      const d = new Date(selectedDate.value)
      const month = String(d.getMonth() + 1).padStart(2, '0')
      const day = String(d.getDate()).padStart(2, '0')
      const year = d.getFullYear()
      return `${year}-${month}-${day}`
    })

    onMounted(() => {
      emit('input', { field: props.field, value: formattedDate.value })
    })

    return {
      options,
      minDate,
      selectedDate,
      disablePastDates,
      formatDisplay,
      formattedDate,
      handleDateChange,
      onMounted
    }
  }
})
</script>

<style lang="scss">
.datepicker {
  display: block;
  // border: 1px solid;
}
.datepicker__label {
  font-size: 0.9rem;
  font-weight: 600;
  text-align: left;
  margin-bottom: 12px;
}
.datepicker__input {
  display: block;
  // border: 1px solid #333;
}

// CUSTOM
.v3dp__input_wrapper {

  input {
    border: 1px solid #333;
    width: 100%;
    height: 52px;
    padding: 10px 10px;
    border-radius: 5px;
    // background-color: orange;
  }
}

.datepicker-container {
  max-width: 300px;
  margin: 20px auto;
  background-color: #f8f8f8;
  padding: 10px;
  border-radius: 8px;
  // border: 1px solid #ddd;
}
</style>
