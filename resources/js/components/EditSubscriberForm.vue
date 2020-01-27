<template>
  <div class="edit-subscriber-form" v-if="show">
    <div class="content">
      <div class="row">
        <div class="col">
          <h3>Subscriber info</h3>
        </div>
        <div class="col-3 text-right">
          <button class="btn" @click="$emit('close')"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="row" v-if="subscriber">
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Name</label>
            <input type="text" class="form-control" v-model="subscriber.name" v-debounce:100ms="update" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Email</label>
            <input type="email" class="form-control" v-model="subscriber.email" v-debounce:100ms="update" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for>State</label>
            <select v-model="subscriber.state" id class="form-control" v-debounce:100ms="update" :debounce-events="['input']">
              <option value="active">Active</option>
              <option value="unsubscribed">Unsubscribed</option>
              <option value="junk">Junk</option>
              <option value="bounced">Bounced</option>
              <option value="unconfirmed">Uncomfirmed</option>
            </select>
          </div>
        </div>
      </div>
      <div class="mt-3">
          <h3>Fields</h3>
          <button class="btn btn-success mb-4" @click="addField()">Add</button>
          <subscriber-field v-for="field in subscriber.fields" :key="field.id" :field="field" @deleted="removeField"></subscriber-field>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: ["subscriber", "show"],
  methods: {
    update() {
        let url = route('subscriber.update', {'subscriber': this.subscriber.id});
        // Destructure the object and get only the fields we want
        let payload = (({name, email, state}) => ({name, email, state}))(this.subscriber);

        window.axios.put(url, payload)
        .then(response => {
            
        });
    },
    addField() {
        let url = route('subscriber-field.store');
        let payload = {
            title: 'New Field',
            value: 'Field Value',
            subscriber_id: this.subscriber.id
        };

        window.axios.post(url, payload)
        .then(response => {
            this.subscriber.fields.push(response.data);
        });
    },
    removeField(field) {
        this.subscriber.fields = this.subscriber.fields.filter(f => f.id !== field.id);
    }
  }
};
</script>

<style lang="scss">
.edit-subscriber-form {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba($color: #000000, $alpha: 0.6);
    overflow-y: auto;
    padding: 20px 0;
    z-index: 200;

    .content {
        width: 50%;
        background-color: white;
        margin: auto;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #eee;
    }
}
</style>