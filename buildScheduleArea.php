<html>
<paper-fab class="fabNavLeft" icon="chevron-left"></paper-fab>

	<core-animated-pages class="fancy" selected="0" transitions="slide-from-right" onclick="changePage()">
        <section>
            <div class="page" id="pageUploadTranscript">
                <paper-input-decorator class="textInput" id="inputEmail" name="login_email" label="email address" floatingLabel>
                    <input is="core-input"id="txtEmail" value="rbierman@trinity.edu">
                </paper-input-decorator>

                <paper-button raised class="loginButton" >Login</paper-button>

            </div>
        </section>
        <section>
            <div class="page" id="pagePreferences">
                two
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