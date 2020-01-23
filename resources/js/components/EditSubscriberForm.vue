<template>
  <div class="edit-subscriber-form" v-if="show">
    <div class="content">
      <h3>Subscriber info</h3>
      <div class="row" v-if="subscriber">
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Name</label>
            <input type="text" class="form-control" v-model="subscriber.name" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Email</label>
            <input type="email" class="form-control" v-model="subscriber.email" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for>State</label>
            <select v-model="subscriber.state" id class="form-control">
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
          <subscriber-field v-for="field in subscriber.fields" :key="field.id" :field="field"></subscriber-field>
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
    update() {},
    updateField() {},
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
    deleteField() {}
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