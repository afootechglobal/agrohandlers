
			<?php
				 $user_array=$callclass->_get_staff_detail($conn, $users_id);
							  $u_array = json_decode($user_array, true);
								$users_id= $u_array[0]['user_id'];
								$surname= $u_array[0]['surname'];
								$othernames= $u_array[0]['othernames'];
								$dob= $u_array[0]['dob'];
								$gender= $u_array[0]['gender'];
								$religion= $u_array[0]['religion'];
								$nationality= $u_array[0]['nationality'];
								$state= $u_array[0]['state'];
								$lga= $u_array[0]['lga'];
								$address= $u_array[0]['address'];
								$mobile= $u_array[0]['mobile'];
								$email= $u_array[0]['email'];
								$passport= $u_array[0]['passport'];
								$cv_file= $u_array[0]['cv_file'];
								$otp= $u_array[0]['otp'];
								$job_id= $u_array[0]['job_id'];
									$fatch=$callclass->_get_job_detail($conn, $job_id);
									  $array = json_decode($fatch, true);
										$job_name= $array[0]['job_title'];

								$role_id= $u_array[0]['role_id'];
								$status_id= $u_array[0]['status_id'];
						
						$fetch_role=$callclass->_get_setup_role_detail($conn, $role_id);
						$array = json_decode($fetch_role, true);
						$role_name= $array[0]['role_name'];
						
						$fetch_status=$callclass->_get_setup_status_detail($conn, $status_id);
						$array = json_decode($fetch_status, true);
						$status_name= $array[0]['status_name'];
								
								if ($status_id=='A'){
								$status_name= 'ACTIVATED';
								}else if($status_id=='S'){
								$status_name= 'SUSPENDED';
								}else{
								$status_name= 'PENDING';
								}
								$reg_date= $u_array[0]['reg_date'];
								$last_login= $u_array[0]['last_login'];
				?>
				









            	<div class="profile-cover-div">
                    <?php if ($user_role_id!=1){?>
                	<div class="action-div">
                      <a href="<?php echo $website;?>/uploaded_files/staff_cv/<?php echo $cv_file; ?>" target="_blank"><button class="btn"><i class="fa fa-file-pdf-o"></i> Open CV</button></a>
                  </div>
                    <?php }?>
                </div>
            	
 
 
 
                <div class="profile-summary">
                    <label>
                	<div class="pix-div"><img src="<?php echo $website; ?>/uploaded_files/staff_passport/<?php echo $passport; ?>" id="passportimg3"/></div>
                    <?php if ($user_id==$users_id){?>
                    <input type="file" id="passport" accept=".jpg"  onchange="Test.UpdatePreview(this);" style="display:none;"/>
                    <?php }?>
                    </label>				
                    
                    <div class="text-div">
                        <div class="name"><?php echo ucwords(strtolower("$surname $othernames"))?></div>
                        <div class="text"> STATUS: <strong><?php echo strtoupper($status_name)?></strong> | LAST LOGIN DATE: <strong> <?php echo $last_login?></strong></div>
                    </div>
                </div> 
 
 
 
 
        	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">BASIC INFORMATION</div>
                    
                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">SURNAME:</div>
                        <div class="text-field-div">
                            <input id="surname" type="text" class="text_field" placeholder="SURNAME" title="SURNAME" value="<?php echo $surname; ?>"/>
                        </div>
                    </div>

                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">OTHER NAMES:</div>
                        <div class="text-field-div">
                            <input id="othernames" type="text" class="text_field" placeholder="OTHERNAMES" title="OTHERNAMES" value="<?php echo $othernames; ?>"/>
                        </div>
                    </div>

                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">DATE OF BIRTH:</div>
                        <div class="text-field-div">
                            <input id="datepicker" type="date" class="text_field" placeholder="DATE OF BIRTH" title="DATE OF BIRTH" value="<?php echo $dob; ?>"/>
                        </div>
                    </div>

                    
                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">GENDER:</div>
                        <div class="text-field-div">
                            <select id="gender"  class="text_field selectinput">
                             <option value="<?php echo $gender; ?>" selected="selected"><?php echo $gender; ?></option>
                                 <option value="MALE">MALE</option>
                                 <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">RELIGION AFFILIATION: </div>
                        <div class="text-field-div">
                      	 <select id="religion"  class="text_field selectinput">
                             <option value="<?php echo $religion; ?>" selected="selected"><?php echo $religion; ?></option>
                                 <option value="CHRISTIANITY">CHRISTIANITY</option>
                                 <option value="ISLAMIC">ISLAMIC</option>
                                 <option value="OTHERS">OTHERS</option>
                            </select>
                        </div>
                    </div>
                <br clear="all" />
                </div>
        	</div>
 
 
 
        	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">CONTACT INFORMATION</div>
                    
                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">NATIONALITY:</div>
                        <div class="text-field-div">
                            <input id="nationality" type="text" class="text_field" readonly="readonly"  placeholder="NATIONALITY" title="NATIONALITY" value="<?php echo $nationality; ?>"/>
                        <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">STATE OF ORIGIN:</div>
                        <div class="text-field-div">
                            <select id="state" class="text_field selectinput" title="Select State of Origin" onchange="_get_lga()">
                               <option value="<?php echo $state; ?>" selected="selected"><?php echo $state; ?></option>
                                      <option value='Abia'>Abia State</option>
                                      <option value='Adamawa'>Adamawa State</option>
                                      <option value='AkwaIbom'>AkwaIbom State</option>
                                      <option value='Anambra'>Anambra State</option>
                                      <option value='Bauchi'>Bauchi State</option>
                                      <option value='Bayelsa'>Bayelsa State</option>
                                      <option value='Benue'>Benue State</option>
                                      <option value='Borno'>Borno State</option>
                                      <option value='CrossRivers'>CrossRivers State</option>
                                      <option value='Delta'>Delta State</option>
                                      <option value='Ebonyi'>Ebonyi State</option>
                                      <option value='Edo'>Edo State</option>
                                      <option value='Ekiti'>Ekiti State</option>
                                      <option value='Enugu'>Enugu State</option>
                                      <option value='Gombe'>Gombe State</option>
                                      <option value='Imo'>Imo State</option>
                                      <option value='Jigawa'>Jigawa State</option>
                                      <option value='Kaduna'>Kaduna State</option>
                                      <option value='Kano'>Kano State</option>
                                      <option value='Katsina'>Katsina State</option>
                                      <option value='Kebbi'>Kebbi State</option>
                                      <option value='Kogi'>Kogi State</option>
                                      <option value='Kwara'>Kwara State</option>
                                      <option value='Lagos'>Lagos State</option>
                                      <option value='Nasarawa'>Nasarawa State</option>
                                      <option value='Niger'>Niger State</option>
                                      <option value='Ogun'>Ogun State</option>
                                      <option value='Ondo'>Ondo State</option>
                                      <option value='Osun'>Osun State</option>
                                      <option value='Oyo'>Oyo State</option>
                                      <option value='Plateau'>Plateau State</option>
                                      <option value='Rivers'>Rivers State</option>
                                      <option value='Sokoto'>Sokoto State</option>
                                      <option value='Taraba'>Taraba State</option>
                                      <option value='Yobe'>Yobe State</option>
                                      <option value='Zamfara'>Zamafara State</option>
                                 </select>
                        </div>
                    </div>

                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">LOCAL GOVT. AREA:</div>
                        <div class="text-field-div">
                            <select id="lga" class="text_field selectinput">
                                       <option value="<?php echo $lga; ?>" selected="selected"><?php echo $lga; ?></option>
                                </select>
                        </div>
                    </div>

                    
                    <div class="profile-segment-div col-1">
                    	<div class="segment-title">RESIDENTIAL ADDRESS:</div>
                        <div class="text-field-div">
                             <input id="address" type="text" class="text_field" placeholder="RESIDENTIAL ADDRESS" title="RESIDENTIAL ADDRESS" value="<?php echo $address; ?>"/>
                        </div>
                    </div>
                    
                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">EMAIL: </div>
                        <div class="text-field-div">
                       		<input id="email" type="text" class="text_field" readonly="readonly" placeholder="EMAIL ADDRESS" title="EMAIL ADDRESS" value="<?php echo $email; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                    
                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">PHONE NUMBER: </div>
                        <div class="text-field-div">
                       		<input id="phoneno" type="text" class="text_field" placeholder="PHONE NUMBER" title="PHONE NUMBER" value="<?php echo $mobile; ?>"/>
                        </div>
                    </div>
                <br clear="all" />
                </div>
        	</div>
 
 
 
  	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">ACCOUNT INFORMATION</div>
                    
                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">STAFF ID:</div>
                        <div class="text-field-div">
                            <input type="text" class="text_field" readonly="readonly" placeholder="STAFF ID" title="STAFF ID" value="<?php echo $users_id; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">POST:</div>
                        <div class="text-field-div">
                             <?php if ($user_id==$users_id){?>
                                  <input id="job_id" type="text" class="text_field" readonly="readonly" value="<?php echo $job_name; ?>"/>
                                   <span>&nbsp;<i class="fa fa-lock"></i></span>

                              <?php }else{?>
                                  <select id="job_id"  class="text_field selectinput">
                                      <option value="<?php echo $job_id; ?>" selected="selected"><?php echo $job_name; ?></option>
                                      <?php 
                                      $query= mysqli_query($conn,"SELECT job_id, title FROM job_tab");
                                      while($fetch=mysqli_fetch_array($query)){
                                      $job_id=$fetch['job_id'];
                                      $job_title=$fetch['title'];
                                      ?>
                                      <option value="<?php echo $job_id;?>"><?php echo $job_title;?></option>
                                      <?php }?>
                                  </select>    
                             <?php }?>
                        </div>
                    </div>                <br clear="all" />


                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">DATE OF REGISTRATION:</div>
                        <div class="text-field-div">
                            <input type="text" readonly="readonly" class="text_field" placeholder="Date Of Registration" title="Date Of Registration" value="<?php echo $reg_date; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    
                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">LAST LOGIN DATE:</div>
                        <div class="text-field-div">
                            <input type="text" class="text_field" readonly="readonly" placeholder="Last Login Date" title="Last Login Date" value="<?php echo $last_login; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                    
                <br clear="all" />
                </div>
        	</div>
 
 
 
 
 
 <div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">ADMINISTRATIVE INFORMATION</div>
                    <?php if ($user_id==$users_id){?>
                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">USER ROLE:</div>
                        <div class="text-field-div">
                                 <input  id="role_id" type="text" class="text_field" readonly="readonly" value="<?php echo $role_name; ?>"/>
                                 <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div> 


                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">USER STATUS:</div>
                        <div class="text-field-div">
                            <input id="status_id" type="text" class="text_field" readonly="readonly" value="<?php echo $status_name; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    <?php }else{?>

                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">USER ROLE:</div>
                        <div class="text-field-div">
                                 <select id="role_id"  class="text_field selectinput">
                             <option value="<?php echo $role_id; ?>" selected="selected"><?php echo $role_name; ?></option>
                                 <option value="1">STAFF</option>
                                 <option value="2">ADMIN</option>
                            <?php if ($user_role_id==3){?>
                                 <option value="3">SUPER ADMIN</option>
                            <?php }?>
                            </select>
                        </div>
                    </div> 


                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">USER STATUS:</div>
                        <div class="text-field-div">
                            <select id="status_id"  class="text_field selectinput">
                             <option value="<?php echo $status_id; ?>" selected="selected"><?php echo $status_name; ?></option>
                                 <option value="A">ACTIVE</option>
                                 <option value="S">SUSPEND</option>
                            <?php if ($status_id=='P'){?>
                                 <option value="P">PEND</option>
                            <?php }?>
                            </select>
                        </div>
                    </div>

                    <?php }?>
                    
                <br clear="all" />
                <div class="btn-div">
					<?php if ($role_id==0){?>
                         <button class="btn red" type="button" id="delete-user-btn" onclick="_delete_user('<?php echo $users_id; ?>');"> <i class="fa fa-close"></i> DELETE </button>
                         <button class="btn" type="button" id="activate-user-btn" onclick="_activate_user('<?php echo $users_id; ?>');"> ACTIVATE <i class="fa fa-check"></i></button>
                    <?php }else{?>
 					<?php if (($user_role_id==$role_id)&&($user_id!=$users_id)){ 
					//do nothing 
					}else{?>
                        <button class="btn" type="button" id="update-user-btn" onclick="_update_user_profile('<?php echo $users_id; ?>');"> UPDATE PROFILE <i class="fa fa-check"></i></button>
                    <?php }?>
                    <?php }?>
                  </div>
                </div>
        	</div>
 
 
            
      