<template>
  <div class="subscriber-field">
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <input type="text" class="form-control" v-model="field.title" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <input type="text" class="form-control" v-model="field.value" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-8">
            <div class="form-group">
              <select v-model="field.type" class="form-control">
                <option value="date">Date</option>
                <option value="number">Number</option>
                <option value="string">String</option>
                <option value="boolean">True/False</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
              <button class="btn btn-danger btn-sm">X</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: ["field"]
};
</script>

<style>
</style>