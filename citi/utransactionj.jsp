<%@ page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*" errorPage="" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>
<%
	int clientid=Integer.parseInt(request.getParameter("clientid"));
	int plotid=Integer.parseInt(request.getParameter("plotid"));
	String layoutid=request.getParameter("layoutid");
	int amtpaid=Integer.parseInt(request.getParameter("amtpaid"));
	String paiddt=request.getParameter("paiddt");
	 try
 {
  Connection c;
  Statement s;
  ResultSet rs;
  PreparedStatement psmt=null;
  Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
  c=DriverManager.getConnection("jdbc:odbc:info");
  s=c.createStatement();
String sql="insert into transaction(clientid,plotid,layoutid,amtpaid,paiddt) values(?,?,?,?,?)";
psmt=c.prepareStatement(sql);

psmt.setInt(1,clientid);
psmt.setInt(2,plotid);
psmt.setString(3,layoutid);
psmt.setInt(4,amtpaid);
psmt.setString(5,paiddt);

  int cs = psmt.executeUpdate();
  s.close();

 }
 catch(Exception e)
 {
  out.write(""+e);
 }
%>


</body>
</html>
