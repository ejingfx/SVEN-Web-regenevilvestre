<template>
  <div class="service-form">
    <div class="service-form__content">
      <h2 class="service-form__title">We'll take your dog for a<br class="pc-only"/> walk. Just tell us when!</h2>
      <br>
      <form ref="form" @submit.prevent="submit" novalidate class="form-control">
        <div class="grid grid--col6">
          <div class="grid__inner">
            <div class="grid__item">
              <div class="form-control__input">
                <TimesInput
                  :field="'frequency'"
                  @input="setValue"
                />
              </div>
            </div>
            <div class="grid__item">
              <div class="form-control__input">
                <DatePicker @input="setValue" />
              </div>
            </div>
          </div>
        </div>
        <div class="form-control__block">
          <TimesInput
            :field="'days'"
            @input="setValue"
          />
        </div>
        <div class="form-control__block">
          <TimesInput
            :field="'times'"
            @input="setValue"
          />
        </div>
        <div class="form-control__block">
          <TextareaInput
            @input="setValue"
          />
        </div>

        <div class="service-form__message">
          <div v-if="message.show" class="service-form__message-inner">
            <p v-if="message.success">Successfully submitted!</p>
            <p v-else-if="message.submitting">Submitting...</p>
            <p v-else-if="message.error">Something went wrong. Please try again!</p>
            <p v-else>Fields with * are required.</p>
          </div>
        </div>

        <div class="service-form__submit">
          <input
            type="submit"
            value="Schedule Service"
          >
        </div>
      </form>

    </div>
  </div>
</template>

<script>
import {
  ref,
  defineComponent,
  computed,
  nextTick,
  getCurrentInstance
} from 'vue'
import DatePicker from '@/components/DatePicker.vue'
import TimesInput from '@/components/TimesInput.vue'
import TextareaInput from '@/components/TextareaInput.vue'

export default defineComponent({
  name: 'ServiceForm',
  components: {
    DatePicker,
    TimesInput,
    TextareaInput
  },
  setup () {
    const instance = getCurrentInstance()
    const root = instance?.appContext.config.globalProperties

    const message = ref({
      show: false,
      success: false,
      submitting: false,
      error: false
    })

    const form = ref({
      frequency: 'Recurring',
      date: '',
      days: [],
      times: [],
      notes: ''
    })

    const validForm = ref({
      date: true,
      days: false,
      times: false
    })

    const extractFields = form => {
      const formFields = {
        frequency: form.value.frequency || [],
        start_date: form.value.date,
        days: form.value.days || [],
        times: form.value.times || [],
        notes: form.value.notes || ''
      }
      return formFields
    }

    const submit = () => {
      const data = extractFields(form)

      validForm.value.times = data.times.length > 0
      validForm.value.days = data.days.length > 0

      if (!isFormValid.value) {
        // console.log('form invalid')
        message.value.show = true
        setTimeout(() => {
          message.value.show = false
        }, 3000)
      } else {
        message.value.show = true
        message.value.submitting = true
        // console.log('data', data)
        store(data)
      }
    }

    const clear = () => {
      console.log('clear')
    }

    // DEBUG
    const handleInput = e => {
      nextTick(() => {
        console.log('DEBUG', e.field, 'handleInput')
      })
    }

    const setValue = e => {
      if (e.field === 'frequency' || e.field === 'date') {
        form.value[e.field] = e.value
        console.log(`Field "${e.field}" updated to:`, e.value)
      } else if (e.field === 'days' || e.field === 'times') {
        form.value[e.field] = [...e.value]
        console.log(`Field "${e.field}" updated to:`, e.value)
      } else if (e.field === 'notes') {
        form.value[e.field] = (e.value === undefined || e.value.trim() === '') ? '' : e.value
        console.log(`Field "${e.field}" updated to:`, e.value)
      }
    }

    const isFormValid = computed(() => {
      return Object.values(validForm.value).every(val => val === true)
    })

    const store = async (data) => {
      console.log('submitting...')

      try {
        const response = await root.$axios.post('/schedules', data)
        console.log('Data successfully stored:', response.data)

        if (response.data.success) {
          message.value.success = true
          message.value.error = false
          message.value.submitting = false

          setTimeout(() => {
            message.value.show = false
            message.value.success = false
            clear()
          }, 3000)
        }
      } catch (error) {
        console.error('Error storing data:', error)
        message.value.error = true
        message.value.submitting = false

        setTimeout(() => {
          message.value.show = false
          message.value.error = false
        }, 3000)
      }
    }

    return {
      form,
      submit,
      clear,
      message,
      handleInput,
      setValue,
      isFormValid,
      store
    }
  }
})
</script>

<style lang="scss" scoped>
.service-form {
  padding-top: 80px;
  padding-bottom: 80px;
  color: #333;
  height: 100%;
  // background-color: blue;

  @include phone {
    padding-top: 40px;
    padding-bottom: 40px;
  }
}
.service-form__content {
  padding-left: 60px;
  padding-right: 60px;

  @include phone {
    padding-left: 0;
    padding-right: 0;
  }
}
.service-form__title {
  font-size: 2.5em;
  text-align: left;
}
.service-form .grid .grid__item {
  vertical-align: top;
}
.service-form__submit {
  padding-top: 50px;

  input {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 30px;
    outline: none;
    border-color: transparent;
    background-color: $default-blue;
    text-decoration: none;
    color: #fff;
  }
}
.service-form__message {
  min-height: 40px;
  padding: 0;
}
</style>
