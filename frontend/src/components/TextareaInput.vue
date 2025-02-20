<template>
  <div class="textarea-input">
    <label
      :for="field"
      class="textarea-input__label"
    >Notes for your --</label>
    <textarea
      :v-model="note"
      @input="updateVal"
      placeholder="Please input some notes"
    ></textarea>
  </div>
</template>

<script>
import { ref, watch, defineComponent } from 'vue'

export default defineComponent({
  name: 'TextareaInput',
  props: {
    field: {
      type: String,
      default: 'notes'
    },
    value: {
      type: String,
      default: ''
    }
  },
  setup (props, { emit }) {
    const note = ref(props.value)

    watch(() => props.value, newValue => {
      note.value = newValue
    })

    const updateVal = e => {
      note.value = e.target.value
      emit('input', { field: props.field, value: note.value })
    }

    return {
      note,
      updateVal
    }
  }
})
</script>

<style lang="scss" scoped>
.textarea-input {

  textarea {
    padding: 5px 10px;
    height: 120px;
    width: 100%;
    border: 1px solid #333;
    border-radius: 5px;
    resize: none;

    &::placeholder {
      color: $color-nude-pink;
    }
  }
}

.textarea-input__label {
  display: block;
  color: #333;
  text-align: left;
  margin-bottom: 10px;
  font-weight: 600;
}
</style>
