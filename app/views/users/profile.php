<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="/user/avatar/<?=$profile['avatar']?>" id="avatar" class="img-thumbnail" alt="<?=$profile['first_name'].' '.$profile['last_name']?>" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    <?php if($this->session->userdata('user_id') == $profile['id']) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link" id="editprofile-tab" data-toggle="tab" href="#editprofile" role="tab" aria-controls="editprofile" aria-selected="false">Update Profile</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$profile['first_name']?> <?=$profile['last_name']?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                March 22, 1994.
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Something
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Something
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Something</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                Something
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <?php if($this->session->userdata('user_id') == $profile['id']) : ?>
                                    <div class="tab-pane fade" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
                                        <?=form_open_multipart('user/upload_avatar')?>
                                            <div class="form-group">
                                                <?=form_upload(['name'=>'avatar','value'=>'avatar'])?>
                                                <?=form_error('avatar','<p>','</p>')?>
                                                <?=form_submit(['name'=>'submit','value'=>'Update Avatar'])?>      
                                            </div>
                                        </form>
                                        
                                        <?=form_open('user/edit/'.$profile['id'])?>
                                            <div class="text-primary">
                                                <?=validation_errors()?>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?=$profile['first_name']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?=$profile['last_name']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$profile['username']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="E-mail Address" value="<?=$profile['email']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="country" class="form-control" placeholder="country" value="<?=$profile['country']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="institution" class="form-control" placeholder="institution" value="<?=$profile['institution']?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="description" class="form-control" placeholder="About me"><?=$profile['description']?> </textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>