<template>
  <div class="subscriber-field">
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <input type="text" class="form-control" v-model="field.title" v-debounce:100ms="update" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <input type="text" class="form-control" v-model="field.value" v-debounce:100ms="update" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-9">
            <div class="form-group">
              <select v-model="field.type" class="form-control" v-debounce:100ms="update" :debounce-events="['input']">
                <option value="date">Date</option>
                <option value="number">Number</option>
                <option value="string">String</option>
                <option value="boolean">True/False</option>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
              <button class="btn btn-danger btn-block btn-sm" @click="destroy"><i class="fa fa-times"></i></button>
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
  props: ["field"],
  methods: {
      update() {
          let url = route('subscriber-field.update', {'subscriber_field': this.field.id});
          // Destructure the object and get only the fields we want
          let payload = (({title, value, type}) => ({title, value, type}))(this.field);
          
          window.axios.put(url, payload)
          .then(response => {
              
          });
      },
      destroy() {
          let url = route('subscriber-field.destroy', {'subscriber_field': this.field.id});
          
          window.axios.delete(url)
          .then(response => {
              this.$emit('deleted', this.field);
          });
      }
  }
};
</script>

<style>
</style>