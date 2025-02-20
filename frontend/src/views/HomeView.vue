<template>
  <div class="home">
    <div class="home__hero">
      <div class="home__hero-content">
        <div class="container">
          <AppHeader />
          <div class="home__hero-inner">
            <div class="home__hero-wrap">
              <h1>We care for<br /> your furry little<br /> love ones<br /> while</h1>
              <div class="home__hero-cta">
                <ScheduleButton :url="'#form'" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="about" class="media media--feature">
      <div class="container">
        <article class="media__content">
          <div class="media__left">
            <h2 class="media__title">
              Expert care for your <br class="pc-only" />furry, feathery, or<br class="pc-only" /> scaley friend
            </h2>
            <p class="media__inner">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Est voluptatibus architecto tenetur sint. Est, assumenda. Odit quo aliquam doloremque eos vel. Provident, doloremque? Sed sunt doloremque, ducimus molestias numquam esse.
            </p>
            <div class="media__cta">
              <ScheduleButton
                :className="'dark schedule--feature'"
                :url="'#form'"
              />
            </div>
          </div>
          <div class="media__right">
            <div class="grid grid--col6">
              <ul class="grid__inner">
                <li
                  v-for="(item, i) in 4"
                  :key="i"
                  class="grid__item"
                >
                  <img :alt="`'Pawtastic' ${i}`" src="../assets/images/placeholder.jpg">
                </li>
              </ul>
            </div>
          </div>
        </article>
      </div>
    </section>

    <div class="service-section" id="form">
      <div class="service-section__bg pc-only"></div>
      <div class="service-section__dog-bg pc-only"></div>
      <section class="container">
        <div class="service-section__content">
          <div class="service-section__left">
            <AppLogo :className="'alt'" />
            <h2 class="service-section__title">
              All services include
            </h2>
            <div class="service-section__inner">
              <ul>
                <li><span>Lorem ipsum dolor sit amet consectetur elit.</span></li>
                <li><span>Lorem ipsum dolor sit amet consectetur .</span></li>
                <li><span>Lorem ipsum dolor sit amet.</span></li>
              </ul>
            </div>
          </div>
          <div class="service-section__right">
            <ServiceForm />
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import AppHeader from '@/components/AppHeader.vue'
import AppLogo from '@/components/AppLogo.vue'
import ScheduleButton from '@/components/ScheduleButton.vue'
import ServiceForm from '@/components/ServiceForm.vue'

export default {
  name: 'HomeView',
  components: {
    AppHeader,
    AppLogo,
    ScheduleButton,
    ServiceForm
  }
}
</script>

<style lang="scss" scoped>
.home__hero {
  display: flex;
  width: 100%;
}
.home__hero-content {
  position: relative;
  display: block;
  width: 100%;
  margin: 0 auto;
  height: 100vh;
  background-image: url('../assets/images/hero.jpg');
  background-size: cover;

  @include tablet {
    background-position: center bottom;
    // border: 1px solid red;
  }
  @include phone {
    background-position: center;
  }

  &:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(73, 78, 103, 0.5);
    // backdrop-filter: blur(2px);
    // -webkit-backdrop-filter: blur(10px); /* Safari compatibility */
  }

  .container {
    height: 100%;
  }
}
.home__hero-inner {
  display: flex;
  justify-content: start;
  color: #fff;
  height: calc(100vh - 130px);
  display: flex;
  justify-content: center;
  align-items: end;
  flex-direction: column;

  @include tablet {
    height: calc(100vh - 160px);
    padding: 0 40px;
  }

  @include phone {
    height: calc(100vh - 80px);
  }

  h1 {
    font-size: 3em;
  }
}

.home__hero-wrap {
  @include phone {
    text-align: center;
  }
}
.home__hero-cta {
  display: block;
  padding-top: 60px;
}
.service-section {
  display: flex;
  position: relative;
  // z-index: -1;
}
.service-section__bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;

  &:before, &:after {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
  &:before {
    background-color: $default-blue;
    width: calc(50% - 105px);

    @include phone {
      width: 100%;
      bottom: 0;
    }
  }
  &:after {
    // display: none;
    left: calc(50% - 105px);
    background-color: $default-pink;

    @include phone {
      width: 100%;
      height: auto;
    }
  }
}

.service-section__dog-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;

  @include phone {
    // display: none;
  }

  &:before, &:after {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    @include phone {
      display: none;
    }
  }
  &:before, &:after {
    // background-color: red;
    width: calc(50% - 105px);
    // z-index: 0;
  }
  &:before {
    background-size: 50%;
    background-image: url('../assets/images/dog.png');
    background-position: bottom center;
    background-repeat: no-repeat;
    z-index: 1;
  }
}

.service-section__content {
  position: relative;
  display: flex;
  justify-content: space-around;
  letter-spacing: 0.025em;
  line-height: 1.5;
  color: #fff;

  @include phone {
    flex-direction: column;
  }
}

.service-section__left, .service-section__right {
  position: relative;
  padding-top: 100px;
  padding-bottom: 100px;
}

.service-section__left {
  width: 40%;

  @include phone {
    width: 100%;
    padding-top: 40px;
    padding-bottom: 300px;

    &:before {
      position: absolute;
      content: '';
      top: 0;
      left: -20px;
      width: calc(100% + 40px);
      height: 100%;
      z-index: -2;
      background-color: $default-blue;
    }

    &:after {
      position: absolute;
      content: '';
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: 80%;
      background-image: url('../assets/images/dog.png');
      background-position: bottom center;
      background-repeat: no-repeat;
      z-index: -1;
    }
  }

  ul li {
    list-style-type: disc;
    list-style-position: inside;
    letter-spacing: 0.025em;
  }
}
.service-section__right {
  text-align: center;
  margin: 0 auto;
  width: calc(50% + 105px);
  padding-top: 0;
  padding-bottom: 0;
  min-height: 800px;

  @include phone {
    width: 100%;

    &:before {
      position: absolute;
      content: '';
      top: 0;
      left: -20px;
      width: calc(100% + 40px);
      height: 100%;
      z-index: -2;
      background-color: $default-pink;
    }
  }
}

.service-section__title {
  display: block;
  margin-bottom: 20px;
}

.service-section__cta {
  padding-top: 60px;
}
</style>
