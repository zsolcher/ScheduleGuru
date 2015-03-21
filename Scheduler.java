
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.StringTokenizer;
import java.util.regex.Matcher;
import java.util.regex.Pattern;


public class Scheduler {

	static MainDAO database = new MainDAO();

	private static ArrayList<SchoolClass> classes = new ArrayList<SchoolClass>();

	public static void main(String[] args) throws Exception {
		/*
		 * TODO Import the schedule (which will be in the Class_Schedules Folder as a .txt file Convert it into a Class Java class Write every Class to a database
		 * 
		 * This will also create the code for the importation of a person's transcript
		 */

		// Import .txt file

		database.readDatabase();

		String fileName = "/users/kjames/workspace/WebApps/Class_Schedule_2015.txt";
		BufferedReader sched = new BufferedReader(new FileReader(fileName));
		String s = sched.readLine();
		database.clearTable("AllClasses");
		while (s != null) {
			// use StringTokenizer or getElements method
			// ArrayList<String> elem2 = getElements(token, "-?\\d+(\\.\\d+)?\\e?\\-?\\d+");
			StringTokenizer sto = new StringTokenizer(s);

			String startCode = sto.nextToken();
			String classCode = sto.nextToken();
			String name = "";
			String t = sto.nextToken();
			while (!t.contains("PM-") && !t.contains("AM-") && !t.contains("TBA")) { // This is my assumption of something on the time would have...
				name += " " + t;
				t = sto.nextToken();
			}
			String time = t;
			String days = sto.nextToken();
			String building = sto.nextToken();
			String room = "TBA";
			if (!building.equals("TBA")) {
				room = sto.nextToken();
			}

			String prof = sto.nextToken();
			while (sto.hasMoreTokens()) {
				prof += " " + sto.nextToken();
			}

			String s2 = sched.readLine();
			String notes = "";

			if (s2 != null && !s2.startsWith("4")) {
				notes = s2;
				s = sched.readLine();
			} else {
				s = s2;
			}

			// That should be a line
			SchoolClass sc = new SchoolClass(name, classCode, time, days, building, room, prof, notes);
			if (notes.contains("Same as")) { // **** We have a class that has the same class. need to insert ****/
				sc.setSameClasses(getElements(notes, "([A-Z][A-Z][A-Z][A-Z]) ([0-9][0-9][0-9][0-9])-([0-9])"));
			}
			sc.setID(Integer.parseInt(startCode));

			classes.add(sc);
			database.insertSchoolClass(sc);

			// We can either add the class to a list and add them at one time or just add straight to database;

		}

		for (SchoolClass sc : classes) {
			if (sc.getHasSame()) {
				ArrayList<String> same = sc.getSameClasses();
				for (String classCode : same) {
					String subject = classCode.substring(0, 4);
					String classNumber = classCode.substring(5, 9);
					String sectionNumber = classCode.substring(10);
					int classIDOfSame = database.getClassIDForSubjectClassSection(subject, classNumber, sectionNumber);
					database.inputSameClass(sc.getID(), classIDOfSame);
				}
			}
		}

		sched.close();
		database.close();

	}

	static ArrayList<String> getElements(String input, String pattern) {
		Pattern p = Pattern.compile(pattern);
		Matcher matcher = p.matcher(input);
		ArrayList<String> res = new ArrayList<String>();

		while (matcher.find()) {
			res.add(matcher.group());
		}

		return res;
	}

}

class MainDAO {
	private static Connection connect = null;
	private static Statement statement = null;
	private static PreparedStatement preparedStatement = null;
	private static ResultSet resultSet = null;

	public void readDatabase() throws Exception {
		try {
			// This will load the MySQL driver, each DB has its own driver
			Class.forName("com.mysql.jdbc.Driver");
			// Setup the connection with the DB
			String username = "kjames";
			String pswd = "0757477";

			connect = DriverManager.getConnection("jdbc:mysql://localhost:3306/ScheduleGuru", username, pswd);

			// Statements allow to issue SQL queries to the database
			statement = connect.createStatement();
			// Result set get the result of the SQL query
			resultSet = statement.executeQuery("select * from AllClasses");
			/*
			 * // PreparedStatements can use variables and are more efficient preparedStatement = connect.prepareStatement("insert into  ScheduleGuru values (default, ?, ?, ?, ? , ?, ?)"); // "myuser, webpage, datum, summery, COMMENTS from feedback.comments"); // Parameters start
			 * with 1 preparedStatement.setString(1, "Test"); preparedStatement.setString(2, "TestEmail"); preparedStatement.setString(3, "TestWebpage"); preparedStatement.setDate(4, new java.sql.Date(2009, 12, 11)); preparedStatement.setString(5, "TestSummary");
			 * preparedStatement.setString(6, "TestComment"); preparedStatement.executeUpdate();
			 * 
			 * preparedStatement = connect.prepareStatement("SELECT * from ScheduleGuru"); resultSet = preparedStatement.executeQuery(); writeResultSet(resultSet);
			 * 
			 * // Remove again the insert comment preparedStatement = connect.prepareStatement("delete from feedback.comments where myuser= ? ; "); preparedStatement.setString(1, "Test"); preparedStatement.executeUpdate();
			 * 
			 * resultSet = statement.executeQuery("select * from feedback.comments"); writeMetaData(resultSet);
			 */
		} catch (Exception e) {
			throw e;
		}

	}

	private void writeMetaData(ResultSet resultSet) throws SQLException {
		// Now get some metadata from the database
		// Result set get the result of the SQL query

		System.out.println("The columns in the table are: ");

		System.out.println("Table: " + resultSet.getMetaData().getTableName(1));
		for (int i = 1; i <= resultSet.getMetaData().getColumnCount(); i++) {
			System.out.println("Column " + i + " " + resultSet.getMetaData().getColumnName(i));
		}
	}

	// You need to close the resultSet
	public void close() {
		try {
			if (resultSet != null) {
				resultSet.close();
			}

			if (statement != null) {
				statement.close();
			}

			if (connect != null) {
				connect.close();
			}
		} catch (Exception e) {

		}
	}

	public int insertSchoolClass(SchoolClass sc) {
		try {
			preparedStatement = connect.prepareStatement("INSERT into  AllClasses values (?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?)");

			// ClassID,Name, Department,Offered,Number, Section, Days, StartTime, EndTime, Building, RoomNum, Prof, CC, CCSection,Notes
			// Parameters start with 1
			preparedStatement.setInt(1, sc.getID()); // Name
			preparedStatement.setString(2, sc.getName()); // Name
			preparedStatement.setString(3, sc.getSubject()); // Department
			preparedStatement.setString(4, sc.getClassNumber()); // Number
			preparedStatement.setInt(5, Integer.parseInt(sc.getSectionNumber())); // Section
			preparedStatement.setString(6, sc.getDays()); // Days
			preparedStatement.setString(7, sc.getStartTime()); // StartTime
			preparedStatement.setString(8, sc.getEndTime()); // EndTime
			preparedStatement.setString(9, sc.getBuildingCode()); // Building
			preparedStatement.setString(10, sc.getRoomNumber()); // RoomNum
			preparedStatement.setString(11, sc.getTeacher()); // Prof
			preparedStatement.setBoolean(12, sc.getCommmonCurric() != -1); // CC
			preparedStatement.setInt(13, sc.getCommmonCurric()); // CCSection
			preparedStatement.setString(14, (sc.getNotes().length() > 150) ? sc.getNotes().substring(0, 150) : sc.getNotes() ); // Notes

			preparedStatement.executeUpdate();
		} catch (SQLException e) {
			System.out.println("Number of failed things: " + sc.getID());
			e.printStackTrace();
		}
		return sc.getID();
	}

	public static int getClassIDForSubjectClassSection(String subject, String classNumber, String sectionNumber) throws SQLException {
		preparedStatement = connect.prepareStatement("SELECT * from AllClasses WHERE Department = ? AND Number = ? AND Section = ?");
		preparedStatement.setString(1, subject);
		preparedStatement.setString(2, classNumber);
		preparedStatement.setInt(3, Integer.parseInt(sectionNumber));
		resultSet = preparedStatement.executeQuery();

		resultSet.next();
		
		int id = resultSet.getInt("ClassID");

		return id;
	}

	public static void inputSameClass(int id, int classIDOfSame) throws SQLException {
		preparedStatement = connect.prepareStatement("INSERT into SameClasses values (?, ?)");
		preparedStatement.setString(1, "" + id);
		preparedStatement.setString(2, "" + classIDOfSame);
		preparedStatement.executeUpdate();

	}

	public void addClassTaken(String userID, int id) throws SQLException {
		preparedStatement = connect.prepareStatement("INSERT into ClassesTaken values (?, ?)");
		preparedStatement.setString(1, "" + userID);
		preparedStatement.setString(2, "" + id);
		preparedStatement.executeUpdate();
	}

	public void clearTable(String tableName) {
		// Clears the 
		try {
			preparedStatement = connect.prepareStatement("DELETE from " + tableName);
			preparedStatement.execute();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

}

class ImportTranscript {
	static MainDAO database = new MainDAO();

	private static final String currentSemester = "SP2015";

	private static String userID = "";
	private static String fileName = "";

	public static void main(String[] args) throws IOException, FileNotFoundException, SQLException {
		// This is the name of my test file when it is on the D drive
		fileName = "D:\\workspace\\WebApps\\My_Trascript_Test.txt";
		try {
			database.readDatabase();
		} catch (Exception e) {
			e.printStackTrace();
		}
		if (args.length >= 2) {
			userID = args[0];
			fileName = args[1];
		}

		readFile();

	}

	private static void readFile() throws IOException, FileNotFoundException, SQLException {
		// TODO NEED to implement the database writing. This will go in two places
		BufferedReader transcript = new BufferedReader(new FileReader(fileName));
		String s = "";
		// use StringTokenizer or getElements method
		// ArrayList<String> elem2 = getElements(token, "-?\\d+(\\.\\d+)?\\e?\\-?\\d+");

		while (!s.contains(currentSemester)) {
			s = transcript.readLine();
		}

		String prevLine = s;
		s = transcript.readLine();
		while (s.contains(currentSemester) || prevLine.contains(currentSemester)) {
			prevLine = s;
			s = transcript.readLine();
		}

		StringTokenizer sto = new StringTokenizer(prevLine);
		String classCode = sto.nextToken();
		String section = sto.nextToken();
		String name = sto.nextToken();
		while (sto.hasMoreTokens()) {
			name += " " + sto.nextToken();
		}
		String grade = s;
		String credits = transcript.readLine();
		String semester = transcript.readLine();

		String[] sub = classCode.split("-");

		String subject = sub[0];
		String classNumber = sub[1];

		// TODO: Database writing
		int id = database.getClassIDForSubjectClassSection(subject, classNumber, section);
		database.addClassTaken(userID, id);

		s = transcript.readLine();
		while (s != null && s.contains("-")) {

			// We have now gotten to the important info
			// PrevLine is now the long string
			// S is the grade

			sto = new StringTokenizer(s);
			classCode = sto.nextToken();
			section = sto.nextToken();
			name = sto.nextToken();
			while (sto.hasMoreTokens()) {
				name += " " + sto.nextToken();
			}
			grade = transcript.readLine();
			credits = transcript.readLine();
			if (!grade.contains("CR")) {
				semester = transcript.readLine();
			}

			if (!grade.contains("W")) {
				id = database.getClassIDForSubjectClassSection(subject, classNumber, section);
				database.addClassTaken(userID, id);
			}

			s = transcript.readLine();
		}

		transcript.close();

	}

}

class SchoolClass {

	int ID = -1;
	String name;
	String subject;
	String classNumber;
	String sectionNumber;
	String time; // HH:MM:SS 24 hour clock
	String teacher;
	int commmonCurric = -1;
	String days;
	boolean hasSame = false;
	ArrayList<String> sameClass;
	String buildingCode; // Full name
	String roomNumber = "";

	String notes; // This is kind of a filler for things such as studio fees or field trip required or juniors and seniors only etc

	public SchoolClass(String name2, String classCode, String time2, String days, String building, String room, String prof, String note) {
		// Inputs the basic information
		name = name2;
		parseClassCode(classCode);
		time = time2;
		roomNumber = room;
		teacher = prof;
		buildingCode = building;
		this.notes = note;
		this.days = days;
	}

	public String getDays() {
		return days;
	}

	public void setDays(String days) {
		this.days = days;
	}

	private void parseClassCode(String classCode) {
		/*
		 * Takes a full String ARTH-1307-1 parses to **** the class subject parses to **** numbers which are the class number parses to *_ which is the section number
		 */

		String[] s = classCode.split("-");
		
		subject = s[0];
		classNumber = s[1];
		sectionNumber = s[2];
	}

	public void setSameClasses(ArrayList<String> elements) {
		hasSame = true;
		sameClass = elements;
	}

	public ArrayList<String> getSameClasses() {
		return sameClass;
	}

	public boolean getHasSame() {
		return hasSame;
	}

	public int getID() {
		return ID;
	}

	public void setID(int id) {
		ID = id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getSubject() {
		return subject;
	}

	public void setSubject(String subject) {
		this.subject = subject;
	}

	public String getClassNumber() {
		return classNumber;
	}

	public void setClassNumber(String classNumber) {
		this.classNumber = classNumber;
	}

	public String getSectionNumber() {
		if (sectionNumber.equals("")){
			System.out.println("WE found it");
		}
		if (sectionNumber.contains("([A-Z])")) {
			
		}
		return Scheduler.getElements(sectionNumber,"([0-9])+").get(0);
	}

	public void setSectionNumber(String sectionNumber) {
		this.sectionNumber = sectionNumber;
	}

	public String getTime() {
		return time;
	}

	public void setTime(String time) {
		this.time = time;
	}

	public String getTeacher() {
		return teacher;
	}

	public void setTeacher(String teacher) {
		this.teacher = teacher;
	}

	public int getCommmonCurric() {
		return commmonCurric;
	}

	public void setCommmonCurric(int commmonCurric) {
		this.commmonCurric = commmonCurric;
	}

	public String getBuildingCode() {
		return buildingCode;
	}

	public void setBuildingCode(String buildingCode) {
		this.buildingCode = buildingCode;
	}

	public String getRoomNumber() {
		return roomNumber;
	}

	public void setRoomNumber(String roomNumber) {
		this.roomNumber = roomNumber;
	}

	public String getNotes() {
		return notes;
	}

	public void setNotes(String notes) {
		this.notes = notes;
	}

	public String getEndTime() {
		if (time.contains("TBA")) {
			return "00:00:00";
		} else if (time.substring(9).contains("PM") && Integer.parseInt(time.substring(8, 10)) != 12) {
			return (Integer.parseInt(time.substring(8, 10)) + 12) + time.substring(10, 13) + ":00";
		} else {
			return time.substring(8, 13) + ":00";
		}
	}

	public String getStartTime() {
		if (time.contains("TBA")) {
			return "00:00:00";
		} else if (time.substring(0, 7).contains("PM") && Integer.parseInt(time.substring(0, 2)) != 12) {
			return (Integer.parseInt(time.substring(0, 2)) + 12) + time.substring(2, 5) + ":00";
		} else {
			return time.substring(0, 5) + ":00";
		}
	}

}

