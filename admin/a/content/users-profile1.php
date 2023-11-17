
			<?php
						$user_array=$callclass->_get_staff_detail($conn, $users_id);
						$u_array = json_decode($user_array, true);
						$user_name= $u_array[0]['fullname'];
						$user_mobile= $u_array[0]['mobile'];
						$user_email= $u_array[0]['email'];
						$user_passport= $u_array[0]['passport'];
						$user_otp= $u_array[0]['otp'];
						$role_id= $u_array[0]['role_id'];
						$user_status_id= $u_array[0]['status_id'];
						$user_reg_date= $u_array[0]['reg_date'];
						$user_last_login= $u_array[0]['last_login'];
						
						$fetch_role=$callclass->_get_setup_role_detail($conn, $role_id);
						$array = json_decode($fetch_role, true);
						$user_role_name= $array[0]['role_name'];
						
						$fetch_status=$callclass->_get_setup_status_detail($conn, $user_status_id);
						$array = json_decode($fetch_status, true);
						$user_status_name= $array[0]['status_name'];
						
								if ($user_status_id=='A'){
								$status_name= 'ACTIVATED';
								}else if($user_status_id=='S'){
								$status_name= 'SUSPENDED';
								}else{
								$status_name= 'PENDING';
								}
				?>
				

            	<div class="profile-cover-div"></div>

                <div class="profile-summary">
                    <label>
                	<div class="pix-div"><img src="../../uploaded_files/staff_passport/<?php echo $user_passport; ?>" id="passportimg3"/></div>
                    <?php if ($user_id==$users_id){?>
                    <input type="file" id="passport" accept=".jpg"  onchange="Test.UpdatePreview(this);" style="display:none;"/>
                    <?php }?>
                    </label>				
                    
                    <div class="text-div">
                        <div class="name"><?php echo ucwords(strtolower($user_name))?></div>
                        <div class="text"> STATUS: <strong><?php echo strtoupper($status_name)?></strong> | LAST LOGIN DATE: <strong> <?php echo $user_last_login?></strong></div>
                    </div>
                </div> 
 
 
 
 
        	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">BASIC INFORMATION</div>
                    
                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">FULLNAME:</div>
                        <div class="text-field-div">
                            <input id="fullname" type="text" class="text_field" placeholder="FULLNAME" title="FULLNAME" value="<?php echo $user_name; ?>"/>
                        </div>
                    </div>

                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">PHONE NUMBER:</div>
                        <div class="text-field-div">
                            <input id="phone" type="text" class="text_field" placeholder="PHONE NUMBER" title="PHONE NUMBER" value="<?php echo $user_mobile; ?>"/>
                        </div>
                    </div>

                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">EMAIL ADDRESS:</div>
                        <div class="text-field-div">
                            <input id="email" type="text" class="text_field" placeholder="EMAIL ADDRESS" title="EMAIL ADDRESS" value="<?php echo $user_email; ?>"/>
                        </div>
                    </div>
                    
                </div>
        	</div>
 
 
 
 
 
<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">ADMINISTRATIVE INFORMATION</div>
                    <?php if ($user_id==$users_id){?>
                    

                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">USER ROLE:</div>
                        <div class="text-field-div">
                                 <input  id="role_id" type="text" class="text_field" readonly="readonly" value="<?php echo $user_role_name; ?>"/>
                                 <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div> 


                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">USER STATUS:</div>
                        <div class="text-field-div">
                            <input id="status_id" type="text" class="text_field" readonly="readonly" value="<?php echo $user_status_name; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    <?php }else{?>
                    
                    

                    <div class="profile-segment-div col-2">
                    	<div class="segment-title">USER ROLE:</div>
                        <div class="text-field-div">
                                 <select id="role_id"  class="text_field selectinput">
                             <option value="<?php echo $role_id; ?>" selected="selected"><?php echo $user_role_name; ?></option>
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
                             <option value="<?php echo $user_status_id; ?>" selected="selected"><?php echo $user_status_name; ?></option>
                                 <option value="A">ACTIVE</option>
                                 <option value="S">SUSPEND</option>
                            <?php if ($status_id=='P'){?>
                                 <option value="P">PEND</option>
                            <?php }?>
                            </select>
                        </div>
                    </div>

                    <?php }?>
                    
                </div>
        	</div> 
 
 
 
 
 
  	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">ACCOUNT INFORMATION</div>
                    
                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">STAFF ID:</div>
                        <div class="text-field-div">
                            <input type="text" class="text_field" readonly="readonly" placeholder="STAFF ID" title="STAFF ID" value="<?php echo $users_id; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>


                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">DATE OF REGISTRATION:</div>
                        <div class="text-field-div">
                            <input type="text" readonly="readonly" class="text_field" placeholder="Date Of Registration" title="Date Of Registration" value="<?php echo $user_reg_date; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>

                    
                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">LAST LOGIN DATE:</div>
                        <div class="text-field-div">
                            <input type="text" class="text_field" readonly="readonly" placeholder="Last Login Date" title="Last Login Date" value="<?php echo $user_last_login; ?>"/>
                            <span>&nbsp;<i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                    
                <br clear="all" />
                <div class="btn-div">
                        <button class="btn" type="button" id="update-user-btn" onclick="_update_user_profile('<?php echo $users_id; ?>');"> UPDATE PROFILE <i class="fa fa-check"></i></button>
                  </div>
                
                </div>
        	</div>
 
 
 
 
 
 
 
 
            
      