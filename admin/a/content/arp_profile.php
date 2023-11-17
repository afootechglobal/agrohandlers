
			<?php
	  $array=$callclass->_get_user_detail($conn, $users_id);
	  $fetch = json_decode($array, true);
			$first_name=$fetch[0]['first_name'];
			$middle_name=$fetch[0]['middle_name'];
			$last_name=$fetch[0]['last_name'];
			$gender=$fetch[0]['gender'];
			$dob=$fetch[0]['dob'];
			$country_id=$fetch[0]['country_id'];
			$state_id=$fetch[0]['state_id'];
			$lga=$fetch[0]['lga'];
			$address=$fetch[0]['address'];
			$email=$fetch[0]['email'];
			$mobile=$fetch[0]['mobile'];
			$qualification_id=$fetch[0]['qualification_id'];
			$occupation=$fetch[0]['occupation'];
			$working_experience=$fetch[0]['working_experience'];
			
			$marital_status=$fetch[0]['marital_status'];
			$spouse_fullname=$fetch[0]['spouse_fullname'];
			$spouse_dob=$fetch[0]['spouse_dob'];
			$spouse_qualification_id=$fetch[0]['spouse_qualification_id'];
			$nums_of_children=$fetch[0]['nums_of_children'];
			$spouse_occupation=$fetch[0]['spouse_occupation'];
			$spouse_working_experience=$fetch[0]['spouse_working_experience'];
			
			$relative_option=$fetch[0]['relative_option'];
			$relative_relationship=$fetch[0]['relative_relationship'];
			
			$ref_id=$fetch[0]['ref_id'];
			$ref_details=$fetch[0]['ref_details'];
			$program_id=$fetch[0]['program_id'];
			$status_id=$fetch[0]['status_id'];
			
			$send_opportunity=$fetch[0]['send_opportunity'];
			$other_occupation_selected=$fetch[0]['other_occupation_selected'];
			$entourage_option=$fetch[0]['entourage_option'];
			$user_intl_passport_option=$fetch[0]['user_intl_passport_option'];
			$passport_number=$fetch[0]['passport_number'];
			$user_entourage_passport_option=$fetch[0]['user_entourage_passport_option'];
			$reg_date=$fetch[0]['date'];
			
			  $fetch_status=$callclass->_get_setup_status_detail($conn, $status_id);
			  $array = json_decode($fetch_status, true);
			  $status_name= $array[0]['status_name'];
			  
			  $fetch=$callclass->_get_setup_country_detail($conn, $country_id);
			  $array = json_decode($fetch, true);
			  $country_name=$array[0]['country_name'];
			  
			  $fetch=$callclass->_get_setup_state_detail($conn, $country_id,$state_id);
			  $array = json_decode($fetch, true);
			  $state_name=$array[0]['state_name'];
			  
			  $fetch=$callclass->_get_setup_qualifications_detail($conn, $qualification_id);
			  $array = json_decode($fetch, true);
			  $qualification_name=$array[0]['qualification_name'];
			  
			  $fetch=$callclass->_get_setup_qualifications_detail($conn, $spouse_qualification_id);
			  $array = json_decode($fetch, true);
			  $spouse_qualification_name=$array[0]['qualification_name'];
			  
			  $array=$callclass->_get_setup_referral_detail($conn, $ref_id);
			  $fetch = json_decode($array, true);
			  $ref_name=$fetch[0]['ref_name'];
			  
			  $array=$callclass->_get_setup_program_detail($conn, $program_id);
			  $fetch = json_decode($array, true);
			  $program_name=$fetch[0]['program_name'];


		$fullname="$last_name $middle_name $first_name";
				?>
				

            	<div class="profile-cover-div">
                <div class="action-div">
                    <?php if($status_id=='P'){?>
                     <button class="btn red" onclick="_delete_arp('<?php echo $users_id?>')"><i class="fa fa-trash"></i> Delete ARP</button>
                     <button class="btn"  title="SEND MAIL" onclick="_send_confirmation_mail('<?php echo $users_id; ?>')"><i class="fa fa-envelope"></i> Send Mail</button>
                     <?php }?>
                    <?php if($status_id=='OUT'){?>
                     <button class="btn" id="payment-btn" onclick="_confirm_payment('<?php echo $users_id?>')"><i class="fa fa-check"></i> Confirm Payment</button>
                     <button class="btn"  title="RESEND MAIL" onclick="_resend_confirmation_mail('<?php echo $users_id; ?>')"><i class="fa fa-envelope"></i> Re-Send Mail</button>
                     <?php }?>
                  </div>
                </div>

                <div class="profile-summary">
                    <label>
                	<div class="pix-div"><img src="../../uploaded_files/arp_passport/friends.png"/></div>
                    </label>				
                    
                    <div class="text-div">
                        <div class="name"><?php echo ucwords(strtolower($fullname))?></div>
                        <div class="text"> STATUS: <strong><?php echo strtoupper($status_name)?></strong> | REGISTRATION DATE: <strong> <?php echo $reg_date?></strong></div>
                    </div>
                </div> 
 
 
 
 
        	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">BASIC DETAILS</div>
                    
                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">FIRST NAME:</div>
                        <div class="text-field-div">
                            <input id="first_name" type="text" class="text_field" placeholder="FULLNAME" title="FULLNAME" value="<?php echo $first_name; ?>"/>
                        </div>
                    </div>

                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">MIDDLE NAME:</div>
                        <div class="text-field-div">
                            <input id="middle_name" type="text" class="text_field" placeholder="MIDDLE NAME" title="MIDDLE NAME" value="<?php echo $middle_name; ?>"/>
                        </div>
                    </div>

                    <div class="profile-segment-div col-3">
                    	<div class="segment-title">LAST NAME:</div>
                        <div class="text-field-div">
                            <input id="last_name" type="text" class="text_field" placeholder="LAST NAME" title="LAST NAME" value="<?php echo $last_name; ?>"/>
                        </div>
                    </div>
                    
                    
                    <div class="profile-segment-div col-4">
                    	<div class="segment-title">GENDER:</div>
                        <div class="text-field-div">
                            <select id="gender"  class="text_field selectinput">
                             <option value="<?php echo $gender; ?>" selected="selected"><?php echo $gender; ?></option>
                                 <option value="MALE">MALE</option>
                                 <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                    </div>

                    <div class="profile-segment-div col-4">
                    	<div class="segment-title">DATE OF BIRTH:</div>
                        <div class="text-field-div">
                            <input id="dob" type="date" class="text_field" placeholder="DATE OF BIRTH" title="DATE OF BIRTH" value="<?php echo $dob; ?>"/>
                        </div>
                    </div>

                    
                    <div class="profile-segment-div col-35">
                    	<div class="segment-title">QUALIFICATION:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="qualification_id">
                                <?php if ($qualification_id==''){?>
                                <option value="" selected="selected">CHOOSE</option>
                                <?php }else{?>
                                <option value="<?php echo $qualification_id;?>" selected="selected"><?php echo strtoupper($qualification_name);?></option>
                                <?php }?>
                                <?php 
                                $query= mysqli_query($conn,"SELECT * FROM setup_qualifications_tab");
                                while($sel=mysqli_fetch_array($query)){
                                $qualification_id=$sel['qualification_id'];
                                $qualification_name=$sel['qualification_name'];
                                ?>
                              <option value="<?php echo $qualification_id;?>"><?php echo strtoupper($qualification_name);?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="profile-segment-div col-4">
                    	<div class="segment-title">INT'L PASSPORT AVAILABILITY:</div>
                        <div class="text-field-div">
                        <select class="text_field selectinput" id="user_intl_passport_option" onchange="_get_passport_details()">
                            <?php if ($user_intl_passport_option==''){?>
                            <option value="" selected="selected">SELECT</option>
                            <?php }else{?>
                            <option value="<?php echo $user_intl_passport_option;?>" selected="selected"><?php echo strtoupper($user_intl_passport_option);?></option>
                            <?php }?>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                        </div>
                    </div>
                    <div class="profile-segment-div col-4">
                    	<div class="segment-title">PASSPORT NUMBER:</div>
                        <div class="text-field-div">
                            <input class="text_field" id="passport_number" placeholder="PASSPORT NUMBER" value="<?php echo $passport_number; ?>"/>
                        </div>
                    </div>
                    <div class="profile-segment-div col-4">
                    	<div class="segment-title">RELATIVE IN CANADA:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="relative_option" onchange="_relative_option_details()">
                                <?php if ($relative_option==''){?>
                                <option value="" selected="selected">SELECT</option>
                                <?php }else{?>
                                <option value="<?php echo $relative_option;?>" selected="selected"><?php echo strtoupper($relative_option);?></option>
                                <?php }?>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="profile-segment-div col-4">
                    	<div class="segment-title">RELATIONSHIP:</div>
                        <div class="text-field-div">
                          <input class="text_field" id="relative_relationship" placeholder="RELATIONSHIP" value="<?php echo $relative_relationship; ?>"/>
                        </div>
                    </div>
                    
                </div>
        	</div>
 
 
 
 
         	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">CONTACT DETAILS</div>
				
                
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">NATIONALITY:</div>
                        <div class="text-field-div">
                            <select id="country_id" class="text_field selectinput" title="Country" onchange="_get_states()">
                                <?php if ($country_id==''){?>
                                <option value="" selected="selected">SELECT</option>
                                <?php }else{?>
                                <option value="<?php echo $country_id;?>" selected="selected"><?php echo strtoupper($country_name);?></option>
                                <?php }?>
                                <?php
                                    $query=mysqli_query($conn,"SELECT * FROM setup_countries_tab ORDER BY country_name ASC");
                                    while($fetch=mysqli_fetch_array($query)){
                                            $country_id=$fetch['country_id'];
                                            $country_name=strtoupper($fetch['country_name']);
                                ?>
                                <option value="<?php echo $country_id?>"><?php echo $country_name?></option>
                                <?php	
                                  }
                                ?>
                            </select>
                        </div>
                    </div>
                
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">STATE/PROVINCE:</div>
                        <div class="text-field-div">
                            <select id="state_id" class="text_field selectinput" title="Province/State">
                                <?php if ($state_id==''){?>
                                <option value="" selected="selected">SELECT</option>
                                <?php }else{?>
                                <option value="<?php echo $state_id;?>" selected="selected"><?php echo strtoupper($state_name);?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">LOCAL GOVT. AREA:</div>
                        <div class="text-field-div">
                            <input class="text_field" id="lga" placeholder="LOCAL GOVT. AREA" value="<?php echo $lga; ?>"/>
                        </div>
                    </div>
                
                	<div class="profile-segment-div">
                    	<div class="segment-title">FULL ADDRESS:</div>
                        <div class="text-field-div">
                            <input class="text_field" id="address" placeholder="ENTER YOUR ADDRESS" value="<?php echo $address; ?>"/>
                        </div>
                    </div>
                    
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">PHONE NUMBER:</div>
                        <div class="text-field-div">
                            <input class="text_field"  placeholder="ENTER YOUR PHONE NUMBER" value="<?php echo $mobile; ?>"/>
                        </div>
                    </div>
                
                	<div class="profile-segment-div col-15">
                    	<div class="segment-title">EMAIL ADDRESS:</div>
                        <div class="text-field-div">
                            <input class="text_field" placeholder="EMAIL ADDRESS" value="<?php echo $email; ?>"/>
                        </div>
                    </div>
                
                
                </div>
        	</div>




         	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">PROGRAM DETAILS</div>
                    
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">PREFERRED PROGRAM:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="program_id">
                                <?php if ($program_id==''){?>
                                <option value="" selected="selected">CHOOSE</option>
                                <?php }else{?>
                                <option value="<?php echo $program_id;?>" selected="selected"><?php echo strtoupper($program_name);?></option>
                                <?php }?>
                                <?php 
                                $query= mysqli_query($conn,"SELECT * FROM setup_program_tab");
                                while($sel=mysqli_fetch_array($query)){
                                $program_id=$sel['program_id'];
                                $program_name=$sel['program_name'];
                                ?>
                                <option value="<?php echo $program_id;?>"><?php echo strtoupper($program_name);?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
				
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">OCCUPATION:</div>
                        <div class="text-field-div">
                            <input class="text_field" id="occupation" placeholder="ENTER YOUR OCCUPATION" value="<?php echo $occupation; ?>"/>
                        </div>
                    </div>
				
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">YEARS OF WORKING EXPERIENCE:</div>
                        <div class="text-field-div">
                            <input class="text_field" id="working_experience" type="number" placeholder="NUMBER OF YEARS" value="<?php echo $working_experience; ?>" onkeypress="return isNumber(event)"/>
                        </div>
                    </div>

                	<div class="profile-segment-div">
                    	<div class="segment-title">OTHER OCCUPATION SELECTED:</div>
                        <div class="text-field-div">
                            <?php 
								$query= mysqli_query($conn,"SELECT * FROM setup_occupation_tab WHERE sn IN ($other_occupation_selected)");
								while($sel=mysqli_fetch_array($query)){
								$occupation_id=$sel['occupation_id'];
								$occupation_name=$sel['occupation_name'];
							?>
                            <input type="checkbox" checked="checked" class="child" name="occusn[]" data-value="<?php echo $occusn; ?>"/> <?php echo $occupation_name; ?>
							<?php }?>
                        </div>
                    </div>


                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">SEND PROGRAM OPPORTUNITY:</div>
                        <div class="text-field-div">
                        <select class="text_field selectinput" id="send_opportunity">
                                <?php if ($program_id==''){?>
                                <option value="" selected="selected">CHOOSE</option>
                                <?php }else{?>
                                <option value="<?php echo $send_opportunity;?>" selected="selected"><?php echo strtoupper($send_opportunity);?></option>
                                <?php }?>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                        </div>
                    </div>


                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">REFERRAL CHANEL:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="ref_id">
                                <?php if ($ref_id==''){?>
                                <option value="" selected="selected">CHOOSE</option>
                                <?php }else{?>
                                <option value="<?php echo $ref_id;?>" selected="selected"><?php echo strtoupper($ref_name);?></option>
                                <?php }?>
                                <?php 
                                $query= mysqli_query($conn,"SELECT * FROM setup_referral_tab");
                                while($sel=mysqli_fetch_array($query)){
                                $ref_id=$sel['ref_id'];
                                $ref_name=$sel['ref_name'];
                                ?>
                                <option value="<?php echo $ref_id;?>"><?php echo strtoupper($ref_name);?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">REFERRAL DETAILS:</div>
                        <div class="text-field-div">
                            <input class="text_field" placeholder="TYPE HERE" id="ref_details" value="<?php echo strtoupper($ref_details);?>"/>
                        </div>
                    </div>
				

                </div>
        	</div>





         	<div class="user-profile-div">
            	<div class="div-in">
                	<div class="title">MARITAL AND ENTOURAGE DETAILS</div>

                	<div class="profile-segment-div col-4">
                    	<div class="segment-title">MARITAL STATUS:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="marital_status" onchange="_marital_status_details()">
                                <?php if ($marital_status==''){?>
                                <option value="" selected="selected">CHOOSE</option>
                                <?php }else{?>
                                <option value="<?php echo $marital_status;?>" selected="selected"><?php echo strtoupper($marital_status);?></option>
                                <?php }?>
                                <option value="SINGLE">SINGLE</option>
                                <option value="MARRIED">MARRIED</option>
                                <option value="DIVORCED">DIVORCED</option>
                            </select>
                        </div>
                    </div>


                	<div class="profile-segment-div col-4">
                    	<div class="segment-title">NUMBER OF CHILDREN:</div>
                        <div class="text-field-div">
                          <input class="text_field" type="number" id="nums_of_children" placeholder="NUMBER OF CHILDREN" value="<?php echo $nums_of_children; ?>" onkeypress="return isNumber(event)"/>
                        </div>
                    </div>
				

                	<div class="profile-segment-div col-4">
                    	<div class="segment-title">ENTOURAGE OPTION:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="entourage_option" onchange="_get_entourage_details()">
                                <?php if ($entourage_option==''){?>
                                <option value="" selected="selected">SELECT</option>
                                <?php }else{?>
                                <option value="<?php echo $entourage_option;?>" selected="selected"><?php echo strtoupper($entourage_option);?></option>
                                <?php }?>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>

                	<div class="profile-segment-div col-4">
                    	<div class="segment-title">ENTOURAGE PASSPORT:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="user_entourage_passport_option">
                                <?php if ($user_entourage_passport_option==''){?>
                                <option value="" selected="selected">SELECT</option>
                                <?php }else{?>
                                <option value="<?php echo $user_entourage_passport_option;?>" selected="selected"><?php echo strtoupper($user_entourage_passport_option);?></option>
                                <?php }?>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>
                    
                    
                	<div class="profile-segment-div col-15">
                    	<div class="segment-title">SPOUSE FULLNAME:</div>
                        <div class="text-field-div">
                            <input class="text_field" id="spouse_fullname" placeholder="SPOUSE FULLNAME" value="<?php echo $spouse_fullname; ?>"/>
                        </div>
                    </div>
				
                	<div class="profile-segment-div col-3">
                    	<div class="segment-title">DATE OF BIRTH:</div>
                        <div class="text-field-div">
                            <input class="text_field" type="date" id="spouse_dob" placeholder="DATE OF BIRTH" value="<?php echo $spouse_dob; ?>"/>
                        </div>
                    </div>
				
  
  
                	<div class="profile-segment-div col-2">
                    	<div class="segment-title">SPOUSE QUALIFICATION:</div>
                        <div class="text-field-div">
                            <select class="text_field selectinput" id="spouse_qualification_id">
                                <?php if ($spouse_qualification_id==''){?>
                                <option value="" selected="selected">CHOOSE</option>
                                <?php }else{?>
                                <option value="<?php echo $spouse_qualification_id;?>" selected="selected"><?php echo strtoupper($qualification_name);?></option>
                                <?php }?>
                                <?php 
                                $query= mysqli_query($conn,"SELECT * FROM setup_qualifications_tab");
                                while($sel=mysqli_fetch_array($query)){
                                $qualification_id=$sel['qualification_id'];
                                $qualification_name=$sel['qualification_name'];
                                ?>
                                <option value="<?php echo $qualification_id;?>"><?php echo strtoupper($qualification_name);?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    
                	<div class="profile-segment-div col-4">
                    	<div class="segment-title">SPOUSE OCCUPATION:</div>
                        <div class="text-field-div">
                              <input class="text_field" id="spouse_occupation" placeholder="SPOUSE OCCUPATION" value="<?php echo $spouse_occupation; ?>"/>
                        </div>
                    </div>
                	<div class="profile-segment-div col-4">
                    	<div class="segment-title">YEARS OF WORKING EXPERIENCE::</div>
                        <div class="text-field-div">
                              <input class="text_field" type="number" id="spouse_working_experience" placeholder="WORKING EXPERIENCE" value="<?php echo $spouse_working_experience; ?>"/>
                        </div>
                    </div>
  
                	<div class="profile-segment-div">
                    	<div class="segment-title">ENTOURAGE NAMES:</div>
                        <div class="text-field-div">
							<?php 
							$query=mysqli_query($conn,"SELECT * FROM user_entourage_tab WHERE user_id='$users_id'");
                            while ($fetch=mysqli_fetch_array($query)){
                                $entourage_id=$fetch['entourage_id'];
                                $entourage_name=$fetch['entourage_name'];
                                ?>
                                        <?php echo $entourage_name?> |
                              <?php }?>
                        </div>
                    </div>
                    
					<br clear="all" />
					<br clear="all" />
                </div>
        	</div>











