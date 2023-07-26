<template>
  <div>
    <select class="w-fit h-[40px] rounded-[10px] pl-[10px] pr-8 text-base border-none select appearance-none flex items-center my-2" 
    v-model="selectedLang" title="select-language">
      <option 
      v-for="item in options"
      :key="item.value"
      :label="item.label"
      :value="item.value"
      />
    </select>
  </div>
</template>

<script>
export default {
    name: "change-lang",
    data() {
        return {
            selectedLang: 'en',
            options: [
              {
                value: 'en',
                label: 'English'
              },
              {
                value: 'vn',
                label: 'Tiếng Việt'
              }
            ]
        }
    },
    watch: {
        selectedLang(payload) {
            this.$i18n.locale = payload
        }
    }
};
</script>

<style></style>
