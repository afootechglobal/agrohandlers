<div class="detail" id="basic-info">
<div class="alert">PROVIDE YOUR <span>BASIC INFORMATION</span></div>

			<div class="text-div">
                    <div class="title">SURNAME:</div>
                      <input id="surname" type="text" class="text_field" placeholder="Surname" title="Enter Your Surname" />
			</div>

			<div class="text-div">
                    <div class="title">OTHER NAMES:</div>
                      <input id="othernames" type="text" class="text_field" placeholder="Other Names" title="Enter Your Other Names"/>
			</div>

			<div class="text-div">
                    <div class="title">DATE OF BIRTH:</div>
                      <input id="datepicker" type="date" class="text_field" placeholder="Date of Birth" title="Enter Your Date of Birth"/>
			</div>
            
            
			<div class="text-div select">
                    <div class="title">SELECT GENDER:</div>
                       <select title="Select Gender" id="gender" class="text_field selectinput">
                             <option value="" selected="selected">SELECT GENDER</option>
                             <option value="MALE">MALE</option>
                             <option value="FEMALE">FEMALE</option>
                           </select>
			</div>

			<div class="text-div select">
                    <div class="title">RELIGION AFFILIATION:</div>
                       <select title="Religion" id="religion" class="text_field selectinput">
                             <option value="" selected="selected">SELECT RELIGION</option>
                             <option value="CHRISTIANITY">CHRISTIANITY</option>
                             <option value="ISLAMIC">ISLAMIC</option>
                             <option value="OTHERS">OTHERS</option>
                           </select>
			</div><br clear="all" />
            
			<div class="text-div">
                     <button class="btn" type="button"  title="Next" onclick="_next_reg_pane('location-details')"> NEXT <i class="fa fa-long-arrow-right"></i></button>
			</div>


</div>












<div class="detail" id="location-details">
<div class="alert">PROVIDE YOUR <span>LOCATION DETAILS</span></div>

			<div class="text-div">
                    <div class="title">NATIONALITY:</div>
                      <input id="nationality" type="text" class="text_field" placeholder="Nationality" title="Enter Your Nationality" value="NIGERIA" readonly="readonly" />
			</div>
            
			<div class="text-div select">
                    <div class="title">STATE OF ORIGIN:</div>
        <select id="state" class="text_field selectinput" title="Select State of Origin" onchange="_get_lga()">
           <option value="" selected="selected">State of Origin</option>
         		  <option value='Abia'>Abia State</option>
                  <option value='Adamawa'>Adamawa State</option>
                  <option value='AkwaIbom'>AkwaIbom State</option>
                  <option value='Anambra'>Anambra State</option>
                  <option value='Bauchi'>Bauchi State</option>
                  <option value='Bayelsa'>Bayelsa State</option>
                  <option value='Benue'>Benue State</option>
                  <option value='Borno'>Borno State</option>
                  <option value='Rivers'>CrossRivers State</option>
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

			<div class="text-div select">
                    <div class="title">LOCAL GOVT. AREA:</div>
				<select id="lga" class="text_field selectinput">
                  <option selected="selected">Select LGA</option>
                </select>
			</div><br clear="all" />

			<div class="text-div">
                    <div class="title">RESIDENTIAL ADDRESS:</div>
                      <input id="address" type="text" class="text_field" placeholder="Address" title="Enter Home Address"/>
			</div>
            
			<div class="text-div">
                    <div class="title">EMAIL ADDRESS:</div>
                      <input id="email" type="text" class="text_field" placeholder="Your Email" title="Enter Your Email Address"/>
			</div>
         
            
			<div class="text-div">
                    <div class="title">PHONE NUMBER:</div>
                      <input id="phoneno" type="text" class="text_field" placeholder="Your Phone Number" title="Enter Phone Number"/>
			</div>
         
			<div class="text-div">
                     <button id="btn" type="button"  title="Back" onclick="_back_reg_pane('basic-info')"><i class="fa fa-long-arrow-left"></i> GO BACK </button>
                     <button class="btn" type="button"  title="Next" onclick="_next_reg_pane('upload-passport')"> NEXT <i class="fa fa-long-arrow-right"></i></button>
			</div>

</div>



<div class="detail" id="upload-passport">
<div class="alert">UPLOAD YOUR <span>PASSPORT PHOTOGRAPH</span></div>

            <label>
			<div class="text-div">
            	<div class="passport-div"><img src="uploaded_files/staff_passport/friends.png" alt="Upload Passport" id="passportimg"/></div>
                <input type="file"  id="passport" accept=".jpg"  onchange="Test.UpdatePreview(this);" style="display:none;"/>
			</div>
            </label>
<div class="alert alert-success"> <span>NOTE:</span> Passport size should not be more than <span>300kb</span></div><br clear="all" />

          
			<div class="text-div">
                     <button id="btn" type="button"  title="Back" onclick="_back_reg_pane('location-details')"><i class="fa fa-long-arrow-left"></i> GO BACK </button>
                     <button class="btn" type="button"  title="Next" onclick="_next_reg_pane('application-details')"> NEXT <i class="fa fa-long-arrow-right"></i></button>
			</div>


</div>





<div class="detail" id="application-details">
<div class="alert">PROVIDE <span>APPLICATION DETAILS</span></div>

            <div class="text-div">
                                <div class="title">SELECT APPLICATION POST:</div>
                                  <select title="Application Post" id="job_id" class="text_field selectinput">
                                         <option value="" selected="selected">SELECT APPLICATION POST</option>
                             <?php 
                                       $query= mysqli_query($conn,"SELECT job_id, title FROM job_tab WHERE status_id='PUB'");
                                      while($fetch=mysqli_fetch_array($query)){
                                      $job_id=$fetch['job_id'];
                                      $job_title=$fetch['title'];
                                       ?>
                                         <option value="<?php echo $job_id;?>"><?php echo $job_title;?></option>
                                          <?php }?>
                                       </select>
                  </div>



                    <div class="text-div">
                    <div class="title">UPLOAD YOUR C.V</div>
                	<div class="alert" style="margin-bottom:0px;"><span><i class="fa fa-warning"></i> NOTE:</span> The size of your CV should NOT exceed <span>300kb</span></div>
                    <div style="background:url(all-images/images/cv.jpg) center top;">
                    <iframe src="" style="border:none; margin:0px; width:100%; height:200px;" id="note-preview"> </iframe>
                    </div>
                    <label>
                    <input type="file" class="text_field" id="up_note" style="display:none;" accept=".pdf"/> 
                    <div class="upload-btn" id="upload-note-btn"> <i class="fa fa-upload"></i> Click Here to Upload C.V</div>
                    </label>
                    </div>
             <br clear="all" />  
			<div class="text-div">
                     <button id="btn" type="button"  title="Back" onclick="_back_reg_pane('upload-passport')"><i class="fa fa-long-arrow-left"></i> GO BACK </button>
                     <button class="btn" type="button"  title="Submit" id="reg-staff-btn" onclick="_vet_email()"><i class="fa fa-check"></i> SUBMIT</button>
			</div>


</div>

<script type="text/javascript" src="js/superplaceholder.js"></script> 
<script type="text/javascript">
		superplaceholder({
			el: phoneno,
				sentences: [ 'Enter Your Phone Number', 'e.g 08131252996', '08055066744', '08151171419' ],
				options: {
				letterDelay: 80,
				loop: true,
				startOnFocus: false
			}
		});
</script>


<script type="text/javascript" language="javascript">

$(function(){
    $('#up_note').on('change', function(){
		var file = this.files[0];
		var reader = new FileReader();
		reader.onload = viewer.load;
		reader.readAsDataURL(file);
		viewer.setProperties(file);
  }); 
      var viewer = {
		  load : function(e){
		$('#note-preview').attr('src', e.target.result);
		  },
	  }
});

</script>


