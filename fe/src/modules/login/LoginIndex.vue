<template>
  <v-sheet class="flex-column d-flex items-center justify-center h-100 bg-deep-orange-accent-1 pa-12" rounded>
    <v-card class="w-100 mx-auto px-6 py-8" max-width="344">
      <v-form
        v-model="form"
        @submit.prevent="submitLogin"
      >
        <v-text-field
          v-model="email"
          :readonly="loading"
          :rules="emailRules"
          class="mb-2"
          label="Email"
          clearable
          v-bind="wrongCredentialsError ? { 'error-messages': [wrongCredentialsError] } : {}"
        ></v-text-field>

        <v-text-field
          v-model="password"
          :readonly="loading"
          :rules="passwordRules"
          label="Password"
          placeholder="Enter your password"
          clearable
        ></v-text-field>

        <br>

        <v-btn
          :loading="loading"
          color="success"
          size="large"
          type="submit"
          variant="elevated"
          block
        >
          Sign In
        </v-btn>
      </v-form>
    </v-card>
  </v-sheet>
</template>

<script setup>
import {onMounted, ref} from 'vue'
import {login} from "@/services/auth/login.js";
import { useRouter } from 'vue-router'
import {getUser} from "@/services/auth/getUser.js";

const router = useRouter()

const form = ref(false)
const email = ref('')
const emailRules = ref([
  v => !!v || 'Email is required',
])
const password = ref('')
const passwordRules = ref([
  v => !!v || 'Password is required',
])

const wrongCredentialsError = ref('')

const loading = ref(false)
async function submitLogin () {
  wrongCredentialsError.value = ''
  if (!form.value) return

  try {
    await login(email.value, password.value)
    await router.push({ name: 'publication' })
  } catch (e) {
    if (e.status === 401) {
      wrongCredentialsError.value = 'Wrong credentials'
      return
    }
    throw e
  }
}
</script>
