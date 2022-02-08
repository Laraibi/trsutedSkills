<template>
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Trusted</b>Skills</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <!-- 
        <form action="." method="post"> -->
        <div class="input-group mb-3">
          <input
            type="email"
            class="form-control"
            placeholder="Email"
            v-model="loginPlayLoad.email"
          />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input
            v-model="loginPlayLoad.password"
            type="password"
            class="form-control"
            placeholder="Password"
          />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" />
              <label class="mx-2" for="remember"> Remember Me </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button
              type="submit"
              class="btn btn-primary btn-block"
              @click.prevent="localLogin"
            >
              Sign In
            </button>
          </div>
          <!-- /.col -->
        </div>
        <!-- </form> -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      loginPlayLoad: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    ...mapActions(["login"]),
    localLogin() {
      this.login(this.loginPlayLoad).then(() => this.$router.push("Home"));
    },
  },
};
</script>

<style>
</style>