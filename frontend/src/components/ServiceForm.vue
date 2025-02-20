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
                <DateInput />
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
import { ref, nextTick } from 'vue'
import DateInput from '@/components/DateInput.vue'
import TimesInput from '@/components/TimesInput.vue'
import TextareaInput from '@/components/TextareaInput.vue'

export default {
  name: 'ServiceForm',
  components: {
    DateInput,
    TimesInput,
    TextareaInput
  },
  setup () {
    const form = ref({
      frequency: 'Recurring',
      date: '',
      days: [],
      times: [],
      notes: ''
    })

    const extractFields = form => {
      const formFields = {
        frequency: form.value.frequency === undefined ? [] : form.value.frequency,
        date: form.value.date,
        days: form.value.days === undefined ? [] : form.value.days,
        times: form.value.times === undefined ? [] : form.value.times,
        notes: form.value.notes === undefined ? '' : form.value.notes
      }
      console.log(formFields)
      return formFields
    }

    const submit = () => {
      extractFields(form)
    }

    const clear = () => {
      form.value = {
        frequency: 'Recurring',
        date: '',
        days: [],
        times: [],
        notes: ''
      }
      console.log('clear')
    }

    // DEBUG
    const handleInput = e => {
      nextTick(() => {
        console.log('DEBUG', e.field, 'handleInput')
      })
    }

    const setValue = e => {
      if (e.field === 'frequency') {
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

    return {
      form,
      submit,
      clear,
      handleInput,
      setValue
    }
  }
}
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
</style>
