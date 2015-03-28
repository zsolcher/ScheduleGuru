<html>
<paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>

<core-animated-pages class="fancy" selected="0" transitions="slide-from-right">
    <section>
        <div class="page" id="pageUploadTranscript">
            <textarea id="textAreaTranscript" rows="40" cols="40"
                      placeholder="Paste your transcript here..."></textarea>
            <paper-button raised id="btnSubmitTranscript">Submit</paper-button>

            <div id="tableContainer" class="tableContainer">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable">
                    <thead class="fixedHeader">
                    <tr>
                        <th>Course Section</th>
                        <th>Course Title</th>
                        <th>Credits</th>
                        <th>Term</th>
                    </tr>
                    </thead>
                    <tbody class="scrollContent">
                    <tr>
                        <td>a</td>
                        <td>b</td>
                        <td>c</td>
                        <td>d</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section>
        <div class="page" id="pagePreferences">
            <div class="preferenceArea">
                <label for="selectMajor">Choose your major: </label>
                <select id="selectMajor">
                    <option selected>Undecided</option>
                    <option>Anthropology</option>
                    <option>Art</option>
                    <option>Art History</option>
                    <option>Biology</option>
                    <option>Biochemistry *</option>
                    <option>Biochemistry & Molecular Biology *</option>
                    <option>Business Administration</option>
                    <option>Chemistry</option>
                    <option>Applied Chemistry</option>
                    <option>Chemistry with High School Teaching Certification</option>
                    <option>Chinese Studies</option>
                    <option>Ancient Mediterranean Studies</option>
                    <option>Classical Languages *</option>
                    <option>Communication **</option>
                    <option>Computer Science</option>
                    <option>Computing as a Second Major</option>
                    <option>Economics</option>
                    <option>Engineering Science *</option>
                    <option>English</option>
                    <option>Environmental Studies</option>
                    <option>French</option>
                    <option>Geosciences</option>
                    <option>German Studies</option>
                    <option>Greek</option>
                    <option>History</option>
                    <option>Human Communication</option>
                    <option>International Studies</option>
                    <option>Latin</option>
                    <option>Mathematics</option>
                    <option>Mathematical Finance</option>
                    <option>Music</option>
                    <option>Neuroscience *</option>
                    <option>Philosophy</option>
                    <option>Physics</option>
                    <option>Political Science</option>
                    <option>Psychology</option>
                    <option>Religion</option>
                    <option>Russian</option>
                    <option>Sociology</option>
                    <option>Spanish</option>
                    <option>Theatre</option>
                    <option>Urban Studies</option>
                </select>
                <br><br>
            
            
                <label for="radioGroupStart">What time do you want the earliest class to start? </label>
						<br>                
                <input type="radio" name="radioStart" value="08:30:00">8:30</input>
                <input type="radio" name="radioStart" value="09:30:00">9:30</input>
                <input type="radio" name="radioStart" value="10:30:00">10:30</input>
                <input type="radio" name="radioStart" value="11:30:00">11:30</input>
                <input type="radio" name="radioStart" value="12:30:00">12:30</input>
                <br><br>
                <label for="radioGroupStart">What time do you want the latest class to end? </label>
                <br>
                <input type="radio" name="radioEnd" value="11:20:00">11:20</input>
                <input type="radio" name="radioEnd" value="12:20:00">12:20</input>
                <input type="radio" name="radioEnd" value="13:20:00">1:20</input>
                <input type="radio" name="radioEnd" value="14:20:00">2:20</input>
                <input type="radio" name="radioEnd" value="15:55:00">3:55</input>
            	<br><br>
                <label for="divDaysAvailable">Which days do you want to have class? </label>
                	<br>
                	<input type="checkbox" name="days" value="M" checked="true">Monday</input>
                	<input type="checkbox" name="days" value="T" checked="true">Tuesday</input>
                	<input type="checkbox" name="days" value="W" checked="true">Wednesday</input>
                	<input type="checkbox" name="days" value="R" checked="true">Thursday</input>
                	<input type="checkbox" name="days" value="F" checked="true">Friday</input>

                <br>
                </div>
        </div>
    </section>
    <section>
        <div class="page" id="page3">
            three
        </div>
    </section>
    <section>
        	<p>These are the Common Curriculum classes that fit within your time preferences and do not conflict with a class you are taking for your major. Please select all you would like to take. There is an additional step where you may select non-Common Curriculum classes if you so wish.
			</p><b><u>Understanding Cultural Heritage</u></b>
        	 <ul id="cc">
   	     	 
        	 </ul>
    </section>
    <section>
        <div class="page" id="page5">
            five
        </div>
    </section>
    <section>
        <div class="page" id="page6">
            six
        </div>
    </section>
</core-animated-pages>
<paper-fab class="fabNavRight" icon="chevron-right"></paper-fab>

<script src="js/buildScheduleArea.js"></script>
</html>