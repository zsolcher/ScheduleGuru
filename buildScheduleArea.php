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
            <div class="preferenceArea" id="areaMajor">
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

            </div>
            <div class="preferenceArea" id="areaTimes">
                <label for="radioGroupStart">When can you start class? </label>
                <paper-radio-group selected="8" id="radioGroupStart">
                    <paper-radio-button name="8" label="8:30"></paper-radio-button>
                    <paper-radio-button name="9" label="9:30"></paper-radio-button>
                    <paper-radio-button name="10" label="10:30"></paper-radio-button>
                    <paper-radio-button name="11" label="11:30"></paper-radio-button>
                    <paper-radio-button name="12" label="12:30"></paper-radio-button>
                </paper-radio-group>
                <br>
                <label for="radioGroupStart">From which time are you unavailable? </label>
                <paper-radio-group selected="8" id="radioGroupStart">
                    <paper-radio-button name="8" label="12:30"></paper-radio-button>
                    <paper-radio-button name="9" label="1:30"></paper-radio-button>
                    <paper-radio-button name="10" label="2:30"></paper-radio-button>
                    <paper-radio-button name="11" label="3:30"></paper-radio-button>
                    <paper-radio-button name="12" label="4:30"></paper-radio-button>
                </paper-radio-group>
            </div>
            <div class="preferenceArea" id="areaDays">
                <label for="divDaysAvailable">Which days do you want to search on? </label>
                <div id="divDaysAvailable">
                    <paper-checkbox label="Monday"></paper-checkbox>
                    <paper-checkbox label="Tuesday"></paper-checkbox>
                    <paper-checkbox label="Wednesday"></paper-checkbox>
                    <paper-checkbox label="Thursday"></paper-checkbox>
                    <paper-checkbox label="Friday"></paper-checkbox>
                    <paper-checkbox label="Saturday"></paper-checkbox>
                    <paper-checkbox label="Sunday"></paper-checkbox>
                </div>

                <br><br>
            </div>
        </div>
    </section>
    <section>
        <div class="page" id="page3">
            three
        </div>
    </section>
    <section>
        <div class="page" id="page4">
            four
        </div>
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