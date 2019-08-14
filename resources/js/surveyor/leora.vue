<template>
  <div>
    <div v-for="(line, index) in lines" v-bind:key="index" class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-2">
            <q-select
              v-model="line.countryCode"
              float-label="Country Code"
              :options="countryPhoneCodes"
            />
          </div>
          <div class="col-10">
            <q-field>
              <q-input
                v-model="line.number"
                float-label="Phone Number"
                numeric-keyboard-toggle
                placeholder="5551234567"
                type="text"
                value=""
              />
            </q-field>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <q-select
          v-model="line.phoneUsageType"
          float-label="Type of Usage"
          :options="phoneUsageTypes"
        />
      </div>

      <div class="col-lg-2">
        <div class="block float-right">
          <q-btn @click="removeLine(index)" icon="delete" round />
          <q-btn v-if="index + 1 === lines.length" @click="addLine" icon="playlist-plus" round />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PhoneNumberLine',
  data () {
    return {
      lines: [],
      blockRemoval: true,
      
    }
  },
  watch: {
    lines () {
      this.blockRemoval = this.lines.length <= 1
    }
  },
  methods: {
    addLine () {
      let checkEmptyLines = this.lines.filter(line => line.number === null)
      if (checkEmptyLines.length >= 1 && this.lines.length > 0) return
      this.lines.push({
        countryCode: null,
        number: null,
        phoneUsageType: null
      })
    },
    removeLine (lineId) {
      if (!this.blockRemoval) this.lines.splice(lineId, 1)
    }
  },
  mounted () {
    this.addLine()
  }
}
</script>