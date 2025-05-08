@extends('layouts/contentNavbarLayout')
@section('content')

    <section class="dc-haslayout dc-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div  class="dc-haslayout dc-user-account">
                    <div class="dc-dashboardbox dc-dashboardtabsholder dc-accountsettingholder">
                        <div class="dc-dashboardtabs">
                            <ul class="dc-tabstitle nav navbar-nav">
                                <li class="nav-item" id="security-settings">
                                    <a href="#security">
                                        Security &amp; Settings
                                    </a>
                                </li>

                                <li class="nav-item" id="password">
                                    <a class="" href="#password-tab">
                                        Password
                                    </a>
                                </li>
                                <li class="nav-item" id="email-notification">
                                    <a class="" href="#email-notification-tab">Email Notification</a>
                                </li>
                                <li class="nav-item" id="delete-account">
                                    <a class="" href="#delete-account-tab">Delete Account</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dc-tabscontent tab-content">
                            <div class="dc-securityhold tab-pane active fade show" id="security">
                                <div class="dc-securitysettings dc-tabsinfo">
                                    <div class="dc-tabscontenttitle">
                                        <h3>Account Security &amp; Settings</h3>
                                    </div>
                                    <div class="dc-settingscontent dc-sidepadding">
                                        <ul class="dc-accountinfo">
                                            <li>
                                                <div class="dc-on-off">
                                                    <input type="hidden" name="settings[_profile_blocked]" value="off">
                                                    <input type="checkbox" value="on" id="_profile_blocked" name="settings[_profile_blocked]">
                                                    <label for="_profile_blocked"><i></i></label>
                                                </div>
                                                <span>Disable my account temporarily</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="dc-passwordholder tab-pane show" id="password-tab">
                              <div class="dc-changepassword">
                                  <div class="dc-tabscontenttitle">
                                      <h3>Change Your Password</h3>
                                  </div>
                                  <div class="dc-formtheme dc-userform dc-sidepadding">
                                      <form method="POST" action="{{ route('update.password') }}">
                                          @csrf
                                          @method('PUT')
                                          <fieldset>
                                              <div class="form-group form-group-half">
                                                  <input type="password" name="current_password" class="form-control" placeholder="Last Remember Password">
                                              </div>
                                              <div class="form-group form-group-half">
                                                  <input type="password" name="password" class="form-control" placeholder="New Password">
                                              </div>
                                          </fieldset>
                                          <button type="submit" class="btn btn-danger btn btn-primary">Save</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                            <div class="dc-emailnotiholder tab-pane show" id="email-notification-tab">
                              <div class="dc-emailnoti">
                                  <div class="dc-tabscontenttitle">
                                      <h3>Manage Email Notifications</h3>
                                  </div>
                                  <div class="dc-settingscontent dc-sidepadding">
                                      <div class="dc-description">
                                          <p>You will connect to your profile using this e-mail</p>
                                      </div>
                                      <div class="dc-formtheme dc-userform">
                                          <form method="POST" action="{{ route('update.email') }}">
                                              @csrf
                                              @method('PUT')
                                              <fieldset>
                                                  <div class="form-group form-group-half toolip-wrapo">
                                                      <input type="email" class="form-control" id="email" name="email" placeholder="Change email" value="{{ isset($user) ? $user->email : '' }}">
                                                  </div>
                                              </fieldset>
                                              <button type="submit"  class="btn btn-danger save-email-button">Save</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="dc-yourdetails dc-tabsinfo dc-delete-account tab-pane fade" id="delete-account-tab">
                            <div class="dc-tabscontenttitle">
                                <h3>Delete Account</h3>
                            </div>
                            <div class="dc-formtheme dc-userform dc-sidepadding">
                                <form method="POST" action="{{ route('delete.account') }}">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" name="retype" class="form-control" placeholder="Retype Password">
                                            <!-- Vous pouvez ajouter ici une vérification supplémentaire si nécessaire -->
                                        </div>
                                        <div class="form-group mb-3">
                                            <select name="reason" class="form-control">
                                                <option value="">Select Reason to Leave</option>
                                                <option value="not_satisfied">Not satisfied with the system</option>
                                                <option value="support">Support is not good</option>
                                                <option value="other">Others</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-danger">Delete Account</button>
                                </form>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
