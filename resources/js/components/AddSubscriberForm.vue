<template>
  <div class="add-subscriber-form">
    <h3>Add a subscriber</h3>
    <form action @submit="createSubscriber">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Name</label>
            <input type="text" class="form-control" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for>Email</label>
            <input type="email" class="form-control" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for>State</label>
                <select name id class="form-control">
                  <option value="active">Active</option>
                  <option value="unsubscribed">Unsubscribed</option>
                  <option value="junk">Junk</option>
                  <option value="bounced">Bounced</option>
                  <option value="unconfirmed">Uncomfirmed</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    createSubscriber() {}
  }
};
</script>

<style>
</style>