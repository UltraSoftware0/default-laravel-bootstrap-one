<!-- Start: Create or Update User -->
<div class="modal fade" id="users-modal" tabindex="-1" role="dialog" aria-labelledby="users-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="users-modal-able">User</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="users-modal-form">

                <div class="modal-body">
                    @csrf
                    <input name="_method" id="users-modal-form-method" type="hidden">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Name</label>
                                <input name="name" required type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">E-mail</label>
                                <input name="email" required type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Password</label>
                                <input name="password" required type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Check password</label>
                                <input name="password_confirmation" required type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <div class="form-check form-switch">
                                    <input name="is-active" class="form-check-input" type="checkbox"
                                           id="flexSwitchCheckDefault" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Active?</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Select Role</label>
                                <select name="role" required class="form-control" id="roles-select">
                                    <option> Select a role</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- End: Create or Update User -->
