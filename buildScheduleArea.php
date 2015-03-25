<html>
<paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>

	<core-animated-pages class="fancy" selected="0" transitions="slide-from-right" onclick="changePage()">
        <section>
            <div class="page" id="pageUploadTranscript">
                <textarea id="textAreaTranscript" rows="40" cols="40" placeholder="Paste your transcript here..."></textarea>
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
                <div id="areaMajor">
                    <br><br>areaMajor<br><br>
                </div>
                <div id="areaInterests">
                    <br><br>areaInterests<br><br>
                </div>
                <div id="areaTimes">
                    <br><br>areaTimes<br><br>
                </div>
                <div id="areaDays">
                    <paper-checkbox label="Monday"></paper-checkbox>
                    <paper-checkbox label="Tuesday"></paper-checkbox>
                    <paper-checkbox label="Wednesday"></paper-checkbox>
                    <paper-checkbox label="Thursday"></paper-checkbox>
                    <paper-checkbox label="Friday"></paper-checkbox>
                    <paper-checkbox label="Saturday"></paper-checkbox>
                    <paper-checkbox label="Sunday"></paper-checkbox>
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
<paper-fab class="fabNavRight" icon="chevron-right"> </paper-fab>

<script src="js/buildScheduleArea.js"></script>
</html>