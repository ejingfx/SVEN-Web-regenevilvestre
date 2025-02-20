<template>
  <div
    :class="`times-input times-input--${field}`"
  >
    <p class="times-input__label">
      <span>{{ field }}* <i v-if="field !== 'frequency'">Select all that apply</i></span>
    </p>
    <div class="times-input__list">
      <div v-for="(option, index) in options[field]" :key="index" class="times-input__list-item">
        <template v-if="field === 'frequency'">
          <input
            required
            type="radio"
            :id="`time-${option}`"
            :value="option"
            v-model="selectedTimes"
            class="times-input__radio hidden"
          />
          <label
            :for="`time-${option}`"
            class="times-input__option-label"
          >
          {{ option }}
          </label>
        </template>
        <template v-else>
          <input
            required
            type="checkbox"
            :id="`time-${option}`"
            :value="option"
            v-model="selectedTimes"
            class="times-input__checkbox hidden"
          />
          <label
            :for="`time-${option}`"
            class="times-input__option-label"
          >
          {{ option }}
          </label>
        </template>
    </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, watch, onMounted } from 'vue'

export default defineComponent({
  name: 'TimesInput',
  props: {
    field: {
      type: String,
      default: 'frequency'
    },
    value: {
      type: Array,
      default: () => []
    }
  },
  setup (props, { emit }) {
    const options = ref({
      frequency: ['Recurring', 'One Time'],
      times: ['Morning', 'Afternoon', 'Evening'],
      days: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    })

    onMounted(() => {
      if (props.field === 'frequency' && selectedTimes.value.length === 0) {
        selectedTimes.value = 'Recurring'
        emit('input', { field: props.field, value: selectedTimes.value })
      }
    })

    const selectedTimes = ref([...props.value])

    watch(selectedTimes, newValue => {
      emit('input', { field: props.field, value: newValue })
    })

    watch(() => props.value, newValue => {
      if (newValue !== selectedTimes.value) {
        selectedTimes.value = newValue
      }
    }, { immediate: false })

    return {
      options,
      selectedTimes
    }
  }
})
</script>

<style scoped lang="scss">
.times-input {
  font-family: Arial, sans-serif;
  margin-bottom: 1em;
}

.times-input__label {
  display: block;
  color: #333;
  text-align: left;
  margin-bottom: 10px;

  span {
    font-weight: 600;
    text-transform: capitalize;
    margin-right: 10px;
  }
  i {
    font-weight: 300;
    font-style: normal;
  }
}

.times-input__list {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  width: 100%;
  border: 1px solid #333;
  border-radius: 5px;
  overflow: hidden;
}

.times-input__list-item {
  width: 100%;
  padding: 5px;
  background-color: #fff;

  &:not(:last-child) {
    border-right: 1px solid #333;
  }
}

.times-input__option {
  display: flex;
  align-items: center;
  width: 100%;
  height: 40px;
}

.times-input__checkbox, .times-input__radio {
  visibility: hidden;

  &:checked + label {
    background-color: #eacac8;
  }
}

.times-input__option-label {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 40px;
  font-size: 0.9rem;
  background-color: #fff;
  cursor: pointer;
  border-radius: 2px;

  &:not(:last-child) {
    border-right: 1px solid #333;
  }
}

// MODIFIER
.times-input--frequency {
  .times-input__list-item {
    // &:not(:last-child) {
    //   border-right: none;
    // }
  }
}
</style>
